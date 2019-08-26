import Vue from 'vue'
import Router from 'vue-router'
import MainMenu from '../components/MainMenu.vue'
import Route53_Index from '../components/Route53/index.vue'
import Lex_Index from '../components/Lex/index.vue'
import S3_Index from '../components/S3/index.vue'
import SES_Index from '../components/SES/index.vue'
import SES_Identities from '../components/SES/identities.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'MainMenu',
      component: MainMenu
    },
    {
      path: '/ses',
      name: 'SES_Index',
      component: SES_Index
    },
    {
      path: '/ses/identities',
      name: 'SES_Identities',
      component: SES_Identities
    },
    {
      path: '/s3',
      name: 'S3_Index',
      component: S3_Index
    },
    {
      path: '/lex',
      name: 'Lex_Index',
      component: Lex_Index
    },
    {
      path: '/route53',
      name: 'Route53_Index',
      component: Route53_Index
    }
  ]
})