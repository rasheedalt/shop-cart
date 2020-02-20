<template>
   <div class="card">
       <div class="card-body">
           <img class="card-img-top" src="" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-text">{{title}} </h4>
                <p class="card-text">{{desc}} </p>
                <p class="card-text text-center">{{price}} </p>
                <button class="btn btn-primary text-center"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
            </div>
       </div>
    </div>
</template>

<script>
    export default {
               props:['title', 'desc', 'price'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style >

</style>


