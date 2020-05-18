<template>
  <div>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
      <div
        id="navbarNavAltMarkup"
        class="collapse navbar-collapse"
      >
        <div class="navbar-nav">
          <a
            class="nav-item nav-link"
            :href="addAlgorithmRoute"
          >Добавить алгоритм</a>
          <a
            class="nav-item nav-link"
            :href="addGroupRoute"
          >Добавить группу</a>
          <a
            class="nav-item nav-link"
            :href="addLanguageRoute"
          >Добавить язык</a>
          <div />
        </div>
      </div>
      <form class="form-inline">
        <div class="col-auto my-1">
          <div class="custom-control custom-checkbox mr-sm-2">
            <input
              id="customControlAutosizing"
              type="checkbox"
              class="custom-control-input"
              style="cursor: pointer"
              v-model="checkedAdmin"
            >s
            <label
              class="custom-control-label"
              style="color: white; cursor: pointer"
              for="customControlAutosizing"
            >Управление</label>
          </div>
        </div>
      </form>
    </nav>
  </div>
</template>

<script>
export default {
    props: {
    addAlgorithmRoute: {
      type: String,
      default: '',
    },
    addGroupRoute: {
      type: String,
      default: '',
    },
    addLanguageRoute: {
      type: String,
      default: '',
    },
  },
};
</script>
<style scoped></style>
