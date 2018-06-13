<script>
    //script for comment
    function submit_comment(event,obj){
        if($(obj).val()!=''){
            if ((event.ctrlKey && event.keyCode == 13) || event=='sendBtn') {
                <?php if(is_login()){ ?>
                var data = {
                    type : $(obj).attr("ytype"),
                    parent_id : $(obj).attr("yid"),
                    reply_id : $(obj).attr("yreply"),
                    content : $(obj).val()
                };
                $.post("<?=site_url("ajax/comment")?>",data,function(){
                    $(obj).val('');
                    load_comment($(obj).attr("ytype"),$(obj).attr("yid"))
                });
                <?php }else{ ?>
                alert('<?=lang('请登录')?>');
                $("#top-member").click();
                <?php } ?>
            }
        }
    }
    function load_comment(type,parent_id){
        $.ajax({
            url : "<?=site_url("ajax/getComment")?>",
            data : {type:type,parent_id:parent_id},
            dataType : 'json',
            success : function(re){
                $("#comments_list_"+parent_id).html('');
                $("#comments_list_"+parent_id).append(template('comment',{data:re,id:parent_id,type:type,level:0}));
            }
        });
    }
</script>
<script id="comment" type="text/html">
    <% level++; %>
    {{each data}}
    <li id="comment_{{$value.id}}">
        <div class="post__author author vcard inline-items">
            <a href="<?=site_url("member/view")?>/{{$value.member_id}}">
            <span class="author-round" style="width: 26px;height: 26px; background-image: url('{{$value.member_avatar}}');background-size: cover;background-position-x:center; ">
            </span>
            <div class="author-date">
                <a class="h6 post__author-name fn" href="<?=site_url("member/view")?>/{{$value.member_id}}">{{$value.member_nickname}}</a>
                <div class="post__date">
                    <time class="published" datetime="{{$value.add_time_str}}">
                        {{$value.add_time_str}}
                    </time>
                </div>
            </div>
        </div>
        <p>{{$value.content}}</p>
        <a href="###" class="post-add-icon inline-items" onclick="comment_like({{$value.id}})">
            <% if($value.like){ %>
            <img class="response click" src="<?=base_url()?>asset/img/like-d.png" id="comment_like_pic_{{$value.id}}" alt="" width="">
            <% }else{ %>
            <img class="response" src="<?=base_url()?>asset/img/like.png" id="comment_like_pic_{{$value.id}}" alt="" width="">
            <% } %>
        </a>
        <% if(level==1){ %>
        <a class="reply" data-toggle="collapse" href="#replay{{$value.id}}" aria-expanded="false"  aria-controls="replay{{$value.id}}"><?=lang('Reply')?></a>
        <div class="collapse" id="replay{{$value.id}}" >
            <div class="card card-block">
                <form class="comment-form inline-items"> <a href="<?=site_url("member/view")?>">
                    <div class="post__author author vcard inline-items" style="background-image: url('{{$value.member_avatar}}');background-size: cover;background-position-x:center; ">
                       <!-- <img src="{{$value.member_avatar}}" alt="author"> -->
                    </div></a>
                    <div class="form-group with-icon-right re">
                        <textarea class="form-control" placeholder="" id="comments_textarea_{{id}}" ytype="{{type}}" yid="{{id}}" yreply="{{$value.id}}" onkeydown="submit_comment(event,this);"></textarea>
                    </div>
                    <img class="float-right sub_btn" src="/asset/img/Send_reply_logo.png" alt="" width="" onclick="submit_comment('sendBtn',jQuery(this).parent().find('textarea')[0]);">
                </form>
            </div>
        </div>
        <% } %>
        <% if ($value.son.length>0) { %>
        <ul class="children">
            <% include('comment', {data:$value.son,id:id,type:type,level:level}) %>
        </ul>
        <% } %>
    </li>
    {{/each}}
</script>