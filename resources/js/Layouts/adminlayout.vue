<template>

    <div 
        id="admin__wrapper"
        class="grid grid-cols-12"
        >
        
        <Sidebar 
        />

        <div id="admin__content" class="bg-gray-200 col-span-12 md:col-span-10  text-slate-600">
            <div class="bg-blue-900 flex justify-between mb-5 items-center text-xs text-white p-2">

                    <p class="text-right text-xs">Hola {{ $page.props.user.name }}</p>
                    <button v-if="$page.props.user" @click="cerrarSesion" class="bg-red-500 text-white py-1 px-3 ml-3 rounded-lg hover:bg-red-800 text-xs">Cerrar Sesión</button>
                    <NavLink v-else href="/login" class="text-xs bg-sky-500 text-white py-1 px-4 inline-block ml-3 rounded-lg hover:bg-sky-800 cursor-pointer">Iniciar Sesión</NavLink>

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
    methods:{
        cerrarSesion(){
            this.$inertia.post('/auth/logout');
        }
    }
}
</script>