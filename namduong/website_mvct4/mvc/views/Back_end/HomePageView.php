<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ Hàng Hóa</title>
    <style>
        /* Reset CSS cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
        }

        .cart {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .cart a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .cart a:hover {
            background-color: #218838;
        }

        .products {
            width: 90%;
            margin: 20px auto;
            text-align: center;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            width: calc(33% - 40px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .product-item:hover {
            transform: translateY(-10px);
        }

        .product-item h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .product-item p {
            color: #555;
            margin-bottom: 10px;
        }

        .product-item strong {
            color: #e74c3c;
            font-size: 18px;
        }

        .product-item form {
            margin-top: 10px;
        }

        .product-item input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .product-item button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .product-item button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Chào mừng đến với cửa hàng của chúng tôi</h1>
        <div class="cart">
            <a href="Cart/getShow">Giỏ hàng</a>
        </div>
    </div>

    <div class="products">
        <h2>Danh sách sản phẩm</h2>
        <div class="product-list">
            <?php foreach ($data["data"] as $product) { ?>
            <div class="product-item">
                <h3><?php echo htmlspecialchars($product["name"]); ?></h3>
                <p><?php echo htmlspecialchars($product["description"]); ?></p>
                <p><strong><?php echo number_format($product["price"], 0, ',', '.'); ?> VND</strong></p>
                <form action="Cart/insert" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product["id"]); ?>">
                    <input type="number" name="quantity" value="1" min="1" required />
                    <button type="submit">Thêm vào giỏ hàng</button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Cửa hàng của chúng tôi. Tất cả quyền được bảo vệ.</p>
    </footer>
</body>
</html>
