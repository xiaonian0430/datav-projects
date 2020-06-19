/**
 * @Description:针对 @vue/cli 的全局配置
 * @author: Xiao Nian
 * @date: 2020-06-15 09:10:12
 */
module.exports = {
  devServer: {
    proxy: {
      // proxy all requests starting with /api to jsonplaceholder
      '/api': {
        target: 'http://localhost:9090',
        // target:'http://112.74.58.15:18001',
        changeOrigin: true
      }
    }
  },
  publicPath: process.env.NODE_ENV === 'production' ? './' : '/'
}
