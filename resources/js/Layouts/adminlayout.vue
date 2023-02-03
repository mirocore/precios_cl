<template>

    <div 
        id="admin__wrapper"
        class="grid grid-cols-12"
        >
        
        <Sidebar />

        <div id="admin__content" class="bg-gray-200 col-span-10 p-5 text-slate-600 h-screen">
            <div v-if="$page.props.user" class="flex justify-end mb-5 items-center text-xs">
                <p class="text-right text-xs">Hola {{ $page.props.user.name }}</p>
                <button @click="cerrarSesion" class="bg-red-500 text-white py-1 px-3 ml-3 rounded-lg hover:bg-red-800">Cerrar Sesión</button>
            </div>
            <div v-else class="flex justify-end mb-5 items-center text-xs">
                <NavLink href="/login" class=" bg-sky-500 text-white py-1 px-4 inline-block ml-3 rounded-lg hover:bg-sky-800 cursor-pointer">Iniciar Sesión</NavLink>
            </div>
            <slot></slot>
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
    methods:{
        cerrarSesion(){
            this.$inertia.post('/auth/logout');
        }
    }
}
</script>