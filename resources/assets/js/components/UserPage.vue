<template>
    <div class="container">
        <el-row>
            <el-col :xs="24" :sm="24" :md="6">
                <el-row>
                    <el-col :span="24">
                        <el-card class="box-card text-center">
                            <img width="100" class="img-circle" :src="user.avatar" alt="">
                            <h1>{{ user.name }}</h1>
                        </el-card>
                    </el-col>
                    <el-col :span="24">
                        <el-card class="box-card text-center" :body-style="{ padding: '0px' }">
                            <h2>{{ user.following_count }}</h2>
                            <h6>关注房间</h6>
                        </el-card>
                    </el-col>
                    <el-col :span="24" v-if="isLogin">
                        <el-card class="box-card text-center">
                            <el-row>
                                <el-col>
                                    <el-button type="primary" size="large" @click="dialogVisible = true">重置密码</el-button>
                                    <el-dialog title="重置密码" v-model="dialogVisible" size="tiny">
                                        <forgot-password-form></forgot-password-form>
                                    </el-dialog>
                                </el-col>
                                <el-col>
                                    <upload-avatar-button :name="user.name" :avatar="user.avatar" :id="user.id"></upload-avatar-button>
                                </el-col>
                            </el-row>
                        </el-card>
                    </el-col>
                    <el-col :span="24">
                        <el-card class="box-card">
                            <el-row>
                                <div v-if="isLogin">
                                    <h6>邮箱</h6>
                                    <h5>{{ user.email }}</h5>
                                </div>
                                <div>
                                    <h6>加入时间</h6>
                                    <h5>{{ user.created_at }}</h5>
                                </div>
                                <div>
                                    <h6>上次活跃</h6>
                                    <h5>{{ user.updated_at }}</h5>
                                </div>
                            </el-row>
                        </el-card>
                    </el-col>
                </el-row>
            </el-col>
            <el-col :xs="24" :sm="24" :md="18">
                <user-following-rooms :id="id"></user-following-rooms>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        props: {
            id: {
                type: Number,
                default: 1
            }
        },
        data() {
            return {
                user: [],
                dialogVisible: false,
                isLogin: false,
            }
        },
        computed: {
            btnText() {
                return this.loading ? '加载中' : '加载更多';
            },
        },
        mounted() {
            axios.get('/api/check', {
                params: {
                    user: this.id
                }
            }).then((response) => {
                this.isLogin = response.data.result
            });

            axios.get('/api/user/' + this.id).then((response) => {
                this.user = response.data.data
            });
        }
    }
</script>

<style scoped>
    h6 {
        color: #99A9BF;
    }
    h5 {
        color: #324057;
    }
</style>

