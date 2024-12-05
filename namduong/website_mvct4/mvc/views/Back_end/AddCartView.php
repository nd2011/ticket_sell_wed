<h2>Thêm sản phẩm vào giỏ hàng</h2>
<form method="post" action="/namduong/website_mvct4/Cart/insert">
    <label for="product_id">ID sản phẩm:</label>
    <input type="number" name="product_id" id="product_id" required />

    <label for="quantity">Số lượng:</label>
    <input type="number" name="quantity" id="quantity" min="1" required />

    <input type="submit" name="btn_submit" value="Thêm vào giỏ hàng" />
</form>