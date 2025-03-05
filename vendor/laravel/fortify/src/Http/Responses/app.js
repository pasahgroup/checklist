import './bootstrap';
import { createApp } from 'vue';
import Chat from './components/Chat.vue';
import App from './App.vue'
const app = createApp(App);
app.component('Chat', Chat);

app.mount("#app");
