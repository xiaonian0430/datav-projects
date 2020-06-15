<template>
  <div id="scroll-board">
    <dv-scroll-board :config="config" />
  </div>
</template>

<script>
export default {
  name: 'ScrollBoard',
  data () {
    return {
      config: {
        header: ['时间', '客户', '支付金额', '电话'],
        data: [
          ['2019-07-01 19:25:00', '张*力', '1015', '150****9482'],
          ['2019-07-02 17:25:00', '王*', '4123', '133****2121'],
          ['2019-07-03 16:25:00', '杜*美', '2616', '130****0912'],
          ['2019-07-04 15:25:00', '汪*', '712', '136****0092'],
          ['2019-07-05 14:25:00', '张*悦', '812', '187****8736'],
          ['2019-07-06 13:25:00', '谢*高', '133', '151****1232'],
          ['2019-07-07 12:25:00', '汪*城', '984', '152****9813'],
          ['2019-07-08 11:25:00', '马*', '502', '170****2182'],
          ['2019-07-09 10:25:00', '习*', '115', '170****8782'],
          ['2019-07-10 09:25:00', '杜*峰', '4123', '187****8351']
        ],
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
