<template>
<b-card class="form-card">
    <Error />
    <validation-observer ref="observer" v-slot="{ handleSubmit }">
        <validation-provider v-slot="validationContext" name="メールアドレス" :rules="{ required: true , email: true}">
            <b-form-group id="email-group" label="メールアドレス" label-for="email">
                <b-form-input
                    id="email"
                    v-model="loginForm.email"
                    type="email"
                    :state="validationState(validationContext)"
                    aria-describedby="emailFeedback"
                ></b-form-input>
                <b-form-invalid-feedback id="emailFeedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
            </b-form-group>
        </validation-provider>

        <validation-provider v-slot="validationContext" name="パスワード" :rules="{ required: true }">
            <b-form-group id="password-group" label="パスワード" label-for="password">
                <b-form-input
                    id="password"
                    v-model="loginForm.password"
                    type="password"
                    :state="validationState(validationContext)"
                    aria-describedby="passwordFeedback"
                ></b-form-input>
                <b-form-invalid-feedback id="passwordFeedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
            </b-form-group>
            <b-form-group id="remember-group">
                <b-form-checkbox v-model="loginForm.remember">ログインしたままにする</b-form-checkbox>
            </b-form-group>
        </validation-provider>

        <b-button block class="success" @click="handleSubmit(login)">ログイン</b-button>
    </validation-observer>
    <div class="text-center mt-3">
        <b-link :to="{name: 'password_confirm'}">パスワード再設定</b-link>
    </div>
</b-card>
</template>

<script>
import Error from '../Error.vue'
export default {
    components: {
        Error
    },
    data () {
        return {
            loginForm: {
                email: '',
                password: '',
                remember: false
            }
        }
    },
    methods: {
        validationState({ dirty, validated, valid = null }) {
            return dirty || validated ? valid : null;
        },
        login() {
            this.$store.dispatch('auth/login', this.loginForm)
                .then(() => {
                    this.$router.push({name: 'main'})
                })
                .catch((e) => {
                    this.$store.commit('error/setmessage', e.response.data.errors)
                })
        }
    }
}
</script>
