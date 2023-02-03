<template>
    <div  :class="[type === 'success'? 'bg-green-100 text-green-700' : 'bg-sky-100 text-sky-700' ]" class="px-4 py-3 shadow-md mb-5" role="alert">
        <div class="flex items-center">
            <div class="py-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-2">
            <p class="font-bold inline mr-2">¡Éxito!</p>
            <p class="text-sm inline">{{msg}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    props:{
        msg: String,
        type: String
    },
    computed:{
        colorFondo(){
            switch(this.type){
                case 'success':
                    return "bg-green-100 text-green-700";
                default:
                    return "bg-sky-100 text-sky-700";
            }
        }
    }
}
</script>