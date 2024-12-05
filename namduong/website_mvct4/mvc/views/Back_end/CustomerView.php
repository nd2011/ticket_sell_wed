<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th colspan="6">Quản lý khách hàng</th>
    </tr>
    <tr>
        <td colspan="6">
            <!-- Form thêm khách hàng -->
            <form method="post" action="Customer/insert"> <!-- Đường dẫn tới controller Customer -->
                <input type="text" name="name" placeholder="Tên khách hàng" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="text" name="username" placeholder="Địa chỉ" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <input type="text" name="address" placeholder="Tên đăng nhập" required />
                <input type="submit" name="btn_submit" value="Thêm khách hàng" />
            </form>
        </td>
    </tr>
    <tr>
        <td>ID</td>
        <td>Tên khách hàng</td>
        <td>Email</td>
        <td>Tên đăng nhập</td>
        <td>Địa chỉ</td>
        <td>Hành động</td>
    </tr>
    <?php foreach ($data["data"] as $customer) { ?>
    <tr>
        <td><?php echo htmlspecialchars($customer["id"]); ?></td>
        <td><?php echo htmlspecialchars($customer["name"]); ?></td>
        <td><?php echo htmlspecialchars($customer["email"]); ?></td>
        <td><?php echo htmlspecialchars($customer["username"]); ?></td>
        <td><?php echo htmlspecialchars($customer["address"]); ?></td>
        <td>
            <a href="Customer/delete/<?php echo htmlspecialchars($customer["id"]); ?>">Xóa</a>
            <!-- Thêm liên kết sửa -->
            <a href="Customer/edit/<?php echo htmlspecialchars($customer["id"]); ?>">Sửa</a>
        </td>
    </tr>
    <?php } ?>
</table>
