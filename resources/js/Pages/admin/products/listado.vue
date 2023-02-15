<template>
    <AdminLayout>
        <TituloDashboard 
            :titulo="tituloTXT"
            :txtBTN="txtBTN"
            :linkBTN="linkBTN"
        />
        <div v-if="$page.props.flash.message">
            <AvisoFlash
                :msg="$page.props.flash.message.msg"
                :type="$page.props.flash.message.type"
            />
        </div>
        <div class="mb-4">
            <select @change="filtrarCategoria"  class="text-xs p-1 capitalize" v-model="categoria">
                <option value="" v-if="!categoria">Filtrar por categoria</option>
                <option value="" v-else>Ver todas las categorías</option>
                <option class="capitalize" v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{ categoria.name }}</option>
            </select>
        </div>
        <ListadoDashboard 
            :listado="products"
            :ruta="rutaEdit"
            :dir="dir"
            :orden="orden"
            :categoria="categoria"
        />
    </AdminLayout>
</template>

<script>
import AdminLayout from '../../../Layouts/adminlayout.vue'
import TituloDashboard from '../../../Components/Admin/TituloDashboard.vue'
import ListadoDashboard from '../../../Components/Admin/ListadoProductosDashboard.vue'
import AvisoFlash from '../../../Components/Admin/AvisoFlash.vue'

export default{
    components:{
        AdminLayout,
        TituloDashboard,
        ListadoDashboard,
        AvisoFlash
    },
    props:{
        products: Object,
        orden: String,
        dir: String,
        categorias: Array,
        categ: String
    },
    computed: {
        tituloTXT(){
            return "Listado de Productos";
        },
        txtBTN(){
            return "Nuevo Producto";
        },
        linkBTN(){
            return "/admin/productos/create";
        },
        rutaEdit(){
            return "/admin/productos";
        }
    },
    data(){
        return{
            categoria: "all"
        }
    },
    methods:{
        filtrarCategoria(){
            console.log(this.categoria);
            let ruta = "/admin/productos?";
            if(this.orden){
                ruta += `orden=${this.orden}`
            }
            if(this.dir){
                ruta += `&dir=${this.dir}`
            }
            if(this.categoria !== "all"){
                ruta += `&categ=${this.categoria}`
                this.$inertia.get(ruta);
            }
            console.log(ruta);
        }
    },
    created(){
        this.categoria = this.categ
    }
}

</script>