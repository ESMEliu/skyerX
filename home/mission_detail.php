<!DOCTYPE html>
<html lang="en">
<head>

    <title><?=lang('航拍任務-任務清單')?> | skyerX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?=config_item("keywords")?>">
    <meta name="description" content="<?=config_item("description")?>">
    <link href="/asset/img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <meta property="og:url"           content="<?=site_url("home/mission_detail/{$data['id']}")?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=$data['title']?> | skyerX" />
    <meta property="og:description"         content="<?=$data['description']?>" />
    <?php if($data['media']>0){ ?>
    <meta property="og:image"         content="<?=yk_attachment_url($data['media'],0)?>" />
    <?php } ?>

    <!-- Main Font -->
    <script src="/asset/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/asset/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/asset/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/asset/Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Theme Styles CSS -->
    <link rel="stylesheet" type="text/css" href="/asset/css/theme-styles.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/blocks.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/fonts.css">
    <!-- Lightbox popup script-->
    <link rel="stylesheet" type="text/css" href="/asset/css/magnific-popup.css">

    <!-- Styles for plugins -->
    <link rel="stylesheet" type="text/css" href="/asset/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/helper.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/custom.css">

</head>

<body id="detial-video">
<?php include_once "./application/views/header.php"; ?>
<header class="header header-responsive" id="site-header-responsive">

    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <div class="nav-link hidden-sm"><div class="gap-10"></div><h4 class="c-white mission-title mt-xs"><?=lang('MISSION MODE')?></h4></div>
                <a class="nav-link hidden-xs" href="/" >
                    <div class="control-icon has-items">
                        <img class="img-responsive" src="/asset/img/main-logo.png" alt="">
                    </div>
                </a>
            </li>
        </ul>
    </div>

</header>

<!-- ... end Responsive Header -->
<div class="header-spacer header-spacer-small"></div>
<div class="container">
    <?php include_once "./application/views/search.php"; ?>
    <div class="row">
        <div class="col-sm-11 " style="margin: 0 auto;">
            <div class="gap-10"></div>
            <div class="ui-block row">
                <div class="post__date text-center col-sm-12 mt-sm">
                    <time class="published h5" datetime="2004-07-24T18:18">
                        <?=unixTimeToStr($data['add_time'],1)?> ~ <?=unixTimeToStr($data['dealine'],1)?>
                    </time>
                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-three-dots-icon"></use></svg>
                        <ul class="more-dropdown">
                            <li>
                                <a href="###" onclick="report(<?=$data['id']?>);"><?=lang('檢舉不當貼文')?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if($data['media']>0){ ?>
                <div class="mission-block">
                    <div class="row">
                        <div class="col-sm-5 col-6">
                            <a href="###"><img class="img-responsive" src="<?=yk_attachment_url($data['media'],0)?>" alt=""></a>
                        </div>
                        <div class="col-sm-7 col-6 ">
                            <div class="distable">
                                <div class="distablecell">
                                <div class="h2 title"><?=$data['title']?></div>
                                <div class="post__date">
                                    <p class="text-red h4">Reward $ <?=$data['mission_price']?></p>
                                    <span class="c-grey" style="max-width: 100px !important;"><?=lang('距離')?><span id="distance"></span>km</span>
                                </div>
                                <?php if($data['member_id']!=$this->session->member['id']){ ?>
                                <span class="add-m-like <?php if(is_mission_star($data['id'])){ ?>add<?php } ?>" id="mission_star_3_<?=$data['id']?>" onclick="mission_star3(<?=$data['id']?>)">
                                    <a href="#">
                                        <i class="fa fa-star fa-lg" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="mission-block col-sm-12 text-center">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <a href="###"><div class="h2 title"><?=$data['title']?></div></a>
                            <div class="post__date">
                                <p class="text-red h4">$ <?=$data['mission_price']?></p>
                                <a class="c-secondary" href="###" target="_blank"><?=getGoogleAddress($data['lat'],$data['lng'])?></a>
                                <span class="c-grey"><?=lang('距離')?><span id="distance"></span>km</span>
                            </div>
                            <?php if($data['member_id']!=$this->session->member['id']){ ?>
                            <span class="add-m-like <?php if(is_mission_star($data['id'])){ ?>add<?php } ?>" id="mission_star_3_<?=$data['id']?>" onclick="mission_star3(<?=$data['id']?>)">
                                <a href="#">
                                    <i class="fa fa-star fa-lg" aria-hidden="true"></i>
                                </a>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-sm-12 post" style="border-bottom: none;">
                    <p>
                        <b><?=lang('畫質')?>:</b>
                       <?php if($data['type']=='video'){ ?>
                        <?=lang('影片')?> <?=$data['video_type']?> <?=lang('以上')?>
                        <?php }else{ ?>
                        <?=lang('照片')?> <?=$data['pic_type']?> <?=lang('以上')?>
                       <?php } ?>
                    </p>
                    <p>
                        <b><?=lang('要求')?>:</b>
                        <?php if($data['type']=='video'){ ?>
                        <?=lang('影片')?> <?=$data['video_min']?><?=lang('MIN')?> <?=lang('以上')?>
                        <?php }else{ ?>
                        <?=lang('照片')?> <?=$data['pic_pcs']?><?=lang('PCS')?> <?=lang('以上')?>
                        <?php } ?>
                    </p>
                    <p><b><?=lang('概述')?>:</b>	<?=$data['description']?></p>
                </div>
                <div class="col-sm-12">
                    <div class="post-additional-info inline-items mb-sm">
                        <?php if($data['member_id']!=$this->session->member['id']){ ?>
                        <a href="###" class="post-add-icon inline-items" onclick="mission_like(<?=$data['id']?>)">
                            <?php if(is_mission_like($data['id'])){ ?>
                            <img class="response click" src="<?=base_url()?>asset/img/like-d.png" id="like_pic_<?=$data['id']?>" alt="" width="">
                            <?php }else{ ?>
                            <img class="response" src="<?=base_url()?>asset/img/like.png" id="like_pic_<?=$data['id']?>" alt="" width="">
                            <?php } ?>
                        </a>
                        <?php } ?>
                        <a href="javascript:void(0);" class="post-add-icon inline-items mt0">
                            <img id="m-commenticon1" class="response" src="/asset/img/comment.png" alt="" width="">
                            <!-- <span>264</span> -->
                        </a>

                        <div class="comments-shared">

                            <a href="<?=site_url("googlemap/route/{$data['id']}")?>?type=mission" class="post-add-icon inline-items" target="_blank">
                                <img class="response" src="/asset/img/route.png" alt="">
                            </a>
                            <a href="<?=site_url("googlemap/pin/{$data['id']}")?>?type=mission" class="post-add-icon inline-items">
                                <img class="response" src="/asset/img/pin.png" alt="">
                            </a>

                            <a id="sharepost" href="javascript:void(0);" class="post-add-icon inline-items"  onclick="share_mission(<?=$data['id']?>)">
                                <img class="response" src="/asset/img/share.png" alt="">
                            </a>
                            <?php if($this->session->member['id'] == $data['member_id'] && $data['status'] == 'OPEN'){ //开放任务-任务主 ?>
                                <a href="<?=site_url("media/upload_mission/{$data['id']}")?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/OPEN-btn.png" alt=""></a>
                            <?php }else if($this->session->member['id'] == $data['member_id'] && $data['status'] == 'DRAFT'){ //草稿任务-任务主 ?>
                                <a href="<?=site_url("media/upload_mission/{$data['id']}")?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/DRAFT-btn.png" alt=""></a>
                            <?php }else if($this->session->member['id'] != $data['member_id'] && !is_submit_mission($data['id'])){ //未接任务-非任务主 ?>
                                <a href="<?=$data['type']=='video'?site_url("media/upload_video"):site_url("media/upload_image")?>?mission_id=<?=$data['id']?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/SUBMIT-btn.png" alt=""></a>
                            <?php }else if($this->session->member['id'] != $data['member_id'] && is_submit_mission($data['id']) && submit_mission_status($data['id'])=='SELECTING'){ //已接任务-非任务主-选择中?>
                                <a href="<?=$data['type']=='video'?site_url("media/upload_video"):site_url("media/upload_image")?>?mission_id=<?=$data['id']?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/Submitted-btn.png" alt=""></a>
                            <?php }else if($this->session->member['id'] != $data['member_id'] && is_submit_mission($data['id']) && submit_mission_status($data['id'])=='UNSELECT'){ //已接任务-非任务主-未选中?>
                                <a href="###""><img class="MISSION-btns" class="img-responsive" src="/asset/img/CLOSE-btn.png" alt=""></a>
                            <?php }else if($this->session->member['id'] != $data['member_id'] && is_submit_mission($data['id']) && submit_mission_status($data['id'])=='SELECTED'){ //已接任务-非任务主-已择中?>
                                <a href="###""><img class="MISSION-btns" class="img-responsive" src="/asset/img/DEAL-btn.png" alt=""></a>
                            <?php }else if($data['status']=='CLOSE'){ ?>
                                <img class="MISSION-btns" class="img-responsive" src="/asset/img/CLOSE-btn.png" alt="">
                            <?php }?>

                        </div>
                    </div>
                </div>
                <?php if($data['member_id']==$this->session->member['id']){ ?>
                <div class="bg-white col-sm-12 pb-sm">
                    <div class="grid">
                        <?php foreach($media as $v){ ?>
                        <figure class="effect-zoe">
                            <a href="<?=site_url('home/detail/'.$v['id'])?>"><img class="img-responsive" src="<?=$v['image'][0]?>" alt="img25"></a>
                            <figcaption>
                                <div class="post__author author vcard ">
                                    <a href="<?=site_url('member/view/'.$v['member_id'])?>" style="background-image: url('<?=getMemberAvatarUrl($v['member_id'])?>');background-size: cover;background-position-x:center; ">
                                        <!-- <img alt="author" src="<?=getMemberAvatarUrl($v['member_id'])?>" class="avatar"></a> -->
                                    <a class="c-white" href="<?=site_url('member/view/'.$v['member_id'])?>"><?=getMemberNickname($v['member_id'])?></a>
                                </div>
                            </figcaption>
                        </figure>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <!-- 留言 -->
                <div class="bg-white col-sm-12 pd0">
                    <form class="comment-form inline-items">
                        <div class="post__author author vcard inline-items">
                            <!-- <a href="<?=site_url("member/view")?>"> -->
                                <span class="author-round" style="width: 30px;height: 30px;background-image: url('<?=getMemberAvatarUrl($this->session->member['id'])?>');background-size: cover;background-position-x:center; ">
                                    <!-- <img alt="author" src="<?=getMemberAvatarUrl($this->session->member['id'])?>" class="avatar"> -->
                                </span>
                                <!-- <img src="<?=getMemberAvatarUrl($this->session->member['id'])?>" alt="author"> -->
                            <!-- </a> -->
                        </div>
                        <div class="form-group with-icon-right ">
                            <textarea class="form-control" placeholder="<?//=lang('使用Ctrl+Enter發送')?>" id="comments_textarea_<?=$data['id']?>" ytype="mission" yid="<?=$data['id']?>" yreply="" onkeydown="submit_comment(event,this);"></textarea>
                        </div>
                        <img class="float-right sub_btn" src="/asset/img/Send_reply_logo.png" alt="" width="" onclick="submit_comment('sendBtn',jQuery(this).parent().find('textarea')[0]);">
                    </form>
                </div>
                <ul class="comments-list" id="comments_list_<?=$data['id']?>">
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="header-spacer header-spacer-small"></div>

<?php include_once "./application/views/template-mission.php"; ?>
<?php include_once "./application/views/template_comment.php"; ?>
<?php include_once "./application/views/footer.php"; ?>
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>
<!-- jQuery first, then Other JS. -->
<script src="/asset/js/jquery-3.2.0.min.js"></script>
<!-- Js effects for material design. + Tooltips -->
<script src="/asset/js/material.min.js"></script>
<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="/asset/js/theme-plugins.js"></script>
<!-- Init functions -->
<script src="/asset/js/main.js"></script>

<!-- Select / Sorting script -->
<script src="/asset/js/selectize.min.js"></script>

<!-- Datepicker input field script-->
<script src="/asset/js/moment.min.js"></script>
<script src="/asset/js/daterangepicker.min.js"></script>

<!-- Swiper / Sliders -->
<script src="/asset/js/swiper.jquery.min.js"></script>
<script src="/asset/js/jquery.magnific-popup.min.js"></script>

<script src="/asset/js/mediaelement-and-player.min.js"></script>
<script src="/asset/js/mediaelement-playlist-plugin.min.js"></script>
<script>
    $('#search-icon,#m-search').click(function(){
        $("#search-form").toggle(1000);
    });
</script>
<script>
    function report(mission_id){
        if(confirm('<?=lang('確定要檢舉嗎?')?>')){
            $.post("<?=site_url('ajax/mission_report')?>",{mission_id:mission_id},function(re){
                alert('<?=lang('舉報成功！')?>')
            });
        }
    }
    var lat,lng;
    $(document).ready(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                lat = position.coords.latitude;
                lng = position.coords.longitude;
                $.post("<?=site_url('ajax/getDistance')?>",{lat:lat,lng:lng,vlat:'<?=$data['lat']?>',vlng:'<?=$data['lng']?>'},function(re){
                    $("#distance").html(re);
                });
            },function(){
                $("#distance").parent().remove();
            });
        }else{
            $("#distance").parent().remove();
        }
        load_comment('mission',<?=$data['id']?>);
    });
</script>
<?php include_once "./application/views/share.php"; ?>
</body>
</html>