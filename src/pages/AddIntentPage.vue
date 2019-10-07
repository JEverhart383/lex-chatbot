<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>Add Intent</h3>
      </div>
  </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
import { DataService } from '../utilities/data-service'
export default Vue.extend({
  data () {
    return {
      intents: []
    }
  },
  name: 'AddIntentPage',
  methods: {
     getIntents: async function () {
      const result = await DataService.getResource({resource: 'intents'})
      return result
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
