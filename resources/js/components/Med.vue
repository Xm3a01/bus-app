<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body contant">
                        I'm an example component.
                        <button @click.prevent="loadone" >Hello</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="con">
            Mohamed
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
          loadone(){
            axios.get('content').then((res)=>{
                console.log(res.data)
                document.getElementById('con').innerHTML = res.data;
            }).catch((err)=>{
                console.error(res.data)
            })
        }
        },

    }
</script>
