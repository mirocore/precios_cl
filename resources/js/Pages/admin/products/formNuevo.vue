<template>
    <AdminLayout>
        <div>
            <NavLink class="text-xs border-b-0" href="/admin/productos">Volver al listado</NavLink>
        </div>
        <div class="mt-5 bg-white p-5">
            <h1>Crear Producto Nuevo</h1>
            <form class="text-xs py-4" @submit.prevent="submitForm">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <label for="name" class="inline-block mb-1">Nombre</label>
                        <input 
                            id="name"
                            class="text-xs border border-gray-300  text-gray-500 w-full inline-block px-2 py-2"
                            :class="[$page.props.errors.name ? 'border-red-500 border-2' : 'border-gray-300']"
                            placeholder="Ingrese nombre"
                            type="text"
                            v-model="nuevoProducto.name"
                        />
                        <span v-if="$page.props.errors.name" class="w-full bg-red-300 text-red-800 px-4 py-2 my-1 inline-block text-xs">{{ $page.props.errors.name }}</span>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <label for="state" class="inline-block mb-1">Estado</label>
                        <select 
                            class="cursor-pointer block w-full text-xs px-2 py-2 border border-gray-300  text-gray-500"
                            id="state"
                            v-model="nuevoProducto.state"
                        >
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    
                    <div class="col-span-12 md:col-span-6">
                        <label for="categoria" class="inline-block mb-1">Categoria</label>
                        <select 
                            class="text-xs cursor-pointer block w-full px-2 py-2 border border-gray-300  text-gray-500"
                            id="categoria"
                            v-model="nuevoProducto.id_categoria"
                            :class="[$page.props.errors.id_categoria ? 'border-red-500 border-2' : 'border-gray-300']"
                        >
                            <option value="">Seleccione Categoria</option>
                            <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{ categoria.name }}</option>
                        </select>
                        <span v-if="$page.props.errors.id_categoria" class="w-full bg-red-300 text-red-800 px-4 py-2 my-1 inline-block text-xs">{{ $page.props.errors.id_categoria }}</span>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <label for="amount" class="inline-block mb-1">Cantidad</label>
                        <input 
                            id="amount"
                            type="number"
                            class="text-xs border border-gray-300  text-gray-300 w-full inline-block px-2 py-1"
                            :class="[$page.props.errors.amount ? 'border-red-500 border-2' : 'border-gray-300']"
                            placeholder="Ingrese cantidad"
                            v-model="nuevoProducto.amount"
                        />
                        <span v-if="$page.props.errors.amount" class="w-full bg-red-300 text-red-800 px-4 py-2 my-1 inline-block text-xs">{{ $page.props.errors.amount }}</span>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <label for="price" class="inline-block mb-1">Precio</label>
                        <input 
                            id="price"
                            type="number"
                            class="text-xs border border-gray-300  text-gray-300 w-full inline-block px-2 py-1"
                            placeholder="Precio de la promo"
                            v-model="nuevoProducto.price"
                            :class="[$page.props.errors.price ? 'border-red-500 border-2' : 'border-gray-300']"
                        />
                        <span v-if="$page.props.errors.price" class="w-full bg-red-300 text-red-800 px-4 py-2 my-1 inline-block text-xs">{{ $page.props.errors.price }}</span>
                    </div>
                    <div class="col-span-12">
                        <button  type="submit" class="bg-blue-500 hover:bg-blue-700 transition-all text-white w-full py-2">Crear Producto</button>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>    
</template>

<script>
import AdminLayout from '../../../Layouts/adminlayout.vue'
import NavLink from '@/Components/NavLink.vue';

export default{
    props:{
        categorias: Array
    },
    components:{
        AdminLayout,
        NavLink
    },
    data(){
        return{
            nuevoProducto: {
                name: "",
                state: 1,
                amount: "",
                price: "",
                id_categoria: ""
            }
        }
    },
    methods:{
        submitForm(){
            // TODO VALIDACION

            // ENVIO
            this.$inertia.post('/admin/productos', this.nuevoProducto);
        }
    }
}

</script>