import { createWebHistory, createRouter } from "vue-router";

import Home from "../Pages/Home.vue";
import Pos from "../Pages/Pos.vue";
import Store from "../Pages/Store.vue";
import Transection from "../Pages/Tramsection.vue";
import Report from "../Pages/Report.vue";
import NoPage from "../Pages/Nopage.vue";

const routes = [
    {
        name: "home",
        path:"/",
        component: Home
    },
    {
        name: "pos",
        path:"/pos",
        component: Pos
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
    },
    {
        name: "nopage",
        path:"/:catchAll(.*)",
        component: NoPage
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