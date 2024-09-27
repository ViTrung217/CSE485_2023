<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>
    <header>
        <!-- Your header here -->
    </header>

    <main class="container mt-5 mb-5">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Đăng Nhập</h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-danger"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?controller=login&action=login">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Đăng Nhập" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
