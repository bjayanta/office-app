<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <article>
                    <h3>Todo list</h3>
                    <p>
                        Todo list Component.
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create new task</button>
                    </p>
                </article>

                <ul>
                    <li v-for="task in tasks">
                        <a href="" class="task"><strong>{{ task.title }}</strong></a>
                        <a href="">Delete</a>
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

