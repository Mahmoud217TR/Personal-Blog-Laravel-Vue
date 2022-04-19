require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue';

// for CKEditor
import CKEditor from '@ckeditor/ckeditor5-vue';

let app=createApp({}).use(CKEditor)

app.component('remove', require('./components/RemoveComponent.vue').default);
app.component('state', require('./components/StateComponent.vue').default);
app.component('editor', require('./components/EditorComponent.vue').default);
app.component('markable', require('./components/MarkableComponent.vue').default);
app.mount("#app");