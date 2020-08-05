<template>

<h1>Yes!</h1>

</template>

<script>

///import {} from 'vue-chartjs';

export default {

name: 'statistics',
//extends: Pie,

data(){
return{
product: []
}
},

computed: {
cProducts: function(){
return this.products;
}
},

methods: {
/*
getProducts(){
let category = this.$route.path;

if (category === "/") {
category = route('categories-list');
}else {
category = category + "/view";
}

axios.get(category)
.then((responce) => {
this.product = responce.data.product
});
},
*/
},

mounted() {
// this.getProducts();
}
}
</script>

<style scoped>

</style>
