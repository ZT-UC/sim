require("./bootstrap");

import Alpine from "alpinejs";

import { createApp } from "vue";
import { store } from "./store";

import ExampleComponents from "./components/ExampleComponents.vue";
import ProductAdd from "./components/products/ProductAdd.vue";

const app = createApp({});

app.component("example-component", ExampleComponents);
app.component("product-add", ProductAdd);

app.use(store);
app.mount("#app");

window.Alpine = Alpine;

Alpine.start();
