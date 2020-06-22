<!--
 * @Description: 跳动数字
 * @Author: Xiao Nian
 * @Date: 2020-06-15 11:53:50
 -->
<template>
  <div id="digital-flop">
    <div
      class="digital-flop-item"
      v-for="item in digitalFlopData"
      :key="item.title"
    >
      <div class="digital-flop-title">{{ item.title }}</div>
      <div class="digital-flop">
        <dv-digital-flop
          :config="item.number"
          style="width:100px;height:50px;"
        />
          <div class="unit">{{ item.unit }}</div>
      </div>
    </div>
    <dv-decoration-4 :reverse="true"/>
  </div>
</template>

<script>
import { getDigitalFlop } from '@/utils/api'
export default {
  name: 'DigitalFlop',
  data () {
    return {
      digitalFlopData: []
    }
  },
  methods: {
    getDigitalFlopData () {
      getDigitalFlop()
        .then(res => {
          this.digitalFlopData = res.result.data
        })
    }
  },
  mounted () {
    const { getDigitalFlopData } = this

    getDigitalFlopData()

    setInterval(getDigitalFlopData, 30000)
  }
}
</script>

<style lang="less">
#digital-flop {
  position: relative;
  height: 15%;
  flex-shrink: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: rgba(6, 30, 93, 0.5);
  .dv-decoration-4 {
    position: absolute;
    width: 95%;
    left: 2.5%;
    height: 5px;
    bottom: 0px;
  }

  .digital-flop-item {
    width: 11%;
    height: 80%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-left: 3px solid rgb(6, 30, 93);
    border-right: 3px solid rgb(6, 30, 93);
  }

  .digital-flop-title {
    font-size: 20px;
    margin-bottom: 20px;
  }

  .digital-flop {
    display: flex;
  }

  .unit {
    margin-left: 10px;
    display: flex;
    align-items: flex-end;
    box-sizing: border-box;
    padding-bottom: 13px;
  }
}
</style>
