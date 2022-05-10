import { createStore, createLogger } from "vuex";

// Modules
import categories from "./modules/categories";

// Create a new store instance.
export const store = createStore({
    modules: {
        categories,
    },
    plugins: [createLogger()],
});
