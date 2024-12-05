<form method="post" action="Customer/edit/<?php echo htmlspecialchars($data['data']['id']); ?>">
    <input type="text" name="name" value="<?php echo htmlspecialchars($data['data']['name']); ?>" placeholder="Tên khách hàng" required />
    <input type="email" name="email" value="<?php echo htmlspecialchars($data['data']['email']); ?>" placeholder="Email" required />
    <input type="text" name="username" value="<?php echo htmlspecialchars($data['data']['username']); ?>" placeholder="Tên đăng nhập" required />
    <input type="password" name="password" placeholder="Mật khẩu (để trống nếu không đổi)" />
    <input type="text" name="address" value="<?php echo htmlspecialchars($data['data']['address']); ?>" placeholder="Địa chỉ" required />
    <input type="submit" name="btn_submit" value="Cập nhật khách hàng" />
</form>
