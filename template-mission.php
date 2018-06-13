<script src="/asset/js/template-web.js"></script>
<script id="nomission" type="text/html">
    <div class="col-lg-6 offset-lg-3 col-sm-12 col-xs-12">
        <div class="gap-60"></div>
        <div class="nomission">
            <img class="img-responsive" src="/asset/img/No-Mission.png" alt="">
        </div>
    </div>
</script>
<script id="missionWithPic" type="text/html">
    <div class="col-sm-6 mission">
        <div class="ui-block"  onclick="location.href='<?= site_url('home/mission_detail')?>/{{id}}'">
            <div class="row mission-block">
                <div class="post__date col-sm-12 text-center mb-xs">
                    <time class="published" datetime="{{add_time_str}}"> {{add_time_str}} ~ {{dealine_str}}</time>
                </div>
                <div class="col-sm-12"><div class="gap-10"></div></div>
                <div class="col-sm-5 col-6 pl-xs">
                    <div class="distable">
                        <a class="distablecell" href="<?=site_url('home/mission_detail')?>/{{id}}"><img class="img-responsive" src="{{media_url}}" alt=""></a></div>

                </div>
                <div class="col-sm-7 col-6 pd0">
                    <div class="distable">
                        <div class="distablecell">
                            <a href="<?=site_url('home/mission_detail')?>/{{id}}"><div class="h2 title">{{title}}</div></a>
                            <div class="">
                                <p class="text-red h4">$ {{mission_price}}</p>
                                <!-- <a class="c-secondary" href="<?=site_url('home/mission_detail')?>/{{id}}" target="_blank">{{address_name}}</a> --><span class="c-grey"> <?=lang('距離')?>{{distance}}<?=lang('km')?></span>
                            </div>
                            <% if(nostar!=1){ %>
                            <span class="add-m-like  <% if (star) { %>add<% } %>" id="mission_star_3_{{id}}" onclick="mission_star3({{id}})">
							    <a href="#">
							        <i class="fa fa-star fa-lg" aria-hidden="true"></i>
                                </a>
							</span>
                            <% } %>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui-block-content ">
                <p class="less-2-row">{{description}}</p>
            </div>
        </div>
    </div>
</script>
<script id="missionWithoutPic" type="text/html">
    <div class="col-sm-6 mission">
        <div class="ui-block"  onclick="location.href='<?= site_url('home/mission_detail')?>/{{id}}'">
            <div class="row mission-block">
                <div class="col-sm-12 col-12 text-center">
                    <div class="post__date col-sm-12 text-center mb-xs">
                        <time class="published" datetime="{{add_time_str}}"> {{add_time_str}} - {{dealine_str}}</time>
                    </div>
                    <a href="<?=site_url('home/mission_detail')?>/{{id}}"><div class="h2 title">{{title}}</div></a>
                </div>
                <div class="col-sm-12 col-12">
                    <div class="post__date text-center">
                        <p class="text-red h4 mb-msm">$ {{mission_price}}</p>
                        <!-- <a class="c-secondary" href="<?=site_url('home/mission_detail')?>/{{id}}" target="_blank"> {{address_name}}</a> -->
                        <span class="c-grey"><?=lang('距離')?>{{distance}}<?=lang('km')?></span>
                    </div>
                    <% if(nostar!=1){ %>
                    <span class="add-m-like  <% if (star) { %>add<% } %>" id="mission_star_3_{{id}}" onclick="mission_star3({{id}})">
                        <a href="#">
                            <i class="fa fa-star fa-lg" aria-hidden="true"></i>
                        </a>
                    </span>
                    <% } %>
                </div>
            </div>
            <div class="ui-block-content ">
                <p class="less-2-row">{{description}}</p>

            </div>
        </div>
    </div>
</script>
