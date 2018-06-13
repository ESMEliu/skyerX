<!DOCTYPE html>
<html lang="en">
<head>

    <title><?=lang('編輯個人檔案')?> | skyerX</title>
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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/bootstrap-select.css">

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

<div class="header-spacer header-spacer-small"></div>
<div class="container edit-widget-twitter">
    <div class="gap-10"></div>
    <?php include_once "./application/views/search.php"; ?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="gap-15"></div>
            <div class="ui-block">
                <div class="top-header top-header-favorit">
                    <div class="top-header-thumb">
                        <?php if($this->session->member['banner']>0){ ?>
                            <img src="<?=yk_attachment_url($this->session->member['banner'])?>" alt="nature">
                        <?php }else{ ?>
                            <img src="<?=base_url()?>asset/img/top-header2.jpg" alt="nature">
                        <?php } ?>
                        <div class="top-header-author">
                            <div class="author-thumb" style="background-image: url('<?=getMemberAvatarUrl($this->session->member['id'])?>');background-size: cover;background-position-x:center; ">
                            </div>
                            <!--  <div class="author-thumb">
                                <img src="<?=getMemberAvatarUrl($this->session->member['id'])?>" alt="author">
                            </div> -->
                        </div>
                    </div>

                    <div class="manage_s profile-section">
                        <div class="row">
                            <div class="author-content col-xl-8 offset-xl-1 col-sm-11 offset-sm-1 col-md-11 offset-md-1">
                                <div class="author-content">
                                    <a href="javascript:void(0);" class="h3 text-light"><?=$this->session->member['nickname']?></a>
                                    <p class="text-black mt-sm"><?=$this->session->member['description']?></p>
                                    <!-- <div class="text-light">San Francisco, CA</div> -->
                                    <div class="gap-20"></div>
                                </div>
                            </div>

                        </div>
                        <div class="control-block-button">

                            <div class="btn btn-control bg-primary more">
                                <svg class="olymp-settings-icon"><use xlink:href="<?=base_url()?>asset/html-ori/icons/icons.svg#olymp-settings-icon"></use></svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#update-avatar-photo"><?=lang('Update Profile Photo')?></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#update-header-photo"><?=lang('Update Header Photo')?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="gap-20 hidden-xs"></div>
        </div>
        <div class=" col-sm-3 col-xs-3 pr0">
            <div class="ui-block">
                <div class="your-profile">
                    <div class="ui-block-title">
                        <a href="<?=site_url("member/manage")?>" class="h6 title"><?=lang('編輯個人檔案')?></a>
                    </div>
                    <div class="ui-block-title">
                        <a href="<?=site_url("member/paypal")?>" class="h6 title"><?=lang('收款設定')?></a>
                    </div>
                    <div class="ui-block-title">
                        <a href="<?=site_url("member/order")?>" class="h6 title"><?=lang('交易紀錄')?></a>
                    </div>
                    <div class="ui-block-title">
                        <a href="<?=site_url("member/password")?>" class="h6 title"><?=lang('更改密碼')?></a>
                    </div>
                    <div class="ui-block-title">
                        <a href="<?=site_url("member/email")?>" class="h6 title"><?=lang('電子郵件')?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-sm-9 col-xs-9">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title"><?=lang('收款設定')?></h6>
                </div>
                <div class="ui-block-content col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12">
                    <form class="member-manage" action="<?=site_url("member/paypal_do")?>" method="post" enctype="multipart/form-data" onsubmit="return checkForm();">
                        <div class="row">
                            <div class="col-md-5 col-sm-6"><img class="img-responsive" src="/asset/img/symbol-Paypal.png" alt=""></div>
                            <div class="col-md-7 col-sm-6">
                                <ul class="have-list ml-sm">
                                    <li><?=lang('PayPal以USD($)計算')?></li>
                                    <li><?=lang('14天內收到款項')?></li>
                                    <li><?=lang('可能包含服務費')?></li>
                                </ul>
                            </div>
                        </div>
                        <p class="f12"><?=lang('Paypal是⼀種線上⽀付處理服務，您可以透過它來接受skyerX的付款。若要使⽤Paypal處理skyerX的款項，您必須有⼀個Paypal賬⼾。')?><br>
                            <a href="https://www.paypal.com/us/home" target="_blank" class="text-blue "><?=lang('了解更多有關PayPal的資訊')?></a></p>
                        <div class="form-group row">
                            <label class="nowrap col-sm-3 col-4 col-form-label text-right"><?=lang('PayPal 帳號')?></label>
                            <div class="col-sm-8 col-8">
                                <input type="text" name="paypal_account" class="form-control-plaintext" value="<?=$this->session->member['paypal_account']?>" required="" >
                            </div>
                        </div>
                        <div class="row mt">
                            <div class=" col-sm-6 col-6">
                                <button class="btn  btn-grey-light btn-lg full-width mb0"><?=lang('Restore')?></button>
                            </div>
                            <div class=" col-sm-6 col-6">
                                <button class="btn btn-blue btn-lg full-width mb0"><?=lang('Save')?></button>
                            </div>
                        </div>
                    </form></div>

            </div>
        </div>
    </div>


</div>


</div>
</div>
<div class="gap-100"></div>
<div class="modal fade " id="update-header-photo">
    <div class="modal-dialog ui-block window-popup create-friend-group">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-title">
            <h6 class="title"><?=lang('Update Header Photo')?></h6>
        </div>

        <a href="#" class="upload-photo-item" onclick="$('#banner').click()" style="width: 100%">
            <svg class="olymp-computer-icon">
                <use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-computer-icon">
                </use>
            </svg>
            <h6><?=lang('Upload Photo')?></h6>
            <span><?=lang('Browse your computer.')?></span>
        </a>
        <div style="display: none;"><input type="file" id="banner" accept=".jpg, .jpeg, .png"></div>


        <!-- <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
            <svg class="olymp-photos-icon"><use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-photos-icon"></use></svg>
            <h6><?=lang('Choose from My Photos')?></h6>
            <span><?=lang('Choose from your uploaded photos')?></span>
        </a> -->
    </div>
</div>
<div class="modal fade " id="update-avatar-photo">
    <div class="modal-dialog ui-block window-popup create-friend-group">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-title">
            <h6 class="title"><?=lang('Update Profile Photo')?></h6>
        </div>

        <a href="#" class="upload-photo-item" onclick="$('#avatar').click()" style="width: 100%">
            <svg class="olymp-computer-icon">
                <use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-computer-icon">
                </use>
            </svg>
            <h6><?=lang('Upload Photo')?></h6>
            <span><?=lang('Browse your computer.')?></span>
        </a>
        <div style="display: none;"><input type="file" id="avatar" accept=".jpg, .jpeg, .png"></div>


        <!-- <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
            <svg class="olymp-photos-icon"><use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-photos-icon"></use></svg>
            <h6><?=lang('Choose from My Photos')?></h6>
            <span><?=lang('Choose from your uploaded photos')?></span>
        </a> -->
    </div>
</div>

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
<!-- layer -->
<script src="<?=base_url()?>asset/layer-v3.1.1/layer/layer.js"></script>
<script>
    $(document).ready(function(){
        $('#banner').change(function(){
            var formData = new FormData();
            formData.append("file",$("#banner")[0].files[0]);
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
            $.ajax({
                url : '<?=site_url('media/upload')?>',
                type : 'POST',
                data : formData,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response) {
                    if(response.error){
                        alert(response.error);
                        return false;
                    }
                    jQuery.post("<?=site_url('member/ajax_change_banner')?>",{id:response.id},function(){window.location.reload();});
                    layer.close(index);
                },
            });
        });
        $('#avatar').change(function(){
            var formData = new FormData();
            formData.append("file",$("#avatar")[0].files[0]);
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
            $.ajax({
                url : '<?=site_url('media/upload')?>',
                type : 'POST',
                data : formData,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response) {
                    if(response.error){
                        alert(response.error);
                        return false;
                    }
                    jQuery.post("<?=site_url('member/ajax_change_avatar')?>",{id:response.id},function(){window.location.reload();});
                    layer.close(index);
                },
            });
        });
    });

    function checkForm(){

    }
</script>
</body>
</html>