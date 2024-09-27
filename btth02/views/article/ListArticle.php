<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bài Viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
<?php include './views/layout/Category_header.php'; ?>
    <main class="container mt-5">
    <a href="index.php?controller=article&action=add" class="btn btn-success mb-3">Thêm mới</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên bài hát</th>
                    <th scope="col">Mã thể loại</th> 
                    <th scope="col">Tóm tắt</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Mã tác giả</th>
                    <th scope="col">Ngày viết</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $this->articleService->getArticles();
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row["ma_bviet"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["tieude"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["ten_bhat"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["ma_tloai"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["tomtat"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["noidung"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["ma_tgia"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["ngayviet"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["hinhanh"]) . '</td>';
                        echo '<td><a href="index.php?controller=article&action=edit&id=' . $row["ma_bviet"] . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                        echo '<td><a href="index.php?controller=article&action=delete&id=' . $row["ma_bviet"] . '"><i class="fa-solid fa-trash"></i></a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="11">Không có dữ liệu</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer class="bg-light text-center py-3">
        <h4 class="text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
</body>
</html>
