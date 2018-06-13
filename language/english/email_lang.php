<?php
//請勿修改{{title}} {{image}} {{id}} {{title}} {{nickname}}等值

//最新消息電子郵件
$lang['email_0_title'] = "{{title}}";
$lang['email_0_content'] = "{{title}}<br/>
<img src='{{image}}' /><br/>
{{description}}<br/>
<a href='{{url}}' target='_blank'>查看原文</a>
";

//任務投稿成功
$lang['email_1_title'] = "Your Mission has been launched";
$lang['email_1_content'] = "Hi {{nickname}}, <br/>
恭喜！<br/>
您的任務已經發布，<br/>
現在您可以隨時查看是否有人上傳照片/影片作品給您。
";

//有人回覆我發布的任務
$lang['email_2_title'] = "Someone left a message on your Mission";
$lang['email_2_content'] = "Hi {{nickname}}, <br/>
有人回應了你的任務，<br/>
去看看吧！<br/>
<a href='{{url}}'' target='_blank'>查看原文</a>
";

//任務即將到時
$lang['email_3_title'] = "Your Mission is going to expire";
$lang['email_3_content'] = "Hi {{nickname}}, <br/>
您發布的任務即將到期，<br/>
任務到期後，您可以購買別人上傳給您的照片/影片，或者您也可以不購買任何作品。<br/>
<a href='{{url}}'' target='_blank'>查看原文</a>
";

//密碼找回
$lang['email_4_title'] = "Reset your password";
$lang['email_4_content'] = "Your new password is: {{password}}";

//有人關注
$lang['email_5_title'] = "Someone is following you";
$lang['email_5_content'] = "Hi {{nickname}}, <br/>
有人關注了你，<br/>
<a href='{{url}}'' target='_blank'>看看是誰</a>
";

//邮箱认证
$lang['email_6_title'] = "Verify your email address";
$lang['email_6_content'] = "
<img src='/asset/img/emailimg.jpg' width='100%'>
<a href='{{url}}'' target='_blank'>Please click here to verify your email.</a> By confirming your 
account, all future skyerXnotifications will be sent to this 
email address.

Sincerely,
skyerX Support
";
