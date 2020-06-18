<!--
 * @Description: 根组件
 * @Author: Xiao Nian
 * @Date: 2020-06-15 10:53:50
 -->
<template>
  <div id="app">
    <datav />
  </div>
</template>

<script>
/*
1、export 与 export default 均可用于导出常量、函数、文件、模块等
2、你可以在其它文件或模块中通过import+(常量 | 函数 | 文件 | 模块)名的方式，将其导入，以便能够对其进行使用
3、在一个文件或模块中，export、import 可以有多个，export default 仅有一个
4、通过 export 方式导出，在导入时要加{ }，export default则不需要
5、export default 向外暴露的成员，可以使用任意的变量来接收（即：import aa from 'a.vue' 在 import 的时候可以使用任意的变量名接受）
6、使用 export 导出的成员，如果就想换个名称来接收，可以使用 as 来起别名；（即：import { a as b } from 'a.vue'）
7、export和export default实现的功能相同，即：可用于导出（暴露）常量、函数、文件、模块等，以便其他文件调用。
8、export导出多个对象，export default只能导出一个对象
9、export导出对象需要用{ }，export default不需要{ } 。例如：
    export {A,B,C}
    export default A
10、在组件中没有使用export default vue对象会报错，提示 render 和 template 函数未定义
11、Cannot set property 'render' of undefined解决方法
    加上 export default 对象
12、Vue在注册组件时有两种方式，全局注册和局部注册。
    全局注册的话我们可以在任意组件中使用注册的组件，而局部注册的话我们只能在当前的组件中使用注册到的组件
    全局注册实例
    Vue.component("app",App);
    局部注册实例
    components：{
      datav,
      'datav': datav,
      'data-v': datav
    }
    注意在 ES2015+(原名ES6) 中，在对象中放一个类似 datav 的变量名其实是 datav: datav 的缩写

13、ECMAScript 和 JavaScript 的关系是，前者是后者的规格，后者是前者的一种实现
14、ES6是ECMA的为JavaScript制定的第6个版本的标准，标准委员会最终决定，标准在每年的 6 月份正式发布一次，作为当年的正式版本。
提到 ES6 的地方，一般是指 ES2015 标准，但有时也是泛指“下一代 JavaScript 语言”
ECMAscript 2015 在2015年6月份发布的ES6的第1个版本。此版本支持度比较高，建议不要使用太新的版本。
ECMAscript 2016
ECMAscript 2017
ECMAscript 2018
ECMAscript 2019
ECMAscript 2020

ECMAScript 1.0 是 1997 年发布的，接下来的两年，连续发布了 ECMAScript 2.0（1998 年 6 月）和 ECMAScript 3.0（1999 年 12 月）。
3.0 版是一个巨大的成功，在业界得到广泛支持，成为通行标准，奠定了 JavaScript 语言的基本语法，以后的版本完全继承。
直到今天，初学者一开始学习 JavaScript，其实就是在学 3.0 版的语法。
2000 年，ECMAScript 4.0 开始酝酿。这个版本最后没有通过，但是它的大部分内容被 ES6 继承了。因此，ES6 制定的起点其实是 2000 年。
为什么 ES4 没有通过呢？因为这个版本太激进了，对 ES3 做了彻底升级，导致标准委员会的一些成员不愿意接受。
2008 年 7 月，由于对于下一个版本应该包括哪些功能，各方分歧太大，争论过于激烈，ECMA 开会决定，中止 ECMAScript 4.0 的开发，
将其中涉及现有功能改善的一小部分，发布为 ECMAScript 3.1，而将其他激进的设想扩大范围，放入以后的版本，
由于会议的气氛，该版本的项目代号起名为 Harmony（和谐）。会后不久，ECMAScript 3.1 就改名为 ECMAScript 5。
*/
import datav from './components/datav/index.vue'

export default {
  name: 'app',
  components: {
    datav
  },
  data () {
    return {}
  }
}
</script>

<style lang="less">
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  width: 100%;
  height: 100%;
}
</style>
