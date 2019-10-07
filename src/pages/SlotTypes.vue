<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-md-6">
        <div v-for="bot in bots">
          {{bot}}
        </div>
        <div>{{bot}}</div>
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
      bots: [],
      bot: {}
    }
  },
  name: 'MainMenu',
  methods: {
     getBots: async function () {
      const result = await DataService.getResource({resource: 'slot-types'})
      return result
    },
    getBot: async function () {
      const result = await DataService.getResource({resource: 'bots', name: 'OnlineVCU'})
      return result
    }
  },
  created: async function () {
    console.log('this is created');
    const bots = await this.getBots()
    const bot = await this.getBot()
    this.bot = bot
    this.bots = bots
    console.log(bots)
  }
})
</script>

<style>

</style>
