<template>
    <div class="flex flex-col">
        <div class="flex w-full">
            <section class="flex flex-col pt-3 w-8/12 md-w-full space-x-2">
                <!-- = Users = -->
                <section class="p-4 bg-white border rounded-xl m-2">
                    <div class="flex items-center justify-center w-full">
                        <div class="w-full">
                            <List @role-action="RoleAction" :roles="this.roles"/>
                        </div>
                    </div>

                </section>
            </section>
            <section class="flex flex-col pt-3 w-4/12 md-w-full space-x-2">
                <!-- = Users = -->
                <section class="p-4 bg-white border rounded-xl m-2">
                    <div class="flex items-center justify-center w-full">
                        <Create @result="createUpdateResult"/>
                    </div>

                </section>
            </section>
        </div>
        <section class="flex flex-col pt-3 w-full space-x-2">
            <!-- = Users = -->
            <section class="p-4 bg-white border rounded-xl m-2">
                <div class="flex items-center justify-center w-full">
                    <Update v-if="role" :role="role" :key="role.id" @result="createUpdateResult" />
                </div>

            </section>
        </section>
    </div>
</template>

<script>
import List from "../../../components/Admin/Roles/List";
import Create from "../../../components/Admin/Roles/Create";
import Update from "../../../components/Admin/Roles/Update";

export default {
    name: "index",
    components: {Update, Create, List},
    layout: 'admin',
    data: () => {
        return {
            roles: [],
            role:null
        }
    },
    methods: {
        createUpdateResult(result) {
            if (result === 'success') {
                this.$axios.$get('api/roles').then(data => {
                    this.roles = [];
                    for (const role of data) {
                        this.roles.push({...role, checked: false})
                    }
                });
            }
        },
        RoleAction(data){
            if (data.action === 'edit'){
                for (const role of this.roles) {
                    if (role.id === data.id){
                        this.role = role;
                    }
                }

            }
        }
    },
    created() {
        this.roles = [];
        this.$axios.$get('api/roles').then(data => {
            for (const role of data) {
                this.roles.push({...role, checked: false})
            }
        });
    }
}
</script>

<style>
.table {
    border-spacing: 0 8px;
}
</style>
