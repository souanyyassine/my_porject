import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Societes from '../components/Societes';
import AddSociete from '../components/AddSociete';
import EditSociete from '../components/EditSociete';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'societes',
        path: '/societes',
        component: Societes
    },
    {
        name: 'addsociete',
        path: '/societes/add',
        component: AddSociete
    },
    {
        name: 'editsociete',
        path: '/societes/edit/:id',
        component: EditSociete
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
