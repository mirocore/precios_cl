<template>
    <div class="bg-indigo-300 min-h-screen ">


        <header class="flex justify-between items-center flex-wrap p-4 bg-blue-900 text-white">
            <p class="text-xs md:text-lg font-bold">Central Limpieza</p>
            <NavLink v-if="!$page.props.user" href="/login" class="text-xs block bg-sky-500 hover:bg-sky-600 transition-all text-white rounded-md px-3 py-1 border-0">Login</NavLink> 
            
            <div v-if="$page.props.user" class="flex justify-end items-center gap-3 ">
                <p class="hidden md:flex">Hola {{ $page.props.user.name }}</p>           
                <NavLink  href="/admin/productos" class="text-xs inline-block bg-sky-500 hover:bg-sky-600 transition-all text-white rounded-md px-3 py-1 border-0">
                    Panel
                </NavLink>            
            </div>
        </header>

        <div class="py-5 px-3 md:px-10">
            <h1 class="font-bold text-blue-800 text-xl text-center">Catálogo Productos</h1>
            <div class="grid grid-cols-12 gap-5">
                <div v-for="categoria in categorias" :key="categoria.id" class="col-span-12 md:col-span-6">

                    <div class="grid grid-cols-12 items-center capitalize bg-sky-500 text-white p-2 mt-4 font-bold text-xs md:text-sm">
                        <div class="col-span-12 md:col-span-6 text-center md:text-left">{{ categoria.name }}</div>
                        <div class="hidden md:block col-span-2 text-center">Cantidad</div>
                        <div class="hidden md:block col-span-2 text-center">Precio</div>
                        <div class="hidden md:block col-span-2 text-center">Unidad</div>
                    </div>
                
                    <div v-for="producto in categoria.productos" :key="producto.id" class="grid grid-cols-12 items-center capitalize even:bg-sky-100 odd:bg-blue-200 p-2 font-bold text-xs md:text-sm">
                        <div class="text-blue-800 text-xs mb-2 md:mb-0 col-span-12 md:col-span-6 text-center md:text-left">{{ producto.name }}</div>
                        <div class="mb-1 text-xs col-span-12 md:col-span-2 flex flex-wrap justify-between md:justify-center   text-left md:text-center"><span class="text-xs font-light mr-1 inline-block md:hidden">Cantidad:</span>{{ producto.amount }}</div>
                        <div class="mb-1 text-xs col-span-12 flex flex-wrap justify-between md:justify-center md:col-span-2 text-left md:text-center"><span class="text-xs font-light mr-1 inline-block md:hidden">Precio:</span>${{producto.price}}</div>
                        <div class="mb-1 text-xs col-span-12 flex flex-wrap justify-between md:justify-center md:col-span-2 text-left md:text-center"><span class="text-xs font-light mr-1 inline-block md:hidden">Por Unidad:</span>${{  redondear(producto.price / producto.amount) }}</div>
                    </div>   
                </div>
            </div>
        </div>

        <footer class="bg-indigo-900  text-blue-500 text-center p-2">
        <p class="m-0 text-xs text-center">Sitio creado por Ramiro Belcore</p>
    </footer>

    </div>    
</template>

<script>
import NavLink from '@/Components/NavLink.vue';

export default {
    props:{
        categorias: Array
    },
    components:{
        NavLink
    },
    methods:{
        redondear(num){
            return num.toFixed(2);
        }
    }
}
</script>
