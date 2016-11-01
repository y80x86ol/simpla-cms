<?php

//视图中使用Input
use Illuminate\Support\Facades\Input;
?>

@extends('InstallTheme::layout.page')

@section('content')
<el-steps :space="200" :active="3" class="text-align-center margin-left-110">
    <el-step title="第一步" description="Simpla 软件使用协议"></el-step>
    <el-step title="第二步" description="配置检测"></el-step>
    <el-step title="第三步" description="填写数据库信息"></el-step>
    <el-step title="第四步" description="完成安装"></el-step>
</el-steps>
<br>
{{ Form::open(array('method' => 'post')) }}
<el-card class="box-card">
    <!--错误提示-->
    <div class="text-align-center error-message">
        @if($errors->all())
        @foreach($errors->all() as $error)
        <p style="color: #FF4949">{{$error}}</p>
        @endforeach
        @endif
    </div>

    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            数据库主机
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="db_hostname" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('db_hostname')?Input::old('db_hostname'):'localhost'}}" maxlength="100">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            数据库名字
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="db_name" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('db_name')}}" maxlength="20">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            数据库账户
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="db_username" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('db_username')}}" maxlength="30">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            数据库密码
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="db_password" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('db_password')}}" maxlength="30">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            数据库前缀
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="db_prefix" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('db_prefix')?Input::old('db_prefix'):'sp_'}}" maxlength="20">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            管理员用户名
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="username" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('username')}}" maxlength="20">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            管理员密码
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="password" type="text" autocomplete="off" class="el-input__inner" required="" value="" maxlength="20">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            再次输入管理员密码
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="password_confirmation" type="text" autocomplete="off" class="el-input__inner" required="" value="" maxlength="20">
            </div>
        </div>
    </div>
    <div class="el-form-item"><label class="el-form-item__label" style="width: 100px;">
            管理员邮箱
        </label>
        <div class="el-form-item__content" style="margin-left: 100px;">
            <div class="el-input">
                <input name="email" type="text" autocomplete="off" class="el-input__inner" required="" value="{{Input::old('email')}}" maxlength="60">
            </div>
        </div>
    </div>

</el-card>
<p class="text-align-center" id="goStep3">
    <button type="submit" class="el-button el-button--primary">
        <span>安装</span>
    </button>
</p>
{{ Form::close() }}
<script>
    var vm = new Vue({
        el: '#app',
        data: {
        },
        methods: {
        }
    });
</script>

@stop