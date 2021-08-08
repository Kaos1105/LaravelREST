import ExampleComponent from './components/ExampleComponent.vue'
import ExampleComponent2 from './components/ExampleComponent2.vue'
import VueRouter from 'vue-router'

const routes = [
  {
    path: '/',
    component: ExampleComponent,
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