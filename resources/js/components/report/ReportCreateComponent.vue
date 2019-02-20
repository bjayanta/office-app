<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Generator</h4>
                <hr>

                <form action="" @submit="addJob">
                    <div class="form-group">
                        <input v-model="temp.title" type="text" class="form-control" placeholder="Job Title" required>
                    </div>

                    <div class="form-group">
                        <textarea v-model="temp.description" class="form-control" placeholder="Description" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <select v-model="temp.status" class="form-control" required>
                            <option value="done">Done</option>
                            <option value="cancel">Cancel</option>
                            <option value="process">Process</option>
                        </select>
                    </div>

                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-danger">Clear</button>
                        <button type="submit" class="btn btn-primary"> + </button>
                    </div>
                </form>

                <div class="form-group">
                    <label for="others">Others concern</label>
                    <textarea v-model="form.others" class="form-control" id="others" rows="3"></textarea>
                </div>
            </div>

            <div class="col-md-8">
                <h4>Preview </h4>
                <hr>

                <form action="" @submit="saveChanges">
                    <ul>
                        <li v-for="(job, key) in form.jobs" :key="key">
                            <h5>
                                {{ job.title }}
                                <small class="float-right">{{ job.status.toUpperCase() }}</small>
                            </h5>

                            <p>{{ job.description }}</p>
                        </li>
                    </ul>

                    <div v-if="form.others !== ''">
                        <strong>Others concern</strong>
                        <p>{{ form.others }}</p>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-danger" @click="cancel">Cancel</a>
                        <button type="submit" class="btn btn-primary">Sent your progress</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                temp: {
                    status: 'done',
                },
                form: {
                    jobs: [],
                    others: '',
                },
            };
        },
        mounted() {
            console.log('Report component mounted.');
        },
        methods: {
            saveChanges(e) {
                console.log(this.form);
                e.preventDefault();
            },
            cancel(e) {
                this.form = {
                    jobs: [],
                    others: '',
                };

                this.temp = {
                    status: 'done',
                };

                e.preventDefault();
            },
            addJob(e) {
                let job = {
                    'title': this.temp.title,
                    'description': this.temp.description,
                    'status': this.temp.status,
                };

                this.form.jobs.push(job);
                this.temp = {
                    status: 'done',
                };

                console.log(this.temp);
                e.preventDefault();
            }
        },
    }
</script>

<style>
    .mission {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 15px;
    }
</style>



