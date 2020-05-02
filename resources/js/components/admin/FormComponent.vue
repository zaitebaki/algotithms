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
        >
          <input
            type="hidden"
            name="_token"
            :value="csrf"
          >
          
          <div
            class="form-group"
          >
          <label
              class="text-success"
              for="groupSelect"
          >Выбрать группу</label>
          <select class="form-control" id="groupSelect">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          </div>

          <div
            class="form-group"
          >
            <label
              class="text-success"
              for="shortLink"
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
              for="urlInputTextarea"
            >Код алгоритма</label>
            <textarea
              id="codeTextArea"
              class="form-control"
              name="userUrl"
              rows="10"
              required
            />

            <small
              class="form-text text-danger"
            >Ошибка</small>
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
    // props: {
    //     data: {
    //         type: Object,
    //         required: true,
    //     },
    //     content: {
    //         type: Object,
    //         required: true
    //     },
    // },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content'),
        };
    },
    computed: {
    },
    mounted() {},
};
</script>