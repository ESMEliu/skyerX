<html lang="en">
<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="<?=config_item('gg_app_id')?>">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="<?=base_url()?>asset/js/jquery-3.2.0.min.js"></script>
</head>
<body>
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
<script>
    function onSignIn(googleUser) {
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;

        window.location.href = "<?=site_url('member/google_login_callback')?>?id_token="+id_token;
    };
</script>
</body>
</html>