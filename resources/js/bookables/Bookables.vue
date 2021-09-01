<template>
    <div>
        <div v-if="loading">Data is loading...</div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div
                    class="col d-flex align-items-stretch"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + 'column' + column"
                >
                    <BookableListItem
                        :itemTitle="bookable.title"
                        :itemDescription="bookable.description"
                        :itemPrice="bookable.price"
                    ></BookableListItem>
                </div>
                <div
                    class="col"
                    v-for="p in placeholdersInRow(row)"
                    :key="'placeholder' + row + p"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem.vue";
import axios from "axios";

export default {
    components: {
        BookableListItem
    },

    data() {
        return {
            bookables: [{ title: "T0", discription: "C0", price: 0 }],
            loading: false,
            columns: 3
        };
    },

    methods: {
        bookablesInRow(row) {
            return this.bookables.slice(
                (row - 1) * this.columns,
                row * this.columns
            );
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        }
    },

    computed: {
        rows() {
            return this.bookables === null
                ? 0
                : Math.ceil(this.bookables.length / this.columns);
        }
    },

    created() {
        this.loading = true;

        const request = axios.get("/api/bookables").then(result => {
            this.bookables = result.data;
            this.loading = false;
        });
    }
};
</script>
