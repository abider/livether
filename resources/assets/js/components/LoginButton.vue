<template>
    <li>
        <a href="javascript:;" @click="dialogStatus = true">{{ activeText }}</a>

        <el-dialog v-model="dialogStatus" size="tiny">
            <el-tabs v-model="activeName">
                <el-tab-pane label="登录" name="login">
                    <login-form></login-form>
                </el-tab-pane>
                <el-tab-pane label="注册" name="register">
                    <register-form></register-form>
                </el-tab-pane>
                <el-tab-pane label="忘记密码" name="forgotPassword">
                    <forgot-password-form></forgot-password-form>
                </el-tab-pane>
            </el-tabs>
        </el-dialog>
    </li>
</template>

<script>
    export default {
        props: {
            activeName: {
                type: String,
                default: 'login'
            },
            activeText: {
                type: String,
                default: '登录'
            }
        },
        data() {
            return {
                dialogStatus: false,
            }
        }
    }
</script>

<style scoped>
    .el-dialog {
        border-radius: 30px;
    }
</style>
