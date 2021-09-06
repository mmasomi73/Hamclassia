<template>
    <div class="flex flex-1 justify-center items-center h-full w-full text-gray-300">
        <div @click="$refs.file_avatar_input.click()"
            class="flex w-32 h-32 cursor-pointer bg-gray-100 items-center text-center justify-center rounded-full border-2 border-dashed overflow-hidden relative">
            <img class="absolute top-0 left-0 opacity-50 w-full h-full" :src="url" alt="">
            <span class="z-10 text-gray-600">{{msg}}</span>
            <input @change="onFileSelected" ref="file_avatar_input" accept="image/png, image/jpeg" style="display: none;" type="file" class="hidden opacity-0">
        </div>
    </div>
</template>

<script>
export default {
    name: "avatar",
    props: {
        avatar: String
    },
    data: function () {
        return {
            file:null,
            url: this.avatar !== null ? this.avatar : "",
            msg:"Drag & Drop",
        }
    }, methods: {
        onFileSelected(e){
            this.file = e.target.files[0];
            this.url = URL.createObjectURL(this.file);
            this.msg = this.getSize(this.file.size);
            this.$emit('file', this.file);
        },
        getSize(size){
            if (size < 1024){
                return size + " Byte"
            }
            else if (size / 1024 < 1024){
                return Math.round(this.file.size / 1024) + "KB";
            }
            else if ((size / (1024 * 1024)) < 1024){
                return Math.round(this.file.size / (1024 * 1024)) + "MB";
            }
            else if ((size / (1024 * 1024 * 1024)) < 1024){
                return Math.round(this.file.size / (1024 * 1024 * 1024)) + "GB";
            }
        }
    }
}
</script>

<style scoped>

</style>
