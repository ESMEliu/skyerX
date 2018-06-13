<!DOCTYPE html>
<html lang="en">
<head>

    <title><?=lang('上傳作品-影片')?> | skyerX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?=config_item("keywords")?>">
    <meta name="description" content="<?=config_item("description")?>">
    <link href="/asset/img/favicon.ico" rel="shortcut icon" type="image/x-icon">

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
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
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
    </style>


</head>

<body id="upload-img">
<?php include_once "./application/views/header.php"; ?>

<!-- ... end Responsive Header -->
<div class="header-spacer header-spacer-small"></div>
<div class="container edit-widget-twitter">
    <div class="gap-5"></div>
    <?php include_once "./application/views/search.php"; ?>
    <div class="gap-10"></div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 create-photo-album bg-white p25">
            <?php if(!$mission_id>0 && !$id>0){ ?>
            <div class="row">
                <div class="col-sm-12 text-center pd0">
                    <ul class="upload-btns">
                        <li class="col-xl-2 col-3  " onclick="location.href='<?=site_url('media/upload_image')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>'"><a class="" href="<?=site_url('media/upload_image')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>"><?=lang('照片')?></a></li>
                        <li class="col-xl-2 col-3 active" onclick="location.href='<?=site_url('media/upload_video')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>'"><a class="" href="<?=site_url('media/upload_video')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>" ><?=lang('影片')?></a></li>
                        <li class="col-xl-2 col-3  " onclick="location.href='<?=site_url('media/upload_mission')?>'"><a class="" href="<?=site_url('media/upload_mission')?>"><?=lang('發布任務')?></a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <?php } ?>
            <div class="gap-20"></div>
            <div class="row">
                <form  class="col-lg-8 offset-lg-2 col-md-12 offset-md-0 col-sm-12" action="<?=site_url("media/upload_video_do")?>" method="post" onsubmit="return checkForm();">
                    <input type="hidden" name="media" id="media" value="<?=$data['media']!=''?','.$data['media']:''?>"/>
                    <input type="hidden" name="id" value="<?=$id?>" />
                    <input type="hidden" name="mission_id" value="<?=$mission_id?>" />
                    <div class="row">
                        <div class="col-sm-12">

                            <!-- <p><b><?=lang('Upload your video (4k.mov or .mp4 only). Uploads work best in google chrome.')?></b></p> -->

                            <label class="fileContainer ">
                                <i class="fa fa-plus-circle fa-lg c-twitter" aria-hidden="true"></i> &nbsp; <?=lang('上傳影片縮圖 (選填)')?>
                                <input type="file" id="image" accept=".jpg, .jpeg, .png"/>
                            </label>
                            <div class="row mt" id="uploaded_div">
                            </div>
                            <br>
                            <div class="share-logo">
                                <label for=""><b><?=lang('You can import videos from following sources')?></b></label>
                                <br>
                                <label for=""><a href="https://www.youtube.com/upload" target="_blank"><img src="/asset/img/youtube-logo-black-color-png.png" alt="" width="50"></a></label>
                                <label for=""><a href="https://vimeo.com/upload" target="_blank"><img src="/asset/img/large_slack-imgs.com.png" alt="" width="60"></a></label>
                                <label for=""><a href="https://sc.youku.com/" target="_blank"><img src="/asset/img/youku-com.png" alt="" width="60"></a></label>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label"></label>
                                <input class="form-control" placeholder="Website Address" type="url" name="video_url" value="<?=$data['video_url']?>" required>
                            </div>
                        </div>
                        <!-- 右側的欄 -->
                        <div class="col-sm-12">
                            <?php if($mission_id==0){ ?>
                            <label class="control-label h6"><?=lang('Tell us about your products')?></label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('Title')?>" name="title" type="text" value="<?=$data['title']?>" required>
                            </div>

                            <div class="form-group label-floating">
                                <textarea class="form-control" placeholder="<?=lang('Description')?>" name="Description"><?=$data['description']?></textarea>
                            </div>

                            <label class="control-label"><?=lang('標籤')?>(<?=lang('使用逗号或空格隔开')?>)</label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="" type="text" name="tags" value="<?=$data['tags']?>" >
                            </div>

                            <label class="control-label"><?=lang('Select your Mission Location')?></label>
                                <img src="<?=base_url()?>asset/img/info-button.png" alt="" width="15" data-toggle="tooltip" data-placement="top" data-original-title="<?=lang('您所設定的地點,將讓你的作品在這個世界上留下足跡,幫助其他玩家在地圖上找到您的作品。')?>">
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('Select your Mission Location')?>" name="googlelocation" id="googlelocation" type="text" value="<?=$id>0?$data['lat'].",".$data['lng']:""?>" onclick="googleMapSelect('googlelocation');" required>
                            </div>
                            
                            <h5 class="mt-sm mb card-header pl0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">
                                    <?=lang('進階選項')?>
                                    <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?=base_url()?>asset/html-ori/icons/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                </a>
                            </h5>
                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            
                                
                                <label class="control-label"><?=lang('隱私')?></label>
                                <div class="form-group label-floating is-select">
                                    <select class="selectpicker form-control" name="view" size="auto" required>
                                        <option value="1" <?=$data['view']==1?"selected":""?>><?=lang('公開')?></option>
                                        <option value="2" <?=$data['view']==2?"selected":""?>><?=lang('僅限追蹤者')?></option>
                                        <option value="3" <?=$data['view']==3?"selected":""?>><?=lang('私有')?></option>
                                    </select>
                                </div>

                                <div><label class="control-label c-primary"><?=lang('出售影片?')?></label></div>
                                <ul class="form-group label-floating is-select row col-md-12">
                                    <li class="radio col-md-6 col-6">
                                        <label class="radio">
                                            <input type="radio" name="is_sale" value="1" <?=$data['is_sale']==1?"checked":""?> />
                                            <?=lang('YES')?>
                                        </label>
                                    </li>
                                    <li class="radio col-md-6 col-6">
                                        <label class="radio">
                                            <input type="radio" name="is_sale"  value="0" <?=$data['is_sale']==0?"checked":""?> />
                                            <?=lang('NO')?>
                                        </label>
                                    </li>
                                </ul>
                                <?php } ?>
                                <label class="control-label"><?=lang('Download Information')?></label>
                                <img src="<?=base_url()?>asset/img/info-button.png" alt="" width="15" data-toggle="tooltip" data-placement="top" data-original-title="<?=lang('當賣出時，買家可以獲得影片的⾼高畫質原始檔案')?>">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <div class="form-group label-floating is-empty">
                                            <input class="form-control" placeholder="<?=lang('下載影片檔案連結')?>" name="download_information" id="download_information" type="url" value="<?=$data['download_information']?>" required>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group label-floating is-empty">
                                            <input class="form-control" placeholder="<?=lang('載點密碼')?>" name="download_password" type="text" value="<?=$data['download_password']?>"> <span class="hidden-xs"><?=lang('（選填，如果有的話）')?></span>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="visible-xs col-6"><span style="line-height: 50px;"><?=lang('（選填，如果有的話）')?></span></div>
                                </div>
                                <div class="gap-20"></div>
                                <label class="control-label h6" style=" color: #38bff1;"><?=lang('Original file quality')?></label>
                                <div class="form-group label-floating">
                                    <select class="selectpicker form-control" name="file_quality">
                                        <option value="720P" <?=$data['file_quality']=="720P"?"selected":""?>>720P</option>
                                        <option value="1080P" <?=$data['file_quality']=="1080P"?"selected":""?>>1080P</option>
                                        <option value="2K" <?=$data['file_quality']=="2K"?"selected":""?>>2K</option>
                                        <option value="4K" <?=$data['file_quality']=="4K"?"selected":""?>>4K</option>
                                        <option value="8K" <?=$data['file_quality']=="8K"?"selected":""?>>8K</option>
                                    </select>
                                </div>
                                <?php if($mission_id==0){ ?>
                                <div class="gap-20"></div>
                                <label class="control-label h6" style=" color: #38bff1;"><?=lang('Set up the Price of this video')?></label>
                                <div class="form-group label-floating">
                                    <input class="form-control" placeholder="<?=lang('How much you want to pay for this mission?')?>" type="text" name="sale_price" value="<?=$data['sale_price']?>" onkeyup="this.value=this.value.replace(/\D/g,'')">
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                        <input type="SUBMIT" value="<?=lang('SUBMIT')?>" class="btn btn-lg btn-blue">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                url : "<?=site_url('attachment/get_mult')?>",
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

    function checkForm(){
        if(jQuery("input[name='is_sale']:checked").val()==1&&(jQuery("input[name='sale_price']").val()==''||jQuery("input[name='sale_price']").val()==0)){
            alert("<?=lang('Please Set up the Price of this Picture')?>");
            return false;
        }
    }

    <?php if(!$mission_id>0){ ?>
    jQuery(document).ready(function(){
        $("input[name='is_sale']").change(function(){
            changeIsSale();
        });
        changeIsSale();
    });
    function changeIsSale(){
        if($("input[name='is_sale']:checked").val()==1){
            $("input[name='sale_price']").prop("readonly",false);
            $("input[name='download_information']").prop("readonly",false);
            $("input[name='download_password']").prop("readonly",false);
        }else{
            $("input[name='sale_price']").val("");
            $("input[name='sale_price']").prop("readonly",true);
            $("input[name='download_information']").prop("readonly",true);
            $("input[name='download_password']").prop("readonly",true);
        }
    }
    <?php } ?>
</script>


</body>
</html>