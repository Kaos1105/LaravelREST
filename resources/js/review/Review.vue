<template>
    <div>
        <FatalError v-if="error" />
        <div class="row" v-else>
            <div
                :class="[
                    { 'col-md-4': showBooking },
                    { 'd-none': !showBooking }
                ]"
            >
                <div class="card">
                    <div class="card-body">
                        <div v-if="loading">Loading...</div>
                        <div v-else>
                            <p>
                                Stayed at
                                <router-link
                                    :to="{
                                        name: 'bookable',
                                        params: {
                                            id: booking.bookable.bookable_id
                                        }
                                    }"
                                    >{{ booking.bookable.title }}</router-link
                                >
                            </p>
                            <p>From {{ booking.from }} to {{ booking.to }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                :class="[
                    { 'col-md-8': showBooking },
                    { 'col-md-12': !showBooking }
                ]"
            >
                <div v-if="loading">Loading...</div>
                <div v-else>
                    <div v-if="alrealdyReviewed">
                        <h3>
                            You have alrealdy left a review for this booking
                        </h3>
                    </div>
                    <div v-else>
                        <div class="form-group">
                            <label for="" class="text-muted"
                                >Select the star rating (from 1 to 5)</label
                            ><StarRating
                                v-model="review.rating"
                                class="fa-3x"
                            ></StarRating>
                        </div>
                        <div class="form-group">
                            <label for="content" class="text-muted"
                                >Describe you experience:</label
                            >
                            <textarea
                                name=""
                                id=""
                                cols="30"
                                rows="10"
                                class="form-control"
                                v-model="review.content"
                                :class="[{ 'is-invalid': errorFor('content') }]"
                            ></textarea>
                            <ValidationError :errors="errorFor('content')" />
                        </div>
                        <button
                            class="btn btn-lg btn-primary btn-block"
                            @click.prevent="submit"
                            :disabled="submitting"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import StarRating from "../shared/components/StarRating.vue";
import axios from "axios";
import { is404, is422 } from "../shared/utils/reponse";
import FatalError from "../shared/components/FatalError.vue";
import ValidationError from "../shared/components/ValidationError.vue";
import * as _ from "lodash";
import validateError from "../shared/mixins/validateError";

export default {
    mixins: [validateError],
    components: {
        StarRating,
        FatalError,
        ValidationError
    },

    data() {
        return {
            review: {
                id: null,
                rating: 0,
                content: ""
            },
            exisingReview: null,
            loading: false,
            booking: {
                booking_id: "",
                from: "",
                to: "",
                bookable: {
                    bookable_id: "",
                    title: "",
                    description: ""
                }
            },
            error: null,
            submitting: false
        };
    },

    async created() {
        //1. If review alrealdy exists
        // this.loading = true;
        // axios
        //     .get(`/api/reviews/${this.$route.params.id}`)
        //     .then(
        //         resp => {
        //             this.exisingReview = resp.data.data;
        //         },
        //         reject => {
        //             if (reject.response && reject.response.status === 404) {
        //                 return axios.get(
        //                     `/api/booking-by-review/${this.$route.params.id}`
        //                 );
        //             }
        //         }
        //     )
        //     .catch(err => {
        //         console.log("error");
        //     })
        //     .then(resp => {
        //         if (resp.data.data) {
        //             this.booking = resp.data.data;
        //         }
        //     })
        //     .finally(() => (this.loading = false));
        this.review.id = this.$route.params.id;
        this.loading = true;
        try {
            let resp = await axios.get(`/api/reviews/${this.review.id}`);
            this.exisingReview = resp.data.data;
        } catch (err) {
            //2. If no fecth booking by a review key
            if (is404(err)) {
                try {
                    let resp = await axios.get(
                        `/api/booking-by-review/${this.review.id}`
                    );
                    this.booking = resp.data.data;
                } catch (error) {
                    if (is404(error)) this.error = error;
                }
            } else {
                this.error = err;
            }
        }
        this.loading = false;
    },

    computed: {
        alrealdyReviewed() {
            return this.hasReview || !this.hasBooking;
        },
        hasReview() {
            return this.exisingReview !== null;
        },
        hasBooking() {
            return !!this.booking.booking_id;
        },
        showBooking() {
            return this.loading || !this.alrealdyReviewed;
        }
    },

    methods: {
        onRatingChanged(rating) {
            this.review.rating = rating;
        },

        //3. Store the review
        async submit() {
            this.errors = null;
            this.submitting = true;
            try {
                let result = await axios.post(`/api/reviews`, this.review);
                console.log(result);
            } catch (err) {
                if (is422(err)) {
                    const errors = err.response.data.errors;
                    if (errors["content"] && _.size(errors) == 1) {
                        this.errors = errors;
                    } else {
                        this.error = err;
                    }
                } else {
                    this.error = err;
                }
            }
            this.submitting = false;
        }
    }
};
</script>

<style scoped>
.is-invalid {
    border-color: #b22222;
    background-image: none;
}

.invalid-feedback {
    color: #b22222;
}
</style>
