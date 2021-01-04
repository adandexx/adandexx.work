<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Toppage_Netalk</title>
    <link rel="stylesheet" type="text/css" href="./index.css">
    <link rel="shortcut icon" href="./img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <meta name="description" content="テストページです。">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>

    <div id="home " class="big-bg">
    <header class="header">
        <h1 class="title"><a href="./index.html">NETALK</a></h1>
        <nav>
            <ul class="main-nav">
                <li><a class="aheader" href="news.html">News</a></li>
                <li><a class="aheader" href="comtact.html">Contact</a></li>
                <li><a class="aheader" href="test.html">Other</a></li>
            </ul>
        </nav>
    </header>
    
        <div class="content">
            <div class="threadcontent">
                <?php
                    $threadname = $_GET['threadname'];
                    print("<h1>$threadname</h1><br>");
                    include("./php/mysql_login.php");

                    $sql = "SELECT * FROM $threadname";

                    $stmt = $pdo->query($sql);

                    if(!$stmt){
                        print("fail to read");
                        die;
                    }

                    foreach($stmt as $value){
                        echo "<strong>$value[id] $value[username] $value[time]</strong><br>
                        $value[content] <br><br>";
                    }
                ?>
                
                <form action="./php/write.php?threadname=<?php echo $threadname ?>" method="POST" autocomplete="off">
                    ユーザー名:<input class="form" type="text" name="username"><br>
                    本文:<br><textarea class="form" name="content" rows="4" style="width:100%;"></textarea>
                    <input class="bottun" type="submit" value="送信">
                </form>

            </div>
        </div>
    </div>
</body>