
<!-- ... end popup login -->
<div class="footer" id="footer" >

    <div class="container">
        <div class="row">
            <div class="col-md-11 col-sm-12  w-list">
                <ul class="footer-link">
                    <li><a href="<?=site_url('home/about')?>"><h6 class="title"><?=lang('關於我們')?></h6></a></li>
                    <li><a href="<?=site_url('home/contact')?>"><h6 class="title"><?=lang('聯絡我們')?></h6></a></li>
                    <li><a href="<?=site_url('home/blog')?>"><h6 class="title"><?=lang('部落格')?></h6></a></li>
                    <li><a href="<?=site_url('home/privacy')?>"><h6 class="title"><?=lang('隱私')?></h6></a></li>
                    <li><a href="<?=site_url('home/terms')?>"><h6 class="title"><?=lang('使用條款')?></h6></a></li>
                    <li id="lang" class="more"><a href="javascript:void(0);"><h6 class="title"><?=lang('語言')?></h6></a>
                        <ul class="more-dropdown">
                            <li>
                                <a class="btn-block" href="###" onclick="document.cookie='language=english;path=/';location.reload();">English</a>
                            </li>
                            <li>
                                <a class="btn-block" href="###" onclick="document.cookie='language=zh-cn;path=/';location.reload();">简体中文</a>
                            </li>
                            <li>
                                <a class="btn-block" href="###" onclick="document.cookie='language=zh-tw;path=/';location.reload();">繁體中文</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>


<div class="gap-40 visible-xs"></div>
<footer class="visible-xs">
    <ul id="footer-menu">
        <li><a href="/"><div id="foot-gohome" <?=$active_header=='top-gohome'?"class='now'":""?>></div><?=lang("Home")?></a></li>
        <li class="map-width"><a href="<?=site_url('home/search_googlemap')?>"><div id="foot-search-map" <?=$active_header=='top-search-map'?"class='now'":""?>></div><?=lang("Map")?></a></li>
        <li><a href="<?=site_url("home/mission")?>"><div id="foot-mission" <?=$active_header=='top-mission'?"class='now'":""?>></div><?=lang("Mission")?></a></li>
        <?php if($this->session->member){ ?>
        <li>
            <a href="<?=site_url('notice')?>" style=" letter-spacing: -0.5px;">
                <div id="foot-notice" <?=$active_header=='top-notice'?"class='now'":""?>></div>
                <div class="label-avatar bg-primary"><?=count($header_notice_data)?></div>
                <?=lang("Notification")?>
            </a>
        </li>
        <li><a href="<?=site_url('member/view')?>"><div id="foot-member" <?=$active_header=='top-member'?"class='now'":""?>></div><?=lang("Me")?></a></li>
        <?php }else{ ?>
            <li><a href="#" data-toggle="modal" data-target="#edit-widget-twitter" style=" letter-spacing: -0.5px;"><div id="foot-notice" <?=$active_header=='top-notice'?"class='now'":""?>></div><?=lang("Notification")?></a></li>
            <li><a href="#" data-toggle="modal" data-target="#edit-widget-twitter"><div id="foot-member" <?=$active_header=='top-member'?"class='now'":""?>></div><?=lang("Me")?></a></li>
        <?php } ?>
    </ul>
</footer>
<!-- popup login -->

<div class="modal fade" id="edit-widget-twitter">
    <div class="modal-dialog ui-block window-popup edit-widget edit-widget-twitter">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="ui-block-title">
            <h6 class="title text-center"><?=lang('LOGIN')?></h6>
        </div>

        <div class="ui-block-content">
            <form action="<?=site_url("member/login_do")?>" method="post">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?=lang('Your Email')?></label>
                            <input name="email" class="form-control" placeholder="" type="email" >
                            <span class="material-input"></span></div>

                        <div class="form-group label-floating is-empty">
                            <label class="control-label paw"><?=lang('Your Your Password')?></label>
                            <input name="password" class="form-control" placeholder="" type="password">
                            <span class="material-input"></span></div>
                        <input type="submit" class="btn bg-twitter btn-lg full-width btn-icon-left" value="<?=lang('Login')?>" />
                    </div>

                    <div class="col-sm-6 col-6 remember">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember"><span class="checkbox-material"></span>
                                <?=lang('Remember Me')?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-6 forgot">
                        <a onclick="$('#edit-widget-twitter').modal('hide');$('#forgot').modal('show');" href="#" data-toggle="modal" data-target="#forgot"><?=lang('Forgot Password?')?></a>
                    </div>
                    <div class="or"></div>
                </div>
            </form>

            <div class="login-control-button text-center">

                <a href="<?=site_url('member/facebook_login')?>" class="btn btn-control" >
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>

                <a href="<?=site_url('member/twitter_login')?>" class="btn btn-control" >
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>

                <a href="<?=site_url('member/google_login')?>" class="btn btn-control">
                    <i class="fa fa-google" aria-hidden="true"></i>
                </a>

            </div>
            <p class="text-center"><?=lang('Don’t you have an account?')?> <a href="<?=site_url("member/register ")?>"> <?=lang('Create one')?></a></p>
        </div>

    </div>
</div>

<!-- ... end popup login -->
<div class="modal fade" id="forgot">
    <div class="modal-dialog ui-block window-popup edit-widget edit-widget-twitter">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="/asset/html-ori/icons/icons.svg#olymp-close-icon"></use></svg>
        </a>
        <div class="ui-block-title">
            <h6 class="title text-center"><?=lang("Forgot Password")?></h6>
        </div>
        <div class="ui-block-content">
            <form action="<?=site_url("member/forgot_password_do")?>" method="post">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?=lang("Your Email")?></label>
                            <input name="email" class="form-control" placeholder="" type="email" >
                            <span class="material-input"></span></div>
                            <input type="submit" class="btn bg-twitter btn-lg full-width btn-icon-left" value="<?=lang("Submit")?>"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function follow(member_id){
        <?php if(is_login()){ ?>
        $.post("<?=site_url('ajax/follow')?>",{follow_member_id:member_id},function(re){
            if(re==1){
                $(".follow_"+member_id).html('<?=lang('已關注')?>');
                $("#follow_"+member_id).html('<?=lang('已關注')?>');
            }else{
                $(".follow_"+member_id).html('<?=lang('關注')?>');
                $("#follow_"+member_id).html('<?=lang('關注')?>');
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
    }
    function follow_on_member_view_page(member_id){
        <?php if(is_login()){ ?>
        $.post("<?=site_url('ajax/follow')?>",{follow_member_id:member_id},function(re){
            if(re==1){
                $(".follow_"+member_id).html('<?=lang('已關注')?>');
                $("#follow_count").html(parseInt($("#follow_count").html())+1);
                $("#follow_list").append(jQuery("#fans_list .follow_"+member_id).parent().parent().parent().parent().parent().parent().parent().parent().parent().prop("outerHTML"));
            }else{
                $(".follow_"+member_id).html('<?=lang('關注')?>');
                $("#follow_count").html(parseInt($("#follow_count").html())-1);
                jQuery("#follow_list .follow_"+member_id).parent().parent().parent().parent().parent().parent().parent().parent().parent().remove();
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
    }
    function like(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/like")?>/"+id,function(re){
            if(re==1){
                $("#like_pic_"+id).attr("src","/asset/img/like-d.png");
                $("#like_pic_"+id).addClass("click");
                $("#like_count_"+id).html(parseInt($("#like_count_"+id).html())+1);
            }else{
                $("#like_pic_"+id).attr("src","/asset/img/like.png");
                $("#like_pic_"+id).removeClass("click");
                $("#like_count_"+id).html(parseInt($("#like_count_"+id).html())-1);
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function like2(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/like")?>/"+id,function(re){
            if(re==1){
                $("#like_2_"+id).find('i').addClass("fa-heart");
                $("#like_2_"+id).find('i').removeClass("fa-heart-o");
                $("#like_count_"+id).html(parseInt($("#like_count_"+id).html())+1);
            }else{
                $("#like_2_"+id).find('i').addClass("fa-heart-o");
                $("#like_2_"+id).find('i').removeClass("fa-heart");
                $("#like_count_"+id).html(parseInt($("#like_count_"+id).html())-1);
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function mission_like(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/mission_like")?>/"+id,function(re){
            if(re==1){
                $("#like_pic_"+id).attr("src","/asset/img/like-d.png");
                $("#like_pic_"+id).addClass("click");
                $("#like_count_"+id).html(parseInt($("#like_count_"+id).html())+1);
            }else{
                $("#like_pic_"+id).attr("src","/asset/img/like.png");
                $("#like_pic_"+id).removeClass("click");
                $("#like_count_"+id).html(parseInt($("#like_count_"+id).html())-1);
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
    }
    function comment_like(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/comment_like")?>/"+id,function(re){
            if(re==1){
                $("#comment_like_pic_"+id).attr("src","/asset/img/like-d.png");
                $("#comment_like_pic_"+id).addClass("click");
                $("#comment_like_count_"+id).html(parseInt($("#comment_like_count_"+id).html())+1);
            }else{
                $("#comment_like_pic_"+id).attr("src","/asset/img/like.png");
                $("#comment_like_pic_"+id).removeClass("click");
                $("#comment_like_count_"+id).html(parseInt($("#comment_like_count_"+id).html())-1);
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function star(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/star")?>/"+id,function(re){
            if(re==1){
                $("#star_pic_"+id).attr("src","/asset/img/star-d.png");
                $("#star_pic_"+id).parent().addClass("add");
            }else{
                $("#star_pic_"+id).attr("src","/asset/img/star.png");
                $("#star_pic_"+id).parent().removeClass("add");
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function star2(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/star")?>/"+id,function(re){
            if(re==1){
                $("#star_2_"+id).find('i').addClass("fa-star");
                $("#star_2_"+id).find('i').removeClass("fa-star-o");
                $("#star_2_"+id).find('span').addClass("add");
            }else{
                $("#star_2_"+id).find('i').addClass("fa-star-o");
                $("#star_2_"+id).find('i').removeClass("fa-star");
                $("#star_2_"+id).find('span').removeClass("add");
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function mission_star2(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/mission_star")?>/"+id,function(re){
            if(re==1){
                $("#mission_star_2_"+id).find('i').addClass("fa-star");
                $("#mission_star_2_"+id).find('i').removeClass("fa-star-o");
                $("#mission_star_2_"+id).find('span').addClass("add");
            }else{
                $("#mission_star_2_"+id).find('i').addClass("fa-star-o");
                $("#mission_star_2_"+id).find('i').removeClass("fa-star");
                $("#mission_star_2_"+id).find('span').removeClass("add");
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function mission_star3(id){
        <?php if(is_login()){ ?>
        $.get("<?=site_url("ajax/mission_star")?>/"+id,function(re){
            if(re==1){
                $("#mission_star_3_"+id).addClass("add");
            }else{
                $("#mission_star_3_"+id).removeClass("add");
            }
        });
        <?php }else{ ?>
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
        <?php } ?>
        event.stopPropagation();
    }
    function report(media_id){
        if(confirm('<?=lang('確定要檢舉嗎?')?>')){
            $.post("<?=site_url('ajax/report')?>",{media_id:media_id},function(re){
                alert('<?=lang('舉報成功！')?>')
            });
        }
    }
    function report_download(media_id){
        if(confirm('<?=lang('確定要檢舉嗎?')?>')){
            $.post("<?=site_url('ajax/report')?>",{media_id:media_id,type:'download'},function(re){
                alert('<?=lang('舉報成功！')?>')
            });
        }
    }
    function prop_login(){
        alert('<?=lang('请登录')?>');
        $("#top-member").click();
    }
</script>