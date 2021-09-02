<template>
    <div class="w-full">
        <form @submit.prevent="search" class="grid grid-cols-4 gap-6">
            <div class="col">
                <label for="name" class="block text-gray-500">
                    نام
                </label>
                <input v-model="name" type="text" id="name" name="name"
                       placeholder="نام مورد نظر..."
                       class="rounded-md outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
            </div>
            <div class="col">
                <label for="email" class="block text-gray-500">
                    ایمیل
                </label>
                <input v-model="email" type="text" id="email" name="email"
                       placeholder="Email ... "
                       class="rounded-md ltr outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
            </div>
            <div class="col">
            </div>
            <div class="col">
                <button type="submit"
                        class="w-full inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    جستجو
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Search",
    data: () => {
        return {
            name: '',
            email: ''
        }
    },
    methods: {
        search(){
            this.$emit('search-handler', {name:this.name, email:this.email});
        }
    }
}
</script>

<style scoped>
.ltr {
    direction: ltr;
}
</style>
