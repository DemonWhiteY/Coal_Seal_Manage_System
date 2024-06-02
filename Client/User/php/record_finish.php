<?php
// 连接到数据库
include("../../Shared/connect.php");

// 获取表单数据
$phone = $_POST['phone'];
$quantity = $_POST['quantity'];
$address = $_POST['address'];
$name = $_POST['name'];
$coalid = $_POST['coal'];
$userid = $_SESSION['userid'];

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
$sql = "INSERT INTO record (phone, num, address,user,time,coal_name,coalID) VALUES ('$phone', '$quantity', '$address','$userid','$format_time','$name','$coalid')";

if ($conn->query($sql) === TRUE) {
    echo "订单已成功提交";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭连接
$conn->close();



// 跳转到指定页面
header("Location: ../html/myorder.php");
exit;
?>