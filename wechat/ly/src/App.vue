<template>
  <div id="app">
    <router-view></router-view>
    <div id="list">
      <router-link to="/stock">库存</router-link><router-link to="/sold">订单</router-link><router-link to='/plan'>预定</router-link><router-link to='/total'>总览</router-link>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'app',

  }
</script>

<style>
@import "./assets/reset.css";
#app{
  width: 100%;
  height:100%;
}

  #list {
    position: fixed;
    bottom: 0;
    width: 100%;
  }

  #list a {
    display: inline-block;
    width: 25%;
    height: 50px;
    line-height: 50px;
    text-align: center;
    background: #BF734C;
    text-decoration: none;
    color:#362C2A;
    font-weight: 600;
  }
</style>