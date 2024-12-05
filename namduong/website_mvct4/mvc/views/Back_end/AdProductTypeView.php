<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục loại vé</title>
    <style>
        /* Định dạng chung cho body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        /* Container của bảng */
        .container {
            width: 100%;
            overflow-x: auto; /* Cho phép cuộn ngang nếu bảng quá lớn */
            margin: 20px auto;
            padding: 10px;
            box-sizing: border-box;
        }

        /* Định dạng bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        /* Tiêu đề bảng */
        th {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }

        /* Dòng tiêu đề cột */
        tr:first-child th {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Dòng dữ liệu */
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Định dạng cho các ô input */
        form input[type="text"],
        form input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Link Xóa */
        a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <th colspan="5">Quản lý danh mục loại vé</th>
            </tr>
            <tr>
                <td colspan="5">
                    <form method="post" action="AdProductType/insert">
                        <input type="text" name="ma_loaisp" placeholder="Mã loại sản phẩm" required/>
                        <input type="text" name="ten_loaisp" placeholder="Tên loại sản phẩm" required/>
                        <input type="text" name="mota_loaisp" placeholder="Mô tả loại sản phẩm" required/>
                        <input type="submit" name="btn_submit" value="Lưu"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td><strong>Mã loại sản phẩm</strong></td>
                <td><strong>Tên loại sản phẩm</strong></td>
                <td><strong>Mô tả loại sản phẩm</strong></td>
                <td><strong>Sửa</strong></td>
                <td><strong>Xóa</strong></td>
            </tr>
            <?php foreach ($data["data"] as $k => $v) { ?>
            <tr>
                <td><?php echo htmlspecialchars($v["ma_loaisp"]); ?></td>
                <td><?php echo htmlspecialchars($v["ten_loaisp"]); ?></td>
                <td><?php echo htmlspecialchars($v["mota_loaisp"]); ?></td>
                <td></td>
                <td>
                    <a href="AdProductType/delete/<?php echo htmlspecialchars($v["ma_loaisp"]); ?>">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
