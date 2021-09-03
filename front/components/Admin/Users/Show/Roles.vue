<template>
    <div class="p-2 flex flex-col mr-5">
        <span class="border-b w-1/3">
        مجوزها
        </span>
        <div v-for="role in roles" :key="role.id" class="w-full p-2">
                <span @click="select(role.id)"
                      class="content-center cursor-pointer inline-flex items-center bg-gray-300 rounded w-4 h-4">
                    <svg  v-if="selected.indexOf(role.id) !== -1"
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </span>
            <span class="mr-2 ltr">
                    <span class="text-gray-300">[{{ role.guard_name }}]</span>
                    {{ role.name }}
                </span>
        </div>
        <div class="w-full -2">
            <button type="button" @click="updateRoles"
                    class="w-full sm:w-1/3 inline-flex justify-center py-2 px-4 mt-7 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Update
            </button>

        </div>
    </div>
</template>

<script>
export default {
    name: "Roles",
    props:{
        user:Object
    },
    data: ()=>{
        return {
            roles:[],
            selected:[],
        }
    },
    methods:{
        select(id) {
            if (this.selected.indexOf(id) === -1) {
                this.selected.push(id);
            } else {
                this.selected.splice(this.selected.indexOf(id), 1);
            }
        },
        updateRoles(){
            this.$axios.$put('api/users/' + this.user.id + '/roles', {roles:this.selected})
                .then(data =>{}).catch(error => {});
        }
    },
    created() {
        this.roles = [];
        this.$axios.$get('api/roles').then(data => {
            for (const role of data) {
                this.roles.push({...role, checked: false})
            }
        });
        for (const role of this.user.roles) {
            this.selected.push(role.id)
        }
    }
}
</script>

<style scoped>

</style>
