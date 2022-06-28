import { createWebHistory, createRouter } from "vue-router";
import Fields from "./components/Fields";
import AddField from "./components/AddField";
import Subscribers from "./components/Subscribers";

export const routes = [
    {
        name: 'add-field',
        path: '/add-field',
        component: AddField,
    },
    {
        name: 'fields',
        path: '/fields',
        component: Fields,
    },
    {
        name: 'subscribers',
        path: '/subscribers',
        component: Subscribers
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
