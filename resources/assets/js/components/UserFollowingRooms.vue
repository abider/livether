<template>
    <div>
        <following-rooms-items :rooms="rooms" :islogin="islogin"></following-rooms-items>
        <el-row v-if="btnStatus">
            <el-col :span="24">
                <el-button @click="nextPage" size="large" :loading="loading">
                    {{ btnText }}
                </el-button>
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
                page: 1,
                rooms: [],
                btnStatus: true,
                islogin: false,
                loading: false
            }
        },
        computed: {
            btnText() {
                return this.loading ? '加载中' : '加载更多';
            },
            followingUrl() {
                return '/api/user/' + this.id + '/following';
            }
        },
        mounted() {
            axios.get('/api/check').then((response) => {
                this.islogin = response.data.result
            });
            this.nextPage()
        },
        methods: {
            nextPage() {
                this.loading = true;
                axios.get(this.followingUrl, {
                    params: {
                        page: this.page
                    }
                }).then((response) => {
                    if (response.data.result) {
                        response.data.data.data.forEach((data) => {
                            this.rooms.push(data)
                        });
                        this.page = response.data.data.current_page + 1;
                    }
                    this.btnStatus = parseInt(response.data.data.last_page)
                                   - parseInt(response.data.data.current_page)
                                   <= 0 ? false : true;
                    this.loading = false;
                })
            }
        }
    }
</script>

