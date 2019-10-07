<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <h3>Intent Details</h3>

        <h4>{{intent.name}}</h4>
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
     getIntents: async function () {
      const result = await DataService.getResource({resource: 'intents', name: this.$route.params.name})
      return result
    }
  },
  created: async function () {
    const intent = await this.getIntents()
    this.intent = intent
  }
})
</script>

<style>

</style>
