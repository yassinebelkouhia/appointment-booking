import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import Booking from "../views/Booking.vue";
import BookingsTable from "../views/BookingsTable.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },

  {
    path: "/Register",
    name: "Register",
    component: () => import("../views/Register.vue"),
  },
  {
    path: "/Login",
    name: "Login",
    component: () => import("../views/Login.vue"),
  },
  {
    path: "/Booking",
    name: "Booking",
    component: () => import("../views/Booking.vue"),
  },
  {
    path: "/BookingsTable",
    name: "BookingsTable",
    component: () => import("../views/BookingsTable.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
