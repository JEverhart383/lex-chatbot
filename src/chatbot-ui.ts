import Vue from 'vue'
import ChatDialog from './components/ChatDialog.vue'


Vue.config.devtools = true;

new Vue({
  el: '#wp-lex-chatbot',
  data: {
  },
  components: { ChatDialog },
  template: '<ChatDialog/>'
})