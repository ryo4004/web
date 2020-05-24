<?php

  require('../../secrets/mail.php');

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
  header('Access-Control-Allow-Methods: POST');
  header("Content-Type: application/json; charset=utf-8");

  header('accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $json_body = file_get_contents('php://input');
    $post = json_decode($json_body, true);

    if ($post['sendpass'] === $MAIL_SENDPASS) {
      // $mail['to'] = mb_encode_mimeheader($post['name']).'<'.$post['to'].'>';
      $mail['to'] = $post['to'];
      $mail['subject'] = $post['subject'];
      // $mail['message'] = $post['body'];

      mb_language('Ja');
      mb_internal_encoding('UTF-8');

      $boundary = '__BOUNDARY__'.md5(rand());
                  
      $mail['additional_headers'] = "Content-Type: multipart/mixed;boundary=\"{$boundary}\"\r\n";
      $mail['additional_headers'] .= "From: ".mb_encode_mimeheader('ザ・ウィンド・アンサンブル')."<noreply@winds-n.com>";
      // $mail['additional_headers'] .= "Return-Path: noreply@winds-n.com";

      $body = $post['body'];

      $mail['message'] = "--{$boundary}\r\n";
      $mail['message'] .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";
      $mail['message'] .= "\r\n{$body}\r\n";
      $mail['message'] .= "--{$boundary}\r\n";
      $mail['message'] .= "Content-Type: text.csv; charset=\"UTF-8\"; name=\"score.csv\"\r\n";
      $mail['message'] .= "Content-Disposition: attachment; filename=\"score.csv\"\r\n";
      $mail['message'] .= "Content-Transfer-Encoding: base64\r\n";
      $mail['message'] .= "\r\n";
      $mail['message'] .= chunk_split(base64_encode($post['attach']))."\r\n";
      $mail['message'] .= "--{$boundary}--";

      $result = mb_send_mail($mail['to'],$mail['subject'],$mail['message'],$mail['additional_headers']);

      echo json_encode(compact('result'));
      // echo json_encode(compact('body'));
    }
  }
