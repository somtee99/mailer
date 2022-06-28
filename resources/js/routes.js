import { createWebHistory, createRouter } from "vue-router";
import Fields from "./components/fields/Fields";
import AddField from "./components/fields/AddField";
import Subscribers from "./components/subscribers/Subscribers";

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
