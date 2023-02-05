<template>
    <div>
        <ul class="" v-if="listado">
                <li 
                    v-for="item in listado.data" 
                    :key="item.id"
                    class="bg-white my-0.5 py-1 px-4 capitalize text-xs text-indigo-800 font-semibold flex justify-between items-center "
                >
                    <span>{{ item.name }} <span class="text-xs text-gray-500">({{ item.productos.length }} producto{{item.productos.length > 1 ? "s" : ""}})</span></span>
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
                </li>
        </ul>

        <div v-if="listado" class="flex justify-between items-center">
            <div>
                <p class="text-xs"><span>{{ listado.total }} Resultados encontrados</span></p>
            </div>
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
        ruta: String
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
    },
    created(){
        console.log(this.listado)
    }
}
</script>
