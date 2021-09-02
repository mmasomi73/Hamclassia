<template>
    <div class="w-full bg-gray-100 rounded-xl p-5 mt-3">
        <form @submit.prevent="submit" class="grid grid-cols-4 gap-6">
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
                        :class="!this.user ?  'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500' : 'bg-green-600 hover:bg-green-700 focus:ring-green-500'"
                        class="w-full inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                    {{!this.user ? 'ثبت' : 'ویرایش'}}
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateUpdate",
    props:{
        user:Object
    },
    data : function (){
        return {
            name:this.user ? this.user.name : null,
            email:this.user ? this.user.email : null,
        }
    },
    methods :{
        submit(){
            if (this.user){
                this.$axios.$put('api/users/' + this.user.id, {name:this.name, email:this.email})
                    .then(data =>{
                        this.$emit('result', 'success')
                    }).catch(error => {
                        this.$emit('result', 'error')
                    });
            }else{
                this.$axios.$post('api/users', {name:this.name, email:this.email})
                    .then(data =>{
                        this.$emit('result', 'success')
                    }).catch(error => {
                    this.$emit('result', 'error')
                });
            }
        }
    }
}
</script>

<style scoped>

</style>
