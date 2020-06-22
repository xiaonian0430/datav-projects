<!--
 * @Description: 排名
 * @Author: Xiao Nian
 * @Date: 2020-06-15 11:53:50
 -->
<template>
  <div id="ranking-board">
    <div class="ranking-board-title">项目记录数量</div>
    <dv-scroll-ranking-board :config="config" />
  </div>
</template>

<script>
import { getRankingBoard } from '@/utils/api'
export default {
  name: 'RankingBoard',
  data () {
    return {
      config: this.getConfig()
    }
  },
  created () {
    getRankingBoard()
      .then(res => {
        this.config = this.getConfig()
        this.config['data'] = res.result.data
      })
  },
  methods: {
    getConfig () {
      return {
        data: [],
        rowNum: 9
      }
    }
  }
}
</script>

<style lang="less">
#ranking-board {
  width: 20%;
  height: 100%;
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
