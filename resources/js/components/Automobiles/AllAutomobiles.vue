<template>
 <div>
 <h2 class="text-center">Liste des Automobiles </h2>
 
 <table class="table" id="example">
 <thead>
 <tr>
 <th>Référence</th> 
 <th>Performonce</th> 
  <th>Energie</th>
 <th>Quantité</th>
 
 <th>Prix</th> 
 <th>Catégorie</th> 
 <th>Marque</th>
 <th>Image</th> 
 <th>Images</th> 
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="p in Automobiles" :key="p.id">
 <td>{{p.reference}}</td> 
 <td>{{p.performance}}</td> 
 <td>{{p.energie}}</td> 
 <td>{{p.qtestock}}</td>
 <td>{{p.prix}}</td>
 <td>{{p.categories.nomcategorie}}</td>
<td>{{p.marques.nommarque}}</td>
 <td><img :src="'../storage/images/'+p.imageartpetitf" :alt=p.designation 
width="160"></td>
 <td><div v-for="pg in JSON.parse(p.imageartgrandf)" 
:key="pg"><img :src="'../storage/images/'+pg" :alt=p.designation width="110"></div></td>
 <td>
 <button @click.prevent="deleteAutomobile(p.id)" class="btn 
btn-danger">Supprimer</button>
<router-link :to="{name: 'editAutomobile', params: { id: p.id }}" class="btn btn-success">Modifier</router-link></td>
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
 Automobiles: [] 
 } 
 }, 
 mounted() { 
 this.getAutomobiles(); 
 }, 
 methods: { 
 deleteAutomobile(id) { 
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) { 
 this.axios 
 .delete(`http://localhost:8000/api/automobiles/${id}`) 
 .then(res => { 
 console.log(res) 
 this.getAutomobiles(); 
 }) 
 .catch(error => { 
 console.log(error) 
 }); 
 } 
 }, 
 getAutomobiles(){ 
 this.axios 
 .get('http://localhost:8000/api/automobiles/') 
 .then(response => { 
 this.Automobiles = response.data; 
 $(function() {$('#example').DataTable();}); 
 }); 
 } 
 } 
 }
</script>
