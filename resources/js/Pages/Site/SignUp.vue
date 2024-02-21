<script>
$('body').addClass('bg-gradient-primary')

import {useForm} from '@inertiajs/vue3';

export default {
    components: {
        useForm
    },
    data() {
        return {
            step: 'signup',
            form: useForm({
                name: '',
                email: '',
                phone: '',
                company: '',
                password: '',
                password_confirmation: '',
            }),
            verify_form: useForm({
                code: '',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('signup'), {
                onSuccess: (response) => {
                    this.step = 'verify';
                    this.form.reset(['password', 'password_confirmation'])
                },
            });
        },
        verify() {
            this.verify_form.post(route('signup.verify'), {
                onFinish: () => {
                    this.form.reset(['code'])
                },
            });
        }
    }
}
</script>


<template>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Для регистрации заполните форму ниже!</h1>
                            </div>
                            <form v-if="step === 'signup'" @click.prevent="submit" class="user">
                                <div class="form-group">
                                    <input type="text" v-model="form.name" class="form-control form-control-user" placeholder="ФИО">
                                    <p v-if="form.errors.name" class="border-bottom-danger" v-html="form.errors.name"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" v-model="form.email" class="form-control form-control-user" placeholder="Email адрес">
                                    <p v-if="form.errors.email" class="border-bottom-danger" v-html="form.errors.email"></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" v-model="form.phone" class="form-control form-control-user" placeholder="Номер телефона">
                                        <p v-if="form.errors.phone" class="border-bottom-danger" v-html="form.errors.phone"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" placeholder="Компания">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" v-model="form.password" class="form-control form-control-user" placeholder="Пароль">
                                        <p v-if="form.errors.password" class="border-bottom-danger" v-html="form.errors.password"></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" v-model="form.password_confirmation" class="form-control form-control-user" placeholder="Повторите пароль">
                                        <p v-if="form.errors.password_confirmation" class="border-bottom-danger" v-html="form.errors.password_confirmation"></p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Создать аккаунт
                                </button>
                            </form>
                            <form v-else @click.prevent="verify" id="confirm">
                                <div class="form-group">
                                    <input type="text" v-model="verify_form.code" class="form-control form-control-user" placeholder="Код подтверждения">
                                    <p v-if="verify_form.errors.code" class="border-bottom-danger" v-html="verify_form.errors.code"></p>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Подтвердить аккаунт
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" :href="route('forgot.form')">Восстановить аккаунт</a>
                            </div>
                            <div class="text-center">
                                <a class="small" :href="route('login')">Есть аккаунт? Авторизуйтесь!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
