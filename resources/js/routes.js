import VueRouter from 'vue-router'
import ExampleComponent from './components/ExampleComponent'
import ExampleComponent2 from './components/ExampleComponent2'
import Bookable from './bookables/Bookables'

const routes = [
  {
    path: '/',
    component: Bookable,
    name: 'home'
  },
  {
    path: '/second',
    component: ExampleComponent2,
    name: 'second'
  }
]

const router = new VueRouter({
  mode: 'history',
  routes, // short for `routes: routes`
});

export default router;