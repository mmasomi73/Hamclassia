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
                            <UserTable @user-action="userAction" :users="this.users"/>
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

export default {
    name: "index",
    components: {CreateUpdate, ActionBar, UserTable, Search},
    layout: 'admin',
    data: () => {
        return {
            users: [],
            updateUser: null,
            showCUForm: false,
        }
    },
    methods: {
        search(data) {
            this.$axios.$get('api/users', {params: {...data}}).then(data => {
                this.users = [];
                for (const user of data) {
                    this.users.push({...user, checked: false})
                }
            })
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
                this.users = [];
                this.$axios.$get('api/users').then(data => {
                    for (const user of data) {
                        this.users.push({...user, checked: false})
                    }
                });
            }
        }
    },
    created() {
        this.users = [];
        this.$axios.$get('api/users').then(data => {
            for (const user of data) {
                this.users.push({...user, checked: false})
            }
        });
    }
}
</script>

