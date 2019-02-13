<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <span>Todo List</span>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createModal">
                            <i class="icon ion-md-add"></i>
                        </button>
                    </li>

                    <li class="list-group-item" v-for="(task, key) in tasks">
                        <div class="row">
                            <div class="col-md-10">
                                <strong>{{ task.title }}</strong>
                                <p>{{ task.note }}</p>
                            </div>

                            <div class="col-md-2 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" @click="updateTask(key)">
                                    <i class="icon ion-md-create"></i>
                                </button>

                                <button type="button" class="btn btn-danger" @click="deleteTask(key)">
                                    <i class="icon ion-md-trash"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- create new task component -->
                <todo-create></todo-create>

                <!-- create edit task component -->
                <todo-update></todo-update>
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
        methods: {
            updateTask: function(i) {
                console.log(this.tasks[i]);
                Event.$emit('editTask', this.tasks[i]);
            },
            deleteTask: function(i) {
                if(window.confirm('Are you sure want to remove this record?')) {
                    var id = this.tasks[i].id;

                    // delete from table
                    axios.delete('./todo/' + id)
                        .then(response => {
                            console.log(response.data);
                            this.tasks.splice(i, 1);
                        })
                        .catch(error => console.log(error));
                }
            }
        },
        created() {
            var $this = this;

            // send request to get all the task
            axios.get('./todo')
                .then(response => {
                    $this.tasks = response.data;
                    // console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                });

            // push the task into tasks array
            Event.$on('newTask', (data) => {
                // console.log(data);
                $this.tasks.push(data);
            });

        },
    }
</script>
