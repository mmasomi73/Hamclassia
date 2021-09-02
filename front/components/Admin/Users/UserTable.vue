<template>
    <div class="w-full">
        <table class="table text-gray-500 border-separate space-y-6 text-sm w-full">
            <thead class="bg-gray-100 text-gray-500">
            <tr class="">
                <th class="items-center rounded-r-md text-center w-8">
                    <span @click="bulkSelect" class="content-center cursor-pointer inline-flex items-center bg-gray-300 rounded w-4 h-4">
                        <svg v-if="this.selecteds.length > 0 &&  this.users.length > 0 && this.selecteds.length < this.users.length" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M18 12H6"/>
                        </svg>
                        <svg v-else-if="this.users.length > 0 && this.selecteds.length === this.users.length" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                </th>
                <th class="p-3 text-right">نام و نام خانوادگی</th>
                <th class="p-3 text-center">ایمیل</th>
                <th class="p-3 text-left rounded-l-md">عملیات</th>
            </tr>
            </thead>
            <tbody class="max-h-32 overflow-y-scroll">
                <Row v-for="user in this.users" @user-action="userAction" @select-user="userSelectAction" :user="user" :key="user.id" />
            </tbody>
        </table>
    </div>
</template>

<script>
import Row from "./Table/Row";
export default {
    name: "UserTable",
    components: {Row},
    props: {
        users: Array,
    },
    data : ()=>{
        return {
            selecteds:[]
        }
    },
    methods :{
        userAction(data){
            if (data.action === 'delete'){
                this.$axios.$delete('api/users/'+data.id).then(resdata =>{
                    for (const user in this.users) {
                        if(this.users[user].id === data.id){
                            this.users.splice(user, 1);
                        }
                    }
                }).catch(error => {
                    alert('error')
                })


            }
        },
        userSelectAction(data){
            if(this.selecteds.indexOf(data.id) === -1) {
                this.selecteds.push(data.id);
            }else{
                this.selecteds.splice(this.selecteds.indexOf(data.id), 1);
            }
        },
        bulkSelect(){
            if (this.selecteds.length < this.users.length){
                for (const user in this.users) {
                    if(this.selecteds.indexOf(this.users[user].id) === -1) {
                        this.users[user].checked = true;
                        this.selecteds.push(this.users[user].id);
                    }
                }
            }else{
                for (const user in this.users) {
                    if(this.selecteds.indexOf(this.users[user].id) !== -1) {
                        this.users[user].checked = false;
                        this.selecteds.splice(this.selecteds.indexOf(this.users[user].id), 1);
                    }
                }
            }
        }
    },
}
</script>

<style>
.table {
    border-spacing: 0 8px;
}
</style>
