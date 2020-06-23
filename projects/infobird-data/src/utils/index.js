/**
 * @Description: 工具方法
 * @author: Xiao Nian
 * @date: 2020-06-23 19:40:22
 */

// 千分位格式化
export function toThousands (num) {
  num = (num || 0).toString()
  var result = ''
  while (num.length > 3) {
    result = ',' + num.slice(-3) + result
    num = num.slice(0, num.length - 3)
  }
  if (num) {
    result = num + result
  }
  return result
}
