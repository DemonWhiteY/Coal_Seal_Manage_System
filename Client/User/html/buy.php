<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>样本页面</title>
    <style>
        /* 整体页面样式 */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* 中心容器 */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* 表单容器 */
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
        }

        /* 表单标题 */
        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        /* 表单输入框 */
        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* 提交按钮 */
        .submit-btn {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
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

    <?php $num = $_POST['num'];
    $name = $_POST['name'];
    $coal = $_POST['coal'];
    ?>

    <div class="center-container">
        <div class="form-container">
            <h2 class="form-title">订单信息</h2>

            <form action="../php/record_finish.php" method="post">
                <label for="phone">电话号码:</label><br>
                <input type="tel" id="phone" name="phone" class="form-input" required><br>

                <label for="quantity">货物数量:</label><br>
                <input type="number" id="quantity" name="quantity" class="form-input" value="<?php echo "$num" ?>"
                    required><br>

                <label for="address">收货地址:</label><br>
                <textarea id="address" name="address" rows="4" class="form-input" required></textarea><br>
                <input type="hidden" name="name" value="<?php echo "$name" ?>">
                <input type="hidden" name="coal" value="<?php echo "$coal" ?>">
                <input type="submit" value="提交订单" class="submit-btn">
            </form>
        </div>
    </div>

    </div>


</body>

</html>