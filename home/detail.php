<!DOCTYPE html>
<html lang="zh-tw">
<head>

    <title><?=$data['title']?> | <?=lang('START ADVENTURE')?></title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?=config_item("keywords")?>">
    <meta name="description" content="<?=config_item("description")?>">
    <link href="/asset/img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <meta property="og:url"           content="<?=site_url("home/detail/{$data['id']}")?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?=$data['title']?>" />
    <meta property="og:description"         content="<?=$data['description']?>" />

    <?php if($data['type']=='video'){ ?>
    <meta property="og:image"         content="<?=$data['media']!=''?yk_attachment_url($data['media']):getVideoImg($data['video_url'])?>" />
    <?php }else if($data['type']=='image'&&strpos($data['media'],",")>-1){ ?>
    <meta property="og:image"         content="<?=yk_attachment_url(explode(",",$data['media'])[0])?>" />
    <?php }else{ ?>
    <meta property="og:image"         content="<?=yk_attachment_url($data['media'])?>" />
    <?php } ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap-grid.css">


    <!-- Theme Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/theme-styles.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/blocks.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/fonts.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/swiper-3.4.2.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/helper.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/custom.css">

    <!-- Lightbox popup script-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/magnific-popup.css">

    <!-- Styles for plugins -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/daterangepicker.css">


    <!-- Main Font -->
    <script src="<?=base_url()?>asset/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
</head>
<body id="detial-video">
<?php include_once "./application/views/header.php"; ?>
<!--  end Responsive Header -->
<div class="gap-60 hidden-xs"></div>
<div class="gap-40 visible-xs"></div>
<div class="container">
    <?php include_once "./application/views/search.php"; ?>
    <div class="row detial">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-xs">
            <div class="ui-block features-video">
                <?php if($data['type']=='video'){ ?>
                    <div class="video-player">
                        <a href="###" class="post-add-icon inline-items star <?php if($data['star']){ ?>add<?php } ?>" onclick="star(<?=$data['id']?>)">
                            <?php if($data['star']){ ?>
                                <img class="response" src="<?=base_url()?>asset/img/star-d.png"  id="star_pic_<?=$data['id']?>" alt="">
                            <?php }else{ ?>
                                <img class="response" src="<?=base_url()?>asset/img/star.png"  id="star_pic_<?=$data['id']?>"alt="">
                            <?php } ?>
                        </a>
                        <img src="<?=$data['media']!=''?yk_attachment_url($data['media']):getVideoImg($data['video_url'])?>" alt="photo">
                        <?php
                            if (strpos($data['video_url'],"youku")>-1) {
                                $arr = explode('.html', $data['video_url']);
                                $data['video_url'] = $arr[0];
                                $id = end(explode('id_', $data['video_url']));
                        ?>
                                <a href="https://player.youku.com/embed/<?=$id;?>" class="play-video" onclick="add_view_count();">
                        <?php
                            } else {
                         ?>
                                <a href="<?=$data['video_url']?>" class="play-video" onclick="add_view_count();">
                        <?php
                            }
                        ?>
                            <img id="play-btn" src="/asset/img/play-btn.png" alt="">
                        </a>
                        <div class="overlay"></div>
                    </div>
                <?php }else if($data['type']=='image'&&strpos($data['media'],",")>-1){ ?>
                    <?php $images = explode(",",$data['media']);?>
                    <div class="video-player ">
                        <div class="mt-sm">
                            <div class="single-post-slider">
                                <div class="swiper-container" data-autoplay="4000">
                                    <a href="###" class="post-add-icon inline-items star <?php if($data['star']){ ?>add<?php } ?>" onclick="star(<?=$data['id']?>)">
                                        <?php if($data['star']){ ?>
                                            <img class="response" src="<?=base_url()?>asset/img/star-d.png"  id="star_pic_<?=$data['id']?>" alt="">
                                        <?php }else{ ?>
                                            <img class="response" src="<?=base_url()?>asset/img/star.png"  id="star_pic_<?=$data['id']?>"alt="">
                                        <?php } ?>
                                    </a>
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper js-zoom-gallery">
                                        <!-- Slides -->
                                        <?php foreach($images as $v){ ?>
                                        <div class="swiper-slide">
                                            <a href="<?=yk_attachment_url($v)?>"><img src="<?=yk_attachment_url($v)?>" <?=yk_attachment_size($v)?> alt="photo"></a>
                                        </div>
                                        <?php } ?>
                                    </div>

                                </div>
    
                                <!--Pagination tabs-->

                                <div class="slider-slides">
                                    <?php foreach($images as $v){ ?>
                                    <a href="#" class="slides-item ">
                                        <img class="img-responsive" src="<?=yk_attachment_url($v)?>" width="60px" height="60px" alt="slide">
                                        <div class="overlay overlay-dark"></div>
                                    </a>
                                    <?php } ?>

                                    <!--Prev Next Arrows-->

                                    <svg class="btn-next olymp-popup-right-arrow"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-popup-right-arrow"></use></svg>

                                    <svg class="btn-prev olymp-popup-left-arrow"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-popup-left-arrow"></use></svg>

                                </div>


                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="video-player">
                        <a href="<?=yk_attachment_url($data['media'])?>" class="js-zoom-image">
                            <img src="<?=yk_attachment_url($data['media'])?>" alt="photo">
                        </a>
                        <a href="###" class="post-add-icon inline-items star <?php if($data['star']){ ?>add<?php } ?>" onclick="star(<?=$data['id']?>)">
                            <?php if($data['star']){ ?>
                                <img class="response" src="<?=base_url()?>asset/img/star-d.png"  id="star_pic_<?=$data['id']?>" alt="">
                            <?php }else{ ?>
                                <img class="response" src="<?=base_url()?>asset/img/star.png"  id="star_pic_<?=$data['id']?>"alt="">
                            <?php } ?>
                        </a>
                    </div>
                <?php } ?>
                <div class="features-video-content">
                    <article class="hentry post no_bborder">
                        <div class="post__author author vcard inline-items">
                            <a href="<?=site_url("member/view/{$data['member_id']}")?>">
                                 <span class="author-round" style="background-image: url('<?=getMemberAvatarUrl($data['member_id'])?>');background-size: cover;background-position-x:center; ">
                                    <!-- <img alt="author" src="<?=getMemberAvatarUrl($data['member_id'])?>" class="avatar"> -->
                                </span>
                                <!-- <img src="<?=getMemberAvatarUrl($data['member_id'])?>" width="40px" height="40px" alt="author"> -->
                            </a>

                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="<?=site_url("member/view/{$data['member_id']}")?>"><?=getMemberNickname($data['member_id'])?></a>
                                <div class="post__date">
                                    <time class="published" datetime="<?=unixTimeToStr($data['add_time'],1)?>">
                                        <?=unixTimeToStr($data['add_time'],1)?>
                                    </time>
                                </div>
                            </div>
                            <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-three-dots-icon"></use></svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="###" onclick="report(<?=$data['id']?>);"><?=lang('檢舉不當貼文')?></a>
                                    </li>
                                    <!-- 如果不是自己的貼文不會有編輯的選項 -->
                                    <?php if($data['member_id'] == $this->session->member['id']){ ?>
                                    <li>
                                        <a href="<?=site_url('media/upload_'.$data['type'].'/'.$data['id'])?>"><?=lang('編輯')?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="pro">
                            <div class="row">
                                <div class="col-md-12 text-black">
                                    <h5><b><?=$data['title']?></b></h5>
                                    <?php if(!$data['mission_id']>0){ ?>
                                    <p> <?=$data['description']?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="post-additional-info inline-items">
                            <?php if(!$data['mission_id']>0){ ?>
                                <a href="###" class="post-add-icon inline-items" onclick="like(<?=$data['id']?>)">
                                    <?php if(is_like($data['id'])){ ?>
                                    <img class="response click" src="<?=base_url()?>asset/img/like-d.png" id="like_pic_<?=$data['id']?>" alt="" width="">
                                    <?php }else{ ?>
                                    <img class="response" src="<?=base_url()?>asset/img/like.png" id="like_pic_<?=$data['id']?>" alt="" width="">
                                    <?php } ?>
                                    <!-- <span>49</span> -->
                                </a>
                            <?php } ?>
                            <a href="javascript:void(0);" class="post-add-icon inline-items mt0" onclick="$('#comments_textarea_<?= $data['id']?>').focus();">
                                <img id="m-commenticon1" class="response" src="/asset/img/comment.png" alt="" width="">
                                <!-- <span>264</span> -->
                            </a>

                            <div class="comments-shared">
                                <?php if(!$data['mission_id']>0){ ?>
                                    <?php if($data['lat']>0||$data['lat']<0){ ?>
                                    <a href="<?=site_url("googlemap/route")?>/<?=$data['id']?>" class="post-add-icon inline-items" target="_blank">
                                        <img class="response" src="/asset/img/route.png" alt="">
                                    </a>
                                    <a href="<?=site_url("googlemap/pin")?>/<?=$data['id']?>" class="post-add-icon inline-items">
                                        <img class="response" src="/asset/img/pin.png" alt="">
                                    </a>
                                    <?php } ?>
                                    <a href="#" class="post-add-icon inline-items">
                                        <img class="response" src="/asset/img/share.png" alt="" onclick="$('#share_count').html(parseInt($('#share_count').html())+1);share(<?=$data['id']?>);">
                                    </a>
                                <?php } ?>
                                <?php if($data['is_sale']==1 && $data['member_id']!=$this->session->member['id']){ ?>
                                    <?php if(!is_buyed($data['id'])){ ?>
                                        <a href="<?=site_url("home/buy/{$data['id']}")?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/BUY-btn.png" alt=""></a>
                                    <?php }else{ ?>
                                        <a href="<?=site_url("home/buy/{$data['id']}")?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/download.png" alt=""></a>
                                    <?php } ?>
                                <?php }else if($data['is_sale']==1&&$data['member_id']==$this->session->member['id']){ ?>
                                    <a href="<?=site_url("home/buy/{$data['id']}")?>"><img class="MISSION-btns" class="img-responsive" src="/asset/img/INSALE.png" alt=""></a>
                                <?php } ?>
                            </div>

                        </div>
                        <?php if(!$data['mission_id']>0){ ?>
                        <div class="pt-sm">
                            <ul class="ul-inline mb0">
                                <?php if($data['type']=='image'){ ?>
                                    <li <?php if($data['like_count']>0){ ?>onclick="show_like_modal(<?=$data['id']?>);<?php } ?>"><span id="like_count_<?=$data['id']?>"><?=$data['like_count']?></span> <?=lang('個讚')?></li>
                                <?php } ?>
                                <?php if($data['type']=='video'){ ?>
                                    <li <?php if($data['view_count']>0){ ?>onclick="show_view_modal(<?=$data['id']?>);<?php } ?>"><span id="view_count"><?=$data['view_count']?></span> <?=lang('次觀看')?></li>
                                <?php } ?>
                                <li <?php if($data['share_count']>0){ ?>onclick="show_share_modal(<?=$data['id']?>);<?php } ?>"><span id="share_count"><?=$data['share_count']?></span> <?=lang('次分享')?></li>
                            </ul>
                        </div>
                        <?php } ?>
                    </article>
                </div>
            </div>
            <!-- 留言 -->
            <div class="bg-white">
                <form class="comment-form inline-items">
                    <div class="post__author author vcard inline-items">
                            <span class="author-round" style="width: 30px ;height: 30px;background-image: url('<?=getMemberAvatarUrl($this->session->member['id'])?>');background-size: cover;background-position-x:center; ">
                            </span>
                    </div>
                    <div class="form-group with-icon-right ">
                        <textarea class="form-control" placeholder="<?//=lang('使用Ctrl+Enter發送')?>" id="comments_textarea_<?=$data['id']?>" ytype="media" yid="<?=$data['id']?>" yreply="" onkeydown="submit_comment(event,this);"></textarea>
                    </div>
                    <img class="float-right sub_btn" src="/asset/img/Send_reply_logo.png" alt="" width="" onclick="submit_comment('sendBtn',jQuery(this).parent().find('textarea')[0]);">
                </form>
            </div>
            <ul class="comments-list" id="comments_list_<?=$data['id']?>">
            </ul>
            <div class="header-spacer header-spacer-small"></div>
        </div>
    </div>
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
<!-- Load more news AJAX script -->
<script src="<?=base_url()?>asset/js/ajax-pagination.js"></script>
<script src="<?=base_url()?>asset/js/swiper.jquery.min.js"></script>

<script src="<?=base_url()?>asset/js/mediaelement-and-player.min.js"></script>
<script src="<?=base_url()?>asset/js/mediaelement-playlist-plugin.min.js"></script>
<!-- Lightbox popup script-->
<script src="<?=base_url()?>asset/js/jquery.magnific-popup.min.js"></script>


<script>
    $('#search-icon,#m-search').click(function(){
        $("#search-form").toggle(1000);
    });

    if($(window).width() < 767){
        $('#m-commenticon1').click(function(){
            $("#m-commentform1").toggle(1000);
        });
    }
    function copyToClipboard(theField,isalert){
        var Url2=document.getElementById("sharelink");
        Url2.select(); // 选择对象
        document.execCommand("Copy"); // 执行浏览器复制命令
        alert("已複製");
    }
</script>
<script>
    // JavaScript Document 防止右鍵
    $(function(){
        $(document).bind("contextmenu",function(e){ return false; });
    });
    if (typeof(document.onselectstart) != "undefined") {
        // IE下禁止元素被选取
        document.onselectstart = new Function("return false");
    } else {
        // firefox下禁止元素被选取的变通办法
        document.onmousedown = new Function("return false");
        document.onmouseup = new Function("return true");
    }

</script>

<script>
    // 廣告
    var mySwiper = new Swiper('.swiper-container',{
        prevButton:'.prev-btn',
        nextButton:'.next-btn',
        loop : false,
        onSlideChangeEnd: function(swiper){
            if(swiper.isEnd){
                swiper.nextButton.css('display','none');
            }else if(swiper.isBeginning){
                swiper.prevButton.css('display','none');
                swiper.nextButton.css('display','block');
            }
            else{
                swiper.prevButton.css('display','block');
                swiper.nextButton.css('display','block');
            }
        }
    })
</script>
<script>
    if($(window).width() < 767){javascript:void(0)
        $('#more-comments').click(function(){
            $(".comments-list").toggle(1000);
        });
    }
</script>
<script>
    $(document).ready(function(){
        load_comment('media',<?=$data['id']?>);
    });
</script>
<script>
    function add_view_count(){
        $.get('<?=site_url('home/add_view_count')?>/<?= $data['id']?>');
        $("#view_count").html(parseInt($("#view_count").html())+1);
    }
</script>
<?php include_once "./application/views/template.php"; ?>
<?php include_once "./application/views/share.php"; ?>
</body>
</html>