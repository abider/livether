<template>
    <el-button type="danger" @click="follow" :plain="!followed">
        {{ text }}
    </el-button>
</template>

<script>
    export default {
        props: ['room', 'default'],
        data() {
            return {
                followed: this.default
            }
        },
        computed: {
            text() {
                return this.followed ? '取消关注' : '关注';
            }
        },
        methods: {
            follow() {
                axios.post('/api/room/follow', {
                    'room': this.room
                }).then((response) => {
                    this.$notify({
                        title: this.text + '成功',
                        type: 'success'
                    });
                    this.followed = response.data.result;
                })
            }
        }
    }
</script>
