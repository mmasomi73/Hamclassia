<template>
    <div class="">
        <div class="flex w-full ">
            <section class="flex flex-col pt-3 w-full p-4 bg-white border rounded-xl">
                <!-- = Users = -->
                <div class="pt-3">
                    <div class="flex items-center justify-center w-full">
                        <div class="w-full">
                            <Search @search-handler="search"/>
                            <ActionBar @bulk-action="bulkAction"/>
                            <CreateUpdate v-if="showCUForm" :key="this.updateUser ? this.updateUser.id : Math.random()"
                                          @result="createUpdateResult" :user="this.updateUser"/>
                            <UserTable @user-action="userAction" :users="this.users" @sorting="search"/>
                            <div v-if="pagination" class="w-full">
                                <Pagination
                                    :current="pagination.current"
                                    :total="pagination.total"
                                    :per-page="pagination.per_page"
                                    @page-changed="paginate"
                                />
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</template>

<script>
import Search from "../../../components/Admin/Users/Search";
import UserTable from "../../../components/Admin/Users/UserTable";
import ActionBar from "../../../components/Admin/Users/ActionBar";
import CreateUpdate from "../../../components/Admin/Users/CreateUpdate";
import Pagination from "../../../components/Layouts/admin/Pagination";

export default {
    name: "index",
    components: {Pagination, CreateUpdate, ActionBar, UserTable, Search},
    layout: 'admin',
    data: () => {
        return {
            users: [],
            updateUser: null,
            showCUForm: false,
            sort_by: 'created_at',
            sort_type: 'desc',
            pagination: null,
            action_params:{}
        }
    },
    methods: {
        search(data) {
            this.action_params = {...this.action_params, ...data, page:1}
            this.getUsers();
        },
        userAction(data) {
            if (data.action === 'delete') {
                this.$axios.$delete('api/users/' + data.id).then(resdata => {
                    for (const user in this.users) {
                        if (this.users[user].id === data.id) {
                            this.users.splice(user, 1);
                        }
                    }
                }).catch(error => {
                    alert('error')
                })
            } else if (data.action === 'edit') {
                this.updateUser = null;
                this.showCUForm = false;
                for (const user of this.users) {
                    if (user.id === data.id) {
                        this.showCUForm = true;
                        this.updateUser = user;
                    }
                }
            } else if (data.action === 'view') {
                this.$router.push('/admin/users/' + data.id);
            }
        },
        bulkAction(action) {
            if (action === 'create') {
                if (this.updateUser !== null) {
                    this.showCUForm = true;
                } else {
                    this.showCUForm = !this.showCUForm;
                }
                this.updateUser = null;
            }
        },
        createUpdateResult(result) {
            if (result === 'success') {
                this.showCUForm = false;
                this.updateUser = null;
                this.getUsers();
            }
        },
        paginate(data){
            this.action_params = {...this.action_params, page:data}
            this.getUsers();
        },
        getUsers(){
            this.$axios.$get('api/users', {params: {...this.action_params }}).then(data => {
                this.users = [];
                for (const user of data.data) {
                    this.users.push({...user, checked: false})
                }
                this.pagination = data.pagination;
            })
        }
    },
    created() {
        this.getUsers();
    },
}
</script>

