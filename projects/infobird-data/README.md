<h1 align="center">讯鸟综合数据</h1>

## Project setup
```
yarn install
```

### Compiles and hot-reloads for development
```
yarn run dev
```

### Compiles and minifies for production
```
yarn run build
```


## 说明
源码结构
====

    ├─README.md                          //说明
    ├─package.json                       //依赖包相关信息
    ├─vue.config.js                      //vue.config.js 是一个可选的配置文件，如果项目的 (和 package.json 同级的) 根目录中存在这个文件，那么它会被 @vue/cli-service 自动加载。你也可以使用 package.json 中的 vue 字段，但是注意这种写法需要你严格遵照 JSON 的格式来写。
    ├─postcss.config.js                  //它是一个利用JS插件来对CSS进行转换的工具，这些插件非常强大，强大到无所不能。
    ├─babel.config.js                    //Babel 是一个工具链，主要用于将 ECMAScript 2015+ 版本的代码转换为向后兼容的 JavaScript 语法，以便能够运行在当前和旧版本的浏览器或其他环境中。下面列出的是 Babel 能为你做的事情：语法转换;通过 Polyfill 方式在目标环境中添加缺失的特性 (通过 @babel/polyfill 模块);源码转换 (codemods)
    ├─.eslintrc.js                       //eslint是用来管理和检测js代码风格的工具，可以和编辑器搭配使用，如vscode的eslint插件
当有不符合配置文件内容的代码出现就会报错或者警告。.eslintrc 放在项目根目录，则会应用到整个项目；如果子目录中也包含 .eslintrc 文件，则子目录会忽略根目录的配置文件，应用该目录中的配置文件。这样可以方便地对不同环境的代码应用不同的规则。
    ├─.gitignore                         //定义相应的忽略规则，来管理当前文件夹下的文件的Git提交行为
    ├─.editorconfig                      //帮助开发人员在不同的编辑器和IDE之间定义和维护一致的编码样式
    ├─.browserslistrc                    //你会发现有 package.json 文件里的 browserslist 字段 (或一个单独的 .browserslistrc 文件)，指定了项目的目标浏览器的范围。这个值会被 @babel/preset-env 和 Autoprefixer 用来确定需要转译的 JavaScript 特性和需要添加的 CSS 浏览器前缀。
    ├─public
    |    ├─favicon.ico                    //网页图标
    |    └─index.html                     //项目入口
    ├─src
    |    ├─main.js                        //程序入口文件，是初始化vue实例并使用需要的插件,加载各种公共组件。
    |    ├─App.vue                        //根组件
    |    ├─components                     //组件库
    |    |    ├─index.vue                 //主入口
    |    |    ├─topHeader.vue             //顶部标题
    |    |    ├─digitalFlop.vue           //顶部滚定数字
    |    |    ├─rankingBoard.vue          //排名
    |    |    ├─roseChart.vue             //玫瑰图
    |    |    ├─waterLevelChart.vue       //波浪统计
    |    |    ├─scrollBoard.vue           //滚动
    |    |    ├─cards.vue                 //卡片
    |    |    ├─img                       //图片目录
    |    |    |    └─bg.png               //背景图片
    |    ├─assets                         //所需资源
    └─   └─   └─common.css                //通用样式
