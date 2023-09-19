<?php


$order = $GET['order'];  // pega o campo "order" da request de ajax
$sql = "SELECT * FROM user_titles WHERE 'order' = $order";
$resutl = $conn->query($sql);
$options = array();
while($row = $result->fetch_assoc()) {
    $options[] = $row;
}

echo json_encode($options);
$conn->close();
?>