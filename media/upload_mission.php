<!DOCTYPE html>
<html lang="en">
<head>

    <title><?=lang('上傳作品-航拍任務')?> | skyerX</title>
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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/Bootstrap/dist/css/bootstrap-grid.css">


    <!-- Theme Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/theme-styles.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/blocks.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/fonts.css">

    <!-- Styles for plugins -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/bootstrap-select.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/helper.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/custom.css">

    <style>
        .img {
            max-width: 150px;
            max-height: 150px;
            margin: 5px;
        }
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            border: 1px solid #d8d8d8;
            /*box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);*/
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-bottom: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #target {
            width: 345px;
        }
        .label-floating textarea.form-control{
            border: 1px solid #e6ecf5;
            border-radius: 0.25rem;
        }
        .radio input[type=radio]:checked ~ .check{
            background-color: #38bff1;
        }
        .radio input[type=radio]:checked ~ .circle{
            border-color: #38bff1;
        }
    </style>


</head>

<body id="mission-mission">

<?php include_once "./application/views/header.php"; ?>

<div class="header-spacer header-spacer-small"></div>
<div class="container edit-widget-twitter">
    <div class="gap-5"></div>
    <?php include_once "./application/views/search.php"; ?>
    <div class="gap-10"></div>
    <div class="row ">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 create-photo-album bg-white p25">
            <!-- <div class="form-group">
                <input id="file-5" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
            </div> -->
            <?php if(!$id>0){ ?>
            <div class="row">
                <div class="col-sm-12 text-center pd0">
                    <ul class="upload-btns">
                        <li class="col-xl-2 col-3  " onclick="location.href='<?=site_url('media/upload_image')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>'"><a class="" href="<?=site_url('media/upload_image')?>"><?=lang('照片')?></a></li>
                        <li class="col-xl-2 col-3 " onclick="location.href='<?=site_url('media/upload_video')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>'"><a class="" href="<?=site_url('media/upload_video')?>" ><?=lang('影片')?></a></li>
                        <li class="col-xl-2 col-3  active" onclick="location.href='<?=site_url('media/upload_mission')?>'"><a class="" href="<?=site_url('media/upload_mission')?>"><a class="" href="<?=site_url('media/upload_mission')?>"><?=lang('發布任務')?></a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <?php } ?>
            <div class="gap-20"></div>
            <div class="row">
                  <form  class="col-xl-10 offset-xl-1 col-lg-12 col-md-12 " action="<?=site_url("media/upload_mission_do")?>" method="post" id="form1" onsubmit="return checkForm();">
                    <input type="hidden" id="type" name="type" value="<?=$id>0?$data['type']:'video'?>"/>
                    <input type="hidden" class="video_min" name="video_min" value="<?=$data['video_min']?>"/>
                    <input type="hidden" class="pic_pcs" name="pic_pcs" value="<?=$data['pic_pcs']?>"/>
                    <input type="hidden" name="media" id="media" value="<?=$data['media']?>"/>
                    <input type="hidden" name="id" id="id" value="<?=$data['id']?>"/>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="c-twitter"><b><?=lang('Select your requirement')?></b></p>
                            <div class="news-feed-form">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs mb-sm" role="tablist">
                                    <li class="nav-item mr">
                                        <a class="nav-link inline-items active" data-toggle="tab" href="#Video" role="tab" aria-expanded="true" onclick="$('#type').val('video');">
                                            <span><?=lang('Video')?></span>
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link inline-items" data-toggle="tab" href="#Picture" role="tab" aria-expanded="false" onclick="$('#type').val('picture');">
                                            <span><?=lang('Picture')?></span>
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="visible-xs gap-30"></div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Video" role="tabpanel" aria-expanded="true">
                                        <ul class="ul-inline c-twitter">
                                            <li class="c-grey "><?=lang('Quality')?>:</li>
                                            <li class="radio">
                                                <label>
                                                    <input type="radio" name="video_type" value="4K" <?=$data['video_type']=='4K'?"checked":""?> />
                                                    <span class="circle"></span><span class="check"></span>
                                                    4K
                                                </label>
                                            </li>
                                            <li class="radio">
                                                <label>
                                                    <input type="radio" name="video_type" value="1080P" <?=$data['video_type']=='1080P'?"checked":""?> />
                                                    <span class="circle"></span><span class="check"></span>
                                                    1080P
                                                </label>
                                            </li>
                                            <li class="radio">
                                                <label>
                                                    <input type="radio" name="video_type" value="720P" <?=$data['video_type']=='720P'?"checked":""?> />
                                                    <span class="circle"></span><span class="check"></span>
                                                    720P
                                                </label>
                                            </li>
                                            <li>
                                                <label class=" c-grey least"><?=lang('(At least)')?></label>
                                            </li>
                                        </ul>
                                         <ul class="ul-inline c-twitter">
                                              <li class="c-grey "><?=lang('length')?>:</li>
                                              <li class="mission-video upload-number">
                                                <label><input type="number" class="video_min" id="video_min_show" min="0" max="999" value="<?=$data['video_min']?>"></label>
                                                <span class="c-grey"><?=lang('MIN')?> <?=lang('(At least)')?></span>
                                            </li>
                                         </ul>
                                    </div>

                                    <div class="tab-pane" id="Picture" role="tabpanel" aria-expanded="false">
                                        <ul class="ul-inline c-twitter ">
                                            <li class=" c-grey"><?=lang('Quality')?>:</li>
                                            <li class="radio">
                                                <label>
                                                    <input type="radio" name="pic_type" value="800M" <?=$data['pic_type']=='800M'?"checked":""?>><span class="circle"></span><span class="check"></span>
                                                    800M↑
                                                </label>
                                            </li>
                                            <li class="radio">
                                                <label>
                                                    <input type="radio" name="pic_type" value="1000M" <?=$data['pic_type']=='800M'?"checked":""?>><span class="circle"></span><span class="check"></span>
                                                    1000M↑
                                                </label>
                                            </li>
                                            <li class="radio">
                                                <label>
                                                    <input type="radio" name="pic_type" value="2000M" <?=$data['pic_type']=='800M'?"checked":""?>><span class="circle"></span><span class="check"></span>
                                                    2000M↑ 
                                                </label>
                                            </li>
                                            <li>
                                                <label class=" c-grey least"><?=lang('(At least)')?></label>
                                            </li>
                                        </ul>
                                        <ul class="ul-inline c-twitter ">
                                            <li class=" c-grey"><?=lang('Amount')?>:</li>
                                             <li class="mission-video upload-number">
                                                <label><input type="number" class="pic_pcs" id="pic_pcs_show" min="0" max="6" value="<?=$data['pic_pcs']?>"></label>
                                                <span class="c-grey"><?=lang('PCS')?>  <?=lang('(At least)')?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <!-- <p><b><?=lang('Upload your video (4k.mov or .mp4 only). Uploads work best in google chrome.')?></b></p> -->

                            <label class="fileContainer ">
                                <i class="fa fa-plus-circle fa-lg c-twitter" aria-hidden="true"></i> &nbsp; <?=lang('上傳任務縮圖')?>
                                <input type="file" id="image" accept=".jpg, .jpeg, .png"/>
                            </label>
                            <label class="v-align ml-sm">
                                <?=lang('Max file size: 6 MB <br>Suggested image size: 300x200<br>Supported formats: JPG, PNG')?>
                            </label>
                            <div class="row mt" id="uploaded_div">
                            </div>
                            <div class="gap-20"></div>

                            <label class="control-label h6"><?=lang('Tell us about your Mission')?></label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('Title')?>" name="title" type="text" value="<?=$data['title']?>" required >
                            </div>

                            <div class="form-group label-floating">
                                <textarea class="form-control" placeholder="<?=lang('Description')?>" name="Description" required><?=$data['description']?></textarea>
                            </div>

                            <label class="control-label"><?=lang('Select your Mission Location')?></label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('Select your Mission Location')?>" name="googlelocation" id="googlelocation" type="text" value="<?=$id>0?($data['lat'].",".$data['lng']):""?>" onclick="googleMapSelect('googlelocation');" required>
                            </div>

                            <label class="control-label h6"><?=lang('Mission Deadline')?></label>
                            <div class="form-group date-time-picker ">
                                <input placeholder="YYYY/MM/DD" name="datetimepicker" value="<?=$data['dealine']>0?date("Y/m/d",$data['dealine']):""?>"  required>
                            </div>
                            <div class="gap-20"></div>
                            <label class="control-label h6" style=" color: #38bff1;"><?=lang('Set up the Price of this Mission')?></label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('How much you want to pay for this mission?')?>" type="text" name="mission_price" value="<?=$data['mission_price']?>" required>
                            </div>
                            <div class="row">
                                <div class="text-center col-md-6">
                                    <input type="SUBMIT" name="status" value="<?=lang('SUBMIT')?>" class="btn btn-lg btn-blue">
                                </div>
                                <?php if($data['id']>0&&$data['status']=='OPEN'){ ?>
                                <div class="text-center col-md-6">
                                    <input type="button" value="CLOSE MISSION" class="btn  btn-lg btn-grey-light" onclick="if(confirm('<?=lang('是否確定要關閉此任務')?>:<?= $data['title']?>?')){jQuery('#status_close').click();}">
                                    <div style="display: none;">
                                        <input type="SUBMIT" name="status" id="status_close" value="<?=lang('CLOSE')?>" >
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="text-center col-md-6">
                                    <input type="SUBMIT" name="status" value="<?=lang('DRAFT')?>" class="btn  btn-lg btn-grey-light">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="header-spacer header-spacer-small"></div>
            </div>
        </div>
    </div>
</div>
<div class="header-spacer header-spacer-small"></div>

<?php include_once "./application/views/template-upload-image.php"; ?>
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


<!-- fileinput -->
<script src="<?=base_url()?>asset/js/fileinput.js"></script>
<script src="<?=base_url()?>asset/js/locales/LANG.js" type="text/javascript"></script>
<!-- layer -->
<script src="<?=base_url()?>asset/layer-v3.1.1/layer/layer.js"></script>
<script>
    $('#search-icon,#m-search').click(function(){
        $("#search-form").toggle(1000);
    });
    $('#gps-btn').click(function(){
        $(".map-disdrag").toggle(500);
    });
</script>
<script>

    function checkForm(){
        if(jQuery("input[name='mission_price']").val()==''||jQuery("input[name='mission_price']").val()==0){
            alert("<?=lang('Please Set up the Price of this Mission')?>");
            return false;
        }
        if(jQuery("input[name='type']").val()=='video'){
            if(jQuery("#video_min_show").val()==0 || jQuery("#video_min_show").val()==''){
                alert("<?=lang('請設置影片長度')?>");
                return false;
            }
        }else if(jQuery("input[name='type']").val()=='picture'){
            if(jQuery("#pic_pcs_show").val()==0 || jQuery("#pic_pcs_show").val()==''){
                alert("<?=lang('請設置照片數量')?>");
                return false;
            }
        }

        var f = false;
        jQuery("input[name='video_type']").each(function(){
            if(this.checked){
                f = true;
            }
        });
        if(!f){
            alert("<?=lang('Please Set up')?> <?=lang('Quality')?>");
            return false;
        }
    }

    jQuery(".video_min").change(function(){
        jQuery(".video_min").val(jQuery(this).val());
    });
    jQuery(".pic_pcs").change(function(){
        jQuery(".pic_pcs").val(jQuery(this).val());
    });

    $(document).ready(function(){
        $('#image').change(function(){
            $flag = true;
            if($(".item-container").length==1 || $(".item-container").length+$("#image")[0].files.length>1){
                alert("<?=lang('最多只可上傳1張照片')?>");
                $flag = false;
            }
            for(var i=0;i<$("#image")[0].files.length;i++) {
                if ($("#image")[0].files[i].size > 6 * 1024 * 1024) {
                    alert("<?=lang('檔案大小上限:6MB！')?>");
                    $flag = false;
                    break;
                }
            }
            if(!$flag){
                return false;
            }

            for(var i=0;i<$("#image")[0].files.length;i++){
                var formData = new FormData();
                formData.append("file",$("#image")[0].files[i]);
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
                        $("#media").val($("#media").val()+","+response.id);
                        $("#uploaded_div").append(template("upload-image",response));

                        layer.close(index);
                    },
                });
            }
        });
        if($("#media").val()!=''){
            $.ajax({
                url : "<?=site_url('attachment/get_mult/0')?>",
                data : {ids:$("#media").val()},
                dataType : "json",
                success : function(re){
                    for(var i=0;i<re.length;i++){
                        $("#uploaded_div").append(template("upload-image",re[i]));
                    }
                }
            });
        }
    });

    function googleMapSelect(id){
        var url = "<?=site_url('googlemap/select')?>?id="+id;
        openwindow(url,'',640,480);
    }

    function openwindow(url,name,iWidth,iHeight)
    {
        var iTop = (window.screen.height-30-iHeight)/2; //获得窗口的垂直位置;
        var iLeft = (window.screen.width-10-iWidth)/2; //获得窗口的水平位置;
        window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
    }
</script>

</body>
</html>