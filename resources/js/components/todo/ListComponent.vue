<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <strong>All todo tasks</strong>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Create new task</button>
                    </li>

                    <li class="list-group-item" v-for="task in tasks">
                        <strong>{{ task.title }}</strong>
                        <p>{{ task.note }}</p>
                    </li>
                </ul>

                <todo-create></todo-create>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Todo list component mounted.')
        },
        data() {
            return {
                tasks: []
            };
        },
        created() {
            var $this = this;

            // get all the tasks
            axios.get('./todo')
            .then(response => {
                $this.tasks = response.data;
                console.log(response.data);
            })
            .catch(error => console.log(error));
        },
    }
</script>

<style>
    a.task {
        font-size: 1.5em;
        font-weight: 100;
    }
</style>

