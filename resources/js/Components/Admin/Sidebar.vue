
<template>
    <div id="admin__sidebar" class="bg-slate-100 col-span-2 p-5 h-screen shadow-md flex flex-col justify-center text-center">
        <nav>
            <ul>
                <li>
                    <NavLink 
                        href="/admin/productos"
                    >Productos</NavLink>
                </li>
                <li>
                    <NavLink 
                        href="/admin/categorias"
                    >Categorias</NavLink>
                </li>

            </ul>
        </nav>
    </div> 
</template>

<script>
import NavLink from '@/Components/NavLink.vue';

export default{
    components:{
        NavLink
    }
}
</script>