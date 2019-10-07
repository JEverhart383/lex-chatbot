<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{title}}</h5>
        <p v-if="statement.maxAttempts">Max Attempts: {{statement.maxAttempts}}</p>
        <message :messages="statement.messages"></message>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
import Message from './Message.vue'
export default Vue.extend({
  data () {
    return {
      intents: []
    }
  },
  props: {
    title: String,
    statement: Object
  },
  components: {
    Message
  },
  name: 'Statement',
  methods: {
  }
})
</script>

<style>

</style>
