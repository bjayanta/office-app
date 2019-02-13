<template>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="post" @submit="updateChanges">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update task information</h5>
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
                        <button type="submit" class="btn btn-primary">Update changes</button>
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
            }

            return message;
        }

        record(data) {
            this.errors = data.errors;
        }
    }

    export default {
        data() {
            return {
                form: {},
                errors: new Errors(),
            };
        },
        created() {
            Event.$on('editTask', data => {
                var $this = this;

                // console.log(data);
                this.form = data;

                // empty the errors object
                $('#updateModal').on('hidden.bs.modal', function (e) {
                    $this.errors.record({errors: {}});
                });
            });
        },
        methods: {
            updateChanges: function(e) {
                var $this = this;

                // send post request
                axios.patch('./todo/' + $this.form.id, $this.form).then(response => {
                    console.log(response.data);
                    // Event.$emit('replaceTask', response.data);
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

