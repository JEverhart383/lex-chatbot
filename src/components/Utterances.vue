<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Utterances</h5>
        <p v-for="utterance in utterances" :key="utterance">{{utterance}}</p>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue"
export default Vue.extend({
  data () {
    return {
    }
  },
  props: {
    utterances: Array
  },
  name: 'Utterances',
  methods: {
  }
})
</script>

<style>

</style>
