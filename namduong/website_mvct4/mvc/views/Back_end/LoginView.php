<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
        }
        .message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($data['message'])): ?>
            <p class="message"><?php echo htmlspecialchars($data['message']); ?></p>
        <?php endif; ?>

        <h2>Đăng nhập</h2>
        <form method="post" action="/namduong/website_mvct4/AuthController/login">
            <p>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" id="username" required />
            </p>
            <p>
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password" required />
            </p>
            <button type="submit">Đăng nhập</button>
        </form>
        
    </div>
</body> 
</html>
