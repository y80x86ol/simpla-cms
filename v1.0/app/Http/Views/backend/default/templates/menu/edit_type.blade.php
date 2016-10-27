<?php

use Illuminate\Support\Facades\Input;
?>
@extends('BackTheme::layout.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">编辑菜单类型</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(array('method' => 'post')) }}
        @if($errors->all())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach($errors->all() as $error)
            {{$error}}<br/>
            @endforeach
        </div>
        @endif
        <div class="form-group">
            <label>标题<span class="text-red" title="此项必填">*</span></label>
            <input name="title" class="form-control" value="{{Input::old('title')?Input::old('title'):$menu_type['title']}}" maxlength="32" required="">
        </div>
        <div class="form-group">
            <label>描述</label>
            <textarea name="description" class="form-control" maxlength="256">{{Input::old('description')?Input::old('description'):$menu_type['description']}}</textarea>
        </div>
        <div class="form-group">
            <label>机器名字<span class="text-red" title="此项必填">*</span></label>
            <input name="machine_name" class="form-control" value="{{Input::old('machine_name')?Input::old('machine_name'):$menu_type['machine_name']}}" maxlength="64" required="" disabled="">
            <small class="help-block">machine_name：机器名字用于前台数据读取，且机器名字不能重复，仅允许字母、数字、破折号（-）以及底线（_），填写后无法修改。</small>
        </div>
        <button class="btn btn-default" type="submit">保存</button>
        {{Form::close()}}
    </div>
</div>
@stop