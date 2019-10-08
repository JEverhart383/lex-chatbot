<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>Edit Intent</h3>
        <intent-form action="edit" :intentToEdit="$route.params.name" v-on:submit-intent="handleSubmitIntent"></intent-form>
      </div>
  </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
import { DataService } from '../utilities/data-service'
import IntentForm from '../components/IntentForm.vue'
export default Vue.extend({
  data () {
    return {
      intentToEdit: {}
    }
  },
  components: {
    IntentForm
  },
  name: 'EditIntentPage',
  methods: {
    getIntent: async function () {
      const result = await DataService.getResource({resource: 'intents', name: this.$route.params.name})
      return result
    },
    handleSubmitIntent($event: any){
      console.log($event);
    }
  },
  created: async function () {
    const intent = await this.getIntent()
    this.intentToEdit = intent
  }
})
</script>

<style>

</style>
