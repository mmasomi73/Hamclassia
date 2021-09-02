<template>
    <div class="w-full">
        <ul class="flex text-gary-500 ltr mt-6">

            <!-- --------------= Delete =-------------- -->
            <li @click="action('delete')" class="content-center text-gray-400 cursor-pointer flex hover:bg-blue-600 hover:text-white mr-2 p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </li>
            <!-- --------------= Download =-------------- -->
            <li @click="action('download')" class="content-center text-gray-400 cursor-pointer flex hover:bg-blue-600 hover:text-white mr-2 p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </li>
            <!-- --------------= Create =-------------- -->
            <li @click="action('create')" class="content-center text-gray-400 cursor-pointer flex hover:bg-blue-600 hover:text-white mr-2 p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ActionBar",
    methods:{
        action(action) {
            this.$emit('bulk-action',action)
        }
    }
}
</script>

<style scoped>

</style>
