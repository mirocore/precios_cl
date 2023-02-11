<template>
    
    <Adminlayout>

        <TituloDashboard
            :titulo="'Listado de Categorías'"
            :linkBTN="linkBTN"
            :txtBTN="txtBTN"
        />

        <div v-if="$page.props.flash.message">
            <AvisoFlash
                :msg="$page.props.flash.message.msg"
                :type="$page.props.flash.message.type"
            />
        </div>

        <listado-dashboard
            :listado="categorias"
            :ruta="rutaListado"
        ></listado-dashboard>
        
        


    




    </Adminlayout>

    
</template>

<script>
import Adminlayout from '../../../Layouts/adminlayout.vue';
import NavLink from '@/Components/NavLink.vue';

import ListadoDashboard from '../../../Components/Admin/ListadoDashboard.vue';
import TituloDashboard from '../../../Components/Admin/TituloDashboard.vue';
import AvisoFlash from '../../../Components/Admin/AvisoFlash.vue';


    export default {
        components:{
            Adminlayout,
            NavLink,
            ListadoDashboard,
            TituloDashboard,
            AvisoFlash
        },
        props:{
            categorias: Object
        },
        computed:{
            linkBTN(){
                return '/admin/categorias/create';
            },
            txtBTN(){
                return 'Nueva Categoría';
            },
            rutaListado(){
                return '/admin/categorias';
            }
        },
    }
</script>