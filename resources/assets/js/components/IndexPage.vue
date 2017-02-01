<template>
    <div class="container">
        <!--  Top  -->
        <el-row>
            <el-col :span="12" :xs="24" v-for="room in rooms.top">
                <index-page-room-item :room="room"></index-page-room-item>
            </el-col>
        </el-row>
        <!--  Douyu  -->
        <h2 class="text-center">
            斗鱼Tv / Douyu
        </h2>
        <el-row>
            <el-col :xs="24" :sm="12" :md="8" :lg="8" v-for="room in rooms.douyu">
                <index-page-room-item :room="room"></index-page-room-item>
            </el-col>
        </el-row>
        <!--  Panda  -->
        <h2 class="text-center">
            熊猫直播 / Panda
        </h2>
        <el-row>
            <el-col :xs="24" :sm="12" :md="8" :lg="8" v-for="room in rooms.panda">
                <index-page-room-item :room="room"></index-page-room-item>
            </el-col>
        </el-row>
        <!--  Quanmin  -->
        <h2 class="text-center">
            全民直播 / Quanmin
        </h2>
        <el-row>
            <el-col :xs="24" :sm="12" :md="8" :lg="8" v-for="room in rooms.quanmin">
                <index-page-room-item :room="room"></index-page-room-item>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rooms: []
            };
        },
        mounted() {
            axios.get('api/index').then((response) => {
                this.rooms = response.data.data;
            });
        },
        components: {

        }
    };
</script>
