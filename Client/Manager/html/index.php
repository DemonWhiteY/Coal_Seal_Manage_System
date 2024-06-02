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
                    <a href="AllOrder.php">订单</a>
                </li>
                <li>
                    <a href="edit.php">人员管理</a>
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
                    <th>余量</th>
                    <th>操作</th>
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
                                <form action="../php/updatePrice.php" method="post">
                                    <td>
                                        <?php echo $row['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['location'] ?>
                                    </td>
                                    <td>
                                        <input type="number" name="price" value="<?php echo $row['price'] ?>">
                                    </td>
                                    <td>
                                        <input type="number" name="margin" value="<?php echo $row['margin'] ?>">
                                    </td>
                                    <td>

                                        <input type="hidden" name="coalid" value="<?php echo "$row[ID]" ?>">

                                        <input type="submit" value="改价">


                                    </td>

                                </form>

                            </tr>


                            <?php $temp = 0; else: ?>


                            <tr>
                                <form action="../php/updatePrice.php" method="post">
                                    <td>
                                        <?php echo $row['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['location'] ?>
                                    </td>
                                    <td>
                                        <input type="number" name="price" value="<?php echo $row['price'] ?>">
                                    </td>
                                    <td>
                                        <input type="number" name="margin" value="<?php echo $row['margin'] ?>">
                                    </td>
                                    <td>

                                        <input type="hidden" name="coalid" value="<?php echo "$row[ID]" ?>">

                                        <input type="submit" value="改价">


                                    </td>

                                </form>

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