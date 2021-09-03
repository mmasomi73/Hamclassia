<template>
    <div class="w-full rounded-xl mt-3">
        <form @submit.prevent="submit" class="grid grid-cols-1 gap-6">
            <div class="col">
                <div class="px-4 text-medium w-full">
                    افزودن نقش جدید
                </div>
            </div>
            <div class="col ltr">
                <label for="name" class="block text-gray-500">
                    Role Name :
                </label>
                <input v-model="name" type="text" id="name" name="name"
                       placeholder="Role Name ..."
                       class="rounded-md outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
            </div>
            <div class="col">
            </div>
            <div class="col">
                <button type="submit"
                        class="w-full inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Create",

    data: function () {
        return {
            name: '',
        }
    },
    methods: {
        submit() {
            this.$axios.$post('api/roles', {name: this.name})
                .then(data => {
                    this.$emit('result', 'success')
                }).catch(error => {
                    this.$emit('result', 'error')
                });
            this.name = '';
        }
    }
}
</script>

<style scoped>
.ltr{
    direction: ltr;
}
</style>
