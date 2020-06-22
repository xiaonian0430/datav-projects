<!--
 * @Description: 滚动栏
 * @Author: Xiao Nian
 * @Date: 2020-06-15 11:53:50
 -->
<template>
  <div id="scroll-board">
    <dv-scroll-board :config="config" />
  </div>
</template>

<script>
import { getScrollBoard } from '@/utils/api'
export default {
  name: 'ScrollBoard',
  data () {
    return {
      config: this.getConfig()
    }
  },
  created () {
    getScrollBoard()
      .then(res => {
        this.config = this.getConfig()
        this.config['data'] = res.result.data
      })
  },
  methods: {
    getConfig () {
      return {
        header: ['时间', '客户', '支付金额', '电话'],
        data: [],
        index: true,
        columnWidth: [50, 160, 100],
        align: ['center'],
        rowNum: 7,
        headerBGC: '#1981f6',
        headerHeight: 45,
        oddRowBGC: 'rgba(0, 44, 81, 0.8)',
        evenRowBGC: 'rgba(10, 29, 50, 0.8)'
      }
    }
  }
}
</script>

<style lang="less">
#scroll-board {
  width: 50%;
  box-sizing: border-box;
  margin-left: 20px;
  height: 100%;
  overflow: hidden;
}
</style>
