<html>
<head>
<title>Upload Form</title>
</head>
<body>
<?php echo $error;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('admin/do_upload');?>
<?php echo "Serial:<input type='text' name='serial' size='20' />"; ?>
<?php echo "Name:<input type='text' name='name' size='20' />"; ?>
<?php echo "Description:<input type='text' name='description' size='20' />"; ?>
<?php echo "Prize:<input type='text' name='price' size='20' />"; ?>

<?php echo "Image:<input type='file' name='userfile' size='20' />"; ?>
<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
<?php echo "</form>"?>
</body>
</html>