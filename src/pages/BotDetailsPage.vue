<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>Bots</h3>
        <div>
          {{bot}}
        </div>
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
      bot: {}
    }
  },
  name: 'BotDetailsPage',
  methods: {
    getBot: async function () {
      const result = await DataService.getResource({resource: 'bots', name: 'OnlineVCU'})
      return result
    }
  },
  created: async function () {
    console.log('this is created');
    const bot = await this.getBot()
    this.bot = bot
  }
})
</script>

<style>

</style>
