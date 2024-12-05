<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý giỏ hàng</title>
    <style>
        /* Reset CSS cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 15px;
        }

        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #dc3545;
            font-weight: bold;
        }

        a:hover {
            color: #c82333;
        }

        form {
            display: inline-block;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        button {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #e0a800;
        }

        .total-row td {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .empty-cart {
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th colspan="6">Quản lý giỏ hàng</th>
    </tr>
    <tr>
        <td>ID</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
        <td>Hành động</td>
    </tr>
    <?php 
    $total = 0; // Biến tính tổng tiền
    if (!empty($data["data"])) {
        foreach ($data["data"] as $product) { 
            $subtotal = $product["price"] * $product["quantity"];
            $total += $subtotal;
    ?>
    <tr>
        <td><?php echo htmlspecialchars($product["id"]); ?></td>
        <td><?php echo htmlspecialchars($product["name"]); ?></td>
        <td><?php echo number_format($product["price"], 0, ',', '.'); ?> VND</td>
        <td>
            <form method="post" action="Cart/update">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product["id"]); ?>" />
                <input type="number" name="quantity" value="<?php echo htmlspecialchars($product["quantity"]); ?>" min="1" />
                <input type="submit" value="Cập nhật" />
            </form>
        </td>
        <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VND</td>
        <td>
            <a href="Cart/delete/<?php echo htmlspecialchars($product["id"]); ?>">Xóa</a>
        </td>
    </tr>
    <?php 
        } 
    ?>
    <tr class="total-row">
        <td colspan="4">Tổng cộng:</td>
        <td colspan="2"><?php echo number_format($total, 0, ',', '.'); ?> VND</td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: center;">
            <a href="Cart/clear" style="color: red;">Xóa toàn bộ giỏ hàng</a>
        </td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: center;">
            <button onclick="thanhToan()">Thanh toán</button>
            <script>
                function thanhToan() {
                    alert("Thanh toán thành công");
                }
            </script>
        </td>
    </tr>
    <?php } else { ?>
    <tr>
        <td colspan="6" class="empty-cart">Giỏ hàng của bạn đang trống.</td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: center;">
            <a href="Home/getShow" style="text-decoration: none;">Tiếp tục mua sắm</a>
        </td>
    </tr>
    <?php } ?>
</table>

<footer>
    &copy; 2024 Cửa hàng của chúng tôi. Tất cả quyền được bảo vệ.
</footer>

</body>
</html>
