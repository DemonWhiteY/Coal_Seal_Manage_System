<?php
// 数据库连接参数
$servername = "localhost"; // 服务器名称
$username = "root"; // 用户名
$password = ""; // 密码
$database = "coal_seal_db"; // 数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

session_start();
$userid = $_SESSION['userid'];
echo "用户id:$userid";


?>