<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style12.css">
    <link rel="icon" type="image/png" href="image/logocar.png">
    <title>Giới thiệu | Q&TCAR</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="trangchu.php">
            <img src="image/logocar.png" height="100%" width="100%">
        </a>
    </div>
    <ul class="menu">
        <li><a class="doi-mau" href="trangchu.php#cac-loai-xe-cho-thue">TRANG CHỦ</a></li>
        <li>
            <a class="doi-mau" >DỊCH VỤ</a>
            <ul class="sub-menu">
                <div class="cat-sub-menu">
                    <div class="item-list-submenu">
                        <h3><a class="doi-mau" href="xemay_honda.php">HONDA</a></h3>
                        <ul>
                            <li><a class="doi-mau" href="xemay_honda.php#airblade">Airblade</a></li>
                            <li><a class="doi-mau" href="xemay_honda.php#future">Future</a></li>
                            <li><a class="doi-mau" href="xemay_honda.php#vario">Vario</a></li>
                            <li><a class="doi-mau" href="xemay_honda.php#wave">Wavealpha</a></li>
                            <li><a class="doi-mau" href="xemay_honda.php#winnerx">Winner</a></li>
                            <li><a class="doi-mau" href="xemay_honda.php#vision">Vision</a></li>
                        </ul>
                    </div>
                    <div class="item-list-submenu">
                        <h3><a class="doi-mau" href="xemay_yamaha.php">YAMAHA</a></h3>
                        <ul>
                            <li><a class="doi-mau" href="xemay_yamaha.php#exciter">Exciter</a></li>
                            <li><a class="doi-mau" href="xemay_yamaha.php#jupiter">Jupiter</a></li>
                            <li><a class="doi-mau" href="xemay_yamaha.php#sirius">Sirius</a></li>

                        </ul>
                    </div>
                    <div class="item-list-submenu">
                        <h3><a class="doi-mau" href="xemay_suzuki.php">SUZUKI</a></h3>
                        <ul>
                            <li><a class="doi-mau" href="xemay_suzuki.php#smash">Smash</a></li>
                            <li><a class="doi-mau" href="xemay_suzuki.php#skydrive">Skydrive</a></li>
                            <li><a class="doi-mau" href="xemay_suzuki.php#raider150">Raider-150</a></li>
                            <li><a class="doi-mau" href="xemay_suzuki.php#address">Address</a></li>
                            <li><a class="doi-mau" href="xemay_suzuki.php#satria">Satria</a></li>
                            <li><a class="doi-mau" href="xemay_suzuki.php#vstrom">V-Strom</a></li>
                            <li><a class="doi-mau" href="xemay_suzuki.php#gsx">GSX-R150</a></li>
                        </ul>
                    </div>
                    <div class="item-list-submenu">
                        <h3><a class="doi-mau">XE HƠI</a></h3>
                        <ul>
                            <li><a class="doi-mau" href="xehoi_toyota.php">Toyota</a></li>
                            <li><a class="doi-mau" href="xehoi_honda.php">Honda</a></li>
                            <li><a class="doi-mau" href="xehoi_ford.php">Ford</a></li>
                        </ul>
                    </div>
                    <div class="item-list-submenu">
                        <h3><a class="doi-mau" href="xedulich.php">XE DU LỊCH</a></h3>
                    </div>
                </div>
            </ul>
        </li>
        <li><a class="doi-mau" href="gioithieu.php">GIỚI THIỆU</a></li>
        <li><a class="doi-mau" href="trangchu.php#footerr">LIÊN HỆ</a></li>
        <li><a class="doi-mau" href="huongdan.php">HƯỚNG DẪN</a></li>
        <li><a class="doi-mau" href="thongtin.php">THÔNG TIN</a></li>
    </ul>
    <ul class="others">
        <li>
			<form method="post" action="search.php" class="search_row">
				<input placeholder="Tìm kiếm" name="noidung" type= "text"> 
				<button class="fas fa-search" type="submit" name="btn"></button>
			</form>
			<?php
				$conn = new mysqli('localhost', 'root', '', 'tai_khoan');
				if ($conn->connect_error) {
					die("Kết nối thất bại: " . $conn->connect_error);
				}
				if(isset($_POST['btn'])) {
					$noidung = $_POST['noidung'];
					$stmt = $conn->prepare("SELECT * FROM xe WHERE TenXe LIKE ?");
					$searchTerm = "%$noidung%";
					$stmt->bind_param("s", $searchTerm);
					$stmt->execute();
					$result = $stmt->get_result();

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo '<div class="cartegory-right-content-item">';
							echo '<img src="' . $row["TenFile"] . '" alt="">';
							echo '<h1>' . $row["TenXe"] . '</h1>';
							echo '<div class="item-footer">';
							echo '<span>' . ($row["GiaThue"]) . '</span>';
							echo '<a href="thanhtoan.php?id=' . $row["STT"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
							echo '</div>';
							echo '</div>';
						}
					} else {
						echo "Không có sản phẩm nào.";
					}
					$stmt->close();
				}
				$conn->close();
			?>
		</li>
        <?php if(isset($_SESSION['username'])) { 
            $username = $_SESSION['username'];
            $customer_name = $_SESSION['customer_name'];?>
            <li>
                <a class="fa fa-user doi-mau user-icon"></a>
                <div class="show-account">
                <div class="image-container">
                    <img src="image/account.png" width="150px" height="150px" style="border-radius: 50%; overflow:hidden;">
                </div>
                    <?php echo "<span class='hello-message'>Xin chào, $customer_name </span>"; ?>
                    
                    <div class="auth__form__buttons">
                        <a class="btn btn--large" href="logout.php">Đăng xuất</a>
                    </div>
                </div>
            </li>
        <?php } else { ?>
            <li><a class="fa fa-user doi-mau user-icon" href="login.php"></a></li>
        <?php } ?>
        <li><a class="fa fa-key doi-mau" href="theodoi.php"></a></li>
        <li>
            <div class="shopping-window">
                <!-- Nội dung cửa sổ shopping -->
                <i class="close-icon fa fa-compress doi-mau"></i>
                <h3 style="font-size: 25px; margin:10px; color:red; border-bottom: #bcb8b8;">Giỏ hàng</h3>
                <h1 style="margin-top: 20px; margin-left: 10px;">Bạn chưa thêm sản phẩm nào...</h1>
            </div>
            <a class="fa fa-shopping-bag doi-mau" id="shopping-icon" href="#"></a>
        </li>
    </ul>
</header>

<section id="s0">
<div class="gt1">
    <h1>Chào Mừng Đến Với Q&TCAR</h1>
    <p class="namect"><strong>Tên công ty:</strong> Công ty Q&TCAR</p>

    <h2>Sứ Mệnh & Tầm Nhìn</h2>
    <p><strong>Sứ mệnh:</strong> Cung cấp dịch vụ cho thuê xe chất lượng cao, an toàn và tiện lợi.</p>
    <p><strong>Tầm nhìn:</strong> Trở thành thương hiệu cho thuê xe hàng đầu Việt Nam.</p>

    <h2>Giá Trị Cốt Lõi</h2>
    <ul>
        <li><strong>Chất lượng:</strong> Phương tiện hoàn hảo, bảo dưỡng định kỳ.</li>
        <li><strong>An toàn:</strong> Kiểm tra nghiêm ngặt, hỗ trợ 24/7.</li>
        <li><strong>Khách hàng là trung tâm:</strong> Lắng nghe và đáp ứng nhu cầu khách hàng.</li>
        <li><strong>Trách nhiệm xã hội:</strong> Bảo vệ môi trường, phát triển cộng đồng.</li>
    </ul>

    <h2>Hành Trình Phát Triển</h2>
    <ul>
        <li><strong>2024:</strong> Thành lập công ty tại TP. Quy Nhơn.</li>
        <li><strong>2024:</strong> Mở rộng dịch vụ ra các thành phố lớn.</li>
        <li><strong>2024:</strong> Đạt 15,000 khách hàng.</li>
        <li><strong>2024:</strong> Ra mắt ứng dụng di động.</li>
    </ul>
</div>


<div class="gt2">
    <h1>Dịch Vụ Nổi Bật</h1>
    <h2>Sản Phẩm & Dịch Vụ</h2>
    <ul>
        <li><strong>Xe máy:</strong> Đa dạng dòng xe từ tay ga, xe số đến phân khối lớn.</li>
        <li><strong>Ô tô:</strong> Xe ô tô từ hạng trung đến hạng sang.</li>
        <li><strong>Xe du lịch:</strong> Xe 16, 29 và 45 chỗ cho các đoàn khách.</li>
        <li><strong>Giao nhận xe tại nhà:</strong> Giao và nhận xe tận nơi.</li>
        <li><strong>Bảo dưỡng & sửa chữa:</strong> Dịch vụ cho khách hàng thuê dài hạn.</li>
        <li><strong>Hỗ trợ 24/7:</strong> Luôn sẵn sàng giúp đỡ.</li>
    </ul>

    <h2>Thị Trường & Khách Hàng</h2>
    <p><strong>Thị trường:</strong> Khách du lịch, công ty, người dân địa phương.</p>
    <p><strong>Khách hàng mục tiêu:</strong> Du lịch tự do, công ty, đoàn khách, gia đình, cá nhân.</p>

    <h2>Đội Ngũ Chuyên Nghiệp</h2>
    <ul>
        <li><strong>Giám đốc điều hành:</strong> Trần Q, hơn 20 năm kinh nghiệm.</li>
        <li><strong>Trưởng phòng kinh doanh:</strong> Nguyễn A, chuyên gia chăm sóc khách hàng.</li>
        <li><strong>Trưởng phòng kỹ thuật:</strong> Lê T, đảm bảo chất lượng xe.</li>
    </ul>

    <h2>Đối Tác & Khách Hàng</h2>
    <ul>
        <li><strong>Đối tác:</strong> Honda, Toyota, Suzuki, ...</li>
        <li><strong>Khách hàng:</strong> Công ty du lịch, khách sạn 5 sao, doanh nghiệp lớn.</li>
    </ul>

    <h2>Định Hướng Phát Triển</h2>
    <ul>
        <li><strong>Mở Rộng Dịch Vụ:</strong> Phát triển xe điện, xe tự lái.</li>
        <li><strong>Ứng Dụng Công Nghệ:</strong> Nâng cấp ứng dụng di động.</li>
        <li><strong>Phát Triển Thị Trường:</strong> Mở rộng dịch vụ trên toàn quốc và quốc tế.</li>
    </ul>
</div>


	<div class="zalo-button">
		<a href="https://zalo.me/0337379840">
			<img src="image/zalo.png" alt="Zalo">
		</a>
	</div>

	<div class="daugach"> </div>
</section>

<div class="footer-top">
    <li><a href=""><img src="image/logocar.png" alt="" width="100%" height="100%"></a></li>
    <li><a href="gioithieu.php">Giới thiệu</a></li>
    <li><a href="huongdan.php">Hướng dẫn</a></li>
    <li><a href="thongtin.php">Thông tin</a></li>
    <li>
        <a href="https://www.facebook.com/minh.quyet213/" class="fab fa-facebook-f"></a>
        <a href="https://twitter.com/" class="fab fa-twitter"></a>
        <a href="https://www.youtube.com/results?search_query=l%E1%BA%ADp+tr%C3%ACnh+/" class="fab fa-youtube"></a>
    </li>
</div>
<div class="footer-center" id="footerr">
    <p>
        Trang web cho thuê xe máy, ô tô uy tín nhất! <br>
        Địa chỉ: 123 Lê Hồng Phong, Quy Nhơn, Bình Định <br>
        Tư vấn online: <b>123-456-789</b><br>
        Email: <a href="mailto:support@qtcarrental.com">support@qtcarrental.com</a>
    </p>
</div>

<div class="footer-bottom">
    @Q&TCARchothuexe
</div>
</body>
</html>