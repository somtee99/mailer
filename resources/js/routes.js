import { createWebHistory, createRouter } from "vue-router";
import ExampleComponent from "./components/ExampleComponent";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: ExampleComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
