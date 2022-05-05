require("./bootstrap");

import Alpine from "alpinejs";
import { createApp } from "vue";
import ExampleComponents from "./components/ExampleComponents.vue";

const app = createApp({});
app.component("example-component", ExampleComponents);
app.mount("#app");

window.Alpine = Alpine;

Alpine.start();
