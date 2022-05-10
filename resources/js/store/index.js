import { createStore, createLogger } from "vuex";

// Modules
import categories from "./modules/categories";
import brands from "./modules/brands";

// Create a new store instance.
export const store = createStore({
    modules: {
        categories,
        brands,
    },
    plugins: [createLogger()],
});
