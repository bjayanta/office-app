<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h1>Passport Component</h1>
                    <p>I'm an passport component.</p>
                </article>

                <!-- passport default components -->
                <passport-clients></passport-clients> <br>
                <passport-authorized-clients></passport-authorized-clients> <br>
                <passport-personal-access-tokens></passport-personal-access-tokens>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Passport component mounted.");
    }
}
</script>
