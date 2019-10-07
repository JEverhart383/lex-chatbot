<template>
  <table class="table">
    <thead>
      <tr>
        <th>Content Type</th>
        <th>Content</th>
      </tr>
      <tr v-for="message in messages" :key="message.content">
        <td>{{message.contentType}}</td>
        <td>{{message.content}}</td>
      </tr>
    </thead>
  </table>
</template>

<script lang="ts">
import Vue from "vue"
export default Vue.extend({
  data () {
    return {
    }
  },
  props: {
    messages: Array
  },
  name: 'Message',
  methods: {
  }
})
</script>

<style>

</style>
