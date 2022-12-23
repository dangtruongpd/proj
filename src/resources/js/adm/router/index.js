import { createRouter, createWebHistory } from "vue-router";
import { CategoryEdit, CategoryList } from "../views";

const routes = [
    {
        path: "/",
        name: "category-list",
        component: CategoryList,
    },
    {
        path: "/edit",
        name: "category-edit",
        component: CategoryEdit,
    },
];

const router = createRouter({
    history: createWebHistory("/admin"),
    routes,
});

export default router;
