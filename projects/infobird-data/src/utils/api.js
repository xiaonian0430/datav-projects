/**
 * @Description: api 定义
 * @author: Xiao Nian
 * @date: 2020-06-23 09:40:22
 */

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

export async function getRankingBoard () {
  return await request('/api/rankingBoard', {})
}

export async function getRoseChart () {
  return await request('/api/roseChart', {})
}

export async function getDigitalFlop () {
  return await request('/api/digitalFlop', {})
}

export async function getCards () {
  return await request('/api/cards', {})
}

export async function getWaterLevelChart () {
  return await request('/api/waterLevelChart', {})
}
