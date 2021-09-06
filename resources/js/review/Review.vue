<template>
    <div>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-if="alrealdyReview">
                <h3>You have alrealdy left a review for this booking</h3>
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
                    ></textarea>
                </div>
                <button class="btn btn-lg btn-primary btn-block">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from "../shared/components/StarRating.vue";
import axios from "axios";

export default {
    data() {
        return {
            review: {
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
            }
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
        this.loading = true;
        try {
            let resp = await axios.get(`/api/reviews/${this.$route.params.id}`);
            this.exisingReview = resp.data.data;
        } catch (err) {
            if (err.response && err.response.status === 404) {
                let bookingByReview = await axios
                    .get(`/api/booking-by-review/${this.$route.params.id}`)
                    .then(resp => resp.data.data);
                if (bookingByReview) {
                    this.booking = bookingByReview;
                }
            }
        }
        //2. If no fecth booking by a review key
        this.loading = false;
        //3. Store the review
    },

    computed: {
        alrealdyReview() {
            return this.exisingReview !== null;
        }
    },

    components: {
        StarRating
    },

    methods: {
        onRatingChanged(rating) {
            this.review.rating = rating;
        }
    }
};
</script>
