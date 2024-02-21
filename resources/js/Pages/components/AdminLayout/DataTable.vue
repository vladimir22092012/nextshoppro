<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Показано
                {{ (selectedPage - 1) * selectedLimit || (count && 1) || 0 }}
                -
                {{ ((selectedPage === totals) ? count : (selectedPage * selectedLimit - 1)) }}
                из {{ count }}.
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-2">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>Показывать по
                                    <select :v-model="selectedLimit" name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option v-for="(key,limit) in limits" :value="key">{{limit}}</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th v-for="column in dataColumns"
                                            :class="{
                                                 'sorting': column.sortable === true,
                                                 'sorting_asc': column.sortable === true && currentOrder === 'asc' && currentSort === column.field,
                                                 'sorting_desc': column.sortable === true && currentOrder === 'desc' && currentSort === column.field
                                            }"
                                            @click.prevent="() => column.sortable && sort(column.field)"
                                            tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                            <a :style="{'pointer-events': !column.sortable && !column.field_search ? 'none' : ''}"
                                               href="#">
                                                {{ column.title }}
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <template v-for="column in dataColumns">
                                            <td>
                                                <template v-if="column.field_search">
                                                    <Select v-if="column.field_type === 'select' && column.options"
                                                            :options="column.options"
                                                            :defaultOption="true"
                                                            @select="(value) => filterData[column.field] = value"/>
                                                    <TextInput
                                                        v-else
                                                        v-model="inputsFilterData[column.field]"
                                                        v-on:keyup.enter="filterData = Object.assign(filterData, inputsFilterData)"/>
                                                </template>
                                            </td>
                                        </template>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" v-if="totals > 0" v-for="(item, index) in items"
                                        :style="{'background-color' : item.bgcolor ?? '', 'color' : item.color ?? ''}">
                                        <td v-for="column in dataColumns">
                                            <span v-if="column.type == 'link'">
                                                <a :href="route(viewRoute, item['id'])">Просмотр</a>
                                            </span>
                                            <span v-else v-html="item[column.field]"></span>
                                        </td>
                                    </tr>
                                    <tr v-else>
                                        <td style="padding: 30px 0; color: #007bff"
                                            class="text-center font-20 font-bold p-20" :colspan="dataColumns.length">
                                            Не данных, самое время добавить!
                                        </td>
                                    </tr>
<!--                                    <tr class="odd">
                                        <td class="sorting_1">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1">Angelica Ramos</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li :class="{'page-item previous': true, 'disabled': selectedPage == 1}">
                                        <a @click.prevent="selectedPage>1?selectedPage--:selectedPage;filter()"
                                           class="paginate_button page-link">Предыдущая</a>
                                    </li>
                                    <li v-for="page in pages"
                                        :class="{'paginate_button page-item': true, 'active': page == selectedPage}">
                                        <a @click.prevent="selectPage(page)" class="page-link">{{ page }}</a>
                                    </li>
                                    <li :class="{'page-item next page-next': true, 'disabled': selectedPage == totals}">
                                        <a @click.prevent="selectedPage<totals?selectedPage++:selectedPage;filter()"
                                           class="paginate_button page-link">Слудующая</a>
                                    </li>
                                </ul>
<!--                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Предыдущая</a>
                                    </li>
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                    </li>
                                    <li class="paginate_button page-item next" id="dataTable_next">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Слудующая</a>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Select from "@/Pages/components/Form/Select.vue";
import TextInput from "@/Pages/components/Form/TextInput.vue";
import {Link} from "@inertiajs/vue3";


export default {
    components: {
        Select,
        TextInput,
        Link
    },
    props: {
        viewRoute: {
            type: String,
            default: 'none',
        },
        columns: [],
        limits: {
            type: Array,
            default: [
                {value: 20, name: "20"},
                {value: 25, name: "25"},
                {value: 50, name: "50"},
                {value: 100, name: "100"},
                {value: 0, name: "Все"},
            ]
        },
        event: {
            type: String,
            default: '',
        },
        url: String,
        initialData: {
            type: Object,
            default: {},
        },
        data: {
            date: new Date(),
            type: Object,
            default: () => ({
                count: null,
                total: null,
                page: null,
                sort: null,
                order: null,
                limit: null,
                data: [],
                default: true,
            }),
        },
        onTransformData: Function,
    },
    data() {
        return this.getData();
    },
    mounted() {
        if (this.data.default) {
            this.filter();
        }
        /*window.Echo.private(`Notify.${this.$page.props.auth.user.id}`)
            .listen('.' + this.event + '.undeleted', (e) => this.filter())
            .listen('.' + this.event + '.deleted', (e) => this.filter())
            .listen('.' + this.event + '.created', (e) => this.filter())
            .listen('.' + this.event + '.updated', (e) => this.filter())*/
    },
    methods: {
        getData() {
            return {
                dataColumns: this.columns,
                preloader: false,
                selectedPage: 1,
                activeCountList: false,
                filterData: {},
                inputsFilterData: {},
                currentSort: this.data.sort,
                currentOrder: this.data.order,
                selectedLimit: this.data.limit && 1 * this.data.limit || this.data.limit,
                items: this.onTransformData && this.data.data && this.onTransformData(this.data.data) || this.data.data,
                totals: 1 * this.data.total,
                count: this.data.count && 1 * this.data.count || this.data.count,
                noResultsByDate: false
            }
        },
        sort(field) {
            if (this.currentSort === field) {
                this.currentOrder = this.currentOrder === 'asc' ? 'desc' : 'asc';
            } else {
                this.currentSort = field;
                this.currentOrder = 'asc';
            }
            this.filter()
        },
        filter() {
            let data = {
                ...this.initialData,
                ...this.filterData,
                limit: this.selectedLimit,
                page: this.selectedPage,
                sort: this.currentSort,
                order: this.currentOrder,
            }

            this.$emit('filtered', data)

            axios.get(route(this.url, data), {}).then((response) => {
                this.preloader = false;

                this.items = this.onTransformData && this.onTransformData(response.data.data.data) || response.data.data.data;
                this.currentOrder = response.data.data.order;
                this.currentSort = response.data.data.sort;
                this.selectedLimit = response.data.data.limit;
                if (response.data?.data?.columns) {
                    this.dataColumns = response.data.data.columns;
                }
                // this.selectedPage = response.data.data.page;
                this.totals = response.data.data.total;
                this.count = response.data.data.count;

                const dateFilter = document.querySelector('.dp__main input')
                if (dateFilter) {
                    this.noResultsByDate = dateFilter.value && this.count === 0;
                }
            }).catch(function (error) {
                console.log('Error', error);
            });
        },
        selectPage(page) {
            if (page == '...')
                return;
            this.selectedPage = page;
            this.filter()
        },
    },
    computed: {
        pages() {
            let res = [];
            if (this.selectedPage < 5) {
                for (let i = 1; i <= this.selectedPage + 1; i++) {
                    if (i > this.totals) break;
                    res.push(i);
                }
            } else {
                res.push(1);
                res.push('...');
                for (let i = this.selectedPage - 2; i <= this.selectedPage + 1; i++) {
                    if (i <= 0) continue;
                    if (i > this.totals) break;
                    res.push(i);
                }
            }
            if (this.totals - this.selectedPage >= 2) {
                if (this.totals - this.selectedPage > 2) {
                    res.push('...');
                }
                res.push(this.totals);
            }
            return res;
        },
    },
    watch: {
        filterData: {
            handler(newValue) {
                this.filter();
            },
            deep: true,
        },
    },
}
</script>
<script setup>
const dateFormat = (date) => {
    if (Array.isArray(date)) {
        const from = `${date[0].getFullYear()}.${date[0].getMonth() + 1}.${date[0].getDate()}`;
        const to = `${date[1].getFullYear()}.${date[1].getMonth() + 1}.${date[1].getDate()}`;
        return `${from} - ${to}`
    } else {
        return `${date.getFullYear()}.${date.getMonth() + 1}.${date.getDate()}`;
    }
}
</script>
