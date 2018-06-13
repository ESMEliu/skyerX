<!DOCTYPE html>
<html lang="en">
<head>

    <title><?=lang('上傳作品-照片')?> | skyerX</title>
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
    <div class="gap-20 "></div>
    <?php include_once "./application/views/search.php"; ?>
    <div class="row ">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 create-photo-album bg-white p25">
            <?php if(!$mission_id>0 && !$id>0){ ?>
            <div class="row">
                <div class="col-sm-12 text-center pd0">
                    <ul class="upload-btns">
                        <li class="col-xl-2 col-3  active" onclick="location.href='<?=site_url('media/upload_image')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>'"><a class="" href="<?=site_url('media/upload_image')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>"><?=lang('照片')?></a></li>
                        <li class="col-xl-2 col-3 " onclick="location.href='<?=site_url('media/upload_video')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>'"><a class="" href="<?=site_url('media/upload_video')?><?=$mission_id>0?"?mission_id={$mission_id}":''?>" ><?=lang('影片')?></a></li>
                        <li class="col-xl-2 col-3  " onclick="location.href='<?=site_url('media/upload_mission')?>'"><a class="" href="<?=site_url('media/upload_mission')?>"><a class="" href="<?=site_url('media/upload_mission')?>"><?=lang('發布任務')?></a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <?php } ?>
            <div class="gap-20"></div>
            <div class="row">
                <form class="col-lg-8 offset-lg-2 col-md-12 offset-md-0 " action="<?=site_url("media/upload_image_do")?>" method="post" onsubmit="return checkForm();">
                    <input type="hidden" id="type" value="image" />
                    <input type="hidden" name="media" id="media" value="<?=$data['media']!=''?','.$data['media']:''?>"/>
                    <input type="hidden" name="id" value="<?=$id?>" />
                    <input type="hidden" name="mission_id" value="<?=$mission_id?>" />
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="holder" class="photo-album-item-wrap col-lg-12 " >
                                <div class="photo-album-item create-album" data-mh="album-item">
                                    <div class="content">
                                        <label class="file" data-toggle="modal" data-target="#create-photo-album">
                                            <img src="<?=base_url()?>asset/img/upload_button.png" alt="" width="100">
                                            <input type="file"  id="image" accept=".jpg, .jpeg, .png" multiple>
                                        </label>
                                        <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album"><?=lang('選取要上傳的檔案')?></a>
                                    </div>
                                    <div class="hidden">
                                        <div id="status"></div>
                                    </div>
                                </div>
                                 <div class="gap-10"></div>
                                <span class="">
                                    <?=lang('Max file size: 6 MB <br>Suggested image size: 1280x720<br>Supported formats: JPG, PNG')?>
                                </span>
                                <div class="row mt" id="uploaded_div">
                                </div>
                            </div>
                            <div class="header-spacer header-spacer-small"></div>
                        </div>
                        <!-- 右側的欄 -->
                        <div class="col-sm-12">
                            <?php if($mission_id==0){ ?>
                            <label class="control-label h6"><?=lang('Tell us about your products')?></label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('Title')?>" name="title" type="text" value="<?=$id>0?$data['title']:""?>" required>
                            </div>

                            <div class="form-group label-floating">
                                <textarea class="form-control" placeholder="<?=lang('Description')?>" name="Description" ><?=$id>0?$data['description']:""?></textarea>
                            </div>

                            <label class="control-label"><?=lang('標籤')?>(<?=lang('使用逗号或空格隔开')?>)</label>
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="" type="text" name="tags" value="<?=$data['tags']?>" >
                            </div>

                            <label class="control-label"><?=lang('Select your Mission Location')?></label>
                                  <img src="<?=base_url()?>asset/img/info-button.png" alt="" width="15" data-toggle="tooltip" data-placement="top" data-original-title="<?=lang('您所設定的地點,將讓你的作品在這個世界上留下足跡,幫助其他玩家在地圖上找到您的作品。')?>">
                            <div class="form-group label-floating">
                                <input class="form-control" placeholder="<?=lang('Select your Mission Location')?>" name="googlelocation" id="googlelocation" type="text" value="<?=$id>0?($data['lat'].",".$data['lng']):""?>" onclick="googleMapSelect('googlelocation');" required>
                            </div>
                            <div class="gap-20"></div>
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

                                <div><label class="control-label c-primary"><?=lang('Sale your image?')?></label></div>
                                <ul class="form-group label-floating is-select row col-md-12">
                                    <li class="radio col-md-6 col-6">
                                        <label class="radio">
                                            <input type="radio" name="is_sale" value="1" <?=$data['is_sale']==1?"checked":""?>>
                                            <?=lang('YES')?>
                                        </label>
                                    </li>
                                    <li class="radio col-md-6 col-6">
                                        <label class="radio">
                                            <input type="radio" name="is_sale"  value="0" <?=$data['is_sale']==0?"checked":""?>>
                                            <?=lang('NO')?>
                                        </label>
                                    </li>
                                </ul>

                                <div class="gap-20"></div>
                                <label class="control-label h6" style=" color: #38bff1;"><?=lang('Set up the Price of this Picture')?></label>
                                <div class="form-group label-floating">
                                    <input class="form-control" placeholder="<?=lang('How much you want to pay for this mission?')?>" type="text" name="sale_price" value="<?=$id>0?$data['sale_price']:""?>" onkeyup="this.value=this.value.replace(/\D/g,'')">
                                </div>
                                <p><?=lang('If you upload more than one picture,this price is for selling all pictures you upload this time.')?></p>
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
<script src="<?=base_url()?>asset/js/isotope.pkgd.min.js"></script>
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
            if($(".item-container").length==6 || $(".item-container").length+$("#image")[0].files.length>6){
                alert("<?=lang('最多只可上傳6張照片')?>");
                $flag = false;
            }
            for(var i=0;i<$("#image")[0].files.length&&i<6-$(".item-container").length;i++) {
                if ($("#image")[0].files[i].size > 6 * 1024 * 1024) {
                    alert("<?=lang('檔案大小上限:6MB！')?>");
                    $flag = false;
                    break;
                }
            }
            if(!$flag){
                return false;
            }

            for(var i=0;i<$("#image")[0].files.length&&i<6-$(".item-container").length;i++){
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
        if(jQuery("input[name='media']").val()==''||jQuery("input[name='media']").val()==','){
            alert("<?=lang('請至少上傳一張圖片')?>");
            return false;
        }
    }

    jQuery(document).ready(function(){
        $("input[name='is_sale']").change(function(){
            changeIsSale();
        });
        changeIsSale();
    });
    function changeIsSale(){
        if($("input[name='is_sale']:checked").val()==1){
            $("input[name='sale_price']").prop("readonly",false);
        }else{
            $("input[name='sale_price']").val("");
            $("input[name='sale_price']").prop("readonly",true);
        }
    }
</script>


</body>
</html>