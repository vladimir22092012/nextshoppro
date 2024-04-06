<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{show.firstname}} {{show.name}} {{show.lastname}}
            </h1>
        </div>
        <div class="card shadow mb-4 col-md-7">
            <div class="card-body" v-if="editable">
                <div class="form-group">
                    <label for="">Фамилия</label>
                    <input v-model="form.firstname" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Имя</label>
                    <input v-model="form.name" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Отчество</label>
                    <input v-model="form.lastname" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Компания</label>
                    <input v-model="form.company" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Адрес</label>
                    <input v-model="form.address" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Телефон</label>
                    <input v-model="form.phone" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input v-model="form.email" type="text" class="form-control form-control-user">
                </div>
                <button @click="save" class="btn btn-outline-success">Сохранить</button> &nbsp;
                <button @click="editable = false" class="btn btn-outline-danger">Отмена</button>
            </div>

            <div class="card-body" v-if="!editable">
                <div class="actions">
                    <span v-if="this.show.status === 'new'">
                        <button @click.prevent="accept" class="btn btn-success">Принять в работу</button>
                    </span>
                    <span v-if="this.show.status === 'accept'">
                        <button @click.prevent="ready" class="btn btn-warning">На оплату</button>
                        <button @click.prevent="done" class="btn btn-success">Заказ выполнен</button>
                        <button @click.prevent="reject" class="btn btn-danger">Отметить заказ</button>
                    </span>
                    <span v-if="this.show.status === 'ready'">
                        <button @click.prevent="payed" class="btn btn-success">Оплачен</button>
                        <button @click.prevent="done" class="btn btn-success">Заказ выполнен</button>
                        <button @click.prevent="reject" class="btn btn-danger">Отметить заказ</button>
                    </span>
                    <span v-if="this.show.status === 'payed'">
                        <button @click.prevent="done" class="btn btn-success">Заказ выполнен</button>
                    </span>
                    <span style="display: inline-block; float:right" v-html="show.htmlStatus"></span>
                </div>
                <hr>
                <p><b>Фамилия: </b> {{show.firstname}}</p>
                <p><b>Имя: </b> {{show.name}}</p>
                <p><b>Отчество: </b> {{show.lastname}}</p>
                <p><b>Компания: </b> {{show.company}}</p>
                <p><b>Адрес: </b> {{show.address}}</p>
                <p><b>Телефон: </b> {{show.phone}}</p>
                <p><b>Email: </b> {{show.email}}</p>
                <p><b>Тип доставки: </b> {{show.delivery_type}}</p>
                <p><b>Тип оплаты: </b> {{show.payment_type}}</p>
                <p><b>Комментарий: </b> {{show.comment}}</p>
                <p><b>Коментарий менеджера: </b> {{show.manager_comment}}</p>
                <p><b>Дата создания: </b> {{show.created_at}}</p>
                <button @click="editable = true" class="btn btn-outline-primary">Редактировать</button>
            </div>
        </div>
        <div class="card shadow mb-9 col-md-9">
                <div class="card-body">
                    <h1 class="h3 mb-0 text-gray-800">Товары в заказе <button class="btn btn-sm btn-success">Добавить товар</button></h1>
                    <hr>
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th>Наименование</th>
                                            <th>Кол-во</th>
                                            <th>Цена</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="product in dataProducts">
                                            <td>{{product.name}}</td>
                                            <td>{{product.count}}</td>
                                            <td>{{product.price}}</td>
                                            <td>
                                                <button @click.prevent="removeProduct(product.id)" class="btn btn-sm btn-danger">X</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>
<style>
.actions .btn{
    margin-left: 5px;
}
</style>
<script>
import AdminLayout from "@/Pages/components/AdminLayout/AdminLayout.vue";
import Multiselect from "vue-multiselect";
import TextField from "@/Pages/components/Form/TextInput.vue";
export default {
    layout: AdminLayout,
    components: {
        TextField,
    },
    props: {
        order: {},
        products: {},
    },
    data() {
        return {
            editable: false,
            form: Object.assign({}, this.order),
            show: Object.assign({}, this.order),
            dataProducts: Object.assign({}, this.products)
        }
    },
    methods: {
        nameWithId ({ name, id }) {
            return `${name} — [${id}]`
        },
        removeProduct(id) {
            this.$swal({
                position: "center",
                icon: "warning",
                showCancelButton: true,
                title: `Вы уверены что хотите удалить товар из заказа?`,
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
            }).then((userAnswer) => {
                if (userAnswer.isConfirmed) {
                    let data = {
                        id: id
                    }
                    axios.post(route('api.admin.order.removeProduct', this.form.id), data).then((response) => {
                        if (response.data.status === 'ok') {
                            this.$swal({
                                position: "top-end",
                                icon: "success",
                                title: "Заказ успешно обновлён",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            this.$swal({
                                icon: "error",
                                title: "Упс...",
                                text: "Произошла ошибка, попробуйте операцию позже!",
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
        },
        accept() {
            this.form.status = 'accept';
            this.save('Принимаете заказ в работу?');
        },
        ready() {
            this.form.status = 'ready';
            this.save('Отправить заказ на оплату?')
        },
        payed() {
            this.form.status = 'payed';
            this.save('Заказ оплачен?')
        },
        done() {
            this.form.status = 'done';
            this.save('Вы уверены что заказ выполнен?')
        },
        reject() {
            this.form.status = 'reject';
            this.save('Вы уверены что хотите отменить заказ?')
        },
        save(text = 'Вы уверены что хотите сохранить изменения?') {
            this.$swal({
                position: "center",
                icon: "warning",
                showCancelButton: true,
                title: text,
                confirmButtonText: "Да",
                cancelButtonText: "Нет",
            }).then((userAnswer) => {
                if (userAnswer.isConfirmed) {
                    let data = {
                        ...this.form,
                    }
                    axios.post(route('api.admin.order.save', this.form.id), data).then((response) => {
                        if (response.data.status === 'ok') {
                            this.form = Object.assign({}, response.data.product)
                            this.show = Object.assign({}, response.data.product)
                            this.editable = false
                            this.$swal({
                                position: "top-end",
                                icon: "success",
                                title: "Заказ успешно сохранён",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            this.$swal({
                                icon: "error",
                                title: "Упс...",
                                text: "Произошла ошибка, попробуйте операцию позже!",
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
