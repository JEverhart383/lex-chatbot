<template>
  <form>
    <div class="form-group">
      <label for="IntentName">Intent Name</label>
      <input :disabled="action === 'edit'" type="text" name="IntentName" id="IntentName" class="form-control" v-model="intent.name">
      <small v-if="action !== 'edit'" class="form-text text-muted">Intent names cannot contain spaces, numbers, or special characters</small>
      <small v-if="action === 'edit'" class="form-text text-muted">Intent names cannot be changed since they act at the unique indentifier</small>
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <textarea name="Description" rows="3" id="Description" class="form-control" v-model="intent.description"></textarea>
    </div>
    <div class="form-group" v-if="intent.checksum">
      <label for="Checksum">Checksum</label>
      <input disabled type="text" name="Checksum" id="Checksum" class="form-control" v-model="intent.checksum">
      <small class="form-text text-muted">The previous version of this intent on which the revision will be based</small>
    </div>
    <div class="form-group">
      <label for="Utterances">Sample Utterences</label>
      <div class="form-row mb-2">
        <div class="col-sm-10">
          <input type="text"
            name="utteranceToAdd"
            id="utteranceToAdd"
            class="form-control"
            v-model="utteranceToAdd"
            placeholder="e.g. I want to know more about your product."
            >
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-primary" @click="addUtterance">+</button>
        </div>
      </div>
      <div class="form-row mt-3" v-for="(utterance, index) in intent.sampleUtterances" :key="index">
        <div class="col-sm-10">
          <input type="text" name="Checksum" id="Checksum" class="form-control"   v-model="intent.sampleUtterances[index]">
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger" @click="removeUtterance(index)">X</button>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="Description">Confirmation Prompt</label>
      {{intent.confirmationPrompt}}
    </div>
    <div class="form-group">
      <label for="Description">Conclusion Statement</label>
      {{intent.conclusionStatement}}
    </div>
    <div class="form-group">
      <label for="Description">Rejection Statement</label>
      {{intent.rejectionStatement}}
    </div>
    <button class="btn btn-primary" type="button" @click="submitIntent">Submit</button>
  </form>
</template>

<script lang="ts">
import Vue from "vue"
import { DataService } from "../../utilities/data-service"
import { Intent } from "../../types/Intent"
export default Vue.extend({
  data(){
    const sampleUtterances: string[] = []
    const fulfillmentActivity = {
      type: 'ReturnIntent'
    }
    const intent: Intent = {
      name: '',
      sampleUtterances,
      fulfillmentActivity
    }
    return {
      intent,
      utteranceToAdd: ''
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
    addUtterance: function () {
      if (this.utteranceToAdd.length > 0 && this.intent.sampleUtterances){
        this.intent.sampleUtterances.push(this.utteranceToAdd)
        this.utteranceToAdd = ''
      }
    },
    removeUtterance (index:number) {
      if (this.intent.sampleUtterances){
        this.intent.sampleUtterances.splice(index, 1)
      }
    },
    getIntent: async function (intentToEdit:string) {
      const result = await DataService.getResource({resource: 'intents', name: intentToEdit})
      return result
    },
    generateIntent() {
        return this.generateBlankIntent()
    },
    generateBlankIntent(): Intent {
      const sampleUtterances: string[] = ['']
      return {
        name: '',
        sampleUtterances
        }
    },
    async submitIntent() {
      const result = await DataService.putIntent(this.intent)
    }
  },
  async created() {
    if (this.action === 'edit') {
      this.intent = await this.getIntent(this.intentToEdit)
      if (this.intent.fulfillmentActivity === undefined) {
        this.intent.fulfillmentActivity = {type: 'ReturnIntent'}
      }
    }
  }
})
</script>

<style>

</style>
