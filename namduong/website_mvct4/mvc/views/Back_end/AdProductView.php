<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý vé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Container chứa bảng */
        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        /* Định dạng bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }

        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Định dạng form */
        form input[type="text"],
        form input[type="number"],
        form input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(30% - 20px); /* Chia đều các input */
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Định dạng liên kết */
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin: 0 5px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Định dạng tiêu đề cột */
        tr:first-child th {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th colspan="5">Quản lý vé</th>
            </tr>
            <tr>
                <td colspan="5">
                    <!-- Form thêm sản phẩm -->
                    <form method="post" action="AdProduct/insert">
                        <input type="text" name="name" placeholder="Tên sản phẩm" required />
                        <input type="number" name="price" placeholder="Giá sản phẩm" required />
                        <input type="text" name="description" placeholder="Mô tả sản phẩm" required />
                        <input type="submit" name="btn_submit" value="Thêm sản phẩm" />
                    </form>
                </td>
            </tr>
            <tr>
                <td><strong>ID</strong></td>
                <td><strong>Tên sản phẩm</strong></td>
                <td><strong>Giá</strong></td>
                <td><strong>Mô tả</strong></td>
                <td><strong>Hành động</strong></td>
            </tr>
            <?php foreach ($data["data"] as $product) { ?>
            <tr>
                <td><?php echo htmlspecialchars($product["id"]); ?></td>
                <td><?php echo htmlspecialchars($product["name"]); ?></td>
                <td><?php echo htmlspecialchars($product["price"]); ?></td>
                <td><?php echo htmlspecialchars($product["description"]); ?></td>
                <td>
                    <a href="AdProduct/delete/<?php echo htmlspecialchars($product["id"]); ?>">Xóa</a>
                    <a href="AdProduct/edit/<?php echo htmlspecialchars($product["id"]); ?>">Sửa</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
