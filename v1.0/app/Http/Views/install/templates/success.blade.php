
@extends('InstallTheme::layout.page')

@section('content')
<el-steps :space="200" :active="4" class="text-align-center margin-left-110">
    <el-step title="第一步" description="Simpla 软件使用协议"></el-step>
    <el-step title="第二步" description="配置检测"></el-step>
    <el-step title="第三步" description="填写数据库信息"></el-step>
    <el-step title="第四步" description="完成安装"></el-step>
</el-steps>
<br>
<el-card  class="text-align-center">
    <h1>恭喜你,完成安装!</h1>
    <span style="color:#FF4949">为了安全，请删除app/Http/Controllers/Install目录下的安装文件</span>
</el-card>
<p class="text-align-center">
<el-button type="primary" v-on:click="goFrontend">去首页</el-button>
<el-button type="primary" v-on:click="goBackend">去后台</el-button>
</p>
<script>
    var vm = new Vue({
        el: '#app',
        data: {},
        methods: {
            goFrontend: function () {
                //window.location.href = '/';
                window.open('/');
            },
            goBackend: function () {
                //window.location.href = '/admin/login';
                window.open('/admin/login');
            }
        }
    });
</script>
@stop