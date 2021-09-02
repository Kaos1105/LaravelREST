<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Check Availability
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
                />
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
                />
            </div>
        </div>
        <button class="btn btn-secondary btn-block" @click="check">
            Check
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            from: "",
            to: ""
        };
    },

    methods: {
        check() {
            console.log("Check");
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
</style>
