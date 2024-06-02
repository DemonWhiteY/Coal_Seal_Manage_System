<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .quit_text {
            margin-top: 25px;
            color: red;
            font-size: 25px;
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
                    <a href="insert.php">订单</a>
                </li>
                <li>
                    <a href="edit.php">设置</a>
                </li>

                <li>

                </li>
            </ul>
        </div>



    </div>

    <div class="container">
        <div class="main-content">

            <div class="allworktable">

                <?php
                include "../../Shared/connect.php";
                $userid = $_SESSION['userid'];
                $conn->query("set names utf8");
                $sql = "SELECT * FROM `record`WHERE user='$userid'";
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


                                <?php
                                if ($row['worker'] != 0):
                                    $sqluser = "SELECT * FROM `worker` WHERE ID='$row[worker]'";
                                    $user = $conn->query($sqluser);
                                    $userrow = $user->fetch_assoc();


                                    echo "送货人： $userrow[workername]" ?>先生
                                    <br>
                                    送货人联系电话：
                                    <?php echo " $userrow[phone] "; endif; ?>


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
                                <form action="../php/record_delete.php" method="post">
                                    <input type="hidden" name="orderid" value="<?php echo "$row[orderID]" ?>">
                                    <input class="handed" type="submit" value="取消订单">
                                </form>
                            <?php endif ?>
                        </div>



                    <?php endwhile; ?>


                <?php else:
                    echo "没有结果"; ?>
                <?php endif; ?>

            </div>


        </div>

        <div class="sidebar">
            <table>
                <tr>

                    <th>数量</th>

                    <th>品种</th>
                    <th>状态</th>
                </tr>


                <?php

                $userid = $_SESSION['userid'];
                $conn->query("set names utf8");
                $sql = "SELECT * FROM `record` WHERE user='$userid'";
                $result = $conn->query($sql);


                if ($result->num_rows > 0):
                    // 输出数据
                    $temp = 0;
                    $i = 0;
                    while ($row = $result->fetch_assoc()):
                        $num = "0";
                        if ($temp == 1): ?>

                            <tr class=odd>

                                <td>
                                    <?php echo $row['num'] ?>
                                </td>

                                <td>
                                    <?php echo $row['coal_name'] ?>

                                </td>
                                <td>
                                    <?php if ($row['situation'] == "No")
                                        echo "未接单";
                                    else if ($row["situation"] == "Yes")
                                        echo "已接单";
                                    else if ($row["situation"] == "Finish")
                                        echo "已完成";
                                    else if ($row["situation"] == "Quit")
                                        echo "已取消";
                                    ?>

                                </td>


                            </tr>


                            <?php $temp = 0; else: ?>


                            <tr>
                                <td>
                                    <?php echo $row['num'] ?>
                                </td>

                                <td>
                                    <?php echo $row['coal_name'] ?>

                                </td>
                                <td>
                                    <?php if ($row['situation'] == "No")
                                        echo "未接单";
                                    else if ($row["situation"] == "Yes")
                                        echo "已接单";
                                    else if ($row["situation"] == "Finish")
                                        echo "已完成";
                                    else if ($row["situation"] == "Quit")
                                        echo "已取消";
                                    ?>

                                </td>
                            </tr>


                            <?php $i++;
                            $temp = 1;
                        endif;
                        ?>
                    <?php endwhile; ?>


                <?php else:
                    echo "没有结果"; ?>
                <?php endif; ?>
            </table>


        </div>
    </div>
</body>

</html>