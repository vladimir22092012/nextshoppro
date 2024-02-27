<template>
    <div class="products-view">
        <!--                        <div class="products-view__options">
                                    <div class="view-options">
                                        <div class="view-options__layout">
                                            <div class="layout-switcher">
                                                <div class="layout-switcher__list">
                                                    <button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button&#45;&#45;active">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#layout-grid-16x16"></use>
                                                        </svg>
                                                    </button>
                                                    <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#layout-grid-with-details-16x16"></use>
                                                        </svg>
                                                    </button>
                                                    <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#layout-list-16x16"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="view-options__legend">Showing 6 of 98 products</div>
                                        <div class="view-options__divider"></div>
                                        <div class="view-options__control">
                                            <label for="">Sort By</label>
                                            <div>
                                                <select class="form-control form-control-sm" name="" id="">
                                                    <option value="">Default</option>
                                                    <option value="">Name (A-Z)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="view-options__control">
                                            <label for="">Show</label>
                                            <div>
                                                <select class="form-control form-control-sm" name="" id="">
                                                    <option value="">12</option>
                                                    <option value="">24</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
        <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false">
            <div class="products-list__body">
                <div v-for="(item, index) in items" class="products-list__item">
                    <div class="product-card">
                        <button class="product-card__quickview" type="button">
                            <svg width="16px" height="16px">
                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                            </svg> <span class="fake-svg-icon"></span></button>
                        <!--<div class="product-card__badges-list">
                            <div class="product-card__badge product-card__badge&#45;&#45;new">New</div>
                        </div>-->
                        <div class="product-card__image">
                            <Link :href="route('product', item.id)"><img src="https://nextshop.pro/wa-data/public/shop/products/02/webp/24/00/24/images/13408/13408.253.webp" alt=""></Link>
                        </div>
                        <div class="product-card__info">
                            <div class="product-card__name"><Link :href="route('product', item.id)">{{item.name}}</Link></div>
                        </div>
                        <div class="product-card__actions">
                            <div class="product-card__availability">Наличие: <span class="text-success">На складе</span></div>
                            <div class="product-card__prices">{{item.price}}</div>
                            <div class="product-card__buttons">
                                <button class="btn btn-primary product-card__addtocart" type="button">Добавить в корзину</button>
                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Добавить в корзину</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="pagination" class="products-view__pagination">
            <ul v-if="totals>1" class="pagination justify-content-center">
                <li :class="{'page-item previous page-pre': true, 'disabled': selectedPage == 1}">
                    <a @click.prevent="selectedPage>1?selectedPage--:selectedPage;filter()"
                       class="page-link">‹</a>
                </li>
                <li v-for="page in pages"
                    :class="{'page-item': true, 'active': page == selectedPage}">
                    <a @click.prevent="selectPage(page)" class="page-link">{{ page }}</a>
                </li>
                <li :class="{'page-item next page-next': true, 'disabled': selectedPage == totals}">
                    <a @click.prevent="selectedPage<totals?selectedPage++:selectedPage;filter()"
                       class="page-link">›</a>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import {router} from "@inertiajs/vue3";
import { Link } from '@inertiajs/vue3'


export default {
    components: {
        Link,
    },
    props: {
        pagination: {
            type: Boolean,
            default: true
        },
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
        event: String,
        url: String,
        viewRoute: String,
        start_cat_id: Number,
        q: String,
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
            if (this.start_cat_id !== null || this.q !== null) {
                this.filterData.category_id = this.start_cat_id;
                this.filterData.query = this.q;
            } else {
                this.filter();
            }
        }
    },
    methods: {
        router() {
            return router
        },
        getData() {
            return {
                dataColumns: this.columns,
                preloader: true,
                selectedPage: 1,
                activeCountList: false,
                filterData: {},
                inputsFilterData: {},
                currentSort: this.data.sort,
                multipleSortFields: ['id'],
                currentOrder: this.data.order,
                multipleOrderBy: [{ 'field': 'id', 'orderBy': 'desc'}],
                selectedLimit: this.data.limit && 1 * this.data.limit || this.data.limit,
                // selectedPage: this.data.page && 1 * this.data.page || this.data.page,
                items: this.onTransformData && this.data.data && this.onTransformData(this.data.data) || this.data.data,
                totals: 1 * this.data.total,
                count: this.data.count && 1 * this.data.count || this.data.count,
                noResultsByDate: false,
                resetFiltersValue: false
            }
        },
        sort(field) {
            if (this.multipleSort) {
                this.doMultipleSort(field)
            } else {
                this.doRegularSort(field)
            }

            this.filter()
        },
        filter() {
            let data = {
                ...this.initialData,
                ...this.filterData,
                limit: this.selectedLimit,
                page: this.selectedPage,
                sort: this.multipleSort ? this.multipleSortFields : this.currentSort,
                order: this.multipleSort ? this.multipleOrderBy : this.currentOrder,
                resetFilters: this.resetFiltersValue
            }

            this.$emit('filtered', data)

            axios.get(route(this.url, data), {}).then((response) => {
                this.preloader = false;

                this.items = this.onTransformData && this.onTransformData(response.data.data.data) || response.data.data.data;

                /** Получаем сортировку и записываем её в разные переменные в зависимости от параметра multipleSort */
                if (this.multipleSort) {
                    this.multipleOrderBy = response.data.data.order;
                    this.multipleSortFields = response.data.data.sort;
                } else {
                    this.currentOrder = response.data.data.order;
                    this.currentSort = response.data.data.sort;
                }

                this.selectedLimit = response.data.data.limit;
                if (response.data?.data?.columns) {
                    this.dataColumns = response.data.data.columns;
                }

                this.totals = response.data.data.total;
                this.count = response.data.data.count;
                this.resetFiltersValue = false;

                const dateFilter = document.querySelector('.dp__main input')
                if (dateFilter) {
                    this.noResultsByDate = dateFilter.value && this.count === 0;
                }

                this.$emit('compareCheckedContractsWithStorage',{items: this.items});

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
        getSelectedValue(column,item){

            let value = column.options.find(x => x.name === item[column.field]) ? column.options.find(x => x.name === item[column.field]).value : null;

            if(!value){
                value = item[column.field];
            }

            return value;
        },
        resetFilters() {
            this.multipleSortFields = ['id'];
            this.multipleOrderBy = [
                { 'field': 'id', 'orderBy': 'desc'}
            ];
            this.filterData = {};
            this.inputsFilterData = {};
            this.currentSort = this.data.sort
            this.currentOrder = this.data.order
            this.resetFiltersValue = true
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
                this.preloader = true;

                this.filter();
            },
            deep: true,
        },
    },
}
</script>
