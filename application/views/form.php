<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>statics/styles.css">

    <script type="text/javascript" src="<?php echo base_url() ?>statics/main.js"></script>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="username">       
        <?php echo form_error('username')?>

        <input type="text" name="fullname">
        <?php echo form_error('fullname')?>

        <input type="password" name="pwd">
        <?php echo form_error('pwd')?>

        <input type="file" name="image"/>

        <input type="submit" value="Submit">
    </form>

    <a href="<?php echo base_url() ?>welcome"/>
    </body>
    </html>