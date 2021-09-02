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
        </div>
        <div class="col-md-4 pb-4"><Availability></Availability></div>
    </div>
</template>

<script>
import axios from "axios";
import Availability from "./Availability.vue";

export default {
    components: {
        Availability
    },

    data() {
        return {
            bookable: { title: "T0", description: "C0", price: 0 },
            loading: false
        };
    },

    created() {
        this.loading = true;
        const id = this.$route.params.id;
        axios.get(`/api/bookables/${id}`).then(response => {
            this.bookable = response.data.data;
            this.loading = false;
        });
    }
};
</script>
