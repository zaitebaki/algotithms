<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-8 py-5">
        <h1 class="font-weight-bold">
          Добавить язык
        </h1>
        <hr>
        <form
          id="addLanguageForm"
          method="post"
          :action="propsData.addLanguageRoute"
        >
          <input
            type="hidden"
            name="_token"
            :value="csrf"
          >
          <div
            class="form-group"
          >
            <div v-if="propsData.errors">
              <small
                v-for="(error, index) in propsData.errors"
                :key="index"
                class="form-text text-danger"
              >{{ error }}</small>
            </div>
            <div>
              <small
                v-if="propsData.status"
                class="form-text text-success"
              >{{ propsData.status }}</small>
            </div>
          </div>

          <div class="form-group">
            <label
              class="text-primary"
              for="nameLanguage"
            >
              Название языка</label>
            <input
              id="nameLanguage"
              type="text"
              class="form-control"
              name="nameLanguage"
              value=""
            >
          </div>

          <div class="form-group">
            <label
              class="text-primary"
              for="nameLanguage"
            >
              Идентификатор в Github</label>
            <input
              id="keyword"
              type="text"
              class="form-control"
              name="keyword"
              value=""
            >
          </div>

          <button
            type="submit"
            class="btn btn-primary"
          >
            Добавить
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    propsData: {
      type: Object,
      default: () => [],
    },
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content'),
    };
  },
  computed: {},
  mounted() {
  },
};
</script>
