<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style11.css">
    <link rel="icon" type="image/png" href="image/logocar.png">
    <title>Thông tin | Q&TCAR</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Thêm SweetAlert2 -->
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
            <a class="doi-mau" href="#">DỊCH VỤ</a>
            <ul class="sub-menu">
                <div class="cat-sub-menu">
                    <!-- Submenu for vehicles -->
                    <div class="item-list-submenu">
                        <h3><a class="doi-mau" href="xemay_honda.php">HONDA</a></h3>
                        <ul>
                            <li><a class="doi-mau" href="#">Airblade</a></li>
                            <li><a class="doi-mau" href="#">Blade</a></li>
                            <!-- More items -->
                        </ul>
                    </div>
                    <!-- Other submenus for vehicles -->
                </div>
            </ul>
        </li>
        <li><a class="doi-mau" href="gioithieu.php">GIỚI THIỆU</a></li>
        <li><a class="doi-mau" href="#">LIÊN HỆ</a></li>
        <li><a class="doi-mau" href="#">HƯỚNG DẪN</a></li>
        <li><a class="doi-mau" href="thongtin.php">THÔNG TIN</a></li>
    </ul>
    <ul class="others">
        <li><input placeholder="Tìm kiếm" type="text"> <i class="fas fa-search"></i></li>

        <?php if(isset($_SESSION['username'])) { 
            $username = $_SESSION['username'];
            $customer_name = $_SESSION['customer_name']; ?>
            <li>
                <a class="fa fa-user doi-mau user-icon"></a>
                <div class="show-account">
                    <div class="image-container">
                        <img src="image/account.png" width="150px" height="150px" style="border-radius: 50%; overflow:hidden;">
                    </div>
                    <?php echo "<span class='hello-message'>Xin chào, $customer_name</span>"; ?>
                    <div class="auth__form__buttons">
                        <a class="btn btn--large" href="logout.php">Đăng xuất</a>
                    </div>
                </div>
            </li>
        <?php } else { ?>
            <li><a class="fa fa-user doi-mau user-icon" href="login.php"></a></li>
        <?php } ?>
        <li><a class="fa fa-key doi-mau" href="#"></a></li>
        <li>
            <div class="shopping-window">
                <i class="close-icon fa fa-compress doi-mau"></i>
            </div>
            <a class="fa fa-shopping-bag doi-mau" id="shopping-icon" href="#"></a>
        </li>
    </ul>
</header>

<div class="chung">
    <section id="s1">
        <div class="td"><b>Thông Tin Thuê Xe</b></div>
        
         <article class="d1">
            <h3>Giới thiệu về công ty:</h3>
            <p>Q&TCAR là một trong những công ty hàng đầu trong lĩnh vực thuê xe tại khu vực Đông Nam Á. Với hơn 10 năm kinh nghiệm, chúng tôi cam kết cung cấp dịch vụ thuê xe chất lượng cao và đáng tin cậy cho khách hàng.</p>
        </article>
        
        <article class="d2">
            <h3>Dịch vụ cung cấp:</h3>
            <ul>
                <li>Thuê xe máy: Các hãng xe được ưa chuộng như Honda(Future, Vario,..),Yamamha(Exciter, Sirius,..),Suzuki(Smash,..).</li>
                <li>Thuê xe ô tô: Các dòng xe hạng sang từ các thương hiệu nổi tiếng như Toyota, Honda, Ford,...</li>
				<li>Thuê xe du lịch: Xe 7 chỗ, 10 chỗ, 16 chỗ,...</li>
                <li>Dịch vụ lái xe: Cung cấp tay lái xe chuyên nghiệp và am hiểu vùng địa lý.</li>
				<li>Dịch vụ giao xe: Giao xe tận nơi đúng với yêu cầu của khách hàng.
            </ul>
        </article>
        
        <article class="d3">
            <h3>Thông tin liên hệ:</h3>
            <ul>
                <li>Địa chỉ: Lê Hồng Phong, Quy Nhơn, Bình Định, Việt Nam</li>
                <li>Số điện thoại: 0123-456-789</li>
                <li>Email: temp@st.qnu.edu.vn</li>
            </ul>
        </article>
        
        <article class="d4">
            <h3>Chính sách và điều kiện:</h3>
            <ul>
                <li>Tuổi tối thiểu lái xe: 18 tuổi trở lên.</li>
                <li>Được phép lái xe ở nước ngoài: Cần cung cấp đầy đủ giấy tờ như GPLX, CCCD.</li>
                <li>Phí phạt muộn: 20% giá thuê cho mỗi giờ muộn.</li>
                <li>Bảo hiểm: Tất cả các xe được bảo hiểm đầy đủ.</li>
            </ul>
        </article>
        
        <article class="d5">
            <h3>Thông tin về dịch vụ hỗ trợ khách hàng:</h3>
            <p>Thời gian hoạt động: Thứ Hai - Chủ Nhật, từ 8:00 sáng đến 8:00 tối.</p>
        </article>
        <article class="d6">
            <h3>Đánh giá phản hồi và góp ý:</h3>
            <form id="feedback-form">
                <table>
                    <thead>
                        <tr>
                            <th>Đánh giá</th>
                            <th>Chọn số sao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea name="feedback" rows="4" cols="50" placeholder="Nhập ý kiến của bạn..."></textarea></td>
                            <td>
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5" required>
                                    <label for="star5">★</label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4">★</label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3">★</label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2">★</label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1">★</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" id="submit-feedback" class="submit-btn">Gửi đánh giá</button>
            </form>
        </article>

        <div class="note">
            <b>Ghi chú:</b> Vui lòng điền đầy đủ thông tin vào các ô đánh giá để chúng tôi có thể cải thiện dịch vụ tốt hơn.
        </div>
    </section>
</div>

<footer>
    <div class="footer-top">
        <li><a href=""><img src="image/logocar.png" alt="" width="100%" height="100%"></a></li>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Công ty Q&TCAR. Tất cả quyền được bảo lưu.</p>
    </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById("submit-feedback");

    submitButton.addEventListener("click", function (event) {
        event.preventDefault();

        const feedbackText = document.querySelector('textarea[name="feedback"]').value.trim();
        const rating = document.querySelector('input[name="rating"]:checked');

        // Kiểm tra xem có đánh giá và số sao không
        if (!feedbackText) {
            alert('Vui lòng nhập ý kiến của bạn.');
            return;
        }
        if (!rating) {
            alert('Vui lòng chọn số sao đánh giá.');
            return;
        }

        // Hiển thị thông báo với SweetAlert2
        Swal.fire({
            title: 'Cảm ơn đánh giá của bạn!',
            text: 'Chúng tôi sẽ cải thiện dịch vụ tốt hơn.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'trangchu.php'; // Redirect sau khi thông báo
        });
    });
});
</script>

</body>
</html>
