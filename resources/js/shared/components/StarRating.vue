<template>
    <div class="d-flex">
        <i
            class="fas fa-star"
            v-for="star in fullStars"
            :key="'full' + star"
            @click="onStarChange(star)"
        ></i>
        <i v-if="halfStar" class="fas fa-star-half-alt"></i>
        <i
            class="far fa-star"
            v-for="star in emptyStars"
            :key="'empty' + star"
            @click="onStarChange(fullStars + star)"
        ></i>
    </div>
</template>

<script lang="ts">
export default {
    props: {
        value: Number
    },

    methods: {
        onStarChange(star) {
            this.$emit("input", star);
        }
    },

    computed: {
        halfStar() {
            const fraction = Math.round(
                this.value - Math.floor(this.value) * 100
            );
            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            return Math.round(this.value);
        },
        emptyStars() {
            return 5 - Math.ceil(this.value);
        }
    },

    created() {
        const numbers = [];
    }
};
</script>
