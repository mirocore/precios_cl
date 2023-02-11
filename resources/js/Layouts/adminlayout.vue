<template>

    <div 
        id="admin__wrapper"
        class="grid grid-cols-12"
        >
        
        <Sidebar 
            class="fixed lg:static top-0 left-0 right-0 flex col-span-12 lg:col-span-2 transition-all ease-in"
            :class="menuDesplegado ? '' : 'menuCerrado'"
            :desplegarMenu="desplegarMenu"
        />

        <div id="admin__content" class="bg-gray-200 col-span-12 lg:col-span-10  text-slate-600">
            <div class="bg-blue-900 flex justify-between mb-5 items-center text-xs text-white p-2">

                    <p class="text-right text-xs">Hola {{ $page.props.user.name }}</p>

                    <button @click="desplegarMenu" class="block lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    

            </div>
            <div class="px-2">
                <slot></slot>
            </div>
        </div>        
    </div>

</template>

<script>
import Sidebar from '../Components/Admin/Sidebar.vue';
import NavLink from '@/Components/NavLink.vue';


export default{
    components:{
        Sidebar,
        NavLink
    },
    data(){
        return{
            menuDesplegado: false
        }
    },
    methods:{
        desplegarMenu(){
            if(this.menuDesplegado){
                this.menuDesplegado = false;
            }else{
                this.menuDesplegado = true;
            }
        }
    }
}
</script>

<style>
    @media(max-width:1024px){
        .menuCerrado{
            transform:translateX(-2000px)
        }
    }
    
</style>