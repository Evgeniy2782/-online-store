<template>

    <div class="row">

        <div v-for = "product in items" class="col-lg-4 col-md-6 mb-4">
            <div v-if="product.active == true">
            <div class="card h-100">

                <router-link v-bind:to=" '/api/shop/product/'+ product.id " ><img class="card-img-top" :src="'http://127.0.0.1:8000/storage/' +  product.picture " alt=""></router-link>

                <div class="card-body">
                    <h4 class="card-title"> <a href="#"> {{ product.item }} </a> </h4>
                    <p class="card-text"> {{ product.description }} </p>
                          <h5>Цена: {{ product.price }} руб.</h5>
                   <!-- <p class="card-text"> {{ product.id }} </p> -->

                    <button @click="addProduct(product.id)" id="show-modal" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-success" role="button">В корзину</button>
                    <p v-on:click="addStatistics(product.id)"> <router-link type="button" class="btn btn-outline-primary" v-bind:to=" '/api/shop/product/'+ product.id"> подробнее </router-link> </p>
                    
                </div>
           </div>
            <div class="modal" id="exampleModalCenter" tabindex="" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
                   </div>
              <div class="modal-body">
               <h4>Добавить товар в корзину ?</h4>
              </div>
             <div class="modal-footer">

            <button type="submit" class="btn btn-outline-primary" data-dismiss="modal"> Закрыть окно </button>
            <button @click="add()" type="submit" class="btn btn-success" data-dismiss="modal"> Добавить </button>

             </div>

               </div>
             </div>
          </div>
        </div>
    </div>

   
      <div class="navbar-inner">
          <div class="container">

    <div class="botton"><paginate
    v-model="page"
    :page-count="pageCount"
    :margin-pages="2"
    :page-range="4"
    :initial-page="0"
    :container-class="'pagination'"
    :prev-text="'Назад'"
    :next-text="'Вперед'"
    :click-handler="functionPaginate"
    > </paginate>
    </div>
    </div>
     </div>
      </div>
       

</template>

<script>
    import axios from 'axios';
    import route from "../route";
    import paginationMixin from './mixins/pagination.mixin';

    export default {
        name: 'category',
        mixins: [paginationMixin],
        
        dataProduct(){
            return{
                product
            }
        },
        computed: {
            cProducts: function(){
                return this.products;
            }
        },

        methods: {

            getProducts(){
                let category = this.$route.path;

                if (category === "/") {
                    category = route('categories-list');
                }else {
                    category = category + "/view";
                }

                axios.get(category)
                    .then((responce) => {
                        this.setupPagination(responce.data.products)
                    });
            },

             addBasket(){

                   axios.post('/add-to-cart', {
                   item_id: this.product
                   
                    }).then((responce)=>{
                        console.log(responce)
                    }).catch((error)=>{
                        console.log(error.responce.data)
                    });      
      
            },
             addProduct(productId){
               this.product = productId
            },
             
             addStatistics(productId){
              
              if(productId !== undefined){   
                 this.addProduct(productId);
              }
             
               axios.post('/add-to-statistic', {
                   item_id: this.product
                   
                    }).then((responce)=>{
                        console.log(responce)
                    }).catch((error)=>{
                        console.log(error.responce.data)
                    });      
            },
             add(){
              this.addBasket();
              this.addStatistics();
            },

        },
        mounted() {
            this.getProducts();
        }
    }
</script>

<style scoped>

</style>
