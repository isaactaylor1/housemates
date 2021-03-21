<template>
  <div class="bg-light">
    <div class="row">
      <div class="col my-auto">
        <div class="pl-3 text-muted">
          <small>
            Page {{ datatable.current_page }} of
            {{ datatable.last_page }}
          </small>
        </div>
      </div>
      <div class="col-auto" v-show="datatable.last_page > 1">
        <div class="row">
          <div class="col-auto">
            <div class="pl-3 pt-3 text-muted pb-2">
              <small>Go To:</small>
            </div>
          </div>
          <div class="col">
            <select
              class="form-control mt-2"
              name="jump-to"
              v-model="datatable.current_page"
              v-on:change="changePage(datatable.current_page)"
            >
              <option v-for="i in datatable.last_page" :key="i" :value="i">{{ i }}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-auto" v-show="datatable.total > 1">
        <div
          class="dataTables_paginate paging_full_numbers mt-2 px-2"
          id="DataTables_Table_2_paginate"
        >
          <ul class="pagination mb-2">
            <li class="paginate_button page-item">
              <a class="page-link" v-on:click.prevent="changePage(datatable.current_page - 1)">
                <i class="fas fa-arrow-left"></i>
              </a>
            </li>
            <li class="paginate_button page-item">
              <a class="page-link" v-on:click.prevent="
				changePage(datatable.current_page + 1)">
                <i class="fas fa-arrow-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    datatable: function() {
      return this.$parent.datatable || {};
    }
  },
  methods: {
    changePage(page) {
      this.$parent.changePage(page);
    }
  }
};
</script>
