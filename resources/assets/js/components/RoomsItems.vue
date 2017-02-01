<template>
    <el-row>
        <el-col :span="24" v-for="room in rooms" :key="room">
            <el-card class="box-card" :body-style="{ padding: '0px' }">
                <div style="padding: 10px">
                    <el-row>
                        <el-col :xs="24" :sm="18" :md="18" :lg="9">
                            <div class="media">
                                <div class="media-left">
                                    <img width="60" height="60" :src="room.avatar" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading title">
                                        <a :href="'/' + room.iid" target="_blank">
                                            {{ room.title }}
                                        </a>
                                    </div>
                                    {{ room.author }}
                                </div>
                            </div>
                        </el-col>
                        <el-col :xs="24" :sm="6" :md="6" :lg="6" class="room-other-info">
                            {{ room.looker }}人 / {{ room.cate }}
                        </el-col>
                        <el-col :xs="24" :sm="8" :md="8" :lg="3">
                            <room-follow-button
                                    :room="room.iid"
                                    :default="room.followed" v-if="islogin">
                            </room-follow-button>
                        </el-col>
                        <el-col :xs="24" :sm="8" :md="8" :lg="3">
                            <el-button :plain="true" type="success" :disabled="room.category == 'panda'" @click="toUrl('/' + room.iid)">简洁观看</el-button>
                        </el-col>
                        <el-col :xs="24" :sm="8" :md="8" :lg="3">
                            <el-button :plain="true" type="info" @click="toUrl(room.jump_url)">进入房间</el-button>
                        </el-col>
                    </el-row>
                </div>
            </el-card>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        props: {
            rooms: {
                type: Array,
                default: []
            },
            islogin: {
                type: Boolean,
                default: false
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
    .room-other-info {
        text-align: center;
    }

    .title a {
        color: #1F2D3D;
        text-decoration: none;
        font-size: 20px;
    }

    .title a:hover {
        color: #1D8CE0;
    }

    .text {
        font-size: 14px;
    }

    .item {
        width: 100%;
    }

    .clearfix:before,
    .clearfix:after {
        display: table;
        content: "";
    }
    .clearfix:after {
        clear: both
    }

    .image {
        width: 100%;
        display: block;
    }

    @media (min-width: 768px) {
        .image {
            height: 200px;
        }

        .room-other-info {
            line-height: 1.5em;
        }

        .el-col .el-button {
            margin: 10px 0;
            width: 100%;
        }
    }

    @media (min-width: 992px) {
        .image {
            height: 127px;
        }

        .room-other-info {
            line-height: 60px;
        }

        .el-col .el-button {
            margin: 10px 0;
            width: 100%;
        }
    }

    @media (min-width: 1200px) {
        .image {
            height: 155px;
        }

        .el-col .el-button {
            margin: 10px 0;
            width: 100%;
        }
    }

    .media-left img {
        border-radius: 50%;
    }

</style>

<style>
    .el-col {
        padding: 15px;
    }

    .el-card {
        box-shadow: none;
    }

    .el-col .el-button {
        width: 100%;
    }
</style>