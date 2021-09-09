<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Check Availability
            <span v-if="this.noAvailability" class="text-danger"
                >(NOT AVAILABLE)</span
            >
            <span v-if="this.hasAvailability" class="text-success"
                >(AVAILABLE)</span
            >
        </h6>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="from" class="form-label">From</label>
                <input
                    v-model="from"
                    id="from"
                    type="text"
                    name="from"
                    class="form-control form-control-sm"
                    placeholder="Start date"
                    @keyup.enter="check"
                    :class="[{ 'is-invalid': this.errorFor('from') }]"
                />
                <ValidationError :errors="errorFor('from')" />
            </div>
            <div class="form-group col-md-6">
                <label for="to" class="form-label">To</label>
                <input
                    v-model="to"
                    id="to"
                    type="text"
                    name="to"
                    class="form-control form-control-sm"
                    placeholder="End date"
                    @keyup.enter="check"
                    :class="[{ 'is-invalid': this.errorFor('to') }]"
                />
                <ValidationError :errors="errorFor('to')" />
            </div>
        </div>
        <button
            class="btn btn-secondary btn-block"
            @click="check"
            :disabled="loading"
        >
            Check
        </button>
    </div>
</template>

<script lang="ts">
import axios from "axios";
import { is422 } from "../shared/utils/reponse";
import ValidationError from "../shared/components/ValidationError.vue";
import validateError from "../shared/mixins/validateError";

export default {
    mixins: [validateError],
    components: { ValidationError },
    data() {
        return {
            from: "",
            to: "",
            loading: false,
            status: 0
        };
    },

    props: {
        bookableId: String
    },

    computed: {
        hasAvailability() {
            return this.status === 200;
        },

        noAvailability() {
            return this.status === 404;
        }
    },

    methods: {
        check() {
            this.loading = true;
            this.errors = null;
            axios
                .get(
                    `/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`
                )
                .then(response => {
                    this.status = response.status;
                })
                .catch(error => {
                    if (is422(error)) {
                        this.errors = error.response.data.errors;
                    }
                    this.status = error.response.status;
                })
                .finally(() => {
                    this.loading = false;
                });
        }
    }
};
</script>

<style scoped>
.form-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
}

.is-invalid {
    border-color: #b22222;
    background-image: none;
}

.invalid-feedback {
    color: #b22222;
}
</style>
