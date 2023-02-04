<template>
    <div class="flex justify-between items-center gap-2 mb-4 flex-wrap">
        <h1 class="text-indigo-800 text-xs md:text-xl leading-3 font-bold ">{{ titulo || "Listado" }}</h1>
        <nav-link
            :href="linkBTN"
            class="bg-green-500 text-white text-xs block px-2 md:px-5 h-auto py-1 hover:bg-green-700 hover:text-white cursor-pointer transition-all"
        >
            {{ txtBTN || "Nuevo" }}
        </nav-link>
    </div>
</template>


<script>

import NavLink from '@/Components/NavLink.vue';

export default{
    components:{
        NavLink
    },
    props:{
        titulo:String,
        linkBTN: String,
        txtBTN: String
    }
}
</script>