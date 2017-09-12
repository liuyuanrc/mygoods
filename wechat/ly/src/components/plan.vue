<template>
  <div class="planDiv">
    <div id="input_message">
      <p id="add">添加预购</p>
      <form>
        <p>名称: <input id="name" type="text"></p>
        <p>数量: <input id="count" type="text"></p>
        <p><button @click='refresh()' style="padding:8px 10px;border-radius:8px;">添 加</button></p>
      </form>
    </div>
    <div id="stock_list">
      <h1>预购列表</h1>
      <ul>
        <p id="list_title"><span>名称</span><span>数量</span><span>删除</span></p>
        <li class="lis" v-for='x in articles'><span>{{x.name}}</span><span>{{x.count}}</span><span><button @click="dele($event)">删除</button></span><span class="hid"
            style="display:none">{{x.id}}</span></li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'plan',
    data() {
      return {
        articles: []
      }
    },
    created: function () {
      this.$http.get('http://www.beautifulmelody.top/yourdaily/php/will_select.php').then(function (response) {
        this.articles = response.data.data;
        console.log('展示chenggong')
        console.log(this.articles)
      }, function (response) {
        console.log(response)
      })
    },
    methods: {
      refresh: function () {
        if (confirm('确认添加?')) {
          var name = $('#name').val();
          var count = $('#count').val();
          this.$http({
            method: 'get',
            url: 'http://www.beautifulmelody.top/yourdaily/php/will_insert.php?name=' + name + '&count=' + count,
          }).then(function (response) {
            location.reload();
          }, function (response) {
            console.log(response)
          })
        }
      },
      dele: function (event) {
        if (confirm('确认删除?')) {
          $(event.currentTarget).parent().parent().remove();
          var delId = $(event.currentTarget).parent().next().html();
          this.$http({
            method: 'get',
            url: 'http://www.beautifulmelody.top/yourdaily/php/will_del.php?id=' + delId,
          }).then(function (response) {
          }, function (response) {
            console.log(response)
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

  input {
    outline: none;
    border: 0;
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
    /* padding-bottom: 20px; */
    margin-bottom: 40px;
  }

  #list_title {
    width: 100%;
    border-bottom: 1px solid #DFD9A0;
    padding-bottom: 10px;
  }

  #list_title span {
    display: inline-block;
    width: 33.33%;
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
    width: 33.33%;
    text-align: center;
  }
  #add{
    font-size: 20px;
    font-weight: 600;
  }
</style>