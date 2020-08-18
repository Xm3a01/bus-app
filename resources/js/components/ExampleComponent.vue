<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <button id="btn-1"></button>
                    <div class="card-body contant">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data (){
            return {
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods :{
        },

    }
</script>
