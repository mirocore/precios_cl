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
        <div class="mb-4 flex justify-between items-center">
            <select  class="text-xs p-1 capitalize" v-model="categoria">
                <option value="" v-if="!categoria">Filtrar por categoria</option>
                <option value="" v-else>Ver todas las categorías</option>
                <option class="capitalize" v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{ categoria.name }}</option>
            </select>
            <div>
                <input 
                    type="text"
                    placeholder="Buscar Producto"
                    id="buscar"
                    v-model="busqueda"
                    class="text-xs p-1"
                    @change="filtrarBusqueda"
                />
            </div>
        </div>
        <p v-if="sinResultados" class="mb-10 mt-5 text-xs bg-red-300 text-red-900  py-5 px-4">No se han encontrado resultados para la búsqueda <span class="font-bold">"{{ busqueda }}"</span></p>
        <ListadoDashboard
            v-if="!listaFiltrada" 
            :listado="products"
            :ruta="rutaEdit"
            :dir="dir"
            :orden="orden"
            :categoria="categoria"
            :TH="false"
        />
        <ListadoDashboard
            v-else 
            :listado="listaFiltrada"
            :ruta="rutaEdit"
            :dir="dir"
            :orden="orden"
            :categoria="categoria"
            :TH="true"
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
            categoria: "all",
            busqueda: "",
            listaFiltrada:null,
            sinResultados: false
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
        },
        filtrarBusqueda(){
            if(this.busqueda === ""){
                this.sinResultados = false;
                this.listaFiltrada = null;
                return
            }
            console.log("Busqueda:", this.busqueda);
            let data = [...this.products.data];
            let nuevaData = data.filter( item => item.name.toLowerCase().includes(this.busqueda.toLowerCase()) );
            let nuevaLista =  {...this.products, data : nuevaData};
            console.log(nuevaLista)
            if(nuevaLista.data.length > 0){
                console.log("1")
                this.listaFiltrada = {...nuevaLista};
                this.sinResultados = false;
                return
            }else{
                console.log("2")
                this.sinResultados = true;
                this.listaFiltrada = null;
                return
            }
            
            
        }
    },
    created(){
        this.categoria = this.categ
    },
    watch:{
        busqueda(){
            this.filtrarBusqueda();
        }
    }
}

</script>