<template>
    <!-- Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="DetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DetailsModalLabel">Mission details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h3>Mission title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro animi id aliquam omnis nostrum itaque a doloribus vitae blanditiis saepe aperiam rem debitis aspernatur temporibus ratione, officia non accusamus pariatur? Distinctio dolorum a expedita quia ex ullam autem, consectetur hic sed tempore omnis temporibus eligendi totam magni architecto nisi facilis.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Mission details component mounted.')
        },
    }
</script>

