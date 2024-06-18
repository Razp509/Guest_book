<!DOCTYPE html>
<html>
<head>
<title>Гостевая книга</title>
<meta charset="utf-8" />
</head>
<body>
<?php
//импорт файла с фунцкиями
require_once 'func.php';

//отображаем содержимое таблицы
showPost();

//переменные формы ввода данных
$username = "";
$email = "";
$message = "";
//переменные запроса IP и данных браузера пользователя
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_browser = $_SERVER['HTTP_USER_AGENT'];

//заполняем переменные формы ввода
if(isset($_POST["username"])){  
    $username = htmlentities($_POST["username"]);
}
if(isset($_POST["email"])){  
    $email = htmlentities($_POST["email"]);
}
if(isset($_POST["message"])){  
    $message = htmlentities($_POST["message"]);
}
?>

<h3>Форма ввода данных</h3>
<form method="POST">
    <p>Введите имя пользователя: <input type="text" name="username" /></p>
    <p>Введите E-mail: <input type="text" name="email" /></p>
    <p>Введите текст сообщения: <input type="text" name="message" /></p>
    <input type="submit" value="Отправить">
</form>

<?php
//проверка на пустую строку для формы ввода
if($username != ""){
    if($email != ""){
        if($message != ""){
            //если все три условея не пустые, производим вызов фунции ввода даных в БД
            savePost($username, $email, $message, $user_ip, $user_browser);
        }
        else{
            echo "Введите текст!";
        }
    }
    else{
        echo "Введите email!";
    }
}
else{
    echo "Введите имя пользователя!";
}
?>
</body>
</html>