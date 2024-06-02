<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
        .searchsubmit {
            width: 3%;
            height: 3%;
            padding-top: 10px;
            margin-top: 10px;
        }

        .searchbox {
            height: 150px;
            width: 100%;
            align-items: center;
        }

        .text {
            margin-left: 20%;
            align-self: center;
            display: inline-block;
            border: 0;
            width: 60%;
            height: 35px;
            font-size: 20px;
            outline: none;
            background-color: #ffffff00;
            border-radius: 30px;
            border: 2px solid #0d0000;
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

            <div class="searchbox">
                <form action="result.php" method="POST">
                    <div class="searchfirst">
                        <input type="text" name="query" placeholder="  请输入检索词" class="text">

                        <input type="image" name="" src="../../img/searchB.png" onClick="document.formName.submit()"
                            class="searchsubmit">
                    </div>



                </form>
            </div>

            <table>
                <tr>
                    <th>下单时间</th>
                    <th>客户</th>
                    <th>工人</th>
                    <th>数量</th>
                    <th>地址</th>
                    <th>品种</th>
                    <th>状态</th>
                </tr>


                <?php
                include "../../Shared/connect.php";
                $userid = $_SESSION['userid'];
                $conn->query("set names utf8");
                $sql = "SELECT * FROM `record_overview`";
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
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['workername'] ?>
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
                                    <?php echo $row['situation'] ?>

                                </td>




                            </tr>


                            <?php $temp = 0; else: ?>


                            <tr>
                                <td>
                                    <?php echo $row['time'] ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['workername'] ?>
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
                                    <?php echo $row['situation'] ?>

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