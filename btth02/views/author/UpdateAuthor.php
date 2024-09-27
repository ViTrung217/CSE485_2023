<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Sửa Tác Giả</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="ten_tgia" class="form-label">Tên Tác Giả</label>
                <input type="text" class="form-control" id="ten_tgia" name="ten_tgia" value="<?php echo htmlspecialchars($author['ten_tgia'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="index.php?controller=author&action=index" class="btn btn-secondary">Trở lại</a>
        </form>
    </div>
</body>
</html>
