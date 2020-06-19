/* eslint-disable no-return-await */
// import qs from 'qs'
import request from './request'

/*
qs是一个用于解析和字符串化的工具库
ar obj = qs.parse('a=c');
// 结果 parse解析 { a: 'c' }

var str = qs.stringify(obj);
// 结果 stringify‘字符串化’ 'a=c'
*/

export async function getScrollBoard () {
  return await request('/api/scrollBoard', {})
}
