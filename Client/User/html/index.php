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
                    <a href="myorder.php">订单</a>
                </li>
                <li>
                    <a href="setting.php">设置</a>
                </li>

                <li>

                </li>
            </ul>
        </div>



    </div>

    <div class="container">
        <div class="main-content">



            <table>
                <tr>
                    <th>名称</th>
                    <th>产地</th>
                    <th>价格</th>
                    <th>购买</th>
                </tr>


                <?php
                include "../../Shared/connect.php";

                $conn->query("set names utf8");
                $sql = "SELECT * FROM `coal` ";
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
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['location'] ?>
                                </td>
                                <td>
                                    <?php echo $row['price'] ?>
                                </td>
                                <td>
                                    <form id="order-<?php echo $row['name']; ?>" action="buy.php" method="POST">
                                        <input type="hidden" name="name" value=" <?php echo "$row[name]" ?>">
                                        <input type="hidden" name="coal" value=" <?php echo "$row[ID]" ?>">
                                        <input type="number" name="num" id="number_<?php echo $row['name']; ?> value=" 0"">
                                        <input type="submit" value="购买">
                                    </form>

                                </td>



                            </tr>


                            <?php $temp = 0; else: ?>


                            <tr>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['location'] ?>
                                </td>
                                <td>
                                    <?php echo $row['price'] ?>
                                </td>
                                <td>
                                    <form id="order-<?php echo $row['name']; ?>" action="buy.php" method="POST">
                                        <input type="hidden" name="name" value=" <?php echo "$row[name]" ?>">
                                        <input type="hidden" name="coal" value=" <?php echo "$row[ID]" ?>">
                                        <input type="number" name="num" id="number_<?php echo $row['name']; ?> value=" 0"">
                                        <input type="submit" value="购买">
                                    </form>
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

        <div class="sidebar">
            <h3>日历</h3>
            <!-- 这里可以插入一个实际的日历组件 -->
            <p>这里是日历区域</p>
        </div>
    </div>
</body>

</html>