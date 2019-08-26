<template>
  <div class="ses_index">
    <h2>SES | Identities</h2>
    <ses-menu/>
    <select name="identities" id="identities" v-model="selectedIdentity.name" @change="getIdentity">
      <option v-for="identity in identities" :value="identity" :key="identity">{{identity}}</option>
    </select>
    {{selectedIdentity.name}}
    {{selectedIdentity.data}}
  </div>
</template>

<script>
import SesMenu from './ses-menu.vue'
export default {
  name: 'SES_Identities',
  components: {
    SesMenu
  },
  data () {
    return {
      selectedIdentity: {
        name: '',
        data: {}
      },
      identities: ['identity@aws_workbench.com']
    }
  },
  methods: {
    getIdentities () {
        fetch('/wp-json/aws-workbench/v1/ses/identities', {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': window.AWS_WORKBENCH.rest_nonce
          }
        })
        .then(data => data.json())
        .then(json => {
          console.log(json)
          this.identities = json
        })
    },
    getIdentity () {
        fetch(`/wp-json/aws-workbench/v1/ses/identities/${this.selectedIdentity.name}`, {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': window.AWS_WORKBENCH.rest_nonce
          }
        })
        .then(data => data.json())
        .then(json => {
          console.log(json)
          this.selectedIdentity.data = json
        })
    }
  },
  created () {
    this.getIdentities()
  }
}
</script>
