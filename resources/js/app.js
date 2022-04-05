require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue';

let app=createApp({})
app.component('remove', require('./components/RemoveComponent.vue').default);
app.component('state', require('./components/StateComponent.vue').default);
app.mount("#app");