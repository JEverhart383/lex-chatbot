import Vue from 'vue'
import ChatDialog from './components/ChatDialog.vue'


Vue.config.devtools = true;

new Vue({
  el: '#vcu-online-virtual-assistant',
  data: {
  },
  components: { ChatDialog },
  template: '<ChatDialog/>'
})