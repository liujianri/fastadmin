<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:96:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/testcase/caselist/edit.html";i:1507792322;s:88:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1502881244;s:85:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1502881244;s:87:"/Applications/MAMP/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1502881244;}*/ ?>
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
        <label for="c-url" class="control-label col-xs-12 col-sm-2"><?php echo __('Url'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[id]" value="<?php echo $row['id']; ?>"  id="c-url" class="form-control" required />
        </div>
    </div>
    <div class="form-group">
        <label for="c-imagewidth" class="control-label col-xs-12 col-sm-2"><?php echo __('Imagewidth'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[casetitle]" value="<?php echo $row['casetitle']; ?>"  id="c-imagewidth" class="form-control" required />
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageheight" class="control-label col-xs-12 col-sm-2"><?php echo __('Imageheight'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[demand]" value="<?php echo $row['demand']; ?>"  id="c-imageheight" class="form-control" required />
        </div>
    </div>
    <div class="form-group">
        <label for="c-imagetype" class="control-label col-xs-12 col-sm-2"><?php echo __('Imagetype'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[steps]" value="<?php echo $row['steps']; ?>"  id="c-imagetype" class="form-control" required />
        </div>
    </div>
    <div class="form-group">
        <label for="c-imageframes" class="control-label col-xs-12 col-sm-2"><?php echo __('Imageframes'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="number" name="row[expects]" value="<?php echo $row['expects']; ?>"  id="c-imageframes" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-filesize" class="control-label col-xs-12 col-sm-2"><?php echo __('Filesize'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="number" name="row[demand]" value="<?php echo $row['demand']; ?>"  id="c-filesize" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-mimetype" class="control-label col-xs-12 col-sm-2"><?php echo __('Mimetype'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[assignTo]" value="<?php echo $row['assignTo']; ?>"  id="c-mimetype" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-extparam" class="control-label col-xs-12 col-sm-2"><?php echo __('Extparam'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[demand]" value="<?php echo $row['demand']; ?>"  id="c-extparam" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-uploadtime" class="control-label col-xs-12 col-sm-2"><?php echo __('Uploadtime'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="datetime" name="row[demand]" value="<?php echo datetime($row['demand']); ?>"  id="c-uploadtime" class="form-control datetimepicker" />
        </div>
    </div>
    <div class="form-group">
        <label for="c-storage" class="control-label col-xs-12 col-sm-2"><?php echo __('Storage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" name="row[demand]" value="<?php echo $row['demand']; ?>"  id="c-storage" class="form-control" />
        </div>
    </div>
    <div class="form-group hide layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
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