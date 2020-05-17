<template>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-8 py-5">
        <h1 class="font-weight-bold">
          Добавить алгоритм
        </h1>
        <hr>
        <form
          id="editForm"
          method="post"
          :action="propsData.addAlgorithmRoute"
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
              for="groupSelect"
            >Выбрать группу</label>

            <select
              id="groupSelect"
              class="form-control"
              name="groupId"
            >
              <option
                v-for="group in propsData.groups"
                :key="group.id"
                :value="group.id"
              >
                {{ group.name }}
              </option>
            </select>
          </div>

          <div class="form-group">
            <label
              class="text-primary"
              for="groupSelect"
            >Выбрать язык</label>

            <select
              id="languageSelect"
              class="form-control"
              name="languageId"
            >
              <option
                v-for="language in propsData.languages"
                :key="language.id"
                :value="language.id"
              >
                {{ language.name }}
              </option>
            </select>
          </div>

          <div class="form-group">
            <label
              class="text-primary"
              for="nameAlgorithm"
            >
              Название алгоритма</label>
            <input
              id="nameAlgorithm"
              type="text"
              class="form-control"
              name="nameAlgorithm"
              value=""
            >
          </div>

          <div class="form-group">
            <label
              for="codeTextArea"
              class="text-primary"
            >Код алгоритма</label>
            <textarea
              id="codeTextArea"
              class="text-monospace form-control"
              name="codeTextArea"
              rows="15"
            />
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
