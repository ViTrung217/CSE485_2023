<?php
include '../db.php';

// Kiểm tra nếu tham số 'id' tồn tại
if (isset($_GET['id'])) {
    // Lấy ID bài viết từ URL
    $ma_bviet = intval($_GET['id']);
    echo "ID của bài viết là: " . $ma_bviet; // ktra ID từ URL

    // Lấy thông tin bài viết từ cơ sở dữ liệu dựa vào ID
    $sql = "SELECT * FROM baiviet WHERE ma_bviet = $ma_bviet";
    $result = $conn->query($sql);

    // Kiểm tra nếu bài viết tồn tại
    if ($result->num_rows > 0) {
        echo "Bài viết tồn tại."; // ktra xem có tìm thấy bài viết hay không
        $row = $result->fetch_assoc();
    } else {
        echo "Bài viết không tồn tại.";
        exit;
    }
} else {
    echo "Bài viết không tồn tại.";
    exit;
}
?>

<?php 
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

// Lấy dữ liệu từ form
$tieude = $_POST['tieude'];
$ten_bhat = $_POST['ten_bhat'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$ma_tgia = intval($_POST['ma_tgia']);
$ngayviet = $_POST['ngayviet'];

// Xử lý hình ảnh nếu có thay đổi ảnh
if (!empty($_FILES['hinhanh']['name'])) {
    $hinhanh = 'uploads/' . basename($_FILES['hinhanh']['name']);
    move_uploaded_file($_FILES['hinhanh']['tmp_name'], $hinhanh);
} else {
    // Nếu không upload ảnh mới, giữ nguyên ảnh cũ
    $hinhanh = $_POST['current_image'];
}

// Cập nhật thông tin bài viết vào cơ sở dữ liệu
$sql = "UPDATE baiviet SET 
            tieude = '$tieude', 
            ten_bhat = '$ten_bhat', 
            tomtat = '$tomtat', 
            noidung = '$noidung', 
            ma_tgia = '$ma_tgia', 
            ngayviet = '$ngayviet', 
            hinhanh = '$hinhanh'
        WHERE ma_bviet = $ma_bviet";

if ($conn->query($sql) === TRUE) {
    echo "Đã cập nhật thành công!";
    // Điều hướng lại danh sách bài viết hoặc trang khác
    header('Location: articles_list.php');
    exit;
} else {
    echo "Lỗi khi cập nhật: " . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa bài viết</h3>
            <form action="" method="post">
            <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Mã bài viết :  </span>
                    <input type="text" class="form-control" name="ma_bviet" value="<?php echo $ma_bviet; ?>"required readonly>
                     
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên Bài Viết</span>
                    <input type="text" class="form-control" name="tieude" value="<?php echo $tieude; ?>" required>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên Bài Hát</span>
                    <input type="text" class="form-control" name="ten_bhat" value="<?php echo $ten_bhat; ?>" required>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Mã Thể Loại </span>
                    <input type="text" class="form-control" name="ma_tloai" value="<?php echo $ma_tloai; ?>" required>
                </div>
                <div class="input-group mt-4 mb-4">
                    <span class="input-group-text" id="lblCatName">Tóm Tắt </span>
                    <input class="form-control" name="tomtat" value="<?php echo $tomtat; ?>"required>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Nội Dung</span>
                    <textarea class="form-control" name="noidung" value="<?php echo $noidung; ?>"required></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tác Giả</span>
                    <input type="text" class="form-control" name="ma_tgia" value="<?php echo $ma_tgia; ?>"required>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Ngày Viết </span>
                    <input type="date" class="form-control" name="ngayviet" value="<?php echo $ngayviet; ?>" required>
                </div>

                <div class="form-group float-end ">
                    <input type="submit" value="Update" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>