<?php

$msg_box = ""; // в этой переменной будем хранить сообщения формы





if($_POST['btn_submit']){

    

    $errors = array(); // контейнер для ошибок

    // проверяем корректность полей

    if($_POST['name'] == "") $errors[] = "Поле 'Name' не заполнено!";

    if($_POST['email'] == "") $errors[] = "Поле 'e-mail' не заполнено!";

    if($_POST['company'] == "") $errors[] = "Поле 'Company' не заполнено!";

    if($_POST['tel'] == "") $errors[] = "Поле 'Phone' не заполнено!";

    if($_POST['message'] == "") $errors[] = "Поле 'Message' не заполнено!";



    // если форма без ошибок

    if(empty($errors)){

        // собираем данные из формы

        $message = "Имя пользователя: " . $_POST['name'] . "<br/>";

        $message .= "E-mail пользователя: " . $_POST['email'] . "<br/>";

        $message .= "Страна отправителя: " . $_POST['country'] . "<br/>";

        $message .= "Телефон отправителя: " . $_POST['tel'] . "<br/>";

        $message .= "Текст письма: " . $_POST['message'];

        send_mail($message); // отправим письмо

        // выведем сообщение об успехе

        $msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";

        

    }

    else{

        // если были ошибки, то выводим их

        $msg_box = "";

        foreach($errors as $one_error) {

            $msg_box .= "<span style='color: red;'>$one_error</span><br/>";

        }

    }

}

// функция отправки письма

function send_mail($message){

    // почта, на которую придет письмо

    $countries = array('Азербайджан','Армения','Белорусь','Казахстан','Киргизия','Республика Молдова','Россия','Таджикистан','Туркменистан','Узбекистан','Украина');

    

    if (in_array($_POST['country'], $countries)) {



        $mail_to = 'mail_cis@server.infomir.eu' . ', ';

        $mail_to .= ' mail_sales@server.infomir.eu';


    } else {



        $mail_to = 'mail_sales@server.infomir.eu';



    }

    

    // тема письма

    $subject = "Письмо с обратной связи";

    

    // заголовок письма

    $headers= "MIME-Version: 1.0\r\n";

    $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма

    $headers .= "From: Тестовое письмо <maxkap@qualitydesign.kl.com.ua>\r\n"; // от кого письмо 

    // отправляем письмо

    $result = mail($mail_to, $subject, $message, $headers);

    

}

echo($msg_box);



// ПОДКЛЮЧЕНИЕ MySql



$host = "mysql.zzz.com.ua";

$user = 'qualityTest';

$password = '1Qwertasd';

$db_name = "blueboxmax";





// Добавление в БД

$name =  htmlspecialchars( $_POST['name'] );

$email =  htmlspecialchars( $_POST['email'] );

$country =  htmlspecialchars( $_POST['country'] );

$company =  htmlspecialchars( $_POST['company'] );

$phone =  htmlspecialchars( $_POST['tel'] );

$text =  htmlspecialchars( $_POST['message'] );



if ( empty( $errors ) ){

    

    $connect = mysqli_connect($host, $user, $password, $db_name);



    $sql= " INSERT INTO `test1` (`name`, `email`, `country`, `company`, `phone`, `message`)

            VALUES ('$name', '$email', '$country', '$company', '$phone', '')";



    

    

    if(mysqli_query($connect, $sql) == true){

        echo "Recorded";

    }

    

    mysqli_close($connect);

    

}

// ПОДКЛЮЧЕНИЕ JS

function js ($src) {

    return sprintf("<script type=\"text/javascript\" src=\"%s\"></script>",$src);

}

echo js("main.js");

?>

