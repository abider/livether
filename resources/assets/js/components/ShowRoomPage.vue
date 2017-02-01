<template>
    <el-row>
        <el-col :span="24" :key="room">
            <el-card class="box-card" :body-style="{ padding: '0px' }">
                <div style="padding: 10px">
                    <el-row>
                        <el-col :xs="24" :sm="18" :md="18" :lg="10">
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
                            {{ room.looker }}人 / {{ room.category }}
                        </el-col>
                        <el-col :xs="24" :sm="12" :md="12" :lg="4">
                            <room-follow-button
                                    :room="room.iid"
                                    :default="room.followed" v-if="islogin">
                            </room-follow-button>
                        </el-col>
                        <el-col :xs="24" :sm="12" :md="12" :lg="4">
                            <el-button :plain="true" type="info" @click="toUrl(room.jump_url)">进入房间</el-button>
                        </el-col>
                    </el-row>
                </div>
            </el-card>
        </el-col>
    </el-row>
    <el-row>
        <el-col :span="24">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="video-player">
                        <embed
                                width="100%"
                                height="100%"
                                wmode="opaque"
                                allowfullscreen="true"
                                allowscriptaccess="always"
                                src="{{ $room->live_url }}"
                        >
                    </div>
                </div>
            </div>
        </el-col>
    </el-row>
</template>

<script>
    import RoomFollowButton from './RoomFollowButton.vue'
    export default {
        props: {
            roomId: {
                type: String,
                default: ''
            }
        },
        data() {
            return: {
                room: []
            }

        },
        methods: {
            toUrl(url) {
                window.open(url);
            }
        },
        mounted() {
            axios.get('/api/check').then((response) => {
                this.islogin = response.data.result
            });

        }
    }
</script>

<style>
    .room-other-info {
        text-align: center;
    }

    .el-card {
        box-shadow: none;
    }

    .title a {
        color: #1F2D3D;
        text-decoration: none;
        font-size: 20px;
    }

    .title a:hover {
        color: #1D8CE0;
    }

    .el-col {
        padding: 15px;
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

    .el-col .el-button {
        width: 100%;
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