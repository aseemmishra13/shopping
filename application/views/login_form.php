<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div id="main">
<div id="login">
<h2>Admin Login</h2>
<?php echo form_open('admin/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/>
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/>
<input type="checkbox" name="remember_me"/> Remember Me
<input type="submit" value=" Login " name="submit"/>
<?php echo form_close(); ?>
</div>


</div>
</div>
</body>
</html>