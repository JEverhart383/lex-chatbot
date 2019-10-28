import Vue from 'vue'
import ChatDialog from './ChatDialog.vue'


Vue.config.devtools = true;

new Vue({
  el: '#vcu-online-virtual-assistant',
  data: {
  },
  components: { ChatDialog },
  template: '<ChatDialog/>'
})