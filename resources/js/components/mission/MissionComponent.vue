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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(mission, key) in missions" :key="mission.id">
                            <th scope="row">{{ key + 1 }}</th>
                            <td>{{ mission.created_at }}</td>
                            <td>{{ mission.admin_id }}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#detailsModal">
                                    <strong>{{ mission.title }}</strong>
                                    <p>{{ mission.note }}</p>
                                </a>
                            </td>
                            <td>{{ mission.priority }}</td>
                            <td>{{ mission.status }}</td>
                            <td class="test-right">
                                <button class="btn btn-primary">Done</button>
                                <button class="btn btn-warning">Process</button>
                                <button class="btn btn-danger">Cancel</button>
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
        axios.get('./mission')
            .then(response => {
                this.missions = response.data;
                console.log(response.data);
            })
            .catch(error => console.log(error));

        console.log('Mission component mounted.');
    },
}
</script>

<style>

</style>
