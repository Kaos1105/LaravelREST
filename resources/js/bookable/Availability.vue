<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Check Availability
            <transition name="fade" mode="out-in">
                <span
                    :class="hasAvailability ? 'text-success' : 'text-danger'"
                    :key="availabilityText"
                    >{{ availabilityText }}</span
                >
            </transition>
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
                    :class="[{ 'is-invalid': errorFor('from') }]"
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
            <span v-if="!loading">Check</span>
            <span v-else
                ><i class="fas fa-spinner fa-spin"></i>Checking...</span
            >
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
            from: this.$store.state.lastSearch.from || "",
            to: this.$store.state.lastSearch.to || "",
            loading: false,
            status: 0
        };
    },

    props: {
        bookableId: String
    },

    computed: {
        hasAvailability() {
            if (this.status === 200) return true;
            else if (this.status === 404) return false;
            else return null;
        },

        availabilityText() {
            if (this.hasAvailability) return "(AVAILABLE)";
            else if (!this.hasAvailability && this.hasAvailability !== null)
                return "(NOT AVAILABLE)";
            else return null;
        }
    },

    methods: {
        async check() {
            this.loading = true;
            this.errors = null;

            this.$store.dispatch("setLastSearch", {
                from: this.from,
                to: this.to
            });

            try {
                this.status = (
                    await axios.get(
                        `/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`
                    )
                ).status;
            } catch (error) {
                if (is422(error)) {
                    this.errors = error.response.data.errors;
                }
                this.status = error.response.status;
            }
            this.$emit("availability", this.hasAvailability);
            this.loading = false;
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
