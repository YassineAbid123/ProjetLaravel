<template>
 <!-- Nav bar -->
 <nav class="navbar navbar-dark bg-dark justify-content-between flex-nowrap 
flex-row">
 <div class="container">
 <a class="navbar-brand float-left">
 <router-link class="nav-link navbar-brand pr-3" to="/register">
 Authentification 
 </router-link>
 </a>
 <ul class="nav navbar-nav flex-row float-right">
 <li class="nav-item">
 <router-link class="nav-link navbar-brand 
 pr-3" to="/"> Home </router-link>
 </li>
 <li class="nav-item">
<router-link class="nav-link navbar-brand pr-3" to="/categories"> Catégories </router-link>
</li>

<li class="nav-item">
 <router-link class="nav-link navbar-brand  pr-5" to="/addCategorie"> Ajout Catégorie </router-link>
</li>
 

 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/marques"> Marques </router-link>

 </li>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/addMarques"> Ajout Marques </router-link>
 </li>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/automobiles"> Automobiles </router-link>
 </li>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3" to="/addAutomobile">
Ajout Automobile </router-link>
 </li>
 </ul>
  <a class="navbar-brand float-left">
 <router-link class="nav-link" to="/logout"> Logout </router-link>
 </a>
 </div>
 </nav>
</template>
 
<script>
 export default {} 
</script>