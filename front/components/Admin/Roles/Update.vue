<template>
    <div class="w-full rounded-xl mt-3">
        <form @submit.prevent="update" class="grid grid-cols-4 gap-6">
            <div class="col">
                <label for="name" class="block text-gray-500">
                    Name
                </label>
                <input v-model="name" type="text" id="name" name="name"
                       placeholder="Role Name"
                       class="rounded-md ltr outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
            </div>
            <div class="col">
                <label for="guard_name" class="block text-gray-500">
                    Guard
                </label>
                <input v-model="guard_name" type="text" id="guard_name" name="guard_name"
                       placeholder="Guard Name ... "
                       class="rounded-md ltr outline-none px-4 py-2 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md w-full">
            </div>
            <div class="col">
            </div>
            <div class="col">
                <button type="submit"
                        class="w-full inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update
                </button>
            </div>
        </form>
        <div class="mt-5 p-2 flex flex-1">
            <span class="border-b w-1/3">
                مجوزها
            </span>
        </div>
        <div class="p-2 flex flex-col mr-5">
            <div v-for="permission in permissions" :key="permission.id" class="w-full p-2">
                <span @click="select(permission.id)"
                      class="content-center cursor-pointer inline-flex items-center bg-gray-300 rounded w-4 h-4">
                    <svg v-if="selecteds.indexOf(permission.id) !== -1"
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </span>
                <span class="mr-2 ltr">
                    <span class="text-gray-300">[{{ permission.guard_name }}]</span>
                    {{ permission.name }}
                </span>
            </div>
            <div class="w-full -2">
                <button type="button" @click="updatePermissions"
                        class="w-full sm:w-1/3 inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update
                </button>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Update",
    props: {
        role: Object
    },
    data: function () {
        return {
            name: this.role.name,
            guard_name: this.role.guard_name,
            permissions: [],
            role_permissions: [],
            selecteds: []
        }
    },
    methods: {
        select(id) {
            if (this.selecteds.indexOf(id) === -1) {
                this.selecteds.push(id);
            } else {
                this.selecteds.splice(this.selecteds.indexOf(id), 1);
            }
        },
        update(){
            this.$axios.$put('api/roles/' + this.role.id, {name:this.name, guard_name:this.guard_name})
                .then(data =>{
                    this.$emit('result', 'success')
                }).catch(error => {
                this.$emit('result', 'error')
            });
        },
        updatePermissions(){
            this.$axios.$put('api/roles/' + this.role.id + '/permissions', {permissions:this.selecteds})
                .then(data =>{}).catch(error => {});
        }
    },
    created() {
        this.role_permissions = [];
        this.$axios.$get('api/roles/' + this.role.id + '/permissions').then(data => {
            for (const permission of data) {
                this.role_permissions.push(permission.id)
            }
        });
        this.selecteds = this.role_permissions;

        this.permissions = [];
        this.$axios.$get('api/permissions').then(data => {
            for (const permission of data) {
                this.permissions.push({...permission, checked: false})
            }
        });
    }
}
</script>

<style scoped>

</style>
