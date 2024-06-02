<?php
// 连接到数据库
include("../../Shared/connect.php");


$newname = $_POST['newname'];
$newphone = $_POST['newphone'];
$newaddress = $_POST['newaddress'];
$worker = $_SESSION['userid'];




// 准备 SQL 语句
$sql = "UPDATE user SET name='$newname',phone='$newphone',Address='$newaddress' 
WHERE ID='$userid'";

if ($conn->query($sql) === TRUE) {
    echo "信息已更改";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭连接
$conn->close();



// 跳转到指定页面
//header("Location: ../html/Allorder.php");
exit;
?>