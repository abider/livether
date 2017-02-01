<template>
    <el-form :model="form" :rules="loginRule" label-width="100px">
        <el-form-item label="邮箱" prop="email">
            <el-input v-model="form.email"></el-input>
        </el-form-item>
        <el-form-item label="密码" prop="password">
            <el-input type="password" v-model="form.password"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="onSubmit">登录</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    remember: false,
                    _token: window.Laravel.csrfToken
                },
                loginRule: {
                    email: [
                        { required: true, message: '请输入邮箱', trigger: 'blur,change' },
                        { type: 'email', message: '请输入正确的邮箱地址', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请输入密码', trigger: 'blur,change' },
                        { min: 6, message: '密码长度至少6个字符', trigger: 'blur'}
                    ]
                }
            }
        },
        methods: {
            onSubmit() {
                axios.post('/login', this.form).then((response) => {
                    response.data.result
                        ? this.success(response.data.message)
                        : this.error(response.data.message)
                })
            },
            success(message) {
                this.$notify({
                    title: message,
                    type: 'success'
                });
                setTimeout(function() {
                    window.location.href = '/';
                }, 1000);
            },
            error(message) {
                this.$notify.error({
                    title: message
                });
            }
        }
    }
</script>
