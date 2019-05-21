<?php require './fb-init.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .hidden{
        width:150px;
        height:30px;
        overflow:hidden;
    }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['access_token'])):?>
    <a href="logout.php">Logout</a>
    <form action="" method="post">
    <textarea></textarea>
    <input type="submit" name=""/>
    </form>
    
    <?php else:?>
    <a href="<?php echo $login_url;?>">Login</a>
    <?php endif;?>
</body>
</html>





