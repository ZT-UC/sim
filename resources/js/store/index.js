import { createStore, createLogger } from "vuex";

// Modules
import categories from "./modules/categories";
import brands from "./modules/brands";
import sizes from "./modules/sizes";

// Create a new store instance.
export const store = createStore({
    modules: {
        categories,
        brands,
        sizes,
    },
    plugins: [createLogger()],
});
