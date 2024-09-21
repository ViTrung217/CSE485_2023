<?php
include 'db.php'; // Kết nối CSDL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $_POST['txtCatName'];

    if (!empty($categoryName)) {
        // Thêm thể loại mới vào CSDL
        $sql = "INSERT INTO categories (name) VALUES ('$categoryName')";
        if ($conn->query($sql) === TRUE) {
            // Lấy danh sách thể loại mới nhất từ CSDL và trả về HTML
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ma_tloai'] . "</td>";
                    echo "<td>" . $row['ten_tloai'] . "</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Vui lòng nhập tên thể loại!";
    }
}

$conn->close();
?>
