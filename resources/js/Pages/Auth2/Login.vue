<template>
    <AuthLayout>
        <div class="bg-white p-5 shadow">
            <h1 class="mb-4">Login</h1>
            <form @submit.prevent="loginUser" class="flex flex-col gap-3 text-xs">
                <div>
                    <label for="email">Email</label>
                    <input
                        id="email" 
                        type="email"
                        placeholder="Ingrese su email"
                        class="bg-gray-200 text-gray-800 w-full"
                        v-model="usuario.email"
                    />
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input
                        id="password" 
                        type="password"
                        placeholder="Ingrese su contraseña"
                        class="bg-gray-200 text-gray-800 w-full"
                        v-model="usuario.password"
                    />
                </div>
                <button class="w-full bg-blue-500 text-white mt-5 py-2">Ingresar</button>
            </form>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from '../../Layouts/AuthLayout.vue'



export default{
    components:{
        AuthLayout
    },
    data(){
        return{
            usuario:{
                email: 'ramirobelcore@gmail.com',
                password:'123456789'
            }
        }
    }
    ,methods:{
        loginUser(){

            // TODO VALIDACION

            // ENVIAR DATA
            this.$inertia.post('/auth/login', this.usuario);
        }
    }
}

</script>