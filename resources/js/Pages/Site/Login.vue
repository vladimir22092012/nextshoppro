<script>

$('body').addClass('bg-gradient-primary')

import {useForm} from '@inertiajs/vue3';


export default {
    components: {
        useForm
    },
    data() {
        return {
            form: useForm({
                email: '',
                password: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('auth'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    }
}

</script>


<template>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Добро пожаловать</h1>
                                    </div>
                                    <form @submit.prevent="submit" class="user">
                                        <div class="form-group">
                                            <input v-model="form.email" type="email"
                                                   class="form-control form-control-user"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="Email">
                                            <p v-if="form.errors.email" class="border-bottom-danger" v-html="form.errors.email"></p>
                                        </div>
                                        <div class="form-group">
                                            <input v-model="form.password" type="password"
                                                   class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Пароль">
                                            <p v-if="form.errors.password" class="border-bottom-danger" v-html="form.errors.password"></p>

                                        </div>
<!--                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">запомнить меня</label>
                                            </div>
                                        </div>-->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Войти
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" :href="route('forgot.form')">Забыли пароль?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" :href="route('signup.form')">Создать аккаунт!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</template>
