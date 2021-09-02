<template>
    <div class="">
        <div class="flex w-full ">
            <section class="flex flex-col pt-3 w-full p-4 bg-white border rounded-xl">
                <!-- = Users = -->
                <section class=" rounded-xl mim-fa-fnt">
                    <div class="pt-3">
                        <div class="flex items-center justify-center w-full">
                            <div class="w-full">
                                <Search @search-handler="search"/>
                                <ActionBar />
                                <UserTable :users="this.users" />
                            </div>
                        </div>
                    </div>

                </section>
            </section>


        </div>
    </div>
</template>

<script>
import Search from "../../../components/Admin/Users/Search";
import UserTable from "../../../components/Admin/Users/UserTable";
import ActionBar from "../../../components/Admin/Users/ActionBar";

export default {
    name: "index",
    components: {ActionBar, UserTable, Search},
    layout: 'admin',
    data : ()=>{
        let users = [];
        return {
            users:users
        }
    },
    methods: {
        search (data){
            this.$axios.$get('api/users', {params:{...data}}).then(data=>{
                this.users = [];
                for (const user of data) {
                    this.users.push({...user ,checked:false})
                }
            })
        }
    },
    created() {
        this.users = [];
        this.$axios.$get('api/users').then(data =>{
            for (const user of data) {
                this.users.push({...user ,checked:false})
            }
        });
    }
}
</script>

