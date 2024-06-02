<?php
include("../../Shared/connect.php");
$order_id = $_POST['orderid'];  // 要删除的订单ID

try {
    // 开始事务
    $conn->begin_transaction();

    // 获取订单信息
    $stmt = $conn->prepare('SELECT * FROM record WHERE orderID = ?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if ($order) {
        $coal_name = $order['coal_name'];
        $order_quantity = $order['num'];

        // 删除订单
        $stmt = $conn->prepare('UPDATE `record` SET situation="Quit" WHERE orderID = ?');
        $stmt->bind_param('i', $order_id);
        $stmt->execute();

        // 更新仓库数量
        $stmt = $conn->prepare('UPDATE coal SET margin = margin + ? WHERE name = ?');
        $stmt->bind_param('ii', $order_quantity, $coal_name);
        $stmt->execute();

        // 提交事务
        $conn->commit();
        echo "Order $order_id deleted and inventory updated successfully.\n";
    } else {
        echo "No order found with order_id $order_id\n";
    }
} catch (Exception $e) {
    // 回滚事务
    $conn->rollback();
    echo "Error: " . $e->getMessage() . "\n";
}



// 关闭连接
$conn->close();
?>