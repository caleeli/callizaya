<template>
  <panel class="panel-secondary">
    <template slot="header">
      <title-bar /> <i class="fas fa-user-tie"></i> {{ __('Roles') }}
    </template>
    <template slot="actions">
      <nav-bar />
    </template>
    <b-tabs v-model="tab" card>
      <b-tab v-for="role in roles"
        :key="`role-${role.id}`"
        :title="role.attributes.role"
      >
        <role :role="role" />
      </b-tab>
      <!--template slot="tabs-end">
        <div class="flex-grow-1 text-right">
          <b-button variant="primary"><i class="fa fa-plus"></i> {{ __('Role') }}</b-button>
        </div>
      </template -->
    </b-tabs>
  </panel>
</template>

<script>
export default {
  path: "/roles",
  mixins: [window.ResourceMixin],
  data() {
    return {
      tab: 0,
      roles: this.$api.roles.array({per_page: -1}),
    };
  },
  methods: {
  },
};
</script>

<style scoped>
</style>
