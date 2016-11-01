<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title}}</title>
        <!-- 引入样式 -->
        <link rel="stylesheet" href="/views/install/element/theme-default/index.css">
        <link href="/views/install/css/main.css" rel="stylesheet">
        <!-- 先引入 Vue -->
        <script src="/views/install/element/vue.js"></script>
        <!-- 引入组件库 -->
        <script src="/views/install/element/index.js"></script>

    </head>
    <body>
        <div id="app">
            <!--头部-->
            @include('InstallTheme::layout.header')
            <!--中间内容-->
            <el-row>
                <el-col :span="24">
                    <div class="grid-content bg-purple-dark">
                        @yield('content')
                    </div>
                </el-col>
            </el-row>

            @include('InstallTheme::layout.footer')
        </div>
    </body>
</html>