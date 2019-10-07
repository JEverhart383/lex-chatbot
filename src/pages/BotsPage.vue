<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>Bots</h3>
                <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Version</th>
              <th>Last Updated</th>
              <th>Created</th>
              <th>Version</th>
              <th>Details</th>
            </tr>
            <tr v-for="bot in bots" :key="bot.name">
              <td>{{bot.name}}</td>
              <td>{{bot.status}}</td>
              <td>{{bot.lastUpdatedDate}}</td>
              <td>{{bot.createdDate}}</td>
              <td>{{bot.version}}</td>
              <td><router-link :to="{name: 'BotDetailsPage', params: {name: bot.name}}">Details</router-link></td>
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
      bots: []
    }
  },
  name: 'BotsPage',
  methods: {
     getBots: async function () {
      const result = await DataService.getResource({resource: 'bots'})
      return result
    }
  },
  created: async function () {
    console.log('this is created');
    const bots = await this.getBots()
    this.bots = bots
    console.log(bots)
  }
})
</script>

<style>

</style>
