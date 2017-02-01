<template>
    <div>
        <el-button type="primary" @click="dialogStatus = true">修改头像</el-button>
        <el-dialog v-model="dialogStatus" size="tiny" title="修改头像">
            <!--<el-upload-->
                    <!--action="/api/user/avatar"-->
                    <!--type="drag"-->
                    <!--name="avatar"-->
                    <!--:thumbnail-mode="true"-->
                    <!--:on-preview="handlePreview"-->
                    <!--:default-file-list="fileList"-->
                    <!--:headers="{Authorization:apiToken}"-->
            <!--&gt;-->
                <!--<i class="el-icon-upload"></i>-->
                <!--<div class="el-dragger__text">将文件拖到此处，或<em>点击上传</em></div>-->
                <!--<div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>-->
            <!--</el-upload>-->
            <vue-file-upload
                    url='/api/user/avatar'
                    ref="vueFileUploader"
                    name="avatar"
                    :max="1"
                    :multiple="false"
                    :events = 'cbEvents'
                    :request-options = "reqopts"
                    v-on:onAdd = "onAddItem"
            >
            </vue-file-upload>
            <div v-for='file in files'>
                <el-card class="box-card text-center">
                    <img width="200" height="200" :src='onPreview(file)' alt="">
                </el-card>
                <el-button @click="uploadItem(file)">上传头像</el-button>
            </div>
        </el-dialog>
    </div>
</template>
<script>
    import VueFileUpload from 'vue-file-upload';
    export default {
        props: {
            name: {
                type: String,
                default: null
            },
            avatar: {
                type: String,
                default() {
                    return '/images/avatars/default.png';
                }
            },
            id: {
                type: Number,
                default() {
                    return 0;
                }
            }
        },
        data() {
            return {
                fileList: [{ name: this.name, url: this.avatar }],
                dialogStatus: false,
                files:[],
                readyUpload: false,
                //文件过滤器，只能上传图片
                //回调函数绑定
                cbEvents:{
                    onCompleteUpload:(file,response,status,header)=>{
                        response.result ? this.success(response.message) : this.error(response.message);
                    },
                    onAddFileSuccess:(file)=>{
                        console.log(file);
                        console.log("success add to queue");
                    }
                },
                //xhr请求附带参数
                reqopts:{
                    headers:{
                        Authorization: 'Bearer ' + Laravel.apiToken
                    },
                    responseType:'json',
                    withCredentials:false
                }
            };
        },
        computed: {
            apiToken() {
                return 'Bearer ' + Laravel.apiToken;
            },
            path() {
                return '/users/' + this.id;
            }
        },
        methods: {
            onPreview(file){
                var src = window.URL.createObjectURL(file.file);
                return src;
            },
            onAddItem(files){
                console.log(files);
                this.files = files;
            },
            uploadItem(file){
                file.upload();
            },
            success(message) {
                this.$notify({
                    title: message,
                    type: 'success'
                });
                setTimeout(() => {
                    window.location.href = this.path
                }, 1000);
            },
            error(message) {
                this.$notify.error({
                    title: message
                });
            }
        },
        components:{
            VueFileUpload
        }
    }
</script>

<style scoped>
    .el-card {
        border: none;
    }
</style>