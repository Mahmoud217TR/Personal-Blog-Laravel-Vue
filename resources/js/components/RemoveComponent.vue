<template>
    <button class="btn btn-danger me-2" :class="hideButton?'d-none':'d-inline'" :id='id' @click="open">{{ text }}</button>
    <div class="backdrop" v-if='show' @click.self="close">
        <div class="remove-modal">
            <p class="h3">{{ title }}</p>
            <p>{{ content }}</p>
            <div class="actions">
                <button class="btn btn-danger me-2" @click="remove">Remove</button>
                <button class="btn btn-dark me-2" @click="close">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['action','method','text','title','content', 'id','hideButton'],
        data() {
            return {
                show: false,
            }
        },
        methods: {
            open(){
                this.show = true
            },
            close(){
                this.show = false
            },
            remove(){
                axios[this.method](this.action).then(response => {
                    window.location.href = response.data;
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

.remove-modal{
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