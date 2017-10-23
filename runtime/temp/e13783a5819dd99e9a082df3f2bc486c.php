<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:102:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/testcase/demand/additeration.html";i:1508489026;s:88:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1502881244;s:85:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1502881244;s:87:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1502881244;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <div class="content">
<div class="row animated fadeInRight">
<div class="col-md-4" style="width: 45%">
<div class="box box-success">
<div class="panel-heading"><?php echo __('add iteration'); ?></div>
<div class="panel panel-default panel-intro" >
<div class="panel-body">
<form id="edit-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">
    <div class="form-group">
        <label for="c-imagewidth" class="control-label col-xs-12 col-sm-2"><?php echo __('version number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="vnumber"  id="c-imagewidth" class="form-control" required />
        </div>
    </div>
    
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea type="text" name="remark" data-rule  class="form-control"  rows="5"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"></label>
        <button type="submit" class="btn btn-success btn-embossed"><?php echo __('OK'); ?></button>
        <a type="text" class="btn btn-default btn-embossed" href="<?php echo url('index'); ?>"><?php echo __('Back'); ?></a>
    </div>
</form>
</div>
</div>
</div>
</div>
<div class="col-md-4" style="width: 50%">
<div class="box box-success">
<div class="panel panel-default panel-intro" >
<div class="panel-body">
<div class="bootstrap-table">
<div class="fixed-table-container" style="padding-bottom: 0px;">
    <div class="fixed-table-body">
        <table class="table table-striped table-bordered table-hover" >
            <thead style="display: table-header-group;">
                <tr>
                    <th style="text-align: center; vertical-align: middle; ">
                        <?php echo __('ID'); ?>
                    </th>
                    <th style="text-align: center; vertical-align: middle; ">
                       <?php echo __('version number'); ?>
                    </th>
                     <th style="text-align: center; vertical-align: middle; ">
                        <?php echo __('Status'); ?>
                    </th>
                    <th style="text-align: center; vertical-align: middle; ">
                        <?php echo __('remark'); ?>
                    </th>
                    <th style="text-align: center; vertical-align: middle; ">
                        <?php echo __('Operate'); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($iterations) || $iterations instanceof \think\Collection || $iterations instanceof \think\Paginator): $i = 0; $__LIST__ = $iterations;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td style="text-align: center; vertical-align: middle;">
                        <?php echo $vo['id']; ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <?php echo $vo['vnumber']; ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <?php echo $vo['status']; ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                        <?php echo $vo['remark']; ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                            <a href="<?php echo url('edititeration',array('id'=>$vo['id'])); ?>" class="btn btn-xs btn-success btn-editone" title=""><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo url('deliteration',array('ids'=>$vo['id'])); ?>" class="btn btn-xs btn-danger btn-delone" title=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="pull-right pagination"><?php echo $iterations->render(); ?></div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>