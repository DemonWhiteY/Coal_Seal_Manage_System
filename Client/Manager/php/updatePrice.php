<?php
// 连接到数据库
include("../../Shared/connect.php");


$newprice = $_POST['price'];
$newmargin = $_POST['margin'];
$coalid = $_POST['coalid'];

// 准备 SQL 语句
$sql = "UPDATE coal SET price='$newprice',margin='$newmargin' WHERE ID='$coalid'";

if ($conn->query($sql) === TRUE) {
    echo "改价成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭连接
$conn->close();



// 跳转到指定页面
//header("Location: ../html/Allorder.php");
exit;
?>