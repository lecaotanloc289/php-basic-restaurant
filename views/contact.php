<div class="contact">
  <h1>Liên hệ với chúng tôi</h1>
  <form action="../../restaurant/controllers/submitForm.php" method="post">
    <div class="form-group">
      <label for="name">Họ và tên:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="phone">Số điện thoại:</label>
      <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
    </div>
    <div class="form-group">
      <label for="message">Nội dung:</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <div class="button-group">
      <input type="reset" value="Xóa">
      <input type="submit" value="Gửi">
      $_POST
    </div>
  </form>
</div>