import { createStore, createLogger } from "vuex";

// Modules
import errors from "./modules/utils/errors";
import categories from "./modules/categories";
import brands from "./modules/brands";
import sizes from "./modules/sizes";
import products from "./modules/products";
import stocks from "./modules/stocks";
import return_products from "./modules/return_products";

// Create a new store instance.
export const store = createStore({
    modules: {
        errors,
        categories,
        brands,
        sizes,
        products,
        stocks,
        return_products,
    },
    plugins: [createLogger()],
});
