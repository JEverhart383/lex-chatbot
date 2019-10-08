<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <router-link :to="{name:'EditIntentPage', params: {name: $route.params.name}}" class="btn btn-primary float-right">Edit Intent</router-link>
        <h3>Intent Details</h3>
        <div class="card">
          <div class="card-body">
            <h4>{{intent.name}}</h4>
            <p>Version: {{intent.version}}</p>
            <p>Last Updated: {{intent.lastUpdatedDate}}</p>
            <p>Created: {{intent.createdDate}}</p>
            <p v-if="intent.fulfillmentActivity">Fullfillment Activity: {{intent.fulfillmentActivity.type}}</p>
          </div>
        </div>
        <utterances :utterances="intent.sampleUtterances"></utterances>
        <statement title="Confirmation Prompt" :statement="intent.confirmationPrompt"></statement>
        <statement title="Rejection Statement" :statement="intent.rejectionStatement"></statement>
        <statement title="Conclusion Statement" :statement="intent.conclusionStatement"></statement>
        {{intent}}
      </div>
  </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
import { DataService } from '../utilities/data-service'
import Statement from '../components/Statement.vue'
import Utterances from '../components/Utterances.vue'
export default Vue.extend({
  data () {
    return {
      intent: {}
    }
  },
  components: {
    Statement,
    Utterances
  },
  name: 'IntentsPage',
  methods: {
     getIntent: async function () {
      const result = await DataService.getResource({resource: 'intents', name: this.$route.params.name})
      return result
    }
  },
  created: async function () {
    const intent = await this.getIntent()
    this.intent = intent
  }
})
</script>

<style>

</style>
