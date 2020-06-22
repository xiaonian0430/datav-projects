<!--
 * @Description: 卡片
 * @Author: Xiao Nian
 * @Date: 2020-06-15 11:53:50
 -->
<template>
  <div id="cards">
    <div
      class="card-item"
      v-for="(card, i) in cards"
      :key="card.title"
    >
      <div class="card-header">
        <div class="card-header-left">{{ card.title }}</div>
        <div class="card-header-right">{{ '0' + (i + 1) }}</div>
      </div>
      <dv-charts class="ring-charts" :option="card.ring" />
      <div class="card-footer">
        <div class="card-footer-item">
          <div class="footer-title">累计金额</div>
          <div class="footer-detail">
            <dv-digital-flop :config="card.total" style="width:70%;height:35px;" />元
          </div>
        </div>
        <div class="card-footer-item">
          <div class="footer-title">参与</div>
          <div class="footer-detail">
            <dv-digital-flop :config="card.num" style="width:70%;height:35px;" />人
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { getCards } from '@/utils/api'
export default {
  name: 'Cards',
  data () {
    return {
      cards: []
    }
  },
  methods: {
    getCardsData () {
      getCards()
        .then(res => {
          this.cards = res.result.data
        })
    }
  },
  mounted () {
    const { getCardsData } = this

    getCardsData()

    setInterval(getCardsData, 30000)
  }
}
</script>

<style lang="less">
#cards {
  display: flex;
  justify-content: space-between;
  height: 45%;

  .card-item {
    background-color: rgba(6, 30, 93, 0.5);
    border-top: 2px solid rgba(1, 153, 209, .5);
    width: 19%;
    display: flex;
    flex-direction: column;
  }

  .card-header {
    display: flex;
    height: 20%;
    align-items: center;
    justify-content: space-between;

    .card-header-left {
      font-size: 18px;
      font-weight: bold;
      padding-left: 20px;
    }

    .card-header-right {
      padding-right: 20px;
      font-size: 40px;
      color: #03d3ec;
    }
  }

  .ring-charts {
    height: 55%;
  }

  .card-footer {
    height: 25%;
    display: flex;
    align-items: center;
    justify-content: space-around;
  }

  .card-footer-item {
    padding: 5px 10px 0px 10px;
    box-sizing: border-box;
    width: 40%;
    background-color: rgba(6, 30, 93, 0.7);
    border-radius: 3px;

    .footer-title {
      font-size: 15px;
      margin-bottom: 5px;
    }

    .footer-detail {
      font-size: 20px;
      color: #1294fb;
      display: flex;
      font-size: 18px;
      align-items: center;

      .dv-digital-flop {
        margin-right: 5px;
      }
    }
  }
}
</style>
