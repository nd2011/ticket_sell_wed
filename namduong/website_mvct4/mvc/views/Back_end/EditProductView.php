
<h1>Sửa thông tin vé</h1>
<form method="post" action="">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td><label for="name">Tên sản phẩm:</label></td>
            <td><input type="text" name="name" value="<?php echo isset($data['name']) ? htmlspecialchars($data['name']) : ''; ?>" required /></td>
        </tr>
        <tr>
            <td><label for="price">Giá:</label></td>
            <td><input type="number" name="price" value="<?php echo isset($data['price']) ? htmlspecialchars($data['price']) : ''; ?>" required /></td>
        </tr>
        <tr>
            <td><label for="description">Mô tả:</label></td>
            <td><textarea name="description" required><?php echo isset($data['description']) ? htmlspecialchars($data['description']) : ''; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <button type="submit" name="btn_submit">Cập nhật</button>
            </td>
        </tr>
    </table>
</form>
