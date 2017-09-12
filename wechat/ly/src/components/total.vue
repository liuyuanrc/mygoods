<template>
  <div class="totalDiv">
    <div id="mes">
      <p>当前总库存金额 : <span id="all_stock"></span></p>
      <p>当前利润 : <span id="all_sold"></span></p>
    </div>

  </div>
</template>

<script>
  export default {
    name: 'total',
    data() {
      return {
      }
    },
    created: function () {
      this.$http.get('http://www.beautifulmelody.top/yourdaily/php/calculate.php').then(function (data) {
        var res = data.body.data[0][0] / 1;
        var resed = res.toFixed(2);
        if (resed) {
          $('#all_stock').html(resed);
        } else {
          $('#all_stock').html(0);
        }
      }, function (response) {
        console.log(response)
      })
      this.$http.get('http://www.beautifulmelody.top/yourdaily/php/calculate_sold.php').then(function (data) {
        var res = data.body.data[0][0] / 1;
        var resed = res.toFixed(2);
        if (resed) {
          $('#all_sold').html(resed);
        } else {
          $('#all_sold').html(0);
        }
      }, function (response) {
        console.log(response)
      })
    }
  }

</script>

<style scoped>
  h1,
  h2 {
    font-weight: normal;
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  li {
    display: inline-block;
    margin: 0 10px;
  }

  a {
    color: #42b983;
  }

  .totalDiv {
    width: 100%;
    height: 100%;
    background: #FAD9A0;
    position: relative;
  }

  #mes {
    width: 80%;
    position: absolute;
    left: 50%;
    top: 40%;
    transform: translate(-50%, -50%);
    background: #732420;
    font-size: 20px;
    padding: 20px 10px;
  }

  #mes p {
    line-height: 60px;
    color: #FAD9A0;
  }

  #mes span {
    color: #FAD9A0;
  }
</style>