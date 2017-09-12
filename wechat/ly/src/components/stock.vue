<template>
  <div class="stockDiv">
    <div id="input_message">
      <p id="add">添加库存</p>
      <form>
        <p>名称 : <input id="name" type="text"></p>
        <p>数量 : <input id="count" type="text"></p>
        <p>进价 : <input id="price" type="text"></p>
        <p><button @click='refresh()' style="padding:8px 10px;border-radius:8px;">添 加</button></p>
      </form>
    </div>
    <div id="stock_list">
      <h1>全部库存</h1>
      <ul>
        <p id="list_title"><span style="width:40%">商品名称</span><span style="width:20%">数量</span><span style="width:20%">进价</span><span style="width:20%">出售</span></p>
        <li class="lis" v-for='x in articles'><span style="width:40%;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{x.name}}</span><span id="count" style="width:20%;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{x.count}}</span><span style="width:20%;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{x.price}}</span><span style="width:20%;overflow: hidden;text-overflow:ellipsis;white-space: nowrap"><button id="sale" @click='onsale($event)'>出售</button></span>
          <span class="hid" style="display:none">{{x.goodsId}}</span>
        </li>
      </ul>
    </div>
    <div id="modal" style="display:none">
      <p>订单信息</p>
      <p>商品名称 : <span id="modal_name"></span></p>
      <p>商品进价 : <span id="modal_price"></span></p>
      <p>库存件数 : <span id="modal_count"></span></p>
      <p>出售件数 : <input id="sold_count" type="text" @blur='juge()'></p>
      <p>出售单价 : <input id="sold_price" type="text"></p>
      <p>顾客姓名 : <input id="guest_name" type="text"></p>
      <p>发货地址 : <input id="guest_adr" type="text"></p>
      <p id="confirm"><button @click='send()' style="margin-right:20px;">确定</button><button @click='cancel()'>取消</button></p>
      <p id="goodsId" style="display:none"></p>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'stock',
    data() {
      return {
        articles: []
      }
    },
    created: function () {
      this.$http.get('http://www.beautifulmelody.top/yourdaily/php/select.php').then(function (response) {
        this.articles = response.data.data;
      }, function (response) {
        console.log(response)
      })
    },
    methods: {
      refresh: function () {
        if (confirm('确认添加?')) {
          var name = $('#name').val();
          var count = $('#count').val();
          var price = $('#price').val();
          this.$http({
            method: 'get',
            url: 'http://www.beautifulmelody.top/yourdaily/php/index.php?name=' + name + '&count=' + count + '&price=' + price,
          }).then(function (response) {
            location.reload();
          }, function (response) {
            console.log(response)
          })
        }
      },
      onsale: function (event) {
        var name = $(event.currentTarget).parent().parent().children().eq(0).html();
        var price = $(event.currentTarget).parent().parent().children().eq(2).html();
        var count = $(event.currentTarget).parent().parent().children().eq(1).html();
        var id = $(event.currentTarget).parent().next().html();
        console.log()
        $('#modal').show().find('span').eq(0).html(name).end().eq(1).html(price).end().eq(2).html(count);
        $('#modal').children('p:last-child').html(id);
      },
      cancel: function () {
        if (confirm('确定取消?')) {
          $('#modal').hide()
        }
      },
      send: function () {
        if (confirm('确认提交?')) {
          var name = $('#modal_name').html();
          var modal_price = $('#modal_price').html();
          var count = $('#sold_count').val();
          var price = $('#sold_price').val();
          var goodsId = $('#goodsId').html();
          var guest_name = $('#guest_name').val();
          var guest_adr = $('#guest_adr').val();
          // 已售数据从库存中减掉 
          this.$http({
            method: 'get',
            url: 'http://www.beautifulmelody.top/yourdaily/php/updata.php?count=' + count + '&goodsId=' + goodsId
          }).then(function (response) { 
            // 已售数据写入数据库
            this.$http({
             method: 'get',
              url: 'http://www.beautifulmelody.top/yourdaily/php/sold_insert.php?name=' + name + '&count=' + count + '&price=' + price + '&modal_price=' + modal_price + '&goodsId=' + goodsId + '&guest_name=' + guest_name + '&guest_adr=' + guest_adr
            }).then(function (response) {
              location.reload();
              }, function (response) {
                alert('生成订单失败,请重新填写');
            })        
          }, function (response) {
            alert('从数据库中删除失败')
          })
        }
      },
      juge: function () {
        var mai = $('#sold_count').val() / 1;
        var you = $('#modal_count').html() / 1;
        if (mai > you) {
          alert('出售数不能大于库存数');
          $('#sold_count').val('')
        }
      }
    }
  }

</script>

<style scoped>
  h1,h2 {
    font-weight: normal;
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  h1 {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    padding-bottom: 20px;
  }

  li {
    display: inline-block;
    margin: 0 10px;
  }

  a {
    color: #42b983;
  }

  input {
    outline: none;
    border: 0;
  }

  #stockDiv {
    width: 100%;
    color:#362C2A;
  }

  #input_message {
    background: #BF734C;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 1px;
  }

  #input_message p {
    margin-bottom: 25px;
  }

  #stock_list {
    background: #FAD9A0;
    padding-top: 20px;
    margin-bottom: 50px;
  }

  #list_title {
    width: 100%;
    border-bottom: 1px solid #DFD9A0;
    padding-bottom: 10px;
  }

  #list_title span {
    display: inline-block;
    text-align: center;
  }

  .lis {
    margin: 0;
    width: 100%;
    border-bottom: 1px solid #DFD9A0;
    height: 30px;
    line-height: 30px;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  .lis span {
    display: inline-block;
    text-align: center;
  }

  #modal {
    padding-top: 10px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    background: #732420;
    color:#DFD9A0;
  }

  #modal p {
    line-height: 35px;
    color:#DFD9A0;
  }
#modal span{
  color:#DFD9A0;
}
  #modal p:nth-child(1) {
    text-align: center;
    font-size: 20px;
  }

  #modal P:nth-child(2),
  #modal P:nth-child(3),
  #modal P:nth-child(4),
  #modal P:nth-child(5),
  #modal P:nth-child(6),
  #modal P:nth-child(7),
  #modal P:nth-child(8) {
    width: 70%;
    margin: auto;
  }

  #modal input {
    width: 50%;
  }

  #confirm {
    margin: 10px auto;
    width: 100px;
    position: relative;
  }

  #confirm button:nth-child(1) {
    left: 20%;
  }

  #confirm button:nth-child(2) {
    left: 60%;
  }
  #add{
    font-size: 20px;
    font-weight: 600;
  }
</style>