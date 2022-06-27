import { createWebHistory, createRouter } from "vue-router";
import Fields from "./components/Fields";

export const routes = [
    {
        name: 'fields',
        path: '/fields',
        component: Fields
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
