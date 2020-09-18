<?php
$session_data = $this->session->userdata('logged_in');
?>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $session_data['username'] . "</i> !</b>";
echo "Welcome to Admin Page";
?>
</div>

<a href="add">add</a>
<a href="edit">edit</a>
<a href="delete">delete</a>
<a href="view">view</a>


<b id="logout"><a href="logout">Logout</a></b>




</body>
</html>