<template>
  <div class="main-menu-wrapper">
    <div class="row">
      <div class="col-md-6">
        <h3>Email Settings</h3>
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
  name: 'EmailSettings',
  methods: {

  },
  created: async function () {

  }
})
</script>

<style>

</style>
