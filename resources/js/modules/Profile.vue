<template>
  <panel class="panel-secondary">
    <template slot="header">
      <title-bar /> <i class="fa fa-users"></i> {{ __('User') }}
    </template>
    <template slot="actions">
      <nav-bar />
    </template>
    <formulario ref="form" :value="$root.user" :fields="fields" :api="$api.user" />
    <b-button variant="primary" @click="$refs.form.guardar()">
      <i class="fas fa-save"></i> Guardar
    </b-button>
  </panel>
</template>

<script>
export default {
  path: "/profile",
  mixins: [window.ResourceMixin],
  data() {
    return {
      api: this.$api.user,
      usuarios: this.$api.user.array({pre_page:1000}),
      fields: [
        {key:'attributes.avatar', label: '', create: true, edit: true },
        {key:'attributes.name', label: 'Nombre', create: true, edit: true },
        {key:'attributes.email', label: 'Correo', create: true, edit: true },
        {key:'attributes.password', label: 'Contraseña', create: true, edit: true, type: 'password' },
      ],
    };
  },
};
</script>

<style scoped>
</style>
