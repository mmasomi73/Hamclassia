<template>
    <div v-if="!connected" class="">
        <Toast :type="'danger'" message="ارتباط با سرور قطع شده است!😢" />
    </div>
</template>

<script>
import Toast from "./Toast";
export default {
    name: "NetworkNotification",
    components: {Toast},
    data:function (){
        return{
            connected:true
        }
    },
    methods:{
        checkConnection(){
            this.connected = navigator.onLine;
        }
    },
    mounted: function () {
        window.setInterval(() => {
            this.checkConnection()
        }, 5000)
    }
}
</script>

<style scoped>

</style>
