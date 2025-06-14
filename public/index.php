<?php
$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Nexus - Website Bán Đồ Thể Thao</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="navbar">
    <div class="logo">
      <a href="index.php?page=home" style="text-decoration:none; color:white;">
        NEXUS<br><span class="sub-logo">CỬA HÀNG THỂ THAO</span>
      </a>
    </div>
    <nav>
      <ul>
        <li><a href="index.php?page=home">TRANG CHỦ</a></li>
        <li><a href="index.php?page=sanpham">SẢN PHẨM</a></li>
        <li><a href="index.php?page=lienhe">LIÊN HỆ</a></li>
      </ul>
    </nav>
    <div class="account">
      <a href="index.php?page=dangnhap">Đăng nhập</a> |
      <a href="index.php?page=dangky">Đăng ký</a>
      <a href="#">🛒</a>
    </div>
  </header>

  <?php if ($page === 'home'): ?>
    <section class="hero">
      <div class="overlay"></div>
      <div class="hero-content">
        <h2><span class="highlight">NEXUS COLLECTION</span><br>CỬA HÀNG THỂ THAO</h2>
        <?php ?>
      </div>
    </section>

  <?php elseif ($page === 'sanpham'): ?>
    <div class="page">
      <h1>Trang Sản phẩm</h1>
    <section class="page">
        <div class="product-list">
            <div class="product-card">
                <img src="tạ tay.jpg" alt="Tạ tay">
                <h3>Tạ tay 10kg</h3>
                <p>Giá: 450.000đ</p>
                <button>Mua ngay</button>
            </div>
            <div class="product-card">
                <img src="giày đá bóng.jpg" alt="Thảm yoga">
                <h3>Giày đá bóng</h3>
                <p>Giá: 320.000đ</p>
                <button>Mua ngay</button>
            </div>
        </div>
    </section>
    </div>

  <?php elseif ($page === 'lienhe'): ?>
    <div class="page">
      <h1>Liên hệ với chúng tôi</h1>
      <p>Email:doanquanglong05@gmail.com</p>
      <p>Hotline:0859814888</p>
    </div>

  <?php elseif ($page === 'dangnhap'): ?>
    <div class="page">
      <h1>Đăng nhập</h1>
      <form method="post">
        <label>Email:</label><br>
        <input type="email" name="email"><br><br>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Đăng nhập</button>
      </form>
    </div>

  <?php elseif ($page === 'dangky'): ?>
    <div class="page">
      <h1>Đăng ký</h1>
      <form method="post">
        <label>Họ tên:</label><br>
        <input type="text" name="fullname"><br><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br><br>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Đăng ký</button>
      </form>
    </div>

  <?php else: ?>
    <div class="page">
      <h1>404 - Không tìm thấy trang</h1>
    </div>
  <?php endif; ?>
</body>
</html>
