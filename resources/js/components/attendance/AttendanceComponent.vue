<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h1>Attendance Component</h1>
                    <p>I'm an sttendance component.</p>
                </article>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Entry</th>
                            <th scope="col">LE</th>
                            <th scope="col">Exit</th>
                            <th scope="col">RL</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(record, i) in records.data" :key="record.id">
                            <th scope="row">{{ i + 1 }}</th>
                            <td>{{ record.date }}</td>
                            <td>{{ record.ip }}</td>
                            <td>{{ record.in }}</td>
                            <td>{{ record.le }}</td>
                            <td>{{ record.out }}</td>
                            <td>{{ record.el }}</td>
                            <td>{{ record.status }}</td>
                        </tr>
                    </tbody>
                </table>

                <pagination :data="records" @pagination-change-page="getResults"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
// paginate
Vue.component('pagination', require('laravel-vue-pagination'));

export default {
    data() {
        return {
            records: {},
        };
    },
    mounted() {
        this.getResults();

        console.log('Attendance component mounted.');
    },
    methods: {
        // Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('./attendance?page=' + page)
				.then(response => {
                    console.log(response.data.data);
					this.records = response.data;
                })
                .catch(errors => console.log(errors));
		}
    },
}
</script>

<style>

</style>
