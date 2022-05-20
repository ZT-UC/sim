require("./bootstrap");

import Alpine from "alpinejs";

import { createApp } from "vue";
import { store } from "./store";

import ExampleComponents from "./components/ExampleComponents.vue";
import ProductAdd from "./components/products/ProductAdd.vue";
import ProductEdit from "./components/products/ProductEdit.vue";
import StockManage from "./components/stocks/StockManage.vue";

const app = createApp({});

app.component("example-component", ExampleComponents);
app.component("product-add", ProductAdd);
app.component("product-edit", ProductEdit);
app.component("stock-manage", StockManage);

app.use(store);
app.mount("#app");

window.Alpine = Alpine;

Alpine.start();
