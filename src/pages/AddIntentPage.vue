<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>Add Intent</h3>
        <intent-form action="create" v-on:submit-intent="handleSubmitIntent"></intent-form>
      </div>
  </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
import { DataService } from '../utilities/data-service'
import IntentForm from '../components/forms/IntentForm.vue'
export default Vue.extend({
  data () {
    return {
      intents: []
    }
  },
  components: {
    IntentForm
  },
  name: 'AddIntentPage',
  methods: {
     getIntents: async function () {
      const result = await DataService.getResource({resource: 'intents'})
      return result
    },
    handleSubmitIntent($event: any){
      console.log($event);
    }
  },
  created: async function () {
    const intents = await this.getIntents()
    this.intents = intents
  }
})
</script>

<style>

</style>
