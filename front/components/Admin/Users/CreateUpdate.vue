<template>
    <div class="w-full bg-gray-100 rounded-xl p-5 mt-3">
        <form @submit.prevent="submit" class="grid grid-cols-4 gap-6">
            <div class="col">
                <Avatar @file="avatarFile" :avatar="exit_avatar"/>
            </div>
            <div class="col col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col">
                        <label for="name" class="block text-gray-500">
                            نام
                        </label>
                        <input v-model="name" type="text" id="name" name="name"
                               placeholder="نام مورد نظر..."
                               class="rounded-md outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
                    </div>
                    <div class="col">
                        <label for="name" class="block text-gray-500">
                            نام
                        </label>
                        <input v-model="family" type="text" id="family" name="family"
                               placeholder="نام خانوادگی مورد نظر..."
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
                        <label for="mobile" class="block text-gray-500">
                            موبایل
                        </label>
                        <input v-model="mobile" type="text" id="mobile" name="mobile"
                               placeholder="0912..."
                               class="rounded-md ltr outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
                    </div>
                </div>
            </div>
            <div class="col">
                <button type="submit"
                        :class="!this.user ?  'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500' : 'bg-green-600 hover:bg-green-700 focus:ring-green-500'"
                        class="w-full inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                    {{ !this.user ? 'ثبت' : 'ویرایش' }}
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import Avatar from "../../Layouts/form/file/avatar";

export default {
    name: "CreateUpdate",
    components: {Avatar},
    props: {
        user: Object
    },
    data: function () {
        return {
            name: this.user ? this.user.name : null,
            family: this.user ? this.user.family : null,
            email: this.user ? this.user.email : null,
            mobile: this.user ? this.user.mobile : null,
            avatar: null,
            exit_avatar:this.user ? this.user.avatar : null
        }
    },
    methods: {
        submit() {
            if (this.user) {
                let formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('name', this.name);
                formData.append('family', this.family);
                formData.append('email', this.email);
                formData.append('mobile', this.mobile);
                if (this.avatar !== null) {
                    formData.append('avatar', this.avatar, this.avatar.name);
                }
                this.$axios.$post('api/users/' + this.user.id, formData)
                    .then(data => {
                        console.log(data);
                        this.$emit('result', 'success')
                    }).catch(error => {
                    console.log(error);
                    this.$emit('result', 'error')
                });
            } else {
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('family', this.family);
                formData.append('email', this.email);
                formData.append('mobile', this.mobile);
                if (this.avatar !== null) {
                    formData.append('avatar', this.avatar, this.avatar.name);
                }
                this.$axios.$post('api/users', formData)
                    .then(data => {
                        this.$emit('result', 'success')
                    }).catch(error => {
                    this.$emit('result', 'error')
                });
            }
        },
        avatarFile(data) {
            this.avatar = data;
        }
    }
}
</script>

<style scoped>

</style>
