<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Thể Loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <?php include './views/layout/Category_header.php'; ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="index.php?controller=category&action=add" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['ma_tloai'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($row['ten_tloai'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo '<td><a href="index.php?controller=category&action=edit&id=' . $row['ma_tloai'] . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                echo '<td><a href="index.php?controller=category&action=delete&id=' . $row['ma_tloai'] . '" onclick="return confirm(\'BẠN CHẮC XÓA THỂ LOẠI NÀY CHỨ?\')"><i class="fa-solid fa-trash"></i></a></td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Không có thể loại nào.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include './views/layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
