<template>
    <button class="btn me-2" :class="'btn-'+buttonStyle" @click='toggle' > <span v-html="state?trueText:falseText"></span></button>
</template>

<script>
    export default {
        props:['action', 'method','type', 'object_id', 'trueText', 'falseText', 'buttonStyle', 'initialState'],
        data() {
            return {
                state: false,
            }
        },
        mounted() {
            this.state = this.initialState;
        },
        methods: {
            toggle(){
                axios[this.method](this.action,{type:this.type, object_id:this.object_id}).then(response => {
                    this.state = true == response.data
                });
            }
        },
    }
</script>

<style scoped>
.backdrop{
    position: fixed;
    background-color: rgba(0, 0, 0, 0.3);
    top: 0;
    left:0;
    height: 100vh;
    width: 100%;
    z-index: 100;
}

.state-modal{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #f8fafc;
    max-width: 600px;
    min-height: 200px;
    border-radius: 4px;
    z-index: 100;
    padding: 4rem;
}
</style>