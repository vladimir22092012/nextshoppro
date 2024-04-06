<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{show.name}}</h1>
        </div>
        <div class="card shadow mb-4 col-md-5">
            <div class="card-body" v-if="editable">
                <div class="form-group">
                    <label for="">Категория</label>
                    <Multiselect
                        v-model="form.category_id"
                        deselect-label="Отменить выбор"
                        track-by="name"
                        label="name"
                        placeholder="Выберите категорию" :options="categories"
                        :searchable="true"
                        :allow-empty="false"
                        :custom-label="nameWithId"
                    ></Multiselect>
                </div>
                <div class="form-group">
                    <label for="">Артикул</label>
                    <input v-model="form.article" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Наименование</label>
                    <input v-model="form.name" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Цена</label>
                    <input v-model="form.price" type="text" class="form-control form-control-user">
                </div>
                <div class="form-group">
                    <label for="">Кол-во на складе</label>
                    <input v-model="form.count" type="text" class="form-control form-control-user">
                </div>
                <button @click="save" class="btn btn-outline-success">Сохранить</button> &nbsp;
                <button @click="editable = false" class="btn btn-outline-danger">Отмена</button>
            </div>

            <div class="card-body" v-if="!editable">
                <span v-html="show.status"></span>
                <p><b>Категория: </b> {{show.category_name}}</p>
                <p><b>Артикул: </b> {{show.article}}</p>
                <p><b>Наименование: </b> {{show.name}}</p>
                <p><b>Краткое описание: </b> {{show.short_description}}</p>
                <p><b>Цена: </b> {{show.price}}</p>
                <p><b>Кол-во на складе: </b> {{show.count}}</p>
                <p><b>Дата создания: </b> {{show.created_at}}</p>
                <button @click="editable = true" class="btn btn-outline-primary">Редактировать</button>
            </div>
        </div>
        <div class="card shadow mb-4 col-md-5">
            <div class="card-body">
                <p><b>Скидка на товар: (%) </b> <input type="text" class="form-control form-control-user" v-model="discount"></p>
                <button @click="saveDiscount" class="btn btn-outline-primary">Сохранить</button>
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
        product: {},
        categories: {},
        discountAmount: String,
    },
    data() {
        return {
            editable: false,
            discount: this.discountAmount,
            form: Object.assign({}, this.product),
            show: Object.assign({}, this.product),
        }
    },
    methods: {
        nameWithId ({ name, id }) {
            return `${name} — [${id}]`
        },
        saveDiscount() {
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
                        discount: this.discount,
                        type: 'product',
                        modelId: this.form.id,
                    }
                    axios.post(route('api.admin.discount.save'), data).then((response) => {
                        if (response.data.status === 'ok') {
                            this.$swal({
                                position: "top-end",
                                icon: "success",
                                title: "Скидка успешно обновлена",
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
                        category_id: this.form.category_id.id,
                    }
                    axios.post(route('api.admin.product.save', this.form.id), data).then((response) => {
                        if (response.data.status === 'ok') {
                            this.form = Object.assign({}, response.data.product)
                            this.show = Object.assign({}, response.data.product)
                            this.editable = false
                            this.$swal({
                                position: "top-end",
                                icon: "success",
                                title: "Товар успешно сохранён",
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
