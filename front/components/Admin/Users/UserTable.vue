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
                <th @click="sorting('name')" class="p-3 text-right cursor-pointer">
                    <div class="flex flex-row">
                        نام و نام خانوادگی
                        <svg v-if="sort_type === 'asc' && sort_by === 'name' " xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        <svg v-else-if="sort_type === 'desc' && sort_by === 'name' " xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </th>
                <th @click="sorting('email')" class="p-3 text-center cursor-pointer">
                    <div class="flex flex-row justify-center">
                        ایمیل
                        <svg v-if="sort_type === 'asc' && sort_by === 'email' " xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        <svg v-else-if="sort_type === 'desc' && sort_by === 'email' " xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </th>
                <th @click="sorting('mobile')" class="p-3 text-center cursor-pointer">
                    <div class="flex flex-row justify-center">
                        موبایل
                        <svg v-if="sort_type === 'asc' && sort_by === 'mobile' " xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        <svg v-else-if="sort_type === 'desc' && sort_by === 'mobile' " xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </th>
                <th class="p-3 text-center">نقش ها</th>
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
            selecteds:[],
            sort_by: 'created_at',
            sort_type: 'desc',
        }
    },
    methods :{
        userAction(data){
            this.$emit('user-action', data)
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
        },
        sorting(sort){
            if (sort === this.sort_by){
                this.sort_type = this.sort_type === 'asc' ? 'desc' : 'asc';
            }
            this.sort_by = sort;
            this.$emit('sorting', {
                sort_by: this.sort_by,
                sort_type: this.sort_type,
            })
        }
    },
}
</script>

<style>
.table {
    border-spacing: 0 8px;
}
</style>
