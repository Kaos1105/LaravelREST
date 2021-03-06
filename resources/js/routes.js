import VueRouter from 'vue-router'
import Bookables from './bookables/Bookables.vue'
import Bookable from './bookable/Bookable.vue'
import Basket from './basket/Basket.vue'
import Review from './review/Review.vue'

const routes = [
  {
    path: '/',
    component: Bookables,
    name: 'home'
  },
  {
    path: '/bookable/:id',
    component: Bookable,
    name: 'bookable'
  },
  {
    path: '/review/:id',
    component: Review,
    name: 'review'
  },
  {
    path: '/basket',
    component: Basket,
    name: 'basket'
  }
]

const router = new VueRouter({
  mode: 'history',
  routes, // short for `routes: routes`
});

export default router;