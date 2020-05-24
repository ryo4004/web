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
      $mail['message'] = $post['body'];
      $mail['additional_headers'] = "From: ".mb_encode_mimeheader('ザ・ウィンド・アンサンブル')."<noreply@winds-n.com>";
      // $mail['additional_headers'] .= "Return-Path: noreply@winds-n.com";

      $result = mb_send_mail($mail['to'],$mail['subject'],$mail['message'],$mail['additional_headers']);

      echo json_encode(compact('result'));
      // echo json_encode(compact('body'));
    }
  }
