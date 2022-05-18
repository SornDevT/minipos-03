import { createWebHistory, createRouter } from "vue-router";

import Home from "../Pages/Home.vue";
import Store from "../Pages/Store.vue";
import Transection from "../Pages/Tramsection.vue";
import Report from "../Pages/Report.vue";

const routes = [
    {
        name: "home",
        path:"/",
        component: Home
    },
    {
        name: "store",
        path:"/store",
        component: Store
    },
    {
        name: "transection",
        path:"/transection",
        component: Transection
    },
    {
        name: "report-data",
        path:"/report",
        component: Report
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior(){
        window.scrollTo(0,0);
    }
});

export default router;