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
<body id="download-page">
<?php include_once "./application/views/header.php"; ?>
<!--  end Responsive Header -->
<div class="gap-60 hidden-xs"></div>
<div class="gap-40 visible-xs"></div>
<div class="container">
    <?php include_once "./application/views/search.php"; ?>
    <div class="row detial">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                ?><a href="https://player.youku.com/embed/<?=$id;?>" class="play-video" onclick="add_view_count();"><?php
                            } else {
                               ?> <a href="<?=$data['video_url']?>" class="play-video" onclick="add_view_count();"><?php
                            }
                            
                        ?>
                        <!-- <a href="<?=$data['video_url']?>" class="play-video"> -->
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
                                    <time class="published" datetime="<?=unixTimeToStr($data['add_time'])?>">
                                        <?=unixTimeToStr($data['add_time'])?>
                                    </time>
                                </div>
                            </div>

                            <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-three-dots-icon"></use></svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#" onclick="report(<?=$data['id']?>);"><?=lang('檢舉不當貼文')?></a>
                                    </li>
                                    <?php if(is_buyed($data['id'])){ ?>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#contact"><?=lang('檔案下載連結失效')?></a>
                                    </li>
                                    <?php } ?>
                                </ul>

                            </div>
                        </div>



                        <div class="pro">
                            <!-- img -->
                            <div class="row">
                                <label for="" class="col-md-2 col-sm-3 col-3 text-right"><?=$data['type']=='video'?lang("Video"):lang("Photo")?></label>
                                <div class="col-md-10 col-sm-9 col-9 text-black">
                                    <p class="product-des"><?=$data['id']+80000000?> / <?=$data['title']?></p>
                                </div>
                            </div>
                            <?php if($data['type']=='image'){ ?>
                            <div class="row">
                                <label for="" class="col-md-2 col-sm-3 col-3 text-right nowrap"><?=lang('File size')?></label>
                                <div class="col-md-10 col-sm-9 col-9 text-black">
                                    <?php if(strpos($data['media'],",")>-1){ ?>
                                        <?php foreach(explode(",",$data['media']) as $cv){ ?>
                                            <p><?=yk_attachment_size_px($cv)?></p>
                                        <?php } ?>
                                    <?php }else{ ?>
                                    <p><?=yk_attachment_size_px($data['media'])?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($data['type']=='video'){ ?>
                            <div class="row">
                                <label for="" class="col-md-2 col-sm-3 col-3 text-right nowrap"><?=lang('Clip quality')?></label>
                                <div class="col-md-10 col-sm-9 col-9 text-black">
                                    <p class="product-des"><?=$data['file_quality']?></p>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <label for="" class="col-md-2 col-sm-3 col-3 text-right"><?=lang('License')?></label>
                                <div class="col-md-10 col-sm-9 col-9 text-black">
                                    <p class="inlinblock mb0"><?=lang(config_item('license')[$data['license']])?>&nbsp;
                                        <ul class="i-ul inlinblock mb0">
                                            <li class=" more">
                                                <img src="/asset/img/info-button.png" alt="" width="15">
                                                <ul class="more-dropdown i-data">
                                                    <li>
                                                        <h5 class="c-twitter bold">skyerX standerd</h5>
                                    <p class="">Worldwide,all-medis usage with no expiry.Perfect for commercial or editorial use,advertising,and product packaging.For more details see the <span class="c-twitter" onclick="window.open('https://static.500px.com/docs/commercial_licensing_agreement.pdf','_blank');">Commercial Licensing Agreement.</span></p>
                                    </li>
                                    </ul>
                                    </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-lg">
                            <label for="" class="col-md-3 col-sm-3 col-4 buy-title"><?=lang('Price')?></label>
                            <div class="col-md-9 col-sm-9 col-8 text-black text-right text-light">$<?=$data['sale_price']?> USD</div>
                        </div>
                        <div class="row">
                            <label for="" class="col-md-5 col-sm-4 col-4 buy-title"><?=lang('Service fee')?></label>
                            <div class="col-md-7 col-sm-8 col-8 text-black text-right text-light">$<?=round($data['sale_price']*0.1,1)?> USD</div>
                        </div>
                        <hr class="mr5">
                        <div class="row">
                            <label for="" class="col-md-3 col-sm-3 col-4 buy-title"><?=lang('Total')?></label>
                            <div class="col-md-9 col-sm-9 col-8 text-black text-right text-light"><span class="f24">$<?=round($data['sale_price']*1.1,1)?></span> USD</div>
                        </div>
                    </article>
                    <div class="p25">
                        <?php if($data['member_id']!=$this->session->member['id'] && !is_buyed($data['id'])){ ?>
                        <a href="<?=site_url('home/order/'.$data['id'])?>" class="btn btn-buy-b btn-block btn-lg mb0"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; <?=lang('Buy')?></a>
                        <?php }else if(is_buyed($data['id']) || $data['member_id']==$this->session->member['id']){ ?>
                        <a href="###" onclick="show_download_info();" class="btn btn-buy-r btn-block btn-lg mb0"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; <?=lang('Download')?></a>
                            <?php if($data['type']=='video'){ ?>
                            <p class="mt-sm"><?=lang('載點密碼')?>：<?=$data['download_password']!='' ? $data['download_password'] : lang('無');?></p>
                            <?php } ?>
                            <?php if($data['member_id']!=$this->session->member['id']) { ?>
                            <span class="f12"><?=lang('此下載連結與檔案是影片擁有者自行上傳的。 ')?><span class="text-primary"><?=lang('您有14天可以確認檔案是否正常，超過14天後將無法進行退款。')?></span></span>
                            <select name="s-links" id="s-links" class="mt-sm">
                                <option value="0" name="0"><?=lang('請選擇')?></option>
                                <option value="1" name="correct"><?=lang('檔案正確')?></option>
                                <option value="2" name="wrong"><?=lang('檔案或連結有誤')?></option>
                            </select>
                                <a id="file-correct" href="#" data-toggle="modal" data-target="#correct" class="btn"><span></span></a>
                                <a id="file-wrong" href="#" data-toggle="modal" data-target="#wrong" class="btn"><span></span></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include_once "./application/views/footer.php"; ?>
<div class="modal fade" id="correct">
    <div class="modal-dialog ui-block window-popup edit-widget edit-widget-twitter">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-content">
            <form>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <p class="f16 mb-sm">
                            <span class="text-primary"><?=lang('您是否已下載且確認影片檔案是正確的？')?></span>
                            <?=lang('如果是，請點擊「是」')?>
                        </p>
                        <a href="###" class="btn bg-twitter btn-lg full-width btn-icon-left" onclick="payout();"> <?=lang('是')?></a>
                        <a href="" class="btn bg-grey-lighter btn-lg full-width btn-icon-left" aria-label="Close"> <?=lang('取消')?></a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="wrong">
    <div class="modal-dialog ui-block window-popup edit-widget edit-widget-twitter">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-content">
            <form>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <p class="f16 mb-sm"><span class="text-primary"><?=lang('您是否無法下載或發現檔案不正確？')?></span><?=lang('如果是，我們將暫停這筆交易，若經確認後確實有誤，將進⾏退款程序。')?></p>
                        <a href="###" class="btn bg-twitter btn-lg full-width btn-icon-left" onclick="refund();"> <?=lang('是')?></a>
                        <a href="" class="btn bg-grey-lighter btn-lg full-width btn-icon-left" aria-label="Close"> <?=lang('取消')?></a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
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
<?php include_once "./application/views/template.php"; ?>

<?php if(is_buyed($data['id'])){ ?>
<script>
    function show_download_info(){
        var url = "<?=site_url('media/download/'.$data['id'])?>";
        window.location.href=url;
    }
</script>
<?php } ?>
<div class="modal fade" id="contact">
    <div class="modal-dialog ui-block window-popup edit-widget edit-widget-pool">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-title">
            <h6 class="title"><?=lang('聯絡我們')?></h6>
        </div>

        <div class="ui-block-content">
            <form action="<?=site_url("ajax/report_download")?>" method="post">
                <input type="hidden" name="media_id" value="<?=$data['id']?>" />
                <div class="row">
                    <div class="col-sm-12 col-xs-12">

                        <div class="form-group label-floating">
                            <label class="control-label"><?=lang('姓名')?> *</label>
                            <input name="name" class="form-control" placeholder="" type="text" required >
                            <span class="material-input"></span></div>

                        <div class="form-group label-floating is-empty">
                            <label class="control-label"><?=lang('Email')?> *</label>
                            <input name="email" class="form-control" placeholder="" type="email" required>
                            <span class="material-input"></span></div>
                        <div class="form-group label-floating">
                            <label class="control-label"><?=lang('訊息內容')?> *</label>
                            <textarea name="content" class="form-control" placeholder="" required></textarea>
                        </div>
                        <input type="submit" class="btn bg-twitter btn-lg full-width btn-icon-left" value="<?=lang('送出')?>" />
                    </div>
                </div>
            </form>

            <div class="gap-20"></div>

        </div>

    </div>
</div>

<?php include_once "./application/views/share.php"; ?>

<script>
    $('#s-links').change(function(){
        var ans=$("#s-links").val();

        if (ans==1){
            $('#file-correct').trigger("click");
        }else if(ans==2){
            $('#file-wrong').trigger("click");
        }else if(ans==0){
            exit();
        }
    })
    function payout(){
        $.post("<?=site_url('paypal/buyer_confirm')?>",{media_id:<?=$data['id']?>},function(re){
            if(re==-1){
                alert('<?=lang('該訂單無需確認！')?>');
            }else if(re==0){
                alert('<?=lang('系統繁忙，請稍後重試或等待系統自動確認！')?>');
            }else if(re==1){
                alert('<?=lang('確認成功')?>');
            }
        });
    }
    function refund(){
        $.post("<?=site_url('paypal/buyer_apply_refund')?>",{media_id:<?=$data['id']?>},function(re){
            if(re==-1){
                alert('<?=lang('該訂單無法申請退款！')?>');
            }else if(re==1){
                alert('<?=lang('申請成功，請等待審核')?>');
            }
        });
    }
</script>
</body>
</html>