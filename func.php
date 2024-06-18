<?php
// Загрузка файла .env
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
// Получение значения из файла .env
$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');
?>

<?php
//функция сохранения данных в БД
function savePost($u_name, $email, $b_message, $ip, $browser) {
    //подключение к БД
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    //проверяем подключение к БД
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //вводим данные в БД
    $sql = "INSERT INTO posts (u_name, email, b_message, ip, browser, add_date)
            VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    //бинд параметров
    $stmt->bind_param("sssss", $u_name, $email, $b_message, $ip, $browser);
    //выполнение запроса
    if ($stmt->execute()) {
        echo "Новый пост успешно добавлен!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //закрываем соединение
    $stmt->close();
    $conn->close();
}
?>
<?php
// Подключение к базе данных
function showPost(){
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    // Проверка подключения
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    // Выполнение запроса
    $sql = "SELECT * FROM posts";
    if($result = $conn->query($sql)){        
        foreach($result as $row){
            echo $row["u_name"] . "<br>";
            echo $row["email"] . "<br>";
            echo $row["b_message"] . "<br>";
            echo $row["add_date"] . "<br>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
    // Закрытие соединения
    $conn->close();
}
?>