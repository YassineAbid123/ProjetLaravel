<template lang="">
 
<form @submit.prevent="ajouterMarque">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="nommarque">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="categorieID">
 <option v-for="c in Categories" :key="c.id" 
:value=c.id>{{c.nomcategorie}}</option>
 </select> 
 </div>
 <button type="submit" class="btn btn-block btn-primary">Ajouter Marque</button>
</form>
</template>
<script>
import vueFilePond from 'vue-filepond'; 
import 'filepond/dist/filepond.min.css'; 
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'; 
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; 
export default { 
 components: { 
 FilePond: vueFilePond(FilePondPluginImagePreview) 
 }, 
 data() { 
 return { 
 nommarque: "", 
 imagemarque: "", 
 categorieID:"", 
 Categories:[] 
 } 
 }, 
 methods: { 
 
 ajouterMarque  (){ 
 const marqu = { 
 nommarque:this.nommarque, 
 imagemarque:this.imagemarque, 
 categorieID:this.categorieID 
 } 
 this.axios.post("http://localhost:8000/api/marques",marqu) 
 .then(() => { 
 this.$router.push('/marques')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.imagemarque = "../storage/images/marques/"+e.target.files[0].name; 
 }, 
 getCategories(){ 
 this.axios.get('http://localhost:8000/api/categories').then(res =>
{ 
 this.Categories = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 } 
 
 }, 
 created() { 
 this.getCategories(); 
 } 
} 
</script>
<style lang="">
 
</style>