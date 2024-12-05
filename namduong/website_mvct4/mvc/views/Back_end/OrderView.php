<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th colspan="6">Quản lý đơn hàng</th>
    </tr>
    <tr>
        <td colspan="6">
            <!-- Form thêm đơn hàng -->
            <form method="post" action="Order/insert"> <!-- Đường dẫn tới controller Order -->
                <select name="customer_id" required>
                    <option value="">Chọn khách hàng</option>
                    <?php foreach ($data["customers"] as $customer) { ?>
                        <option value="<?php echo htmlspecialchars($customer["id"]); ?>"><?php echo htmlspecialchars($customer["name"]); ?></option>
                    <?php } ?>
                </select>
                <select name="product_id" required>
                    <option value="">Chọn sản phẩm</option>
                    <?php foreach ($data["products"] as $product) { ?>
                        <option value="<?php echo htmlspecialchars($product["id"]); ?>"><?php echo htmlspecialchars($product["name"]); ?></option>
                    <?php } ?>
                </select>
                <input type="number" name="quantity" placeholder="Số lượng" required />
                <input type="submit" name="btn_submit" value="Thêm đơn hàng" />
            </form>
        </td>
    </tr>
    <tr>
        <td>ID</td>
        <td>Khách hàng</td>
        <td>Sản phẩm</td>
        <td>Số lượng</td>
        <td>Ngày đặt</td>
        <td>Hành động</td>
    </tr>
    <?php foreach ($data["data"] as $order) { ?>
    <tr>
        <td><?php echo htmlspecialchars($order["id"]); ?></td>
        <td><?php echo htmlspecialchars($order["customer_name"]); ?></td>
        <td><?php echo htmlspecialchars($order["product_name"]); ?></td>
        <td><?php echo htmlspecialchars($order["quantity"]); ?></td>
        <td><?php echo htmlspecialchars($order["order_date"]); ?></td>
        <td>
            <a href="Order/delete/<?php echo htmlspecialchars($order["id"]); ?>">Xóa</a>
            <!-- Thêm liên kết sửa -->
            <a href="Order/edit/<?php echo htmlspecialchars($order["id"]); ?>">Sửa</a>
        </td>
    </tr>
    <?php } ?>
</table>
