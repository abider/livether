<template>
    <el-form :model="form" :rules="registerRule" label-width="100px">
        <el-form-item label="用户名" prop="name">
            <el-input v-model="form.name" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="邮箱" prop="email">
            <el-input v-model="form.email" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="密码" prop="password">
            <el-input type="password" v-model="form.password" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item label="确认密码" prop="confirmPassword">
            <el-input type="password" v-model="form.confirmPassword" auto-complete="off"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" @click="onSubmit">注册</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
    export default {
        data() {
            var validateCheckPassword = (rule, value, callback) => {
                if (value !== this.form.password) {
                    callback(new Error('两次输入密码不一致!'));
                } else {
                    callback();
                }
            };
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    confirmPassword: '',
                    remember: true,
                    _token: window.Laravel.csrfToken
                },
                registerRule: {
                    name: [
                        { required: true, message: '请输入用户名', trigger: 'blur' },
                        { min: 6, message: '用户名长度至少6个字符', trigger: 'blur,change' }
                    ],
                    email: [
                        { required: true, message: '请输入邮箱', trigger: 'blur' },
                        { type: 'email', message: '请输入正确的邮箱地址', trigger: 'blur,change' }
                    ],
                    password: [
                        { required: true, message: '请输入密码', trigger: 'blur' },
                        { min: 6, message: '密码长度至少6个字符', trigger: 'blur,change' }
                    ],
                    confirmPassword: [
                        { required: true, message: '请再次输入密码', trigger: 'blur,change' },
                        { validator: validateCheckPassword, trigger: 'blur' }
                    ]
                }
            }
        },
        methods: {
            onSubmit() {
                axios.post('/register', this.form).then((response) => {
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
