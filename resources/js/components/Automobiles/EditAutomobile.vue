<template lang="">
<form @submit.prevent="modifierautomobile">
 
 <div class="form-group">
 <input type="text" class="form-control" placeholder="reference" v-model="automobile.reference">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="performance" v-model="automobile.performance">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="energie" v-model="automobile.energie">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="qtestock" v-model="automobile.qtestock">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="prix" v-model="automobile.prix">
 </div>
 <div class="form-group">
 Catégories<select class="form-control" v-model="automobile.categorieID" 
@change="getmarques($event)" >
 <option :value=automobile.categorieID></option>
 <option v-for="c in Categories" :key="c.id" 
:value=c.id>{{c.nomcategorie}}</option>
 </select> 
 </div>
 <div class="form-group">
 Marques<select class="form-control" v-model="automobile.marqueID">
 <option :value=automobile.marqueID></option>
 <option v-for="sc in Marques" :key="sc.id" 
:value=sc.id>{{sc.nommarque}}</option>
 </select> 
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange" 
:files="automobile.imageartpetitf" />
</div>
 <div class="form-group">
 <FilePond @change="onFileChangeM" :files="tab" @removefile
="onRemoveFileClick" />
</div>
 <button type="submit" class="btn btn-block btn-primary">Modifier 
Produit</button>
</form>
</template>
 
<script>
import vueFilePond from 'vue-filepond'; 
import 'filepond/dist/filepond.min.css'; 
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'; 
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; 
 
export default { 
 name: 'edit', 
 components: { 
 FilePond: vueFilePond(FilePondPluginImagePreview) 
 }, 
 data() { 
 return { 
 tab:[], 
 automobile:{}, 
 Categories:[], 
 Scategories:[], 
 
 } 
 }, 
 methods: { 
 
 modifierautomobile(){ 
 this.axios.patch(`http://localhost:8000/api/automobiles/${this.$route.params.id}`,this.automobile) 
 .then(() => { 
 this.$router.push('/automobiles')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.automobile.imageartpetitf = '../storage/images/'+e.target.files[0].name; 
 
 }, 
 onFileChangeM (e) { 
 
 this.tab.push('../storage/images/'+e.target.files[0].name); 
 this.article.imageartgrandf=JSON.stringify(this.tab); 
 console.log(this.automobile.imageartgrandf) 
 }, 
 onRemoveFileClick(...e){ 
 let imag= '../storage/images/'+e[1].filename; 
 var index = this.tab.map((val)=> {return val }).indexOf(imag); 
 this.tab.splice(index,1); 
 this.article.imageartgrandf=JSON.stringify(this.tab); 
 }, 
 getmarques(event){ 
 let categ=event.target.value; 
 this.axios.get('http://localhost:8000/api/marq/'+categ).then(res =>
{ 
 this.Marques = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 }, 
 getCategories(){ 
 this.axios.get('http://localhost:8000/api/categories').then(res => { 
 this.Categories = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 }, 
 getOneAutomobile(){ 
 this.axios 
 .get(`http://localhost:8000/api/automobiles/${this.$route.params.
id}`) 
 .then((res) => { 
 this.automobile = res.data; 
 this.tab= JSON.parse(this.automobile.imageartgrandf); 
 }); 
 } 
 }, 
 created() { 
 this.getOneAutomobile() ; 
 this.getCategories(); 
 }, 
} 
</script>
<style lang="">
 
</style>
