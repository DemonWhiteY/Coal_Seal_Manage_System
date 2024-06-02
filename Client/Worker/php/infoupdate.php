<?php
// 连接到数据库
include("../../Shared/connect.php");


$newname = $_POST['newname'];
$newphone = $_POST['newphone'];

$worker = $_SESSION['userid'];




// 准备 SQL 语句
$sql = "UPDATE worker SET workername='$newname',phone='$newphone' 
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