<template lang="">
<form @submit.prevent="ajouterautomobile">
 
 <div class="form-group">
 <input type="text" class="form-control" placeholder="reference" v-model="reference">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="perfermance" v-model="performance">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="energie" v-model="energie">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="qtestock" v-model="qtestock">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="prix" v-model="prix">
 </div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="categorie" 
@change="getmarques($event)" >
 <option v-for="c in Categories" :key="c.id" 
:value=c.id>{{c.nomcategorie}}</option>
 </select> 
 </div>
 <div class="form-group">
 Marques <select class="form-control" v-model="marque">
 <option v-for="m in Marques" :key="m.id" 
:value=m.id>{{m.nommarque}}</option>
 </select> 
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 <div class="form-group">
 <FilePond ref="pond" @change="onFileChangeM" @removefile
="onRemoveFileClick"/>
</div>
 <button type="submit" class="btn btn-block btn-primary">Ajouter 
Automobile</button>
</form>
</template>
 
<script>
import vueFilePond from 'vue-filepond'; 
import 'filepond/dist/filepond.min.css'; 
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'; 
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; 
 
export default { 
 name: 'app', 
 components: { 
 FilePond: vueFilePond(FilePondPluginImagePreview) 
 }, 
 data() { 
 return { 
 tab:[], 
 id:"", 
 reference: "", 
 performance: "", 
 energie: "", 
 qtestock: "", 
 prix:"",
 imageartpetitf: "", 
 imageartgrandf:[], 
 categorie:"", 
 marque:"", 
 Categories:[], 
 Marques:[], 
 
 } 
 }, 
 methods: { 
 
 ajouterautomobile(){ 
 const pr = { 
 reference:this.reference, 
 performance:this.performance, 
 energie:this.energie,  
 qtestock:this.qtestock, 
 prix:this.prix,
 categorieID:this.categorie, 
 marqueID:this.marque, 
 imageartpetitf:this.imageartpetitf, 
 imageartgrandf:this.imageartgrandf 
 } 
 
 this.axios.post("http://localhost:8000/api/automobiles",pr) 
 .then(() => { 
 this.$router.push('/automobile')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.imageartpetitf = 
e.target.files[0].name; 
 
 }, 
 onFileChangeM (e) { 
 this.tab.push(e.target.files[0].name) 
 this.imageartgrandf=JSON.stringify(this.tab); 
 }, 
 onRemoveFileClick(...e){ 
 let imag= e[1].filename; 
 var index = this.tab.map((val)=> {return val }).indexOf(imag); 
 console.log(index) 
 this.tab.splice(index,1); 
 this.imageartgrandf=JSON.stringify(this.tab); 
 }, 
 getmarques(event){ 
 let categ=event.target.value; 
 this.axios.get('http://localhost:8000/api/marq/'+categ).then(res =>
{ 
 this.Marques = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 } 
 }, 
 created() { 
 this.axios.get('http://localhost:8000/api/categories').then(res =>
{ 
 this.Categories = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 }, 
} 
</script>
<style lang="">
 
</style>
