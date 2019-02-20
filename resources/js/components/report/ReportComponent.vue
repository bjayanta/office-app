<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <router-link class="btn btn-primary" to="/report-create" exact>Generate Report</router-link>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quis enim maxime sed obcaecati non, doloremque exercitationem? Praesentium, architecto esse, enim autem at minima sit quaerat doloremque, ratione ut harum?</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Report component mounted.')
        },
    }
</script>


