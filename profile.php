<?php
    
    session_start();

    if (isset($_POST['done'])){

        session_destroy();
        
        if (session_id() == ''){
            
            header ('Location: login.php');
        
        }

    }

    function hello(){
        echo  '<div class="container">'; 
        echo '<table class="table">';
    echo '<tr>'; 
        echo '<td class=\'text-center\'><h4>Имя пользователя</h4></td>';
        echo '<td class="text-center"><h4>ID сессии</h4></td>';
        echo '</tr>';
    echo '<tr>'; 
        echo '<td class="text-center"><h4>'.$_SESSION['name'].'</h4></td>';
        echo '<td class="text-center"><h4>'.session_id().'<//h4></td>';
    echo '</tr>';
        echo '</table>';
    echo '</div>';
    }

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main_1.css">
</head>

<body>

    <?php
    
        hello();
    
    ?>

    <div id='wrap' class="container">
        <form class="form-signin" method='POST' action="profile.php">
            <button id='btn' class="btn btn-lg btn-primary btn-block" type="submit" name="done">Удалить сессию</button>
        </form>
    </div>
    
    <script src="js/jquery-2.2.4.js" type='text/javascript'></script>
    <script src="js/main.js" type='text/javascript'></script>

</body>

</html> 