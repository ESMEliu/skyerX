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
                    <h6 class="title"><?=lang('電子郵件')?></h6>
                </div>
                <div class="ui-block-content col-sm-8 offset-sm-2">
                    <h3 class="mb"><?=lang('訂閱')?></h3>
                    <form class="member-manage" action="<?=site_url('member/email_do')?>" method="post">
                        <div class="form-group row">
                            <div class="checkbox">
                                <label class="text-black f16">
                                    <input type="checkbox" name="email_alert_new" value="1" <?=$this->session->member['email_alert_new']==1?'checked':''?> />
                                    <?=lang('最新消息電子郵件')?>
                                </label>
                                <p class="ml"><?=lang('當官網上架最新消息就寄出郵件通知。')?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="checkbox">
                                <label class="text-black f16">
                                    <input type="checkbox" name="email_alert_me" value="1" <?=$this->session->member['email_alert_me']==1?'checked':''?> />
                                    <?=lang('提醒電子郵寄')?>
                                </label>
                                <p class="ml"><?=lang('當有人回覆我發布的任務，或是我的投稿成功就寄郵件通知。')?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-6 offset-sm-3">
                                <input type="submit" class="btn btn-blue btn-lg full-width mb0" value="<?=lang('Save')?>" />
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
<div class="gap-100"></div>

<div class="modal fade " id="update-header-photo">
    <div class="modal-dialog ui-block update-header-photo">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-title">
            <h6 class="title"><?=lang('Update Header Photo')?></h6>
        </div>

        <a href="#" class="upload-photo-item" onclick="$('#banner').click()" style="width: 100%;">
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
    <div class="modal-dialog ui-block update-header-photo">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-title">
            <h6 class="title"><?=lang('Update Profile Photo')?></h6>
        </div>

        <a href="#" class="upload-photo-item" onclick="$('#avatar').click()"  style="width: 100%;">
            <svg class="olymp-computer-icon">
                <use xlink:href="<?=base_url()?>asset//html-ori/icons/icons.svg#olymp-computer-icon">
                </use>
            </svg>
            <h6><?=lang('Upload Photo')?></h6>
            <span><?=lang('Browse your computer.')?></span>
        </a>
        <div style="display: none;"><input type="file" id="avatar" accept=".jpg, .jpeg, .png"></div>


       <!--  <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
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
<script>
    $(document).ready(function(){
        $('#banner').change(function(){
            var formData = new FormData();
            formData.append("file",$("#banner")[0].files[0]);
            $.ajax({
                url : '<?=site_url('media/upload')?>',
                type : 'POST',
                data : formData,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response) {
                    jQuery.post("<?=site_url('member/ajax_change_banner')?>",{id:response.id},function(){window.location.reload();});
                },
            });
        });
        $('#avatar').change(function(){
            var formData = new FormData();
            formData.append("file",$("#avatar")[0].files[0]);
            $.ajax({
                url : '<?=site_url('media/upload')?>',
                type : 'POST',
                data : formData,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response) {
                    jQuery.post("<?=site_url('member/ajax_change_avatar')?>",{id:response.id},function(){window.location.reload();});
                },
            });
        });
    });
</script>
</body>
</html>