<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);      
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8'; 
    $mail->setFrom('rezerver2023@yandex.ru');
    $mail->addAddress('rezerver2023@yandex.ru');
    $mail->isHTML(true);
    $mail->Subject = 'Заявка с сайта';

    $body = '<h2>Пришла заявка с сайта</h2>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Название компании: </strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>Почта: </strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
        $body.='<p><strong>Номер телефона: </strong> '.$_POST['phone'].'</p>';
    }
    if(trim(!empty($_POST['message']))){
        $body.='<p><strong>Сообщение: </strong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    if(!$mail->send()) {
        $message = 'Ошибка';
    } else{
        $message = 'Заявка отправлена!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>