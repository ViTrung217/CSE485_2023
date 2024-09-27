<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Thể Loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Thêm Thể Loại</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="ten_tloai" class="form-label">Tên Thể Loại</label>
                <input type="text" class="form-control" id="ten_tloai" name="ten_tloai" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>
            <a href="index.php?controller=category&action=index" class="btn btn-secondary">Trở lại</a>
        </form>
    </div>
</body>
</html>
