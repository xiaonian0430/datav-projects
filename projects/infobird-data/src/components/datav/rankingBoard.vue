<template>
  <div id="ranking-board">
    <div class="ranking-board-title">项目记录数量</div>
    <dv-scroll-ranking-board :config="config" />
  </div>
</template>

<script>
export default {
  name: 'RankingBoard',
  data () {
    return {
      config: {
        data: [
          {
            name: '服务架构',
            value: 55
          },
          {
            name: '服务部署',
            value: 120
          },
          {
            name: '信息安全',
            value: 78
          },
          {
            name: '服务内容',
            value: 66
          },
          {
            name: '年会大师',
            value: 80
          },
          {
            name: '信用卡电销',
            value: 45
          },
          {
            name: '互联网病毒营销',
            value: 29
          },
          {
            name: '智能质检',
            value: 29
          },
          {
            name: '在线客服',
            value: 2229
          }
        ],
        rowNum: 9
      }
    }
  }
}
</script>

<style lang="less">
#ranking-board {
  width: 20%;
  box-shadow: 0 0 3px blue;
  display: flex;
  flex-direction: column;
  background-color: rgba(6, 30, 93, 0.5);
  border-top: 2px solid rgba(1, 153, 209, .5);
  box-sizing: border-box;
  padding: 0px 30px;

  .ranking-board-title {
    font-weight: bold;
    height: 50px;
    display: flex;
    align-items: center;
    font-size: 20px;
  }

  .dv-scroll-ranking-board {
    flex: 1;
  }
}
</style>
