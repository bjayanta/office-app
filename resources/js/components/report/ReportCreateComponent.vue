<template>
    <div class="container">
        <form action="" @submit="saveTasks" class="row">
            <div class="form-group col-md-4">
                <label for="year">Date (Year)</label>
                <input type="text" id="year" class="form-control" v-model="form.year" placeholder="Year" required>
            </div>

            <div class="form-group col-md-4">
                <label for="month">Date (Month)</label>
                <input type="text" id="month" class="form-control" v-model="form.month" placeholder="Month" required>
            </div>

            <div class="form-group col-md-4">
                <label for="day">Date (Day)</label>
                <input type="text" id="day" class="form-control" v-model="form.day" placeholder="Day" required>
            </div>

            <div class="form-group col-md-12">
                <label for="comment">Comment</label>
                <textarea id="comment" v-model="form.comment" class="form-control"></textarea>
            </div>

            <div class="form-group col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Send your progress</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    year: new Date().getFullYear().toString(),
                    month: (new Date().getMonth() + 1).toString(),
                    day: new Date().getDate().toString(),
                    comment: '',
                },
            };
        },
        mounted() {
            console.log('Report task component mounted.');
        },
        methods: {
            saveTasks(e) {
                axios.post('./report/create', this.form)
                .then(response => {
                    this.form.comment = '';
                    console.log(response.data);
                })
                .catch(errors => console.log(errors));

                e.preventDefault();
            }
        },
    }
</script>

<style>

</style>
