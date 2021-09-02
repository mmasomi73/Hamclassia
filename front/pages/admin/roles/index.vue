<template>
    <div class="">
        <div class="flex w-full ">
            <section class="flex flex-col pt-3 w-8/12 md-w-full space-x-2">
                <!-- = Users = -->
                <section class="p-4 bg-white border rounded-xl m-2">
                    <div class="flex items-center justify-center w-full">
                        <div class="w-full">
                            <List :roles="this.roles"/>
                        </div>
                    </div>

                </section>
            </section>
            <section class="flex flex-col pt-3 w-4/12 md-w-full space-x-2">
                <!-- = Users = -->
                <section class="p-4 bg-white border rounded-xl m-2">
                    <div class="flex items-center justify-center w-full">
                        <CreateUpdate @result="createUpdateResult"/>
                    </div>

                </section>
            </section>
        </div>
    </div>
</template>

<script>
import List from "../../../components/Admin/Roles/List";
import CreateUpdate from "../../../components/Admin/Roles/CreateUpdate";

export default {
    name: "index",
    components: {CreateUpdate, List},
    layout: 'admin',
    data: () => {
        return {
            roles: [],
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
