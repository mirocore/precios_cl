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
        <ListadoDashboard 
            :listado="products"
            :ruta="rutaEdit"
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
        products: Object
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
    }
}

</script>