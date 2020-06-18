/**
 * @Description:程序入口文件
 * @author: Xiao Nian
 * @date: 2020-06-15 09:40:22
 */

/*
import Vue from 'vue' 解析为 const Vue = require('vue')
完整的代码 import Vue from '../node_modules/vue/dist/vue.js'
事实证明，Vue是存在于vue.js中的。
*/
import Vue from 'vue'

// 顾名思义，这句代码的意思就是引入我们写好的App.vue文件。（.vue文件是vue框架的单文件组件。）
import App from './App.vue'

import './assets/common.less'

/*
引入dataV 插件，index.js没有install方法，而是一个并且插件是一个方法，直接调用此方法，参数是Vue
使用Vue.use(dataV)进行全局注册
完整的代码 import dataV from '../node_modules/@jiaminghi/data-view/src/index.js'
*/
import dataV from '@jiaminghi/data-view'

// 生产消息提示： 当productionTip 为false 时不提示生产消息，反之显示生产消息提示
Vue.config.productionTip = false

/*
安装 vue.js 插件。如果插件是一个对象，必须提供一个 install 方法，如果插件是一个函数，他会被作为instal方法。
install 调用时，会将 Vue 作为参数传入。
use将插件注册到Vue 对象上，而且只能注册一次。这种方式使用了单例模式的设计理念，但不是严格意义上的单例模式。
单例模式强调一个类只能实例化一个对象，非单例模式的类与对象是1:n的关系，但是通过单例模式类与对象是1:1的关系
这里之所以说Vue.use使用了单例模式的设计理念，是因为组件在Vue上只被允许注册一次。

源代码片段如下：
if (typeof plugin.install === 'function') {
  plugin.install.apply(plugin, args)
} else if (typeof plugin === 'function') {
  plugin.apply(null, args)
}
installedPlugins.push(plugin)
*/
Vue.use(dataV)

// 把 Vue 挂载到 id为 app 的 dom 上，然后进行页面渲染
/*
 ES5 函数写法：
 render: function (createElement) {
  return createElement(App)
 }
 ES6 语法：
 render (createElement) {
   return createElement(App)
 }
 ES6 箭头写法：
 render: createElement => createElement(App)

 原理：
 Vue.js 里面的 createElement 函数，这个函数的作用就是生成一个 VNode节点，
 render 函数得到这个 VNode 节点之后，
 返回给 Vue.js 的 mount 函数，渲染成真实 DOM 节点，并挂载到根节点上。
 $mount和el都是用来将vue实例挂载到dom上的，el是自动挂载，$mount是手动挂载
*/

new Vue({
  render: h => h(App)
}).$mount('#app')

/* eslint-disable no-new */
/*
new Vue({
  el: '#app',
  render: h => h(App)
})
*/
