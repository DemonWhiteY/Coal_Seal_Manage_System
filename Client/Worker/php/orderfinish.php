<?php
// 连接到数据库
include("../../Shared/connect.php");


$orderid = $_POST['orderid'];

$worker = $_SESSION['userid'];

$time = new DateTime();



// 检查DateTime对象是否为null
if ($time === null) {
    echo "DateTime对象未正确初始化";
    exit;
}

// 输出当前时间
echo $time->format('Y-m-d H:i:s'); // 正确的用法
$format_time = $time->format('Y-m-d H:i:s');

// 准备 SQL 语句
$sql = "UPDATE record SET situation='Finish' WHERE orderID='$orderid'";

if ($conn->query($sql) === TRUE) {
    echo "$orderid 订单已签收";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭连接
$conn->close();



// 跳转到指定页面
//header("Location: ../html/Allorder.php");
exit;
?>