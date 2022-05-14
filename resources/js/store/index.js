import { createStore, createLogger } from "vuex";

// Modules
import errors from "./modules/utils/errors";
import categories from "./modules/categories";
import brands from "./modules/brands";
import sizes from "./modules/sizes";
import products from "./modules/products";

// Create a new store instance.
export const store = createStore({
    modules: {
        errors,
        categories,
        brands,
        sizes,
        products,
    },
    plugins: [createLogger()],
});
