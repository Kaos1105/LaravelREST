<template>
    <div>
        <div v-if="loading">Data is loading...</div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div
                    class="col"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + 'column' + column"
                >
                    <BookableListItem
                        :itemTitle="bookable.title"
                        :itemContent="bookable.content"
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

export default {
    components: {
        BookableListItem
    },

    data() {
        return {
            bookables: [{ title: "T0", content: "C0", price: 0 }],
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
        setTimeout(() => {
            this.bookables = [
                {
                    title: "T1",
                    content: "C1",
                    price: 100
                },
                {
                    title: "T2",
                    content: "C2",
                    price: 200
                },
                {
                    title: "T3",
                    content: "C3",
                    price: 300
                },
                {
                    title: "T4",
                    content: "C4",
                    price: 500
                },
                {
                    title: "T5",
                    content: "C5",
                    price: 500
                },
                {
                    title: "T6",
                    content: "C6",
                    price: 600
                },
                {
                    title: "T7",
                    content: "C7",
                    price: 700
                },
                {
                    title: "T8",
                    content: "C8",
                    price: 800
                },
                {
                    title: "T9",
                    content: "C9",
                    price: 900
                },
                {
                    title: "T10",
                    content: "C10",
                    price: 1000
                }
            ];
            this.loading = false;
        }, 2000);
    }
};
</script>
