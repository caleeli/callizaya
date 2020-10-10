<template>
  <b-modal
    :id="uid"
    @ok="$emit('ok', $event)"
    @cancel="$emit('cancel', $event)"
    :title="title"
  >
    <formulario ref="formulario" :value="value" :fields="fields" :api="api">
    </formulario>
    <template slot="modal-ok">
      <i class="fas fa-save"></i> {{ __('Save') }}
    </template>
    <template slot="modal-cancel">
      <i class="fas fa-window-close"></i> {{ __('Cancel') }}
    </template>
  </b-modal>
</template>

<script>
import { uniqueid } from 'lodash';

export default {
  props: {
    value: Object,
    api: Object,
    fields: Array,
    title: String,
  },
  computed: {
    error: {
      get() {
        return this.$refs.formulario.error;
      },
      set(error) {
        this.$refs.formulario.error = error;
      },
    },
  },
  data() {
    return {
      uid: uniqueid(),
    };
  },
  methods: {
    save() {
      this.$refs.formulario.guardar();
    },
    show() {
      this.$bvModal.show(this.uid);
    },
  },
}
</script>

<style>

</style>