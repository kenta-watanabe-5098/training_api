<?php

if($_FILES) {
    $file = $_FILES['file'];
    $storeDir = '../upload/';
    move_uploaded_file($file['tmp_name'], $storeDir.$file['name']);
}
// 添付ファイルを格納;

$url = "https://hlw9zpstkf.execute-api.ap-northeast-1.amazonaws.com";
$header = ['Content-Type: multipart/form-data','x-api-key : wFRndCxe2ido3kcCvUQa8OFw0W5wfEf7UJRZ1Rfb'];

$post = array();
$post['dest'] = htmlspecialchars($_POST['dest'], ENT_QUOTES);
$post['subject'] = htmlspecialchars($_POST['subject'], ENT_QUOTES);
$post['body'] = htmlspecialchars($_POST['body'], ENT_QUOTES);
$post['attachments'] = [[$file['name']]] + [[$file['name'] . ';base64,' . base64_encode(file_get_contents($storeDir . $file['name']))]];


$data = array(
'dest' => $post['dest'],
'subject' => $post['dest'],
'body' => $post['body'],
'attachments' => $post['attachments']
);
// パラメータ生成;

$data_json = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
// JSONエンコード7;

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url . '/production/submit');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

$response = curl_exec($curl);
curl_close($curl);
// cURL実行;

if($response) {
    header ('Location: done.html');
} else {
    header ('Location: form.php');
}
//成功　=> 完了ページ;
//失敗　=> フォームへ戻る;
?>