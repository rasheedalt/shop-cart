<template>
    <div >
        <HeaderComponent :cartItems="items" />

        <div class="row mt-3 justify-content-center mx-1">
            <div class="col-md-3 m-1" v-for="product in products" :key="product.id">
                <CardComponent :title="product.title" 
                                :desc="product.description" 
                                :image_url="product.image_url"
                                :price="product.price" />
            </div>
        </div>
    </div>
</template>

<script>

    import HeaderComponent from './components/HeaderComponent'
    import CardComponent from './components/CardComponent'
    export default {
        components:{
         HeaderComponent,
         CardComponent,
    },
        mounted() {
            this.getProducts();
            console.log(this.products)
        },
        data(){
            return{
                cart: '',
                user: '',
                products: '',
                items: ''
            }
        },
        computed:{
            authenticated(){
                if(localStorage.getItem('user')){
                    return true;
                }
                return false;
            },
            isAdmin(){
                var user;
                if(this.authenticated){
                   user = JSON.parse(localStorage.getItem('user'))
                   if(user.role == 'admin'){
                    return true;
                   }
                   return false
                }
                return false;
            },
            cartItems(){
                var items;
                
                if(this.authenticated){
                    axios.get(`/cart/add`)
                    .then((res)=>{
                        items = res.data.data
                    }) 
                   return items
                }
                return '';
            }
        },
        methods:{
            getProducts(){
                axios.get(`/products`)
                    .then((res)=>{
                        this.products = res.data.data
                    })
            },
            addToCart(id){
                axios.post(`cart/add/${id}`)
            },
            removeFromCart(id){
                axios.delete(`cart/remove/${id}`)
            },
        }
    }
</script>
