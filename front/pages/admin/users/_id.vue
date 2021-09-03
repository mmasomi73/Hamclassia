<template>
    <div class="">
        <div v-if="user"  class="flex flex-col w-full">
            <Card :user="user" />
            <section class="flex flex-col pt-3 w-full p-4 bg-white border rounded-xl -mt-14 z-10">
                <!-- = Users = -->
                <div class="pt-3">
                    <div class="flex items-center justify-center w-full">
                        <div class="w-full">
                            <Roles :user="user" />
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</template>

<script>
import Card from "../../../components/Admin/Users/Show/Card";
import Roles from "../../../components/Admin/Users/Show/Roles";

export default {
    layout: 'admin',
    components: {Roles, Card},
    data: function () {
        return {
            user: null
        }
    },
    created() {
        this.$axios.$get('api/users/' + this.$route.params.id).then(data => {
            this.user = data;
        }).catch(error => {

        });
    }
}
</script>

<style scoped>

</style>
