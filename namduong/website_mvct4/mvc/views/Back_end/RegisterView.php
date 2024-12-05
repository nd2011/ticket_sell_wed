<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <style>
        /* Định dạng chung cho body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5; /* Màu nền nhẹ nhàng */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            height: 100vh; /* Chiều cao toàn màn hình */
        }

        /* Container chính */
        .container {
            background-color: #ffffff; /* Nền trắng cho container */
            width: 90%; /* Chiếm 90% màn hình */
            max-width: 500px; /* Giới hạn tối đa */
            padding: 30px;
            border-radius: 15px; /* Bo tròn góc */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Đổ bóng */
            text-align: center;
            box-sizing: border-box; /* Đảm bảo padding không làm thay đổi kích thước */
        }

        /* Tiêu đề */
        h2 {
            margin-bottom: 20px;
            color: #333; /* Màu chữ đậm */
            font-size: 28px; /* Tăng kích thước tiêu đề */
        }

        /* Định dạng form */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Nhãn và ô nhập liệu */
        label {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: left; /* Căn trái nhãn */
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px; /* Bo tròn góc */
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Nút đăng ký */
        button {
            background-color: #007bff;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Hiệu ứng chuyển đổi màu */
        }

        button:hover {
            background-color: #0056b3; /* Màu nền khi hover */
        }

        /* Thông báo lỗi */
        .message {
            color: red;
            font-size: 16px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($data['message'])): ?>
            <p class="message"><?php echo htmlspecialchars($data['message']); ?></p>
        <?php endif; ?>

        <h2>Đăng ký tài khoản</h2>
        <form method="post" action="/namduong/website_mvct4/AuthController/doRegister">
            <p>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" id="username" required />
            </p>
            <p>
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password" required />
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required />
            </p>
            <button type="submit">Đăng ký</button>
        </form>
    </div>
</body>
</html>
