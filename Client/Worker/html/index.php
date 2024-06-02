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
                $odd = "odd";

                if ($result->num_rows > 0) {
                    // 输出数据
                    $temp = 0;
                    while ($row = $result->fetch_assoc()) {
                        $num = "0";
                        if ($temp == 1) {
                            echo "
            <tr class=$odd>
                <td>{$row['name']}</td>
                <td>{$row['location']}</td>
                <td>{$row['price']}</td>
                <td><button>+</button>  {$num}  <button>-</button>             <button>购买</button></td>

                
                
            </tr>
    
    ";
                            $temp = 0;
                        } else {
                            echo "
            <tr>
                <td>{$row['name']}</td>
                <td>{$row['location']}</td>
                <td>{$row['price']}</td>
                <td><button>+</button>  {$num}  <button>-</button>             <button>购买</button></td>
            </tr>
    
    ";
                            $temp = 1;
                        }

                        ;
                    }
                } else {
                    echo "没有结果.";
                }



                ?>
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