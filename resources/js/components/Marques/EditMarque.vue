<template lang="">
 
<form @submit.prevent="modifierMarque">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="Marques.nommarque">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange" 
:files="Marques.imagemarque"/>
</div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="Marques.categorieID">
 
 <option v-for="c in Categories" :key="c.id" 
:value=c.id>{{c.nomcategorie}}</option>
 </select> 
 </div>
 <button type="submit" class="btn btn-block btn-primary">Modifier Marques</button>
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
 Marques:[], 
 Categories:[] 
 } 
 }, 
 methods: { 
 
 modifierMarque(){ 
 const Marqu = { 
 nommarque:this.Marques.nommarque, 
 imagemarqu:this.Marques.imagemarque, 
 categorieID:this.Marques.categorieID 
 } 
 this.axios.put(`http://localhost:8000/api/marques/${this.$route.params.id}`,Marqu) 
 .then(() => { 
 this.$router.push('/marques')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.Marques.imagemarque = 
"marques/"+e.target.files[0].name; 
 }, 
 getCategories(){ 
 this.axios.get('http://localhost:8000/api/categories').then(res =>
{ 
 this.Categories = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 }, 
 
 getOneMarque(){ 
 this.axios 
 .get(`http://localhost:8000/api/marques/${this.$route.params.id}`) 
 .then((res) => { 
 this.Marques = res.data; 
 console.log(this.Marques) 
 }); 
 } 
 
 }, 
 created() { 
 this.getCategories(); 
 this.getOneMarque(); 
 } 
} 
</script>
<style lang="">
 
</style>