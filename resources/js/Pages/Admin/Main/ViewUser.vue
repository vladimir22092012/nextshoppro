<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{show.name}}</h1>
        </div>
        <div class="card shadow mb-4 col-md-5">
            <div class="card-body" v-if="editable">
                <div class="form-group">
                    <label for="">Имя</label>
                    <input v-model="form.name" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input v-model="form.email" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Телефон</label>
                    <input v-model="form.phone" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Роль</label>
                    <Multiselect
                        v-model="form.role_id"
                        deselect-label="Отменить выбор"
                        track-by="name"
                        label="name"
                        placeholder="Выберите Роль" :options="roles"
                        :searchable="true"
                        :allow-empty="false"
                        :custom-label="nameWithId"
                    ></Multiselect>
                </div>
                <button @click="save" class="btn btn-outline-success">Сохранить</button> &nbsp;
                <button @click="editable = false" class="btn btn-outline-danger">Отмена</button>
            </div>

            <div class="card-body" v-if="!editable">
                <span v-html="show.status"></span>
                <p><b>Имя: </b> {{show.name}}</p>
                <p><b>Email: </b> {{show.email}}</p>
                <p v-if="show.phone"><b>Телефон: </b> {{show.phone}}</p>
                <p><b>Дата регистрации: </b> {{show.created_at}}</p>
                <p v-if="show.deleted_at"><b>Дата удаления: </b> {{show.deleted_at}}</p>
<!--                <p><b>Роль: </b> {{show.role.role}}</p>-->
                <button @click="editable = true" class="btn btn-outline-primary">Редактировать</button>
            </div>
        </div>
    </div>
</template>
<script>
import AdminLayout from "@/Pages/components/AdminLayout/AdminLayout.vue";
import Multiselect from "vue-multiselect";
import TextField from "@/Pages/components/Form/TextInput.vue";
export default {
    layout: AdminLayout,
    components: {
        TextField,
        Multiselect,
    },
    props: {
        user: {},
        roles: {},
    },
    data() {
        return {
            editable: false,
            form: Object.assign({}, this.user),
            show: Object.assign({}, this.user),
        }
    },
    methods: {
        nameWithId ({ name, id }) {
            return `${name}`
        },
        save() {
            this.$swal({
                position: "center",
                icon: "warning",
                showCancelButton: true,
                title: `Вы уверены что хотите сохранить изменения?`,
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
            }).then((userAnswer) => {
                if (userAnswer.isConfirmed) {
                    let data = {
                        ...this.form,
                        role_id: this.form.role_id.id,
                    }
                    axios.post(route('api.admin.user.save', this.form.id), data).then((response) => {
                        if (response.data.status === 'ok') {
                            this.form = Object.assign({}, response.data.user)
                            this.show = Object.assign({}, response.data.user)
                            this.editable = false
                            this.$swal({
                                position: "top-end",
                                icon: "success",
                                title: "Пользователь успешно сохранён",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            this.$swal({
                                icon: "error",
                                title: "Упс...",
                                text: "Проищошла ошибка, попробуйте операцию позже!",
                            })
                        }
                    }).catch((error) => {
                        this.$swal({
                            icon: "error",
                            title: "Упс...",
                            text: error.responseText,
                        })
                    })
                }
            });
        }
    }
}
</script>
