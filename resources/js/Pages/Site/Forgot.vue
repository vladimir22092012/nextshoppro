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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Забыли пароль?</h1>
                                        <p class="mb-4">Если у вас есть аккаунт на предыдущей версии сайта nextshop.pro или вы забыли пароль, просто восстановите свой пароль используя форму ниже!</p>
                                    </div>
                                    <form @submit.prevent="submit" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email адрес или номер телефна">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Отправить код подтверждения
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" :href="route('signup.form')">Создать аккаунт</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" :href="route('login')">Авторизация</a>
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
