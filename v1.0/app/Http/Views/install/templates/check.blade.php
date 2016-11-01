@extends('InstallTheme::layout.page')

@section('content')
<el-steps :space="200" :active="2" class="text-align-center margin-left-110">
    <el-step title="第一步" description="Simpla 软件使用协议"></el-step>
    <el-step title="第二步" description="配置检测"></el-step>
    <el-step title="第三步" description="填写数据库信息"></el-step>
    <el-step title="第四步" description="完成安装"></el-step>
</el-steps>
<br>
<el-card class="box-card">
    <template>
        <el-table
            :data="tableData"
            style="width: 100%">
            <el-table-column
                prop="envCheck"
                label="环境检查"
                width="180">
            </el-table-column>
            <el-table-column
                prop="recommendConfig"
                label="推荐配置"
                width="180">
            </el-table-column>
            <el-table-column
                prop="currentConfig"
                label="当前配置">
            </el-table-column>
            <el-table-column
                prop="minRequire"
                label="最低要求">
            </el-table-column>
        </el-table>
    </template>
</el-card>
<p class="text-align-center">
<el-button type="primary" v-on:click="checkStep2Again">重新检测</el-button>
@if($currentEnvironment['os_ischeck'] && $currentEnvironment['version_ischeck'])
<el-button type="primary" v-on:click="goStep3">下一步</el-button>
@else
<span class="text-danger">你的当前的配置环境无法安装Simpla</span>
@endif
</p>

<script>
    var vm = new Vue({
        el: '#app',
        data: {
            tableData: [{
                    envCheck: '操作系统',
                    recommendConfig: "{{$recommendEnvironment['os']}}",
                    currentConfig: "{{$currentEnvironment['os']}}",
                    minRequire: "{{$lowestEnvironment['os']}}"
                }, {
                    envCheck: 'PHP版本',
                    recommendConfig: "{{$recommendEnvironment['version']}}",
                    currentConfig: "{{$currentEnvironment['version']}}",
                    minRequire: "{{$lowestEnvironment['version']}}"
                }, {
                    envCheck: 'MCrypt PHP 扩展',
                    recommendConfig: "{{$recommendEnvironment['mcrypt']}}",
                    currentConfig: "{{$currentEnvironment['mcrypt']}}",
                    minRequire: "{{$lowestEnvironment['mcrypt']}}"
                }, {
                    envCheck: '附件上传',
                    recommendConfig: "{{$recommendEnvironment['upload']}}",
                    currentConfig: "{{$currentEnvironment['upload']}}",
                    minRequire: "{{$lowestEnvironment['upload']}}"
                }, {
                    envCheck: '磁盘空间',
                    recommendConfig: "{{$recommendEnvironment['space']}}",
                    currentConfig: "{{$currentEnvironment['space']}}",
                    minRequire: "{{$lowestEnvironment['space']}}"
                }]
        },
        methods: {
            checkStep2Again: function () {
                window.location.href = '/install/step2';
            },
            goStep3: function () {
                window.location.href = '/install/step3';
            }
        }
    });
</script>
@stop