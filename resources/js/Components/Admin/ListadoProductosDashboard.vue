<template>
    <div >

        <div class="hidden md:grid grid-cols-12 px-2 py-1 bg-blue-900 text-white text-xs items-center">
            <div class="col-span-4">
                <NavLink class="text-white p-0 m-0 text-xs pt-0 hover:text-green-500" :href="'/admin/productos?orden=name&dir=' + dir">Cantidad</NavLink>

            </div>
            <div class="col-span-2 text-center">
                <NavLink class="text-white p-0 m-0 text-xs pt-0 hover:text-green-500" :href="'/admin/productos?orden=id_categoria&dir=' + dir">Categoria</NavLink>

            </div>
            <div class="col-span-2 text-center">
                <NavLink class="text-white p-0 m-0 text-xs pt-0 hover:text-green-500" :href="'/admin/productos?orden=state&dir=' + dir">Estado</NavLink>

            </div>
            <div class="col-span-1 text-center">
                <NavLink class="text-white p-0 m-0 text-xs pt-0 hover:text-green-500" :href="'/admin/productos?orden=amount&dir=' + dir">Cantidad</NavLink>
            </div>
            <div class="col-span-1 text-center">
                <NavLink class="text-white p-0 m-0 text-xs pt-0 hover:text-green-500" :href="'/admin/productos?orden=price&dir=' + dir">Precio</NavLink>

            </div>
            <div class="col-span-1 text-center">Unidad</div>
            <div class="col-span-1 text-center">Acciones</div>
        </div>
        <div  v-for="item in listado.data" :key="item.id" 
            class="
                    even:bg-sky-100 
                    odd:bg-white 
                    p-2 
                    grid
                    grid-cols-12	
                    gap-4
                    items-center
                    text-xs
                "
        >
            <div class="text-xs col-span-12 md:col-span-4 text-center md:text-left font-bold text-blue-800" >{{ item.name }} </div>
            <div class="col-span-12 md:col-span-2 text-xs text-center capitalize" ><span class="font-bold inline-block md:hidden mr-1">Categoría: </span>{{ item.categoria.name }}</div>
            <div class="hidden md:inline-block col-span-12 md:col-span-2">
                <span @click="cambiarEstado(item.id)" class="text-xs cursor-pointer hover:text-white transition-all bg-green-300 text-green-800 px-2 py-1 rounded-md flex justify-between items-center " v-if="item.state === 1">
                    <span class="inline-block mr-1">Activo</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-3 h-3 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </span>
                <span @click="cambiarEstado(item.id)" class="text-xs cursor-pointer hover:text-white transition-all flex justify-between items-center  bg-red-300 text-red-800 px-2 py-1 rounded-md" v-else>
                    <span class="inline-block mr-1">Inactivo</span>    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-3 h-3 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </span>
            </div>
            <div class="col-span-12 md:col-span-1 text-xs text-center" ><span class="font-bold inline-block md:hidden mr-1">Cantidad: </span>{{ item.amount }}</div>
            <div class="col-span-12 md:col-span-1  text-xs text-center " ><span class="font-bold inline-block md:hidden mr-1">Precio: </span>${{ item.price }}</div>
            <div class="col-span-12 md:col-span-1 text-xs text-center" ><span class="font-bold inline-block md:hidden mr-1">Unidad: </span>${{ item.amount / item.price }}</div>
            <div class="col-span-12 md:col-span-1">
                <ul class="flex justify-center gap-1 items-center">
                    <li>
                        <nav-link :href="ruta + '/edit/' + item.id" class=" hover:border-0 focus:border-0 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500  transition-all cursor-pointer hover:text-slate-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </nav-link>
                    </li>
                    <li  @click="borrarElemento(item.id)" class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 transition-all cursor-pointer hover:text-slate-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                    </li>
                </ul>
            </div>
        </div>

        <div v-if="juanCarlos" class="pt-2 bg-sky-700 rounded-lg">
            <table class="table-fixed bg-white w-full text-sm border-collapse">
            <thead class="bg-sky-700 text-slate-50">
                <tr class="text-xs">
                    <th class="text-left px-2 py-1">Producto</th>
                    <th class="px-2 py-1">Categoría</th>
                    <th class="px-2 py-1">Estado</th>
                    <th class="px-2 py-1">Cantidad</th>
                    <th class="px-2 py-1">Precio</th>
                    <th class="px-2 py-1">Unidad</th>
                    <th class="px-2 py-1">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center text-xs">
                <tr v-for="item in listado.data" :key="item.id" class="border-b-2 border-b-gray-100">
                    <td class="text-left p-2 font-bold text-sky-600">{{ item.name }}</td>
                    <td class="p-2 capitalize">{{ item.categoria.name }}</td>
                    <td class="p-2 ">
                        <span @click="cambiarEstado(item.id)" class="cursor-pointer hover:text-white transition-all bg-green-300 text-green-800 px-2 py-1 rounded-md flex justify-between items-center " v-if="item.state === 1">
                            <span class="inline-block mr-1">Activo</span>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-3 h-3 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>

                        </span>
                        <span @click="cambiarEstado(item.id)" class="cursor-pointer hover:text-white transition-all flex justify-between items-center  bg-red-300 text-red-800 px-2 py-1 rounded-md" v-else>
                            <span class="inline-block mr-1">Inactivo</span>
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-3 h-3 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </span>
                    </td>
                    <td class="p-2">{{ item.amount }}</td>
                    <td class="p-2">${{ item.price }}</td>
                    <td class="p-2">${{ item.price / item.amount }}</td>
                    <td class="p-2">
                        <ul class="flex gap-1 items-center">
                            <li>
                                <nav-link :href="ruta + '/edit/' + item.id" class=" hover:border-0 focus:border-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500  transition-all cursor-pointer hover:text-slate-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </nav-link>
                            </li>
                            <li  @click="borrarElemento(item.id)" class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-slate-500 transition-all cursor-pointer hover:text-slate-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div v-if="listado" class="flex justify-end items-center">
            <nav aria-label="Page navigation example">
                <ul class="flex list-style-none">
                    <li>
                        <nav-link :href="listado.prev_page_url">&laquo;</nav-link>
                    </li>
                    <li v-for="(paginador, index) in listado.links" :key="paginador.label" class="page-item">
                        <nav-link :href="paginador.url" :active="paginador.active">
                            <span v-if="index !== 0 && index !== listado.links.length - 1">{{ paginador.label }}</span>
                        </nav-link>
                    </li>
                    <li>
                        <nav-link :href="listado.next_page_url">&raquo;</nav-link>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
</template>

<script>
import NavLink from '@/Components/NavLink.vue';
import Swal from 'sweetalert2'

export default {
    props:{
        listado: Object,
        ruta: String,
        dir: String,
    },
    components:{
        NavLink
    },
    methods:{
        borrarElemento(id){
                Swal.fire({
                title: '¿Está seguro que desea borrar éste elemento?',
                text: "Esta acción no tiene vuelta atrás",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(`${this.ruta}/${id}`)
                    }
                })
            },
        cambiarEstado(id){
            this.$inertia.put(`${this.ruta}/estado/${id}`);
        }
    }
}
</script>
