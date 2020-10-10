<template>
  <panel :name="__('Users')" class="panel-secondary">
    <template slot="header">
      <title-bar /> <i class="fa fa-users"></i> {{ __('Users') }}
    </template>
    <template slot="actions">
      <nav-bar />
    </template>
    <tabla :fields="fields" :form-fields="formFields" :api="api" :title="__('User')"
      :search-in="['attributes.name', 'attributes.email']"
    >
      <template v-slot:actions="data">
        <b-button @click="editar(data.item)" variant="info"><i class="fas fa-key"></i></b-button>
      </template>
    </tabla>
    <modal-form id="changePassword"
      @ok="guardar"
      title="Cambiar contraseña"
      v-model="user"
      :fields="changePasswordFields"
      :api="api"
      ref="formulario"
    >
    </modal-form>
  </panel>
</template>

<script>
export default {
  name: "Usuarios",
  path: "/users",
  mixins: [window.ResourceMixin],
  data() {
    return {
      user: {},
      api: this.$api.user,
      fields: [
        {key:'id', label: 'id'},
        {key:'attributes.avatar', label: ''},
        {key:'attributes.name', label: 'Nombre'},
        {key:'attributes.email', type: 'email', label: 'Correo'},
        {key:'attributes.role', label: 'Rol'},
        {key:'actions', label: ''},
      ],
      formFields: [
        {key:'attributes.avatar', label: '', create: true, edit: true },
        {key:'attributes.name', label: 'Nombre', create: true, edit: true },
        {key:'attributes.email', label: 'Correo', type: 'email', create: true, edit: true },
        {key:'attributes.password', label: 'Contraseña', type: 'password', create: true, edit: false },
        {key:'attributes.role', label: 'Rol', create: true, edit: true, component: 'b-select', properties: {
            options: ["admin", "operator"]
          }
        },
      ],
      changePasswordFields: [
        {key:'attributes.password', label: 'Contraseña', type: 'password' },
        {key:'confirm_password', label: 'Confirmar contraseña', type: 'password' },
      ],
    };
  },
  methods: {
    editar(user) {
      this.user = user;
      this.$refs.formulario.show();
    },
    guardar(event) {
      if (this.user.confirm_password !== this.user.attributes.password) {
        this.$refs.formulario.error = this.__('Password and confirm password does not match');
        event.preventDefault();
      } else {
        this.$refs.formulario.save();
      }
    },
  },
};
</script>

<style scoped>
</style>
