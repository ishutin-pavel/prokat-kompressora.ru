<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="6488060@mail.ru";

  //from email adress
  $emailFrom ="info@prokat-kompressora.ru";

  //email subject
  $emailSubject = "Mail from Porta";

  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $comment = $_POST["comment"];
  if($name == "")
   $data['success'] = false;
 
 if($comment == "")
   $data['success'] = false;

 if($data['success'] == true){

  $message = "Имя: $name<br>Телефон: $phone<br>Сообщение: $comment";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}
