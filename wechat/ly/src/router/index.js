import Vue from 'vue'
import Router from 'vue-router'
// import Hello from '@/components/Hello'
// 先引入四个路由
import stock from '@/components/stock'
import sold from '@/components/sold'
import plan from '@/components/plan'
import total from '@/components/total'
// import Red from '@/components/red'
// import Blue from '@/components/blue'
Vue.use(Router)

export default new Router({
  routes: [
        {
      path: '/stock',
      name: 'stock',
      component: stock
      // children: [
      // 	{
      // 		path:'red',
      // 		name:'Red',
      // 		component:Red
      // 	},
      // 	{
      // 		path:'blue',
      // 		name:'Blue',
      // 		component:Blue
      // 	}
      // ]
    },
        {
      path: '/sold',
      name: 'sold',
      component: sold
    },
        {
      path: '/plan',
      name: 'plan',
      component: plan
    },
    {
      path: '/total',
      name: 'total',
      component: total
    },
    {
      path: '*',redirect:'/stock'
    }
  ]
})
