<!DOCTYPE html>
<html>
<head>

    <title><?=lang('註冊')?> | skyerX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?=config_item("keywords")?>">
    <meta name="description" content="<?=config_item("description")?>">
    <link href="/asset/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <!-- for facebook share-->
    <meta property="fb:app_id" content="1013737265357583">
    <meta name="ogurl" property="og:url" content="<?=base_url()?>">
    <meta name="ogtitle" property="og:title" content="天空之城 | 全球最大的无人机航拍影像社区">
    <meta name="ogdescription" property="og:description" content="天空之城是全球最大的无人机航拍影像社区，来自全世界的航拍摄影师们在这里创造并分享他们的航拍作品，航拍攻略，相互交流、迸发灵感。">

    <!-- Main Font -->
    <script src="<?=base_url()?>asset/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Theme Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/theme-styles.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/blocks.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/fonts.css">

    <!-- Styles for plugins -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/helper.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/custom.css">
</head>

<body>

<?php include_once "./application/views/header.php"; ?>



<!-- ... end Responsive Header -->
<div class="header-spacer header-spacer-small"></div>
<div class="container edit-widget-twitter">
    <div class="gap-20 hidden-xs hidden-sm"></div>
    <?php include_once "./application/views/search.php"; ?>
    <div class="gap-20 hidden-xs hidden-sm"></div>
    <div class="row">
        <div class="ui-block-content text-center bg-white col-sm-6 offset-sm-3">
            <div class="gap-20"></div>
            <div class="mb-sm">
                <h6 class="title text-center"><?=lang('Create an account')?></h6>
            </div>
            <form action="<?=site_url("member/register_do")?>" method="post" onsubmit="return checkForm();">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        
                        <div class="form-group label-floating">
                            <label class="control-label"><?=lang('Username')?></label>
                            <input name="nickname" id="nickname" class="form-control" placeholder="" type="text" required>
                            <span class="material-input"></span></div>

                        <div class="form-group label-floating">
                            <label class="control-label"><?=lang('Email Address')?></label>
                            <input name="email" id="email" class="form-control" placeholder="" type="email" required>
                            <span class="material-input"></span></div>

                        <div class="form-group label-floating is-empty">
                            <label class="control-label"><?=lang('Password')?></label>
                            <input name="password" id="password" class="form-control" placeholder="" type="password" required>
                            <span class="material-input"></span></div>

                        <div class="form-group label-floating is-empty">
                            <label class="control-label"><?=lang('Re-type Your Password')?></label>
                            <input name="repassword" id="repassword" class="form-control" placeholder="" type="password" required>
                            <span class="material-input"></span></div>
                        <input type="submit" class="btn bg-twitter btn-lg full-width btn-icon-left" value="<?=lang('Sign up')?>">
                    </div>

                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="apply"><span class="checkbox-material" required></span>
                                <?=lang('同意SkyerX 的')?><a href="<?=site_url('home/terms')?>" target="_blank"><b><?=lang('使用條款')?></b></a><?=lang('與')?><a href="<?=site_url('home/privacy')?>" target="_blank"><b><?=lang('私隱政策')?></b></a>
                            </label>
                        </div>
                    </div>

                </div>
            </form>

            <div class="or"></div>
            <div class="login-control-button text-center">
                <a href="<?=site_url('member/facebook_login')?>" class="btn btn-control" >
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
               <!--  <a href="#" class="btn btn-control">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a> -->
                <a href="<?=site_url('member/google_login')?>" class="btn btn-control">
                    <i class="fa fa-google" aria-hidden="true"></i>
                </a>
            </div>
            <p class="text-center"><?=lang('Existing account?')?> <a href="#" data-toggle="modal" data-target="#edit-widget-twitter">  <?=lang('Login')?></a></p>
        </div>
    </div>
</div>

<!-- ... end popup login -->
<div class="gap-30"></div>
<?php include_once "./application/views/footer.php"; ?>

<!-- jQuery first, then Other JS. -->
<script src="<?=base_url()?>asset/js/jquery-3.2.0.min.js"></script>
<!-- Js effects for material design. + Tooltips -->
<script src="<?=base_url()?>asset/js/material.min.js"></script>
<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="<?=base_url()?>asset/js/theme-plugins.js"></script>
<!-- Init functions -->
<script src="<?=base_url()?>asset/js/main.js"></script>

<!-- Select / Sorting script -->
<script src="<?=base_url()?>asset/js/selectize.min.js"></script>

<!-- Swiper / Sliders -->
<script src="<?=base_url()?>asset/js/swiper.jquery.min.js"></script>

<!-- Datepicker input field script-->
<script src="<?=base_url()?>asset/js/moment.min.js"></script>
<script src="<?=base_url()?>asset/js/daterangepicker.min.js"></script>
<script>
    $('#search-icon,#m-search').click(function(){
        $("#search-form").toggle(1000);
    });
</script>

<script>
    function checkForm(){
        var regex = /^[^_][A-Za-z]*[a-zA-Z0-9_.]*$/ ;
        if(!regex.test(jQuery("#nickname").val())){
            show_tips();
            return false;
        }
        if(jQuery("#password").val() != jQuery("#repassword").val()){
            alert("<?=lang('兩次密碼不一致')?>");
            return false;
        }
        if(!jQuery('#apply').prop("checked")){
            alert("<?=lang('必須同意SkylerX 的使用條款與私隱政策')?>");
            return false;
        }
    }
</script>

<div class="notice-bar">
    <div class="footer-notice">
        <b><?=lang('用戶名稱只能使用字母、數字、底線和句點。')?></b>
    </div>
</div>

<script>
    function show_tips(){
        $(".footer-notice").addClass('active');
    }

</script>
</body>
</html>