<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h1>Your missions</h1>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe sapiente, ab alias repellendus exercitationem fuga omnis fugit voluptatum nemo, ad, ipsam excepturi esse ipsum sint expedita mollitia sequi recusandae est. Tempora aut blanditiis dolore debitis saepe sequi placeat quo accusantium officia quae commodi magni natus sit, quidem quos nulla quisquam!</p>
                </article>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Mission</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(mission, key) in missions" :key="mission.id">
                            <th scope="row">{{ key + 1 }}</th>
                            <td>{{ mission.date }}</td>
                            <td>{{ mission.owner }}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#detailsModal" @click="details(key)">
                                    <strong>{{ mission.title }}</strong>
                                    <p>{{ mission.description }}</p>
                                </a>
                            </td>
                            <td>{{ mission.priority.toUpperCase() }}</td>
                            <td>{{ mission.status.toUpperCase() }}</td>
                            <td class="text-right">
                                <button class="btn btn-primary" @click="setStatus(key, 'done')">Done</button>
                                <button class="btn btn-warning" @click="setStatus(key, 'process')">Process</button>
                                <button class="btn btn-danger" @click="setStatus(key, 'cancel')">Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- mission details component -->
            <mission-details></mission-details>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            missions: [],
        };
    },
    mounted() {
        this.getMissions();
        console.log('Mission component mounted.');
    },
    methods: {
        getMissions() {
            axios.get('./mission')
                .then(response => {
                    this.missions = response.data;
                    console.log(response.data);
                })
                .catch(error => console.log(error));
        },
        details(i) {
            Event.$emit('mission', this.missions[i]);
            console.log(this.missions[i]);
        },
        setStatus(key, status) {
            axios.patch('./mission/' + this.missions[key].id, {
                status: status
            })
            .then(response => {
                this.missions[key].status = response.data.status;
                console.log(response.data);
            }).catch(error => console.log(error));
        },
    }
}
</script>

<style>

</style>
