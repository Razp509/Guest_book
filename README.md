Гостевая книга
Инструкция по развертыванию:
  1. Установка PHP 8.3.8 +
      расширения: Composer 2.7.7
                  phpdotenv5.6.0
  2. Установка сервера Apache 2.4.59
  3. Установка MySQL 8.4.0 LTS +
       создание БД:
         CREATE TABLE messages (
         id INT AUTO_INCREMENT PRIMARY KEY,
         u_name VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL,
         b_message TEXT NOT NULL,
         add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         ip VARCHAR(45) NOT NULL,
         browse VARCHAR(255) NOT NULL
         );
  4. Создание файла .env хранения данных таблтцы:
     DB_HOST=<имя хоста>
     DB_NAME=<название БД>
     DB_USER=<имя пользователя>
     DB_PASS=<пароль>
