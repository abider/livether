<template>
    <div id="app">
        <example></example>
        <el-button
                plain
                @click="open3">
            成功
        </el-button>
        <el-button icon="edit">Hello Element</el-button>
    </div>
</template>
<script>
    import Example from './Example.vue';
    export default {
        name: 'app',
        components: {
            Example
        },
        methods: {
            open3() {
                this.$notify({
                    title: '成功',
                    message: '这是一条成功的提示消息',
                    type: 'success'
                });
            }
        }
    };
</script>