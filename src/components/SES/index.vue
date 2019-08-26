<template>
  <div class="ses_index">
    <h2>SES Index</h2>
    <ses-menu/>
    <div class="form-group">
      <label for="ToAddresses">To Addresses</label>
      <input type="text" class="form-control" name="ToAddresses" id="ToAddresses" v-model="email.toAddresses">
    </div>
    <div class="form-group">
      <label for="Subject">Subject</label>
      <input type="text" class="form-control" name="Subject" id="Subject" v-model="email.subject">
    </div>
    <div class="form-group">
      <label for="Message">Message</label>
      <textarea class="form-control" name="Message" id="Message" cols="30" rows="10" v-model="email.message"></textarea>
    </div>
    <input class="btn btn-primary" type="button" value="Send Email" @click="sendEmail">

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="mr-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
    </div>

  </div>
</template>

<script>
import SesMenu from './ses-menu.vue'
export default {
  name: 'SES_Index',
  components: {
    SesMenu
  },
  data () {
    return {
      email: {
        toAddresses: '',
        subject: '',
        message: ''
      }
    }
  },
  methods: {
    sendEmail () {
        fetch('/wp-json/aws-workbench/v1/ses/emails', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': window.AWS_WORKBENCH.rest_nonce
          },
          body: JSON.stringify(this.email)
        })
        .then(data => data.json())
        .then(json => {
          console.log(json)
          $('.toast').toast({animation: true, autohide: true, delay: 500})
          $('.toast').toast('show')
        })
    }
  }
}
</script>
