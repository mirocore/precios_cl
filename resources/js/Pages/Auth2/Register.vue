<template>
    <AuthLayout>
        <div class="bg-white p-5 shadow">
            <h1 class="mb-4">Registrarse</h1>
            <form @submit.prevent="createUser" class="flex flex-col gap-3 text-xs">
                <div>
                    <label for="name">Nombre</label>
                    <input
                        id="name" 
                        type="text"
                        placeholder="Ingrese su nombre"
                        class="bg-gray-200 text-gray-800 w-full"
                        v-model="newUser.name"
                    />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input
                        id="email" 
                        type="email"
                        placeholder="Ingrese su email"
                        class="bg-gray-200 text-gray-800 w-full"
                        v-model="newUser.email"
                    />
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input
                        id="password" 
                        type="password"
                        placeholder="Ingrese su contraseña"
                        class="bg-gray-200 text-gray-800 w-full"
                        v-model="newUser.password"
                    />
                </div>
                <button class="w-full bg-blue-500 text-white mt-5 py-2">Registrarse</button>
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
            newUser:{
                name: 'Ramiro',
                email: 'ramirobelcore@gmail.com',
                password:'123456789'
            }
        }
    }
    ,methods:{
        createUser(){

            // TODO VALIDACION

            // ENVIAR DATA
            this.$inertia.post('/auth/register', this.newUser);
        }
    }
}

</script>