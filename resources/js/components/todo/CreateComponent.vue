<template>
    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post" @submit="saveChanges">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Create a new task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" v-model="form.title" placeholder="Task name" class="form-control">
                                <p class="error">{{ errors.get('title') }}</p>
                            </div>

                            <div class="form-group col-md-12">
                                <textarea type="text" v-model="form.note" placeholder="Task note" class="form-control" rows="3"></textarea>
                                <p class="error">{{ errors.get('note') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    class Errors {
        constructor() {
            this.errors = {};
        }

        get(field) {
            var message = '';

            if(this.errors[field]) {
                for(var i in this.errors[field]) {
                    message += this.errors[field][i];
                }

                // return this.errors[field][0];
            }

            return message;
        }

        record(errors) {
            this.errors = errors.errors;
        }
    }

    export default {
        data() {
            return {
                form: {
                    title: '',
                    note: '',
                },
                errors: new Errors(),
            };
        },
        methods: {
            saveChanges: function(e) {
                var $this = this;

                // send post request
                axios.post('./todo', $this.form).then(response => {
                    // console.log(response.data);
                    Event.$emit('newTask', response.data);

                    // empty the current form
                    $this.form.title = '';
                    $this.form.note = '';
                }).catch(errors => {
                    $this.errors.record(errors.response.data);
                    // console.log(errors.response.data);
                });

                e.preventDefault()
            }
        },
        mounted() {
            console.log('Todo list component mounted.')
        },
    }
</script>

<style>
    p.error {
        color: red;
        font-weight: bold;
    }
</style>

