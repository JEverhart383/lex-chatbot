// import Vue from "vue";

// let v = new Vue({
//     el: "#app",
//     template: `
//     <div>
//         <div>Hello {{name}}!</div>
//         Name: <input v-model="name" type="text">
//     </div>`,
//     data: {
//         name: "World"
//     }
// });

import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.devtools = true;

new Vue({
  el: '#aws-workbench-app',
  data: {
  },
  router,
  components: { App },
  template: '<App/>'
})