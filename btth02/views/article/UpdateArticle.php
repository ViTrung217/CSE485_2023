<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Bài Viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cập Nhật Bài Viết</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" name="tieude" value="<?php echo htmlspecialchars($article['tieude']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="ten_bhat" class="form-label">Tên bài hát</label>
                <input type="text" class="form-control" name="ten_bhat" value="<?php echo htmlspecialchars($article['ten_bhat']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="ma_tloai" class="form-label">Mã thể loại</label>
                <input type="number" class="form-control" name="ma_tloai" value="<?php echo htmlspecialchars($article['ma_tloai']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <textarea class="form-control" name="tomtat" required><?php echo htmlspecialchars($article['tomtat']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea class="form-control" name="noidung" required><?php echo htmlspecialchars($article['noidung']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="ma_tgia" class="form-label">Mã tác giả</label>
                <input type="number" class="form-control" name="ma_tgia" value="<?php echo htmlspecialchars($article['ma_tgia']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="ngayviet" class="form-label">Ngày viết</label>
                <input type="date" class="form-control" name="ngayviet" value="<?php echo htmlspecialchars($article['ngayviet']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="hinhanh">
                <small>Hình ảnh hiện tại: <?php echo htmlspecialchars($article['hinhanh']); ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
        <?php if (isset($error)) echo "<div class='text-danger'>$error</div>"; ?>
    </div>
</body>
</html>
