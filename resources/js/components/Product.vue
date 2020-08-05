<template>

 <div class="row">
    <div class="container" >
      
        <div class="starter-template ">

            <div v-for="product in cProduct">
                <h3>{{product.item}}</h3>
                <h4>{{product.description}}</h4>
                <p>Цена: <b> {{product.price}} руб.</b></p>

                <img :src="'http://127.0.0.1:8000/storage/' +  product.picture ">

            <button @click="addProduct(product)" id="show-modal" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-success" role="button">Добавить в корзину</button> 

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
            <button @click="addBasket(product[0].id)" type="submit" class="btn btn-success" data-dismiss="modal"> Добавить </button>
            
             </div>
<br>
              </div>
             </div>
          </div>

          </div>
        </div>
      </div>

</template>

<script>

    import axios from 'axios';
    import route from "../route";

    export default {
        data(){
            return{
                product: []
            }
        },

        computed: {
            cProduct: function(){
                return this.product;
            }
        },

        methods: {

            getProduct(){
                let routePath = this.$route.path;

                axios.get(routePath + "/view")
                    .then((responce) => {
                        this.product = responce.data.product
                    })
            },

            addBasket(product){

                   axios.post('/add-to-cart', {
                   item_id: product
                    }).then((responce)=>{
                        console.log(responce)
                    }).catch((error)=>{
                        console.log(error.responce.data)
                    });      
               
            },

             addProduct(product){
               // const parsed = JSON.stringify(product);
               // localStorage.setItem('basket', parsed);

           //     console.log(product);
            }
        },
        
        mounted() {
            this.getProduct();
        }
    }

</script>

<style scoped>

</style>

