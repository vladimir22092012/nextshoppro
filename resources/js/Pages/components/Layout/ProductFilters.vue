<template>
    <div class="block-sidebar__item">
        <div class="widget-filters widget" data-collapse data-collapse-opened-class="filter--opened">
            <h4 class="widget__title">Фильтр товаров</h4>
          <div class="widget-filters__item">
            <div class="filter filter--opened" data-collapse-item="">
              <button type="button" class="filter__title" data-collapse-trigger="">Цена
                <svg class="filter__arrow" width="12px" height="7px">
                  <use xlink:href="/images/sprite.svg#arrow-rounded-down-12x7"></use>
                </svg>
              </button>
              <div class="filter__body" data-collapse-content="">
                <div class="filter__container">
                  <div class="filter-price">
                    <div ref="filter-price__slider" class="filter-price__slider noUi-target noUi-ltr noUi-horizontal">
                    </div>
                    <div class="filter-price__title">Цена: <span class="filter-price__min-value">{{filters.priceRange.min}}</span> Руб. – <span class="filter-price__max-value">{{filters.priceRange.max}}</span> Руб.</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="widget-filters__actions d-flex">
                <button @click="filter" class="btn btn-primary btn-sm">Выбрать</button>
                <button @click="clearFilter" class="btn btn-secondary btn-sm ml-2">Сбросить</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  components: {},
  props: {
    dataFilters: {}
  },
  data() {
    return {
      filters: {
        ...this.dataFilters,
        priceRange: {
          min: 0,
          max: 30000
        }
      },
      clearFilters: {},
    }
  },
  mounted() {
    this.clearFilters = this.filters;
    this.initUiSlider();
  },
  methods: {
    initUiSlider() {
      let that = this;
      noUiSlider.create(this.$refs['filter-price__slider'], {
        start: [0, 1000],
        connect: true,
        range: {
          'min': that.filters.priceRange.min,
          'max': that.filters.priceRange.max,
        }
      });

      this.$refs['filter-price__slider'].noUiSlider.on('update', function (values, handle) {
        that.filters.priceRange.min = values[0];
        that.filters.priceRange.max = values[1];
      });
    },
    filter() {
      this.$emit('start-filter', this.filters)
    },
    clearFilter() {
      this.$emit('start-filter', this.filters)
    },
  }
}
</script>
