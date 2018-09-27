<?php
/**
 * Desc: opcache信息统计
 * User: Liupeng
 * Date: 2018-09-27 10:39
 */
// 判断是否开启
if(!function_exists('opcache_get_configuration')){
    echo '未开启opcache！';
    exit();
}

// 获取配置信息
$opcacheConfig = opcache_get_configuration();

// 获取状态信息
$opcacheStatus = opcache_get_status(FALSE);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <title><?= $opcacheConfig['version']['opcache_product_name'] ?>信息统计</title>
    <style>
        th {
            width: 33.33%;
        }
    </style>
</head>
<body>
<h1 class="text-center"><?= $opcacheConfig['version']['opcache_product_name'], '-', $opcacheConfig['version']['version'] ?>
    信息统计</h1>

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered">
                <caption>状态统计信息</caption>
                <thead>
                <tr>
                    <th>信息</th>
                    <th>值</th>
                    <th>备注</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>num_cached_scripts</td>
                    <td><?= $opcacheStatus['opcache_statistics']['num_cached_scripts'], '/', $opcacheStatus['opcache_statistics']['max_cached_keys'] ?></td>
                    <td>缓存脚本数</td>
                </tr>
                <tr>
                    <td>opcache_hit_rate</td>
                    <td><?= number_format($opcacheStatus['opcache_statistics']['opcache_hit_rate'],2),'%' ?></td>
                    <td>缓存命中率</td>
                </tr>
                <tr>
                    <td>hits</td>
                    <td><?= $opcacheStatus['opcache_statistics']['hits'] ?></td>
                    <td>缓存命中数</td>
                </tr>
                <tr>
                    <td>misses</td>
                    <td><?= $opcacheStatus['opcache_statistics']['misses'] ?></td>
                    <td>缓存未命中数</td>
                </tr>
                </tbody>
            </table>


            <table class="table table-bordered">
                <caption>内存信息统计</caption>
                <thead>
                <tr>
                    <th>信息</th>
                    <th>值</th>
                    <th>备注</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>used_memory</td>
                    <td><?= number_format($opcacheStatus['memory_usage']['used_memory'] / 1024 / 1024, 2), 'm' ?></td>
                    <td>已使用内存</td>
                </tr>
                <tr>
                    <td>free_memory</td>
                    <td><?= number_format($opcacheStatus['memory_usage']['free_memory'] / 1024 / 1024, 2), 'm' ?></td>
                    <td>未使用内存</td>
                </tr>
                <tr>
                    <td>wasted_memory</td>
                    <td><?= number_format($opcacheStatus['memory_usage']['wasted_memory'] / 1024 / 1024, 2), 'm' ?></td>
                    <td>浪费内存</td>
                </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <caption>配置信息</caption>
                <thead>
                <tr>
                    <th>配置</th>
                    <th>值</th>
                    <th>备注</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>opcache.enable</td>
                    <td><?= $opcacheConfig['directives']['opcache.enable'] ? 'true' : 'false' ?></td>
                    <td>是否开启</td>
                </tr>
                <tr>
                    <td>opcache.enable_cli</td>
                    <td><?= $opcacheConfig['directives']['opcache.enable_cli'] ? 'true' : 'false' ?></td>
                    <td>命令行模式是否开启</td>
                </tr>
                <tr>
                    <td>opcache.use_cwd</td>
                    <td><?= $opcacheConfig['directives']['opcache.enable_cli'] ? 'true' : 'false' ?></td>
                    <td>是否附加脚本的工作目录避免同名脚本冲突</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
