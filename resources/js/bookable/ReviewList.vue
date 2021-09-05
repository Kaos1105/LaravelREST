<template>
    <div style="padding: 1.25rem">
        <h6 class="text-uppercase text-secondary font-weight-bolder pt-4">
            Review List
        </h6>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div
                class="border-bottom d-none d-md-block"
                v-for="(review, index) in reviews"
                :key="'review' + index"
            >
                <div class="row pt-4">
                    <div class="col-md-6">Dan</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <StarRating
                            :rating="review.rating"
                            class="fa-lg"
                        ></StarRating>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ review.created_at | fromNow }}
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-md-12">{{ review.content }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import moment from "moment";
import StarRating from "../shared/components/StarRating.vue";

export default {
    components: {
        StarRating
    },

    data() {
        return {
            loading: false,
            reviews: []
        };
    },

    props: {
        bookableId: String
    },

    created() {
        this.loading = true;
        axios
            .get(`/api/bookables/${this.bookableId}/reviews`)
            .then(response => {
                this.reviews = response.data.data;
            })
            .finally(() => (this.loading = false));
    }
};
</script>
