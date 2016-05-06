<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $CI =& get_instance();
        $CI->load->helper('url');
    ?>
</head>
<body>
    <form action="<?php echo site_url('glamsex_login/request');?>" method="get">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" name="login">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            <button class="btn btn-default">Go fuccboi</button>
        </div>
    </form>
    <?php
    if(isset($loginMessage)) {
        echo $loginMessage;
    }
    ?>
</body>
</html>