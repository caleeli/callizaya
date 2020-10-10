<template>
  <panel
    name="Console"
    icon="fa fa-user"
    class="panel-success"
    :actions="actions"
    @close="completeTask({})"
  >
    <pre>{{log}}</pre>
  </panel>
</template>

<script>
export default {
  path: "/sample/console",
  mixins: [window.workflowMixin],
  data() {
    return {
      actions: {
        close: {
          name: "",
          icon: "fas fa-times"
        }
      },
      log: ""
    };
  },
  watch: {
    "$route.query": {
      immediate: true,
      deep: true,
      handler() {
        this.cleanSocketListeners();
        this.listenConsole(log => {
          window.axios
            .get(log.url, { baseURL: "/" })
            .then(response => (this.log = response.data));
        });
      }
    }
  }
};
</script>
