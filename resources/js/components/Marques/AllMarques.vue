<template>
 <div>
 
 <h2 class="text-center">Liste des Marques</h2>
 
 <table class="table" id="example">
 <thead>
 <tr>
 <th>Marque</th> 
 <th>Image</th> 
 <th>Catégorie</th> 
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="marq in Marques" :key="marq.id">
 <td>{{marq.nommarque}}</td> 
 <td><img :src="marq.imagemarque" 
:alt=marq.nomscategorie width="125"></td>
 <td>{{marq.categories.nomcategorie}}</td> 
 <td>
 
 <button @click.prevent="deleteMarque(marq.id)" 
class="btn btn-danger">Supprimer</button>
<router-link :to="{name: 'editMarque', params: { id: marq.id }}" 
class="btn btn-success">Modifier 
 </router-link></td>
 </tr>
 </tbody>
 </table>
 </div>
</template>
 
<script>
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css'; 
import 'jquery/dist/jquery.min.js'; 
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 
 export default { 
 data() { 
 return { 
 Marques: [], 
 Categ:[] 
 
 } 
 }, 
 mounted() { 
 this.getMarques(); 
 
 }, 
 methods: { 
 deleteMarque(id) { 
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) { 
 this.axios 
 .delete(`http://localhost:8000/api/marques/${id}`) 
 .then(res => { 
 console.log(res) 
 this.getMarques(); 
 }) 
 .catch(error => { 
 console.log(error) 
 }); 
 } 
 }, 
 getMarques(){ 
 this.axios 
 .get('http://localhost:8000/api/marques/') 
 .then(res => { 
 this.Marques= res.data; 
 console.log(this.Marques) 
 $(function() {$('#example').DataTable();}); 
 }); 
 
 } 
 } 
 } 
</script>