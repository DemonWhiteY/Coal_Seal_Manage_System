<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .setting_container {
            width: 60%;
            height: 900px;
            align-self: center;
            margin-left: 20%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-top: 0px;
        }



        .infobox {

            position: relative;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        .setting_form {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
    <title>样本页面</title>

</head>

<body>
    <div class="index-navcontiner">
        <div>
            <ul class="nav">
                <li>
                    <a href="index.php">主页</a>
                </li>
                <li>
                    <a href="AllOrder.php">全部订单</a>
                </li>
                <li>
                    <a href="myWork.php">我的任务</a>
                </li>

                <li>
                    <a href="setting.php">设置</a>
                </li>
            </ul>
        </div>

    </div>
    <?php include("../../Shared/connect.php"); ?>
    <div class="setting_container">
        <form class="setting_form" action="../php/infoupdate.php" method="post">
            <div class="infobox">
                账号：
                <?php echo "$userid";
                $sql = "SELECT * FROM worker WHERE ID='$userid'";
                $worker = $conn->query($sql);
                $workerrow = $worker->fetch_assoc();
                ?>
            </div>
            <div class="infobox">
                姓名：
                <input type="text" name="newname" value="<?php echo "$workerrow[workername]"; ?>">

            </div>
            <div class="infobox">
                手机号码：
                <input type="text" name="newphone" value="<?php echo "$workerrow[phone]"; ?>">
            </div>
            <div class="infobox">
                <input type="submit" value="修改信息">
            </div>
        </form>
    </div>
</body>

</html>