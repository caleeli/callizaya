<template>
  <div v-if="field.key==='attributes.avatar'">
    <avatar v-model="value.attributes.avatar" style="font-size: 3em"></avatar>
    <div class="form-group">
      <div class="d-inline-block">
        <upload v-model="value.attributes.avatar" @change="updateAvatar">
          <button type="button" class="btn btn-primary">Cambiar imagen</button>
        </upload>
      </div>
    </div>
  </div>
  <b-form-group
    v-else-if="field.component"
    :label="withoutLabel ? '': field.label"
    label-size="sm"
    :state="state"
    :invalid-feedback="feedback"
  >
    <component :is="field.component" v-bind="field.properties" :value="getValue(value, field.key)" @change="setValue(value, field.key, $event)" />
  </b-form-group>
  <b-form-group
    v-else
    :label="withoutLabel ? '': field.label"
    label-size="sm"
    :state="state"
    :invalid-feedback="feedback"
  >
    <b-form-input class="form-control" :type="field.type || 'text'" :value="getValue(value, field.key)" @change="setValue(value, field.key, $event)" />
  </b-form-group>
</template>

<script>
import { get, set } from 'lodash';

export default {
  props: {
    field: Object,
    value: Object,
    state: Boolean,
    feedback: String,
    withoutLabel: Boolean,
  },
  methods: {
    updateAvatar(avatar) {
      this.value.attributes.avatar = avatar;
    },
    getValue(object, key) {
      return get(object, key);
    },
    setValue(object, key, value) {
      set(object, key, value);
    },
    setInputValue(object, key, event) {
      set(object, key, event.target.value);
    },
  },
}
</script>

<style>

</style>