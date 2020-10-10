<template>
  <div>
    <tabla :fields="fields" :form-fields="formFields" :api="api" :title="__('Role')"
      :search-in="['attributes.name']"
    >
      <template v-slot:cell(attributes.icon)="data">
        <i :class="data.item.attributes.icon"></i>
      </template>
    </tabla>
  </div>
</template>

<script>
export default {
  props: {
    role: Object,
  },
  mixins: [window.ResourceMixin],
  data() {
    return {
      user: {},
      api: this.$api[`role/${this.role.id}/menus`],
      fields: [
        {key:'attributes.code', label: 'Code'},
        {key:'attributes.name', label: 'Nombre'},
        {key:'attributes.icon', label: 'Icono' },
        {key:'actions', label: ''},
      ],
      formFields: [
        {key:'attributes.code', label: 'Code', create: true, edit: true },
        {key:'attributes.name', label: 'Nombre', create: true, edit: true },
        {key:'attributes.icon', label: 'Icono', create: true, edit: true, component: 'fa-picker' },
      ],
    };
  },
  methods: {
  },
};
</script>
