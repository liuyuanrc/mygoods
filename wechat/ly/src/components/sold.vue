<template>
  <div class="soldDiv">
    <div id="stock_list">
      <h1>全部订单</h1>
      <ul>
        <li class="lis" v-for='(x,index) in articles' @click='toggle($event)'><span style="display:inline-block;margin-left:5%;width:55%">订单{{index+1}}</span><button style="margin-right:0%" @click='dele($event)'>取消订单</button>
          <div style="display:none">
            <span>货名: {{x.name}}</span><span id="jian">件数: {{x.count}}</span><span>进价: {{x.modal_price}}</span><span>售价: {{x.sold_price}}</span>
            <span>客户姓名: {{x.guest_name}}</span>
            <span>客户地址: {{x.guest_adr}}</span>
            <span class="hid1" style="display:none">{{x.goodsId}}</span>
            <span class="hid" style="display:none">{{x.id}}</span>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'sold',
    data() {
      return {
        articles: []
      }
    },
    created: function () {
      this.$http.get('http://www.beautifulmelody.top/yourdaily/php/sold_select.php').then(function (response) {
        this.articles = response.data.data;
      }, function (response) {
        console.log(response)
      })
    },
    methods:{
      toggle:function(event){
        $(event.currentTarget).find('div').show();
        $(event.currentTarget).siblings().find('div').hide();
      },
      dele:function(event){
        if(confirm('确认删除?')){
        $(event.currentTarget).parent().remove();
        var delId = $(event.currentTarget).next().find('.hid').html();    
        var delgoodsId = $(event.currentTarget).next().find('.hid1').html();   
        var count = $(event.currentTarget).next().find('#jian').html();   
        count = count.split(':')[1];
        // 从订单的数据库中删除
        this.$http({
          method: 'get',
          url: 'http://www.beautifulmelody.top/yourdaily/php/sold_del.php?id=' + delId,
        }).then(function (response) {

          // 在库存的数据库中回滚数据
          this.$http({
            method: 'get',
            url: 'http://www.beautifulmelody.top/yourdaily/php/updata_back.php?goodsId=' + delgoodsId +'&count=' + count,
          }).then(function (response) {
              console.log('yishanchu')
            }, function (response) {
              alert('数据回滚失败,请在库存中手动添加已删除的订单');
            })
          }, function (response) {
            alert('删除失败,请重新删除');
          })
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
  input{
    outline: none;
    border:0;
  }
  #stockDiv {
    width: 100%;
  }

  #input_message {
    background: yellow;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  #input_message p {
    margin-bottom: 15px;
  }

  #stock_list {
    background: #BF734C;
    padding-top: 20px;
    margin-bottom: 50px;
  }
  #stock_list ul{
    background: #FAD9A0;
  }
  #list_title {
    width: 100%;
    border-bottom: 1px solid #DFD9A0;
    padding-bottom: 10px;
  }

  #list_title span {
    display: inline-block;
    width: 25%;
    text-align: center;
  }

  .lis {
    margin: 0;
    width: 100%;
    border-bottom: 1px solid #DFD9A0;
    line-height:45px;
  }

  .lis span {
    display: block;
    font-size: 14px;
    width:90%;
    margin:auto;
  }
  .lis div{
    background: #eee;
  }
</style>