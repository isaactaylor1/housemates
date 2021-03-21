<template>
  <div class="row" v-if="!loaded || datatable.total == 0">
    <div class="col js-appear-enabled animated fadeIn" data-toggle="appear">
      <a class="block block-rounded" href="javascript:void(0)">
        <div
          class="block-content block-content-full d-flex align-items-center justify-content-between"
        >
          <div class="mx-auto">
            <div class="container">
              <div class="row h-100">
                <div class="col-sm-12 my-auto">
                  <div class="spinner-border m-5" role="status" v-if="!loaded">
                    <span class="sr-only">Loading...</span>
                  </div>
                  <h4
                    class="text-center text-gray mt-3"
                    v-if="datatable.total == 0 && loaded"
                  >No records found.</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    datatable: function() {
      return this.$parent.datatable || {};
    },
    loaded: function() {
      return this.$parent.loaded || false;
    }
  }
};
</script>
