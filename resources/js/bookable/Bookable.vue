<template>
    <div class="row">
        <div class="col-md-8 pb-4">
            <div class="card">
                <div class="card-body">
                    <div v-if="!loading">
                        <h2>{{ bookable.title }}</h2>
                        <hr />
                        <article>{{ bookable.description }}</article>
                    </div>
                    <div v-else>Loading...</div>
                </div>
            </div>
            <ReviewList
                :bookableId="this.$route.params.id.toString()"
            ></ReviewList>
        </div>
        <div class="col-md-4 pb-4">
            <Availability
                class="mb-4"
                :bookableId="this.$route.params.id.toString()"
                @availability="checkPrice($event)"
            ></Availability>
            <transition name="fade"
                ><PriceBreakdown
                    :price="price"
                    v-if="this.price"
                    class="mb-4"
                ></PriceBreakdown>
            </transition>
            <transition name="fade">
                <button
                    v-if="this.price"
                    class="btn btn-outline-secondary btn-block"
                >
                    Book now
                </button>
            </transition>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Availability from "./Availability.vue";
import ReviewList from "./ReviewList.vue";
import PriceBreakdown from "./PriceBreakdown.vue";
import { mapState } from "vuex";

export default {
    components: {
        Availability,
        PriceBreakdown,
        ReviewList
    },

    data() {
        return {
            bookable: { title: "T0", description: "C0", price: 0 },
            loading: false,
            price: 0
        };
    },
    computed: mapState({
        lastSearch: "lastSearch"
    }),

    created() {
        this.loading = true;
        const id = this.$route.params.id;
        axios.get(`/api/bookables/${id}`).then(response => {
            this.bookable = response.data.data;
            this.loading = false;
        });
    },

    methods: {
        async checkPrice(hasAvailability) {
            if (!hasAvailability) {
                this.price = null;
                return;
            }
            try {
                this.price = (
                    await axios.get(
                        `/api/bookables/${this.bookable.id}/price?from=${this.lastSearch.from}&to=${this.lastSearch.to}`
                    )
                ).data.data;
            } catch (err) {
                this.price = null;
            }
        }
    }
};
</script>

<style scoped></style>
