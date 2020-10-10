<template>
  <div>
    <div class="d-flex">
      <b-input-group :class="{invisible: !searchIn}">
        <b-form-input :lazy="true" v-model="searchValue" size="sm" @change="search"></b-form-input>
        <b-input-group-append>
          <b-button variant="outline-secondary" @click="search">{{ __('search') }}</b-button>
        </b-input-group-append>
      </b-input-group>
      <b-input-group v-if="params.per_page!==-1" style="width: 22em;">
        <b-input-group-prepend>
          <b-button variant="outline-secondary" :disabled="params.page<=1" @click="setPage(1)"><i class="fas fa-step-backward"></i></b-button>
          <b-button variant="outline-secondary" :disabled="params.page<=1" @click="setPage(params.page - 1)"><i class="fas fa-caret-left"></i></b-button>
        </b-input-group-prepend>
        <b-form-input v-model="page" :lazy="true" class="text-right" size="sm"></b-form-input>
        <b-input-group-append>
          <b-button variant="outline-secondary" disabled>/{{ meta.last_page }}</b-button>
          <b-button variant="outline-secondary" :disabled="params.page>=meta.last_page" @click="setPage(params.page + 1)"><i class="fas fa-caret-right"></i></b-button>
          <b-button variant="outline-secondary" :disabled="params.page>=meta.last_page" @click="setPage(meta.last_page)"><i class="fas fa-step-forward"></i></b-button>
        </b-input-group-append>
      </b-input-group>
    </div>
    <b-table :items="value" :fields="fields">
      <template v-slot:cell()="data">
        <slot v-if="hasSlot(`cell(${data.field.key})`)" :name="`cell(${data.field.key})`" v-bind="data" :update="update"></slot>
        <formulario-campo v-else-if="inline && data.item.edit"
          class="m-0"
          without-label
          :field="data.field"
          :value="data.item"
          :state="data.item.state"
          :feedback="feedback(data.item, data.field.key)"
        />
        <template v-else>
          {{ getValue(data.item, data.field.key) }}
        </template>
      </template>
      <template v-slot:cell(attributes.avatar)="data">
        <avatar style="font-size: 2em" :value="data.item.attributes.avatar" />
      </template>
      <template v-slot:head(actions)="">
        <div class="w-100 text-right">
          <slot name="toolbar"></slot>
          <b-button v-if="!readonly" variant="primary" @click="loadData"><i class="fas fa-sync"></i></b-button>
          <b-button v-if="!readonly" variant="primary" @click="nuevo"><i class="fas fa-plus"></i> {{ __('new') }}</b-button>
        </div>
      </template>
      <template v-slot:cell(actions)="data">
        <div class="w-100 text-right">
          <div class="btn-group text-nowrap" role="group">
            <slot name="actions" v-bind="data"></slot>
            <b-button v-if="!inline" variant="primary" @click="editar(data.item)"><i class="fas fa-pen"></i></b-button>
            <b-button v-else-if="!data.item.edit" variant="primary" @click="editarInline(data.item)"><i class="fas fa-pen"></i></b-button>
            <b-button v-else variant="primary" @click="guardarInline(data.item)"><i class="fas fa-save"></i></b-button>
            <b-button variant="danger" @click="eliminar(data.item)"><i class="fas fa-times"></i></b-button>
          </div>
        </div>
      </template>
    </b-table>
    <b-modal
      ref="modal"
      :title="title"
      @ok="guardar"
    >
      <formulario ref="formulario" :fields="formFieldsF" :value="registro" :api="api" />
      <template slot="modal-ok">
        <i class="fas fa-save"></i> Guardar
      </template>
      <template slot="modal-cancel">
        <i class="fas fa-window-close"></i> Cancelar
      </template>
    </b-modal>
  </div>
</template>

<script>
import { get, set, cloneDeep } from 'lodash';

const nuevoRegistro = {
  id: null,
  attributes: {},
};
const nuevoRegistroInline = {
  id: null,
  edit: true,
  state: null,
  error: '',
  errors: {},
  attributes: {},
};
export default {
  mixins: [window.ResourceMixin],
  props: {
    inline: {
      type: Boolean,
      default: false,
    },
    params: {
      type: Object,
      default() {
        return {
          page: 1,
          per_page: 25,
          meta: "pagination",
        };
      },
    },
    searchIn: Array,
    fields: Array,
    formFields: Array,
    api: Object,
    title: String,
    readonly: Boolean,
  },
  computed: {
    formFieldsF() {
      return this.formFields.filter(field => {
        return (!this.registro.id && (field.create)) || 
          (this.registro.id && (field.edit));
      });
    }
  },
  data() {
    return {
      searchValue: '',
      value: [],
      meta: {
        total: 0,
        last_page: 0,
      },
      page: this.params.page || 1,
      registro: cloneDeep(nuevoRegistro),
      error: '',
    };
  },
  methods: {
    update(row) {
      this.api.save(row).catch(res => {
        this.error = res.response.data.message;
      }).then(() => {
        this.loadData();
      });
    },
    hasSlot(name) {
      return !!this.$scopedSlots[name];
    },
    search() {
      if (this.searchIn) {
        const filter = `whereAjaxFilter,${JSON.stringify(this.searchValue)},${this.searchIn.join(',')}`;
        if (this.params.filter === undefined) {
          this.params.filter = [];
        }
        const index = this.params.filter.findIndex(filter => filter.substr(0, 16) === 'whereAjaxFilter,');
        if (index === -1) {
          this.params.filter.push(filter);
        } else {
          this.params.filter[index] = filter;
        }
        this.setPage(1);
      }
    },
    setPage(page) {
      this.params.page = page;
      this.loadData();
    },
    eliminar(registro) {
      this.$bvModal.msgBoxConfirm(this.__('Are you sure to delete this item?'), {
        title: this.__('Delete confirmation'),
        size: 'sm',
        buttonSize: 'sm',
        okVariant: 'danger',
        okTitle: this.__('yes'),
        cancelTitle: this.__('no'),
        hideHeaderClose: false,
        centered: true
      })
      .then(value => {
        if (value) {
          this.api.delete(registro).then(() => {
            this.loadData();
          }).catch(res => {
            alert(res.response.data.message);
          });
        }
      });
    },
    editar(registro) {
      this.error = '';
      this.registro = registro;
      this.$refs.modal.show();
    },
    updateAvatar(avatar) {
      this.registro.attributes.avatar = avatar;
    },
    guardar(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.$refs.formulario.guardar().then(() => {
        this.$refs.modal.hide();
        this.loadData();
      });
    },
    feedback(row, key) {
      const errors = row.errors;
      return (errors[key] || []).join('. ');
    },
    loadErrors(row, errors) {
      const loaded = {};
      if (errors) {
        for(let e in errors) {
          const a = `attributes.${e}`;
          loaded[a] = errors[e];
        }
      }
      this.$set(row, 'errors', loaded);
    },
    editarInline(row) {
      this.$set(row, 'edit', true);
      this.$set(row, 'state', null);
      this.$set(row, 'error', '');
      this.$set(row, 'errors', {});
    },
    guardarInline(row) {
      row.state = null;
      if (row.id) {
        this.api.save(row).then((res) => {
          row.state = true;
          row.edit = false;
          this.api.refresh(row).then(() => {
            this.$emit('change');
          });
        }).catch(res => {
          row.error = res.response.data.message;
          this.loadErrors(row, res.response.data.errors);
          row.state = false;
        });
      } else {
        this.api.post(row).then((res) => {
          row.state = true;
          row.edit = false;
          this.$emit('change');
        }).catch(res => {
          row.error = res.response.data.message;
          this.loadErrors(row, res.response.data.errors);
          row.state = false;
        });
      }
    },
    getValue(object, key) {
      return get(object, key);
    },
    setValue(object, key, event) {
      set(object, key, event.target.value);
    },
    nuevo() {
      this.error = '';
      if (this.inline) {
        this.value.push(cloneDeep(nuevoRegistroInline));
      } else {
        this.registro = cloneDeep(nuevoRegistro);
        this.$refs.modal.show();
      }
    },
    loadData() {
      this.api.index(this.params, this.value).then(response => {
        this.meta = response.data.meta;
        this.value.forEach(row => {
          this.$set(row, 'edit', false);
          // Agrega los campos extra que no son parte de attributes o relationships o id o $type
          this.fields.forEach(field => {
            if (field.extra) {
              this.$set(row, field.key, field.default ||  null);
            }
          });
        });
      });
    },
  },
  mounted() {
    this.loadData(); 
  },
  watch: {
    page(page) {
      this.setPage(page);
    }
  },
}
</script>

<style>

</style>