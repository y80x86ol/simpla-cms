@extends('InstallTheme::layout.page')

@section('content')
<el-steps :space="200" :active="1" class="text-align-center margin-left-110">
    <el-step title="第一步" description="Simpla 软件使用协议"></el-step>
    <el-step title="第二步" description="配置检测"></el-step>
    <el-step title="第三步" description="填写数据库信息"></el-step>
    <el-step title="第四步" description="完成安装"></el-step>
</el-steps>
<br>
<el-card class="box-card">
    <p>Simpla 软件使用协议</p>

    <p>版权所有(c)2014-2015，simplahub.com保留所有权力。</p>

    <p>感谢您选择 simpla 内容管理系统, 希望他能够帮您把网站发展的更快、更好、更强！</p>

    <p>Simpla 遵循GUN协议。你可以遵守协议进行你想要的操作。</p>

    <p>Simpla是一款免费开源软件，但是希望你在你的网站底部保留我们的连接，给予我们支持。</p>

    <p>通过Simpla的官方网站，你可以免费的获得主题和模块，或者贡献你自己的主题或者模块。</p>

    <p>再次感谢你使用Simpla，我们将会做的更好！</p>

    <p>如果你有任何问题或者疑问，请到<a href="http://simpla.simplahub.com" target="_blank">Simpla官方网站</a>或者<a href="http://www.simplahub.com" target="_blank">Simplahub社区</a>进行咨询。</p>

</el-card>
<p class="text-align-center" id="goStep2">
<el-button type="primary" v-on:click="goStep2">接受</el-button>
</p>
<script>
    var vm = new Vue({
        el: '#app',
        data: {},
        methods: {
            goStep2: function () {
                window.location.href = '/install/step2';
            }
        }
    });
</script>
@stop