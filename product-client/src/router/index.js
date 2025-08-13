import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import TestView from "@/views/TestView.vue";
import ProductView from "@/views/ProductView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/test",
      name: "test",
      component: TestView,
    },
    {
      path: "/products",
      name: "product",
      component: ProductView,
    },
  ],
});

export default router;
