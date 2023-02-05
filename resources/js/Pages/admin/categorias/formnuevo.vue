<template>
    <Adminlayout>
        <div class="h-full flex flex-col justify-center">

            <NavLink 
                href="/admin/categorias"
                class=" mb-4 inline-block w-auto text-gray-500 text-center hover:border-0"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
            </svg>
Volver
            </NavLink>            

            <h1 class="text-indigo-800 text-xl leading-3 font-bold">Crear categoría nueva</h1>

            <p v-if="$page.props.errors.name || error" class="flex items-center gap-2 text-sm mt-4 mb-0 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>

                {{ $page.props.errors.name}}
            </p>

            <p v-if="error" class="flex items-center gap-2 text-sm mt-4 mb-0 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>

                El nombre es obligatorio
            </p>

            

            <form class="w-full" @submit.prevent="submitForm">
                <div class="my-5">
                    <label
                        class="block text-sm mb-1"
                    >Nombre</label>
                    <input 
                        placeholder="Ingrese el nombre de su categoría"
                        class="p-2 w-full"
                        v-model="nuevaCategoria.name"
                    />
                </div>
                <input 
                    type="submit"
                    value="Crear Categoría"
                    class="bg-green-500 hover:bg-green-700 transition-all cursor-pointer text-white w-full text-sm py-2"
                />
            </form>
        </div>
    </Adminlayout>
</template>

<script>
import Adminlayout from '../../../Layouts/adminlayout.vue';
import NavLink from '@/Components/NavLink.vue';


    export default{
        components:{
            Adminlayout,
            NavLink
        },
        data(){
            return{
                nuevaCategoria: {
                    name: ''
                },
                error:false
            }
        },
        methods:{
            submitForm(){

                // VALIDACION
                 if(this.nuevaCategoria.name === ""){
                    this.error = true;
                    return 
                }
                this.error = false; 


                // ENVIO
                this.$inertia.post('/admin/categorias', this.nuevaCategoria);
            }
        }
    }
</script>