<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
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

    <div class="container">
        <div class="main-content">



            <table>
                <tr>
                    <th>下单时间</th>
                    <th>数量</th>
                    <th>地址</th>
                    <th>品种</th>
                    <th>状态</th>
                </tr>


                <?php
                include "../../Shared/connect.php";
                $userid = $_SESSION['userid'];
                $conn->query("set names utf8");
                $sql = "SELECT * FROM `record`";
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
                                    <?php echo $row['time'] ?>
                                </td>
                                <td>
                                    <?php echo $row['num'] ?>
                                </td>
                                <td>
                                    <?php echo $row['address'] ?>
                                </td>
                                <td>
                                    <?php echo $row['coal_name'] ?>

                                </td>
                                <td>
                                    <?php if ($row['situation'] == "No"): ?>
                                        <form action="../php/finish.php" method="POST">
                                            <input type="hidden" name="orderid" value="<?php echo $row['orderID'] ?>">
                                            <input type="submit" value="接单">

                                        </form>
                                    <?php elseif ($row['situation'] == "Yes"): ?>
                                        已派单
                                    <?php elseif ($row['situation'] == "Finish"): ?>
                                        已完成
                                    <?php endif; ?>

                                </td>


                            </tr>


                            <?php $temp = 0; else: ?>


                            <tr>
                                <td>
                                    <?php echo $row['time'] ?>
                                </td>
                                <td>
                                    <?php echo $row['num'] ?>
                                </td>
                                <td>
                                    <?php echo $row['address'] ?>
                                </td>
                                <td>
                                    <?php echo $row['coal_name'] ?>

                                </td>
                                <td>
                                    <?php if ($row['situation'] == "No"): ?>

                                        <form action="../php/finish.php" method="POST">
                                            <input type="hidden" name="orderid" value="<?php echo $row['orderID'] ?>">
                                            <input type="submit" value="接单">

                                        </form>
                                    <?php elseif ($row['situation'] == "Yes"): ?>
                                        已派单
                                    <?php elseif ($row['situation'] == "Finish"): ?>
                                        已完成
                                    <?php endif; ?>

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