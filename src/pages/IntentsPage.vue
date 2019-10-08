<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <router-link :to="{name:'AddIntentPage'}" class="btn btn-primary float-right">Add New Intent</router-link>
        <h3>Intents</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Version</th>
              <th>Last Updated</th>
              <th>Created Date</th>
              <th>Details</th>
            </tr>
            <tr v-for="intent in intents" :key="intent.name">
              <td>{{intent.name}}</td>
              <td>{{intent.version}}</td>
              <td>{{intent.lastUpdatedDate}}</td>
              <td>{{intent.createdDate}}</td>
              <td><router-link :to="{name: 'IntentDetailsPage', params: {name: intent.name}}">Details</router-link></td>
            </tr>
          </thead>
        </table>
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
  name: 'IntentsPage',
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
