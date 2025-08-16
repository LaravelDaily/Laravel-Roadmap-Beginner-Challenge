import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import MyComponent from './Components/MyComponent.vue';

const app = createApp({});

// Register the component globally if needed
app.component('my-component', MyComponent);

// Or, if you're mounting a root Vue app (e.g., App.vue)
// import App from './App.vue';
// createApp(App).mount('#app');

app.mount('#app'); // Mount your Vue app to an element with ID 'app'
