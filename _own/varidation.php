<?php
$error = array();
if(isset($_POST)) {
    if(!isset($_POST['dest'])) {
        $error['dest'] = 1;
    }
    
    if(!isset($_POST['subject'])) {
        $error['subject'] = 1;
    }
    
    if($error == '') {
        // unset($_POST);
        header('Location: sendMail.php');
    }
    
    unset($error);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    body {
        font-size: 20px;
    }
    .item {
        margin: 0px;
        padding: 10px 10px;
        line-height: 0.8em;
    }

    </style>
    <title>mail:form</title>
</head>
<body>
    <h1>メールフォーム</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="item">
            <p>送信先</p>
            <input type="text" name="dest"><br/>
            <?php if($error['dest'] > 0) : ?>
                <p style="color: red;">正しく入力ください</p>
            <?php endif; ?>
        </div>  
        <div class="item">
            <p>タイトル</p>
            <input type="text" name="subject"><br/>
            <?php if($error['subject'] > 0) : ?>
                <p style="color: red;">正しく入力ください</p>
            <?php endif; ?>
        </div>

        <div class="item">
            <p>本文</p>
            <textarea name="body" cols="50" rows="10" placeholder="こちらにご記入ください"></textarea><br/>
        </div>

        <div class="item">
            <p>ファイル</p>
            <input type="file" name="file"><br/><br/>
        </div>

        <div class="item">
            <input type="submit" value="送信する">
        </div>
    </form>
    
</body>
</html>