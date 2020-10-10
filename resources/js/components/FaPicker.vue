<template>
<div>
  <vfa-picker v-model="local">
    <template v-slot:activator="{ on }">
      <div class="form-control" @click="on">
        {{ local }} <i :class="`${base}${local}`"></i>
      </div>
    </template>
  </vfa-picker>
</div>
</template>

<script>

const base = 'fa fa-';

export default {
  props: {
    value: null
  },
  data () {
    return {
      base,
      local: '',
    };
  },
  methods: {
    select(icon) {
      this.$emit('update', icon);
    },
  },
  watch: {
    local(value) {
      this.$emit('update', `${base}${value}`);
      this.$emit('input', `${base}${value}`);
      this.$emit('change', `${base}${value}`);
    },
    value: {
      immediate: true,
      handler(value) {
        if (this.value && base + this.local !== this.value) {
          this.local = this.value.replace(/^fa.? fa-/, '');
        }
      }
    },
  },
}
</script>

<style>

</style>