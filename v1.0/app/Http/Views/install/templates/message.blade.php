
@extends('InstallTheme::layout.page')

@section('content')
<el-card  class="text-align-center">
    <h1>程序已经安装，若要重新安装，请删除app/lock.txt文件!</h1>
</el-card>
<p class="text-align-center">
<el-button type="primary" v-on:click="goFrontend">去首页</el-button>
</p>
<script>
    var vm = new Vue({
        el: '#app',
        data: {},
        methods: {
            goFrontend: function () {
                window.location.href = '/';
            }
        }
    });
</script>
@stop