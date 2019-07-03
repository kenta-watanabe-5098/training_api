<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail:form</title>
</head>
<body>
    <h1>メールフォーム</h1>
    
    <form action="sendMail.php" method="POST" enctype="multipart/form-data">
        <div class="item">
            <p>送信先</p>
            <input type="text" name="dest"><br/>
        </div>  
        <div class="item">
            <p>タイトル</p>
            <input type="text" name="subject"><br/>
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