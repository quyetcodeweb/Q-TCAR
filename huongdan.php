<<<<<<< HEAD
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title>Hướng dẫn thuê xe</title>
    <style>
        /* General Reset */
        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        /* Header styles */
        header {
            display: flex;
            justify-content: space-between;
            padding: 12px 50px;
            height: 80px;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            /* Ensure header stays on top */
            background: rgba(255, 255, 255, 0.9);
            /* Slightly opaque background */
        }

        header.sticky {
            background: rgba(255, 255, 255, 1);
        }

        header:hover {
            background: rgba(255, 255, 255, 1);
        }

        .logo {
            flex: 1;
            margin-left: 80px;
            padding-top: 10px;
        }

        /* Menu styles */
        .menu {
            flex: 3;
            display: flex;
        }

        .menu>li {
            padding: 0 12px;
            position: relative;
        }

        .doi-mau {
            color: black;
            transition: color 0.3s;
        }

        .doi-mau:hover {
            color: red;
        }

        /* Submenu styles */
        .menu>li:hover .sub-menu {
            visibility: visible;
            top: 30px;
        }

        .sub-menu {
            border-radius: 20px;
            display: flex;
            position: absolute;
            border: 2px solid #ccc;
            padding: 20px;
            background: #ffffff;
            visibility: hidden;
            top: 55px;
            transition: 0.3s;
            z-index: 100;
            width: 800px;
            max-width: 1000px;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Submenu category styles */
        .cat-sub-menu {
            display: flex;
            gap: 20px;
        }

        .cat-sub-menu>.item-list-submenu {
            flex: 1;
            min-width: 150px;
            display: flex;
            flex-direction: column;
        }

        .item-list-submenu h3 {
            font-size: 16px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .item-list-submenu ul {
            padding-left: 0;
            margin-top: 10px;
        }

        .item-list-submenu ul li {
            margin-bottom: 8px;
        }

        .item-list-submenu ul li a {
            font-size: 14px;
            line-height: 16px;
            color: #57585A;
            display: block;
        }

        /* Menu item styles */
        .menu li a {
            font-size: 15px;
            font-weight: bold;
            display: block;
            line-height: 20px;
        }

        /* Other elements */
        .d-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .others {
            flex: 1.5;
            display: flex;
        }

        .others>li {
            padding: 0 12px;
            position: relative;
        }

        .others>li::after {
            content: "";
            display: block;
            width: 1px;
            height: 50%;
            background: #dddddd;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .others>li:last-child::after {
            display: none;
        }

        .others>li:first-child {
            position: relative;
        }

        .others>li:first-child input {
            width: 100%;
            border: none;
            border-bottom: 1px solid #333;
            background: transparent;
            outline: none;
        }

        .others>li:first-child i {
            position: absolute;
            right: 10px;
        }

        /* Slider styles */
        #slider {
            overflow: hidden;
        }

        .aspect-ratio-169 {
            display: block;
            position: relative;
            padding-top: 56.25%;
            /* 16:9 aspect ratio */
            transition: 0.5s;
            /* Smooth transition for slide */
        }

        .aspect-ratio-169 img {
            display: block;
            position: absolute;
            width: 100%;
            height: 92%;
            top: 0;
            left: 0;
        }

        /* Navigation dots */
        .not-container {
            position: absolute;
            height: 0;
            width: 100%;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            top: 760px;
        }

        .not {
            height: 16px;
            width: 16px;
            background-color: #ffffff;
            border-radius: 50%;
            margin-right: 12px;
        }

        .not.active {
            background-color: aqua;
        }

        /* Advertisement styles */
        .home-trending {
            position: relative;
            min-height: auto;
            width: 700px;
            margin: 50px auto;
        }

        .bg-before_02.bg-before:before {
            border-radius: 80px 0px 80px 0px;
            right: -10px;
            height: 98%;
        }

        .bg-before:before {
            content: "";
            border: 1px solid #D1D2D4;
            box-sizing: border-box;
            border-radius: 24px 0px;
            padding: 13px 24px;
            position: absolute;
            content: "";
            bottom: 0;
            right: -5px;
            z-index: -1;
            width: 100%;
            height: 93%;
        }

        .img-trending-desktop img {
            border-top-left-radius: 80px;
            border-bottom-right-radius: 80px;
        }

        img {
            border: none;
            max-width: 100%;
            height: auto;
        }

        img {
            vertical-align: middle;
        }

        img {
            overflow-clip-margin: content-box;
            overflow: clip;
        }

        /* Footer styles */
        footer {
            text-align: center;
        }

        .footer-top {
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
            height: 70px;
        }

        .footer-top img {
            margin-left: 25px;
            height: 150px;
        }

        .footer-top li {
            padding: 0 12px;
            position: relative;
        }

        .footer-top li::after {
            content: "";
            display: block;
            width: 1px;
            height: 30%;
            background: #cccccc;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .footer-top li:last-child::after {
            display: none;
        }

        .footer-top li:last-child a {
            margin-right: 12px;
            color: #333;
        }

        .footer-center {
            text-align: center;
        }

        .footer-bottom {
            margin: 20px 0;
            text-align: center;
        }

        /* Title xe */
        .title-xe {
            text-align: center;
            margin-bottom: 24px;
        }

        .title-xe h3 {
            margin-top: 20px;
            font-weight: 600;
            font-size: 40px;
            line-height: 46px;
            color: #D73831;
            text-align: center;
            letter-spacing: 2px;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            font-family: 'Montserrat';
        }

        /* CSS hướng dẫn */
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            background-color: #f7f7f7;
            color: #333;
            padding: 80px 20px 20px;
            /* Add padding-top to prevent content being hidden under fixed header */
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h1 {
            font-size: 36px;
            color: #D73831;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .instruction {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .instruction-step {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex-basis: calc(50% - 30px);
        }

        .step-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ddd;
        }

        .step-text h3 {
            font-size: 18px;
            color: #D73831;
            margin-bottom: 8px;
        }

        .step-text p {
            font-size: 14px;
            color: #555;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .footer h2 {
            font-size: 24px;
            color: #D73831;
        }
    </style>
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
                <a class="doi-mau">DỊCH VỤ</a>
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
            <li><a class="doi-mau" href="#">LIÊN HỆ</a></li>
            <li><a class="doi-mau" href="#">HƯỚNG DẪN</a></li>
            <li><a class="doi-mau" href="thongtin.php">THÔNG TIN</a></li>
        </ul>
        <ul class="others">
            <li><input placeholder="Tìm kiếm" type="text"> <i class="fas fa-search"></i></li>

            <?php if (isset($_SESSION['username'])) {
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
            <li><a class="fa fa-key doi-mau" href="theodoithoigian.php"></a></li>
            <li>
                <a class="fa fa-heart doi-mau" id="shopping-icon" href="yeuthich.php"></a>
            </li>
        </ul>
    </header>
    <div class="container">
        <div class="heading">
            <h1>Hướng Dẫn Thuê Xe</h1>
        </div>
        <div class="instruction">
            <div class="instruction-step">
                <img src="image/hd8buoc/b1.png" alt="Bước 1" class="step-img">
                <div class="step-text">
                    <h3>Bước 1: Đăng nhập</h3>
                    <p>Đăng nhập vào tài khoản của bạn để tiếp tục.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b2.png" alt="Bước 2" class="step-img">
                <div class="step-text">
                    <h3>Bước 2: Đăng ký nếu chưa có tài khoản</h3>
                    <p>Nếu chưa có tài khoản, hãy đăng ký để có thể đăng nhập.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b3.png" alt="Bước 3" class="step-img">
                <div class="step-text">
                    <h3>Bước 3: Chọn xe muốn thuê</h3>
                    <p>Tại trang chủ, nhấn vào phần dịch vụ, chọn xe muốn thuê.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b4.png" alt="Bước 4" class="step-img">
                <div class="step-text">
                    <h3>Bước 4: Xác nhận thuê xe</h3>
                    <p>Sau khi lựa chọn được xe phù hợp để thuê, nhấn vào 'Thuê ngay!' và tiến hành thanh toán.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b5.png" alt="Bước 5" class="step-img">
                <div class="step-text">
                    <h3>Bước 5: Lựa chọn thời gian thuê</h3>
                    <p>Chọn thời gian thuê xe phù hợp với nhu cầu của bạn.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b6.png" alt="Bước 6" class="step-img">
                <div class="step-text">
                    <h3>Bước 6: Xác nhận thông tin và thanh toán</h3>
                    <p>Xác nhận kĩ thông tin của bạn trước khi đặt xe, sau đó tiến hành thanh toán.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b7.png" alt="Bước 7" class="step-img">
                <div class="step-text">
                    <h3>Bước 7: Theo dõi thời gian thuê xe</h3>
                    <p>Theo dõi thời gian thuê xe của bạn để tránh trễ hẹn.</p>
                </div>
            </div>
            <div class="instruction-step">
                <img src="image/hd8buoc/b8.png" alt="Bước 8" class="step-img">
                <div class="step-text">
                    <h3>Bước 8: Nhận xe và trải nghiệm</h3>
                    <p>Nhận xe và bắt đầu chuyến trải nghiệm thú vị của bạn.</p>
                </div>
            </div>
        </div>
        <div class="footer">
            <h2>Chúc bạn thuê xe dễ dàng và thành công!</h2>
        </div>
    </div>
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
=======
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hướng dẫn thuê xe</title>
<style>

/* General Reset */
html {
    scroll-behavior: smooth;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

li {
    list-style: none;
}

a {
    text-decoration: none;
    color: #000;
}

/* Header styles */
header {
    display: flex;
    justify-content: space-between;
    padding: 12px 50px;
    height: 80px;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Ensure header stays on top */
    background: rgba(255, 255, 255, 0.9); /* Slightly opaque background */
}

header.sticky {
    background: rgba(255, 255, 255, 1);
}

header:hover {
    background: rgba(255, 255, 255, 1);
}

.logo {
    flex: 1;
    margin-left: 80px;
    padding-top: 10px;
}

/* Menu styles */
.menu {
    flex: 3;
    display: flex;
}

.menu > li {
    padding: 0 12px;
    position: relative;
}

.doi-mau {
    color: black;
    transition: color 0.3s;
}

.doi-mau:hover {
    color: red;
}

/* Submenu styles */
.menu > li:hover .sub-menu {
    visibility: visible;
    top: 30px;
}

.sub-menu {
    border-radius: 20px;
    display: flex;
    position: absolute;
    border: 2px solid #ccc;
    padding: 20px;
    background: #ffffff;
    visibility: hidden;
    top: 55px;
    transition: 0.3s;
    z-index: 100;
    width: 800px;
    max-width: 1000px;
    flex-wrap: wrap;
    gap: 20px;
}

/* Submenu category styles */
.cat-sub-menu {
    display: flex;
    gap: 20px;
}

.cat-sub-menu > .item-list-submenu {
    flex: 1;
    min-width: 150px;
    display: flex;
    flex-direction: column;
}

.item-list-submenu h3 {
    font-size: 16px;
    margin-bottom: 8px;
    font-weight: bold;
}

.item-list-submenu ul {
    padding-left: 0;
    margin-top: 10px;
}

.item-list-submenu ul li {
    margin-bottom: 8px;
}

.item-list-submenu ul li a {
    font-size: 14px;
    line-height: 16px;
    color: #57585A;
    display: block;
}

/* Menu item styles */
.menu li a {
    font-size: 15px;
    font-weight: bold;
    display: block;
    line-height: 20px;
}

/* Other elements */
.d-flex {
    display: flex;
    flex-wrap: wrap;
}

.others{
    flex: 1.5;
    display: flex;
}

.others > li {
    padding: 0 12px;
    position: relative;
}

.others > li::after {
    content: "";
    display: block;
    width: 1px;
    height: 50%;
    background: #dddddd;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.others > li:last-child::after {
    display: none;
}

.others > li:first-child {
    position: relative;
}

.others > li:first-child input {
    width: 100%;
    border: none;
    border-bottom: 1px solid #333;
    background: transparent;
    outline: none;
}

.others > li:first-child i {
    position: absolute;
    right: 10px;
}

/* Slider styles */
#slider {
    overflow: hidden;
}

.aspect-ratio-169 {
    display: block;
    position: relative;
    padding-top: 56.25%; /* 16:9 aspect ratio */
    transition: 0.5s; /* Smooth transition for slide */
}

.aspect-ratio-169 img {
    display: block;
    position: absolute;
    width: 100%;
    height: 92%;
    top: 0;
    left: 0;
}

/* Navigation dots */
.not-container {
    position: absolute;
    height: 0;
    width: 100%;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: center;
    top: 760px;
}

.not {
    height: 16px;
    width: 16px;
    background-color: #ffffff;
    border-radius: 50%;
    margin-right: 12px;
}

.not.active {
    background-color: aqua;
}

/* Advertisement styles */
.home-trending {
    position: relative;
    min-height: auto;
    width: 700px;
    margin: 50px auto;
}

.bg-before_02.bg-before:before {
    border-radius: 80px 0px 80px 0px;
    right: -10px;
    height: 98%;
}

.bg-before:before {
    content: "";
    border: 1px solid #D1D2D4;
    box-sizing: border-box;
    border-radius: 24px 0px;
    padding: 13px 24px;
    position: absolute;
    content: "";
    bottom: 0;
    right: -5px;
    z-index: -1;
    width: 100%;
    height: 93%;
}

.img-trending-desktop img {
    border-top-left-radius: 80px;
    border-bottom-right-radius: 80px;
}

img {
    border: none;
    max-width: 100%;
    height: auto;
}

img {
    vertical-align: middle;
}

img {
    overflow-clip-margin: content-box;
    overflow: clip;
}

/* Footer styles */
footer {
    text-align: center;
}

.footer-top {
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    margin-bottom: 20px;
    height: 70px;
}

.footer-top img {
    margin-left: 25px;
    height: 150px;
}

.footer-top li {
    padding: 0 12px;
    position: relative;
}

.footer-top li::after {
    content: "";
    display: block;
    width: 1px;
    height: 30%;
    background: #cccccc;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.footer-top li:last-child::after {
    display: none;
}

.footer-top li:last-child a {
    margin-right: 12px;
    color: #333;
}

.footer-center {
    text-align: center;
}

.footer-bottom {
    margin: 20px 0;
    text-align: center;
}

/* Title xe */
.title-xe {
    text-align: center;
    margin-bottom: 24px;
}

.title-xe h3 {
    margin-top: 20px;
    font-weight: 600;
    font-size: 40px;
    line-height: 46px;
    color: #D73831;
    text-align: center;
    letter-spacing: 2px;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    font-family: 'Montserrat';
}

/* CSS hướng dẫn */
body {
    font-family: 'Montserrat', sans-serif;
    line-height: 1.6;
    background-color: #f7f7f7;
    color: #333;
    padding: 80px 20px 20px; /* Add padding-top to prevent content being hidden under fixed header */
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

.heading {
    text-align: center;
    margin-bottom: 30px;
}

.heading h1 {
    font-size: 36px;
    color: #D73831;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.instruction {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}

.instruction-step {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background: #ffffff;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    flex-basis: calc(50% - 30px);
}

.step-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #ddd;
}

.step-text h3 {
    font-size: 18px;
    color: #D73831;
    margin-bottom: 8px;
}

.step-text p {
    font-size: 14px;
    color: #555;
}

.footer {
    text-align: center;
    margin-top: 30px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.footer h2 {
    font-size: 24px;
    color: #D73831;
}

</style>
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
<div class="container">
    <div class="heading">
        <h1>Hướng Dẫn Thuê Xe</h1>
    </div>
    <div class="instruction">
        <div class="instruction-step">
            <img src="image/hd8buoc/b1.png" alt="Bước 1" class="step-img">
            <div class="step-text">
                <h3>Bước 1: Đăng nhập</h3>
                <p>Đăng nhập vào tài khoản của bạn để tiếp tục.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b2.png" alt="Bước 2" class="step-img">
            <div class="step-text">
                <h3>Bước 2: Đăng ký nếu chưa có tài khoản</h3>
                <p>Nếu chưa có tài khoản, hãy đăng ký để có thể đăng nhập.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b3.png" alt="Bước 3" class="step-img">
            <div class="step-text">
                <h3>Bước 3: Chọn xe muốn thuê</h3>
                <p>Tại trang chủ, nhấn vào phần dịch vụ, chọn xe muốn thuê.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b4.png" alt="Bước 4" class="step-img">
            <div class="step-text">
                <h3>Bước 4: Xác nhận thuê xe</h3>
                <p>Sau khi lựa chọn được xe phù hợp để thuê, nhấn vào 'Thuê ngay!' và tiến hành thanh toán.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b5.png" alt="Bước 5" class="step-img">
            <div class="step-text">
                <h3>Bước 5: Lựa chọn thời gian thuê</h3>
                <p>Chọn thời gian thuê xe phù hợp với nhu cầu của bạn.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b6.png" alt="Bước 6" class="step-img">
            <div class="step-text">
                <h3>Bước 6: Xác nhận thông tin và thanh toán</h3>
                <p>Xác nhận kĩ thông tin của bạn trước khi đặt xe, sau đó tiến hành thanh toán.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b7.png" alt="Bước 7" class="step-img">
            <div class="step-text">
                <h3>Bước 7: Theo dõi thời gian thuê xe</h3>
                <p>Theo dõi thời gian thuê xe của bạn để tránh trễ hẹn.</p>
            </div>
        </div>
        <div class="instruction-step">
            <img src="image/hd8buoc/b8.png" alt="Bước 8" class="step-img">
            <div class="step-text">
                <h3>Bước 8: Nhận xe và trải nghiệm</h3>
                <p>Nhận xe và bắt đầu chuyến trải nghiệm thú vị của bạn.</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <h2>Chúc bạn thuê xe dễ dàng và thành công!</h2>
    </div>
</div>
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
>>>>>>> 49f9f879b69225ebd78dc05c598f6f9acc165939
