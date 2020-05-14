<template>
  <form>
    <div class="form-group">
      <label for="IntentName">Intent Name</label>
      <input :disabled="action === 'edit'" type="text" name="IntentName" id="IntentName" class="form-control" v-model="intent.name">
      <small v-if="action !== 'edit'" class="form-text text-muted">Intent names cannot contain spaces, numbers, or special characters</small>
      <small v-if="action === 'edit'" class="form-text text-muted">Intent names cannot be changed since they act at the unique indentifier</small>
    </div>
    <div class="form-group" v-if="intent.checksum">
      <label for="Checksum">Checksum</label>
      <input disabled type="text" name="Checksum" id="Checksum" class="form-control" v-model="intent.checksum">
      <small class="form-text text-muted">The previous version of this intent on which the revision will be based</small>
    </div>
    <div class="form-group">
      <label for="Checksum">Sample Utterences</label>
      <input type="text" name="Checksum" id="Checksum" class="form-control" v-for="(utterance, index) in intent.sampleUtterances" :key="utterance" v-model="intent.sampleUtterances[index]">
    </div>
    <button class="btn btn-primary" type="button" @click="submitIntent">Submit</button>
  </form>
</template>

<script lang="ts">
import Vue from "vue"
import { DataService } from "../utilities/data-service"
export default Vue.extend({
  data () {
    return {
      intent: {
        name: ''
      }
    }
  },
  props: {
    action: String,
    intentToEdit: String
  },
  computed: {
  },
  name: 'IntentForm',
  methods: {
    getIntent: async function (intentToEdit:string) {
      const result = await DataService.getResource({resource: 'intents', name: intentToEdit})
      return result
    },
    async generateIntent() {
      if (this.action === 'edit') {
        this.intent = await this.getIntent(this.intentToEdit)
      } else {
        this.intent = this.generateBlankIntent()
      }
    },
    generateBlankIntent() {
      return {name: ''}
    },
    async submitIntent() {
      const result = await DataService.putIntent(this.intent)
    }
  },
  created() {
    this.generateIntent()
  }
})
</script>

<style>

</style>
