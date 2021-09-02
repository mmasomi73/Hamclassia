<template>
    <div class="w-full">
        <table class="table text-gray-500 border-separate space-y-6 text-sm w-full">
            <thead class="bg-gray-100 text-gray-500">
            <tr class="">
                <th class="items-center rounded-r-md text-center w-8">
                    <span @click="bulkSelect" class="content-center cursor-pointer inline-flex items-center bg-gray-300 rounded w-4 h-4">
                        <svg v-if="this.selecteds.length > 0 &&  this.roles.length > 0 && this.selecteds.length < this.roles.length" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M18 12H6"/>
                        </svg>
                        <svg v-else-if="this.roles.length > 0 && this.selecteds.length === this.roles.length" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                </th>
                <th class="p-3 text-right">نام</th>
                <th class="p-3 text-center">گارد</th>
                <th class="p-3 text-left rounded-l-md">عملیات</th>
            </tr>
            </thead>
            <tbody class="max-h-32 overflow-y-scroll">
                <Row v-for="role in this.roles" @role-action="roleAction" @select-role="roleSelectAction" :role="role" :key="role.id" />
            </tbody>
        </table>
    </div>
</template>

<script>
import Row from "./Table/Row";
export default {
    name: "List",
    components: {Row},
    props: {
        roles: Array,
    },
    data : ()=>{
        return {
            selecteds:[]
        }
    },
    methods :{
        roleAction(data){
            this.$emit('role-action', data)
        },
        roleSelectAction(data){
            if(this.selecteds.indexOf(data.id) === -1) {
                this.selecteds.push(data.id);
            }else{
                this.selecteds.splice(this.selecteds.indexOf(data.id), 1);
            }
        },
        bulkSelect(){
            if (this.selecteds.length < this.roles.length){
                for (const role in this.roles) {
                    if(this.selecteds.indexOf(this.roles[role].id) === -1) {
                        this.roles[role].checked = true;
                        this.selecteds.push(this.roles[role].id);
                    }
                }
            }else{
                for (const role in this.roles) {
                    if(this.selecteds.indexOf(this.roles[role].id) !== -1) {
                        this.roles[role].checked = false;
                        this.selecteds.splice(this.selecteds.indexOf(this.roles[role].id), 1);
                    }
                }
            }
        }
    },
}
</script>

<style scoped>

</style>
