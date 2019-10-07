import Vue from 'vue'
import Router from 'vue-router'
import MainMenu from '../pages/MainMenu.vue'
import IntentsPage from '../pages/IntentsPage.vue'
import IntentDetailsPage from '../pages/IntentDetailsPage.vue'
import AddIntentPage from '../pages/AddIntentPage.vue'
import BotsPage from '../pages/BotsPage.vue'
import BotDetailsPage from '../pages/BotDetailsPage.vue'



Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'MainMenu',
      component: MainMenu
    },
    {
      path: '/bots',
      name: 'BotsPage',
      component: BotsPage
    },
    {
      path: '/bots/:name',
      name: 'BotDetailsPage',
      component: BotDetailsPage
    },
    {
      path: '/intents',
      name: 'IntentsPage',
      component: IntentsPage
    },
    {
      path: '/intents/:name',
      name: 'IntentDetailsPage',
      component: IntentDetailsPage
    },
    {
      path: '/intents/add',
      name: 'AddIntentPage',
      component: AddIntentPage
    },
    {
      path: '/slot-type',
      name: 'MainMenu',
      component: MainMenu
    },

  ]
})