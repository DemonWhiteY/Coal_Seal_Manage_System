<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>样本页面</title>
    <style>
        .handed {
            margin-top: 25px;
            background-color: #1b63b0;
            width: 100px;
            height: 30px;
            font-size: 20px;
            border-radius: 4px;
            border-width: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: white;




        }

        .finished_text {
            margin-top: 25px;
            color: gray;
            font-size: 25px;
        }

        .quit_text {
            margin-top: 25px;
            color: rgb(221, 30, 30);
            font-size: 25px;
        }
    </style>

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

    <div class="allworktable">

        <?php
        include "../../Shared/connect.php";
        $userid = $_SESSION['userid'];
        $conn->query("set names utf8");
        $sql = "SELECT * FROM `record`WHERE worker='$userid'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0):
            // 输出数据
            $temp = 0;
            $i = 0;
            while ($row = $result->fetch_assoc()):
                ?>
                <div class="Workcontainer">
                    <div class="orderBox">
                        下单时间：
                        <?php echo " $row[time] " ?>
                        地址：
                        <?php echo " $row[address] " ?>
                    </div>
                    <div class="line"></div>
                    <div class="infoBox">
                        联系电话：
                        <?php echo " $row[phone] " ?>
                        <br>
                        收货人：

                        <?php
                        $sqluser = "SELECT * FROM `user` WHERE ID='$row[user]'";
                        $user = $conn->query($sqluser);
                        $userrow = $user->fetch_assoc();
                        echo " $userrow[ID]" ?>先生
                    </div>
                    <?php if ($row['situation'] == 'Finish'): ?>
                        <div class="finished_text">
                            已完成该订单
                        </div>
                    <?php elseif ($row['situation'] == 'Quit'): ?>
                        <div class="quit_text">
                            已取消该订单
                        </div>
                    <?php else: ?>
                        <form action="../php/orderfinish.php" method="post">
                            <input type="hidden" name="orderid" value="<?php echo "$row[orderID]" ?>">
                            <input class="handed" type="submit" value="用户签收">
                        </form>
                    <?php endif ?>
                </div>



            <?php endwhile; ?>


        <?php else:
            echo "没有结果"; ?>
        <?php endif; ?>

    </div>
    <div style="background:linear-gradient(to left,#FFFFFF,#067859,#FFFFFF);height:1px;"></div>
</body>

</html>