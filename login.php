<?php  

session_start();

function login(){
    
    $login = 'nikita';
    $pass = '123';
    $pass_md5 = md5($pass);
    $data = serialize([$login,$pass_md5]);
    file_put_contents('data',$data);
    file_get_contents('data');
    $content = unserialize($data);

    if (isset($_POST['done'])){

        if (($_POST['auth'] == $content[0]) && (md5($_POST['pass']) == $content[1])){

            $_SESSION['name'] = $_POST['auth'];

            echo '<p class=\'text-center alert alert-success\'>Вы вошли в систему как: "'.$_POST['auth'].'"</p>';
            echo  '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-md-4"></div>';
            echo '<div class="col-md-4"><a href=\'profile.php\'><h4 class="text-center">Перейти к своему профилю</h4></a></div>';
            echo '<div class="col-md-4"></div>';
            echo '</div>';
            echo '</div>';

        } else {

            echo '<p class="text-center alert alert-danger">Имя пользователя или пароль введено неверно</p>';
        }
    }

}
?>





<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Авторизация пользователя</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div id='wrap' class="container">

        <form class="form-signin" method='POST' action="login.php">

            <h2 class="form-signin-heading">Войдите в систему</h2>
            <label for="inputLogin" class="sr-only">Login</label>

            <input type="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus name="auth">

            <label for="inputPassword" class="sr-only">Password</label>

            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="pass">

            <button id='btn' class="btn btn-lg btn-primary btn-block" type="submit" name="done">Войти</button>
        </form>
    </div>

<?php
    
    login();
    
    ?>
               
                                             
               
                <script src="js/jquery-2.2.4.js" type='text/javascript'></script>
                <script src="js/main.js" type='text/javascript'></script>
</body>

</html>