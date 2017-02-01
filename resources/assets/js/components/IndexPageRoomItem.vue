<template>
    <el-card :body-style="{ padding: '0px' }">
        <img :src="room.thumb" class="image">
        <div style="padding: 14px;">
            <el-row class="bottom clearfix">
                <el-col :span="24">
                    <h3>{{ room.title }}</h3>
                </el-col>
                <el-col :span="24">
                    {{ room.author }} / {{ room.looker }}人
                </el-col>
                <el-col :span="12" :xs="24">
                    <el-button :plain="true" type="success" :disabled="room.category == 'panda'" @click="toUrl('/' + room.iid)">简洁观看</el-button>
                </el-col>
                <el-col :span="12" :xs="24">
                    <el-button :plain="true" type="info" @click="toUrl(room.jump_url)">进入房间</el-button>
                </el-col>
            </el-row>
        </div>
    </el-card>
</template>

<script>
    export default {
        props: {
            room: {
                type: Object,
                default: []
            }
        },
        methods: {
            toUrl(url) {
                window.open(url);
            }
        }
    }
</script>

<style scoped>
    .bottom {
        margin-top: 13px;
        line-height: 12px;
    }

    .image {
        width: 100%;
        display: block;
    }

    .clearfix:before,
    .clearfix:after {
        display: table;
        content: "";
    }

    .clearfix:after {
        clear: both
    }

    h3 {
        line-height: 1em;
        height: 1em;
        overflow: hidden;
    }
</style>