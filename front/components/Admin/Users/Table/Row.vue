<template>
    <tr class="bg-gray-100 ">
        <td class="items-center rounded-r-md text-center w-8">
            <span @click="select"
                class="content-center cursor-pointer inline-flex items-center bg-gray-300 rounded w-4 h-4">
                <svg v-if="this.user.checked" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </span>
        </td>
        <td class="p-3 text-right">
            <div class="flex align-items-center">
                <div class="ml-3">
                    <div class="">{{ this.user && this.user.name }}</div>
                </div>
            </div>
        </td>
        <td class="p-3 text-center ltr">
            {{this.user && this.user.email}}
        </td>
        <td class="p-3 text-left  rounded-l-md">
            <div class="flex ltr text-left">
                <div @click="action('delete')" class="text-gray-400 hover:text-gray-800 ml-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <div @click="action('edit')" class="text-gray-400 hover:text-gray-800 ml-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div @click="action('view')" class="text-gray-400 hover:text-gray-800 ml-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    name: "Row",
    props:{
        user:Object
    },
    methods:{
        action(action){
            this.$emit('user-action', {action:action, id:this.user.id})
        },
        select(){
            this.user.checked = !this.user.checked;
            this.$emit('select-user', {id:this.user.id})
        }
    }
}
</script>

<style scoped>

</style>
