import { createRouter,createWebHashHistory } from 'vue-router'
import Home from "./Home"; 
import AllCategories from "./components/Categories/AllCategories"; 
import AddCategorie from "./components/Categories/AddCategorie"; 
import EditCategorie from "./components/Categories/EditCategorie"; 
import AllMarques from "./components/Marques/AllMarques"; 
import AddMarque from "./components/Marques/AddMarque"; 
import EditMarque from "./components/Marques/EditMarque"; 
import AllAutomobiles from "./components/Automobiles/AllAutomobiles"; 
import AddAutomobile from "./components/Automobiles/AddAutomobile"; 
import EditAutomobile from "./components/Automobiles/EditAutomobile"; 
import Register from './components/Authentification/Register.vue'; 
import Login from './components/Authentification/Login.vue'; 
import Profile from './components/Authentification/Profile.vue'; 
import Logout from './components/Authentification/Logout.vue'; 



const routes = [ 
 { 
 path: '/', 
 name: 'home', 
 component: Home 
 } , 
 { 
 path: '/categories', 
 name: 'categories', 
 component: AllCategories 
 } ,
 { 
    path: '/addCategorie', 
    name: 'addCategorie', 
    component: AddCategorie 
    } ,{ 
        path: '/editCategorie', 
        name: 'editCategorie', 
        component: EditCategorie 
        } ,
        { 
            path: '/marques', 
            name: 'marques', 
            component: AllMarques 
            }, { 
                path: '/addMarques', 
                name: 'addMarques', 
                component: AddMarque 
                }, 
                { 
                    path: '/editMarque', 
                    name: 'editMarque', 
                    component: EditMarque 
                    },  { 
                        path: '/automobiles', 
                        name: 'automobiles', 
                        component: AllAutomobiles
                        }, { 
                            path: '/addAutomobile', 
                            name: 'addAutomobile', 
                            component: AddAutomobile
                            },  { 
                                path: '/editAutomobile', 
                                name: 'editAutomobile', 
                                component: EditAutomobile
                                }, { 
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
                                    name: 'profile', 
                                    path: '/profile', 
                                    component: Profile 
                                    }, { 
                                        name: 'logout', 
                                        path: '/logout', 
                                        component: Logout 
                                        }, 
                                   
                               
                   
               
           

 ]; 
const router = createRouter({ 
 history: createWebHashHistory(), 
 routes 
 }) 
 
export default router