<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="image/logocar.png">
    <title>Xe hơi Toyota</title>
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
            <li><a class="doi-mau" href="">LIÊN HỆ</a></li>
            <li><a class="doi-mau" href="">HƯỚNG DẪN</a></li>
            <li><a class="doi-mau" href="thongtin.php">THÔNG TIN</a></li>
        </ul>
        <ul class="others">
            <li>
                <form method="post" action="search.php" class="search_row">
                    <input placeholder="Tìm kiếm" name="noidung" type="text">
                    <button class="fas fa-search" type="submit" name="btn"></button>
                </form>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'thong_tin');
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }
                if (isset($_POST['btn'])) {
                    $noidung = $_POST['noidung'];
                    $stmt = $conn->prepare("SELECT * FROM xe WHERE TenXe LIKE ?");
                    $searchTerm = "%$noidung%";
                    $stmt->bind_param("s", $searchTerm);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
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

            <?php if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $customer_name = $_SESSION['customer_name']; ?>
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
            <li><a class="fa fa-key doi-mau" href=""></a></li>
            <li>
                <div class="shopping-window">
                    <!-- Nội dung cửa sổ shopping -->
                    <i class="close-icon fa fa-compress doi-mau"></i>
                    <h3 style="font-size: 25px; margin:10px; color:red; border-bottom: #bcb8b8;">Giỏ hàng</h3>
                    <h1 style="margin-top: 20px; margin-left: 10px;">Bạn chưa thêm sản phẩm nào...</h1>
                </div>
                <a class="fa fa-heart doi-mau" id="shopping-icon" href="yeuthich.php"></a>
            </li>
        </ul>
    </header>
    <section class="cartegory">
        <div class="vehicle">
            <p>Xe Hơi <span>&#160;</span> - <span>&#160;</span> Toyota</p>
        </div>
    </section>
    <section class="seperate">
        <section>
            <section id="tundra">
                <div class="vehicle-sub">
                    <p>Tundra</p>
                </div>
                <div class="cartegory-right-content row">
                    <?php
                    // Kết nối tới cơ sở dữ liệu
                    $conn = new mysqli('localhost', 'root', '', 'thong_tin');

                    // Kiểm tra kết nối
                    if ($conn->connect_error) {
                        die("Kết nối thất bại: " . $conn->connect_error);
                    }

                    // Truy vấn lấy dữ liệu từ bảng xe
                    $sql = "SELECT * FROM ttxe WHERE Maxe>=84 AND Maxe<=85";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Hiển thị dữ liệu
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="cartegory-right-content-item">';
                            echo '<img src="' . $row["TenFile"] . '" alt="">';
                            echo '<h1>' . $row["Tenxe"] . '</h1>';
                            echo '<div class="item-footer">';
                            echo '<span>' . ($row["GiaThue"]) . '0.000</span>';
                            echo '<a href="thanhtoan.php?id=' . $row["Maxe"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
                            echo '<form action="" method="POST">';
                            echo '<input type="hidden" name="id" value="' . $row["Maxe"] . '">'; // Truyền giá trị Maxe qua form
                            echo '<button type="submit" name="yeuthich" class="yeuthich-button">';
                            echo '<i class="fas fa-heart icon" data-state="unliked"></i></button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "Không có sản phẩm nào.";
                    }
                    $conn->close();
                    ?>
                </div>
            </section>
            <section class="seperate-vehicle-sub">
                <section>
                    <section id="tacoma">
                        <div class="vehicle-sub">
                            <p>Tacoma</p>
                        </div>
                        <div class="cartegory-right-content row">
                            <?php
                            // Kết nối tới cơ sở dữ liệu
                            $conn = new mysqli('localhost', 'root', '', 'thong_tin');

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối thất bại: " . $conn->connect_error);
                            }

                            // Truy vấn lấy dữ liệu từ bảng xe
                            $sql = "SELECT * FROM ttxe WHERE Maxe>=81 AND Maxe<=83";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Hiển thị dữ liệu
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="cartegory-right-content-item">';
                                    echo '<img src="' . $row["TenFile"] . '" alt="">';
                                    echo '<h1>' . $row["Tenxe"] . '</h1>';
                                    echo '<div class="item-footer">';
                                    echo '<span>' . ($row["GiaThue"]) . '0.000</span>';
                                    echo '<a href="thanhtoan.php?id=' . $row["Maxe"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
                                    echo '<form action="" method="POST">';
                                    echo '<input type="hidden" name="id" value="' . $row["Maxe"] . '">'; // Truyền giá trị Maxe qua form
                                    echo '<button type="submit" name="yeuthich" class="yeuthich-button">';
                                    echo '<i class="fas fa-heart icon" data-state="unliked"></i></button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo "Không có sản phẩm nào.";
                            }
                            $conn->close();
                            ?>
                        </div>
                    </section>
                    <section class="seperate-vehicle-sub">
                        <section>
                            <section id="rav4">
                                <div class="vehicle-sub">
                                    <p>RAV4</p>
                                </div>
                                <div class="cartegory-right-content row">
                                    <?php
                                    // Kết nối tới cơ sở dữ liệu
                                    $conn = new mysqli('localhost', 'root', '', 'thong_tin');

                                    // Kiểm tra kết nối
                                    if ($conn->connect_error) {
                                        die("Kết nối thất bại: " . $conn->connect_error);
                                    }

                                    // Truy vấn lấy dữ liệu từ bảng xe
                                    $sql = "SELECT * FROM ttxe WHERE Maxe>=78 AND Maxe<=80";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Hiển thị dữ liệu
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="cartegory-right-content-item">';
                                            echo '<img src="' . $row["TenFile"] . '" alt="">';
                                            echo '<h1>' . $row["Tenxe"] . '</h1>';
                                            echo '<div class="item-footer">';
                                            echo '<span>' . ($row["GiaThue"]) . '0.000</span>';
                                            echo '<a href="thanhtoan.php?id=' . $row["Maxe"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
                                            echo '<form action="" method="POST">';
                                            echo '<input type="hidden" name="id" value="' . $row["Maxe"] . '">'; // Truyền giá trị Maxe qua form
                                            echo '<button type="submit" name="yeuthich" class="yeuthich-button">';
                                            echo '<i class="fas fa-heart icon" data-state="unliked"></i></button>';
                                            echo '</form>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo "Không có sản phẩm nào.";
                                    }
                                    $conn->close();
                                    ?>
                                </div>
                            </section>
                            <section class="seperate-vehicle-sub">
                                <section>
                                    <section id="prius">
                                        <div class="vehicle-sub">
                                            <p>Prius</p>
                                        </div>
                                        <div class="cartegory-right-content row">
                                            <?php
                                            // Kết nối tới cơ sở dữ liệu
                                            $conn = new mysqli('localhost', 'root', '', 'thong_tin');

                                            // Kiểm tra kết nối
                                            if ($conn->connect_error) {
                                                die("Kết nối thất bại: " . $conn->connect_error);
                                            }

                                            // Truy vấn lấy dữ liệu từ bảng xe
                                            $sql = "SELECT * FROM ttxe WHERE Maxe>=76 AND Maxe<=77";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Hiển thị dữ liệu
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<div class="cartegory-right-content-item">';
                                                    echo '<img src="' . $row["TenFile"] . '" alt="">';
                                                    echo '<h1>' . $row["Tenxe"] . '</h1>';
                                                    echo '<div class="item-footer">';
                                                    echo '<span>' . ($row["GiaThue"]) . '0.000</span>';
                                                    echo '<a href="thanhtoan.php?id=' . $row["Maxe"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
                                                    echo '<form action="" method="POST">';
                                                    echo '<input type="hidden" name="id" value="' . $row["Maxe"] . '">'; // Truyền giá trị Maxe qua form
                                                    echo '<button type="submit" name="yeuthich" class="yeuthich-button">';
                                                    echo '<i class="fas fa-heart icon" data-state="unliked"></i></button>';
                                                    echo '</form>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo "Không có sản phẩm nào.";
                                            }
                                            $conn->close();
                                            ?>
                                        </div>
                                    </section>
                                    <section class="seperate-vehicle-sub">
                                        <section>
                                            <section id="highlander">
                                                <div class="vehicle-sub">
                                                    <p>HighLander</p>
                                                </div>
                                                <div class="cartegory-right-content row">
                                                    <?php
                                                    // Kết nối tới cơ sở dữ liệu
                                                    $conn = new mysqli('localhost', 'root', '', 'thong_tin');

                                                    // Kiểm tra kết nối
                                                    if ($conn->connect_error) {
                                                        die("Kết nối thất bại: " . $conn->connect_error);
                                                    }

                                                    // Truy vấn lấy dữ liệu từ bảng xe
                                                    $sql = "SELECT * FROM ttxe WHERE Maxe>=73 AND Maxe<=75";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        // Hiển thị dữ liệu
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<div class="cartegory-right-content-item">';
                                                            echo '<img src="' . $row["TenFile"] . '" alt="">';
                                                            echo '<h1>' . $row["Tenxe"] . '</h1>';
                                                            echo '<div class="item-footer">';
                                                            echo '<span>' . ($row["GiaThue"]) . '0.000</span>';
                                                            echo '<a href="thanhtoan.php?id=' . $row["Maxe"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
                                                            echo '<form action="" method="POST">';
                                                            echo '<input type="hidden" name="id" value="' . $row["Maxe"] . '">'; // Truyền giá trị Maxe qua form
                                                            echo '<button type="submit" name="yeuthich" class="yeuthich-button">';
                                                            echo '<i class="fas fa-heart icon" data-state="unliked"></i></button>';
                                                            echo '</form>';
                                                            echo '</div>';
                                                            echo '</div>';
                                                        }
                                                    } else {
                                                        echo "Không có sản phẩm nào.";
                                                    }
                                                    $conn->close();
                                                    ?>
                                                </div>
                                            </section>
                                            <?php
                                            // Kết nối cơ sở dữ liệu
                                            $conn = new mysqli('localhost', 'root', '', 'thong_tin');

                                            // Kiểm tra kết nối
                                            if ($conn->connect_error) {
                                                die("Kết nối thất bại: " . $conn->connect_error);
                                            }

                                            // Kiểm tra nếu form đã được submit và có 'id' trong POST
                                            if (isset($_POST['yeuthich']) && isset($_POST['id'])) {
                                                // Lấy id xe từ POST
                                                $id = $_POST['id']; // Mã xe (Maxe)

                                                // Cập nhật cột 'yeuthich' của xe đó thành 1, thay thế STT bằng Maxe
                                                $sql = "UPDATE ttxe SET yeuthich = 1 WHERE Maxe = '$id'"; // Chắc chắn rằng $id là một chuỗi hợp lệ

                                                if ($conn->query($sql) === TRUE) {
                                                    // Cập nhật thành công
                                                    // Chuyển hướng về trang danh sách xe hoặc trang khác
                                                }
                                            }

                                            $conn->close();
                                            ?>
                                            <script>
                                                // Lấy tất cả các nút có class .yeuthich-button
                                                const toggleButtons = document.querySelectorAll('.yeuthich-button');

                                                // Gắn sự kiện click cho từng nút
                                                toggleButtons.forEach(button => {
                                                    button.addEventListener('click', () => {
                                                        // Lấy icon bên trong nút hiện tại
                                                        const icon = button.querySelector('i');

                                                        // Kiểm tra và thay đổi trạng thái của icon
                                                        const currentState = icon.getAttribute('data-state'); // Lấy trạng thái hiện tại
                                                        if (currentState === 'liked') {
                                                            // Nếu đang ở trạng thái "liked", chuyển về trạng thái "unliked"
                                                            icon.setAttribute('data-state', 'unliked'); // Cập nhật trạng thái
                                                            icon.style.color = 'black';
                                                        } else {
                                                            // Nếu đang ở trạng thái "unliked", chuyển về trạng thái "liked"
                                                            icon.setAttribute('data-state', 'liked'); // Cập nhật trạng thái//
                                                            icon.style.color = 'red';
                                                        }
                                                    });
                                                });
                                            </script>
                                            <section class="seperate">
                                                <section>
                                                    <section class="information">
                                                        <div class="infor">
                                                            <div class="infor-fl">THEO DÕI CHÚNG TÔI TRÊN</div>
                                                            <ul class="infor-fl-vog">
                                                                <li class="VOG2_4">
                                                                    <a href="https://www.facebook.com/thang.lequoc.1253236" class="link" title="" target="_blank" rel="noopener noreferrer">
                                                                        <img class="img" src="https://down-vn.img.susercontent.com/file/2277b37437aa470fd1c71127c6ff8eb5">
                                                                        <span class="tt">Facebook</span>
                                                                    </a>
                                                                </li>
                                                                <li class="VOG2_4">
                                                                    <a href="" class="link" title="" target="_blank" rel="noopener noreferrer">
                                                                        <img class="img" src="https://down-vn.img.susercontent.com/file/5973ebbc642ceee80a504a81203bfb91">
                                                                        <span class="tt">Instagram</span>
                                                                    </a>
                                                                </li>
                                                                <li class="VOG2_4">
                                                                    <a href="" class="link" title="" target="_blank" rel="noopener noreferrer">
                                                                        <img class="img" src="https://down-vn.img.susercontent.com/file/f4f86f1119712b553992a75493065d9a">
                                                                        <span class="tt">LinkedIn</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="infor">
                                                            <div class="infor-fl">TẢI ỨNG DỤNG Q&TCAR NGAY THÔI</div>
                                                            <div class="QRcode">
                                                                <a href="" target="_blank" rel="noopener noreferrer">
                                                                    <img src="https://down-vn.img.susercontent.com/file/a5e589e8e118e937dc660f224b9a1472" alt="download_qr_code" class="QRcode-img">
                                                                </a>
                                                                <div class="store">
                                                                    <a href="" target="_blank" rel="noopener noreferrer" class="store-app">
                                                                        <img src="https://down-vn.img.susercontent.com/file/ad01628e90ddf248076685f73497c163" alt="app">
                                                                    </a>
                                                                    <a href="" target="_blank" rel="noopener noreferrer" class="store-app">
                                                                        <img src="https://down-vn.img.susercontent.com/file/ae7dced05f7243d0f3171f786e123def" alt="app">
                                                                    </a>
                                                                    <a href="" target="_blank" rel="noopener noreferrer" class="store-app">
                                                                        <img src="https://down-vn.img.susercontent.com/file/35352374f39bdd03b25e7b83542b2cb0" alt="app">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section class="seperate-degree">
                                                        <div class="001">@ 2024 Q&TCAR. Tất cả các quyền được bảo lưu.</div>
                                                    </section>
</body>