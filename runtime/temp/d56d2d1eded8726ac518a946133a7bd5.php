<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:96:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/testcase/caselist/edit.html";i:1508233938;s:88:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1502881244;s:85:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1502881244;s:87:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1502881244;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">
    <div class="form-group">
        <label for="c-imagewidth" class="control-label col-xs-12 col-sm-2"><?php echo __('casetitle'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[casetitle]"  id="c-imagewidth" class="form-control" required value="<?php echo $row['casetitle']; ?>" />
            <input type="hidden"  name="row[updater]"  id="c-imagewidth" class="form-control"  value="<?php echo $admin['username']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-imagewidth" class="control-label col-xs-12 col-sm-2"><?php echo __('builder'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" disabled= "true " name="row[builder]"  id="c-imagewidth" class="form-control"  value="<?php echo $row['builder']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('demand'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[demand]">
            <?php foreach($demands as $demand): ?>
                <option value="<?php echo $demand; ?>" name="row[demand]" <?php if($row['demand'] == $demand): ?> selected="selected" <?php endif; ?>><?php echo $row['demand']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-type" class="control-label col-xs-12 col-sm-2"><?php echo __('assignTo'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[assignTo]">
            <?php foreach($assignToer as $assignTo): ?>
                <option value="<?php echo $assignTo; ?>" name="row[assignTo]" <?php if($row['assignTo'] == $assignTo): ?> selected="selected" <?php endif; ?> ><?php echo $assignTo; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imagewidth" class="control-label col-xs-12 col-sm-2"><?php echo __('priority'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[priority]">
                <option value="3" <?php if($row['priority'] == '3'): ?> selected="selected" <?php endif; ?>  >3</option>
                <option value="2" <?php if($row['priority'] == '2'): ?> selected="selected" <?php endif; ?>  >2</option>
                <option value="1" <?php if($row['priority'] == '1'): ?> selected="selected" <?php endif; ?>  >1</option>
                <option value="0" <?php if($row['priority'] == '0'): ?> selected="selected" <?php endif; ?>  >0</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imagewidth" class="control-label col-xs-12 col-sm-2"><?php echo __('priority'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-type" data-rule="required" class="form-control selectpicker" name="row[platform]">
                <option value="Android" <?php if($row['platform'] == 'Android'): ?> selected="selected" <?php endif; ?> ><?php echo __('Android'); ?></option>
                <option value="iOS"  <?php if($row['platform'] == 'iOS'): ?> selected="selected" <?php endif; ?> ><?php echo __('iOS'); ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('precondition'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea type="text" name="row[precondition]" data-rule required class="form-control"  rows="2"><?php echo $row['precondition']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('steps'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea type="text" name="row[steps]" data-rule required class="form-control"  rows="10"><?php echo $row['steps']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('expects'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea type="text" name="row[expects]" data-rule required class="form-control"  rows="10"><?php echo $row['expects']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('remarks'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea type="text" name="row[remarks]" data-rule required class="form-control"  rows="5"><?php echo $row['remarks']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('remarks'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select name="row[result]" id="test_result" class="form-control btn-embossed">
            <option value="忽略" name="row[result]" <?php if($row['result'] == '忽略'): ?> selected="selected" <?php endif; ?>>忽略</option>
            <option value="通过" name="row[result]" <?php if($row['result'] == '通过'): ?> selected="selected" <?php endif; ?>>通过</option>
            <option value="失败" name="row[result]" <?php if($row['result'] == '失败'): ?> selected="selected" <?php endif; ?>>失败</option>
            <option value="阻塞" name="row[result]" <?php if($row['result'] == '阻塞'): ?> selected="selected" <?php endif; ?>>阻塞</option>
            <option value="新建" name="row[result]" <?php if($row['result'] == '新建'): ?> selected="selected" <?php endif; ?>>新建</option>
            </select>
        </div>
    </div>
    
    <div class="form-group hide layer-footer">
    <div style="text-align:end;" class="form-group">
     <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8" style="width: 20%;float:center;">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
        </div>
    </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>