<template>
    <div class="w-full mx-auto">
        <div class="flex flex-col">
            <div class="bg-gray-700 shadow-lg  rounded-3xl p-4 m-4 pb-14">
                <div class="flex-none sm:flex">
                    <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                        <img :src="(this.user.avatar || '')" :alt="this.user.name + ' ' + (this.user.family || '')" class=" w-32 h-32 object-cover rounded-2xl">
                    </div>
                    <div class="flex-auto sm:mr-5 justify-evenly">
                        <div class="flex items-center justify-between sm:mt-2">
                            <div class="flex items-center">
                                <div class="flex flex-col">
                                    <div class="w-full flex-none text-lg text-gray-50 font-bold ">{{this.user.name + ' ' + (this.user.family || '')}}</div>
                                    <div class="flex-auto text-gray-100 my-1">
                                        <span class="ml-3 ">{{this.user.email}}</span>
                                        <br>
                                        <span class="ml-3 ">{{this.user.mobile || '-'}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props:{
        user:Object
    }
}
</script>

<style scoped>

</style>
