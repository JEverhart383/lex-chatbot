<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>{{bot.name}} <span class="badge badge-pill" :class="bot.status === 'NOT_BUILT' ? 'badge-danger' : 'badge-success' ">{{bot.status}}</span></h3>
        <div>
          <h4>Everything Else</h4>
          <!-- {{bot}} -->
        </div>
        <div>
          <h4>Intents</h4>
            <ul class="list-group">
              <li class="list-group-item" v-for="intent in bot.intents" :key="intent.intentName">
                {{intent.intentName}} | {{intent.intentVersion}}
              </li>
            </ul>
        </div>
        <div>
          <h4>Clarification Prompt</h4>
          {{bot.clarificationPrompt}}
        </div>
        <div>
          <h4>Abort Statement</h4>
          {{bot.abortStatement}}
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
      const result = await DataService.getResource({resource: 'bots', name: this.$route.params.name})
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
