<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = ""; // Thay đổi nếu bạn có mật khẩu
$database = "thong_tin";

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu cho bảng ttkh
$sql_kh = "SELECT MaKH, firstname, lastname, CCCD, phone, Email, sex, birthday FROM ttkh";
$result_kh = $conn->query($sql_kh);
// Truy vấn dữ liệu cho bảng ttxe
$sql_ttxe = "SELECT Maxe, Trangthai, Tenxe, Loaixe, Bienso, GiaThue FROM ttxe";
$result_ttxe = $conn->query($sql_ttxe);
// Truy vấn dữ liệu cho bảng tthoadon
$sql_tthoadon = "SELECT mahd, makh, maxe, starttime, endtime, giathue FROM tthoadon";
$result_tthoadon = $conn->query($sql_tthoadon);
// Truy vấn cho các xe đang cho thuê
$sql_on = "
SELECT ttxe.Maxe, ttxe.Tenxe, ttxe.Bienso, ttxe.Giathue, ttkh.MaKH, ttkh.Firstname, ttkh.Lastname, tthoadon.Starttime, tthoadon.Endtime
FROM ttxe
INNER JOIN tthoadon ON ttxe.Maxe = tthoadon.Maxe
INNER JOIN ttkh ON tthoadon.MaKH = ttkh.MaKH
WHERE ttxe.Trangthai = 'ON'
";
$result_on = $conn->query($sql_on);

// Truy vấn cho các xe chưa cho thuê
$sql_off = "SELECT Maxe, Tenxe, Bienso, Loaixe FROM ttxe WHERE Trangthai = 'OFF'";
$result_off = $conn->query($sql_off);

// Truy vấn cho các xe đang bảo trì
$sql_fix = "SELECT Maxe, Tenxe, Bienso, Loaixe FROM ttxe WHERE Trangthai = 'FIX'";
$result_fix = $conn->query($sql_fix);

// Xử lý thêm khách hàng
if (isset($_POST['action']) && $_POST['action'] == 'them') {
    $makh = $_POST['makh'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cccd = $_POST['cccd'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO ttkh (MaKH, firstname, lastname, CCCD, phone, Email, sex, birthday) 
            VALUES ('$makh', '$firstname', '$lastname', '$cccd', '$phone', '$email', '$sex', '$birthday')";

    if ($conn->query($sql) === TRUE) {
        echo "Khách hàng đã được thêm thành công!";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
        exit();
    }
}

// Xử lý sửa khách hàng
if (isset($_POST['action']) && $_POST['action'] == 'sua') {
    $makh = $_POST['makh'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cccd = $_POST['cccd'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $birthday = $_POST['birthday'];

    // Thực hiện truy vấn cập nhật
    $sql = "UPDATE ttkh 
    SET firstname='$firstname', lastname='$lastname', CCCD='$cccd', phone='$phone', Email='$email', sex='$sex', birthday='$birthday' 
    WHERE MaKH='$makh'";
    if ($conn->query($sql) === TRUE) {
        echo "Khách hàng đã được sửa thành công!";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
        exit();
    }
}

// Xử lý xóa khách hàng
if (isset($_POST['action']) && $_POST['action'] == 'xoa') {
    $makh = $_POST['makh'];
    $sql = "DELETE FROM ttkh WHERE MaKH = '$makh'";
    if ($conn->query($sql) === TRUE) {
        echo "Khách hàng đã được xóa thành công!";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
        exit();
    }
}
// Xử lý thêm xe
if (isset($_POST['action']) && $_POST['action'] == 'themxe') {
    $maxe = $_POST['maxe'];
    $trangthai = $_POST['trangthai'];
    $biensoxe = $_POST['bienso'];
    $tenxe = $_POST['tenxe'];
    $loaixe = $_POST['loaixe'];
    $giathue = $_POST['giathue'];
    // Truy vấn SQL thêm xe
    $sql = "INSERT INTO ttxe  (maxe, trangthai, bienso, tenxe, loaixe, giathue) 
            VALUES ('$maxe', '$trangthai', '$biensoxe', '$tenxe', '$loaixe', '$giathue')";

    if ($conn->query($sql) === TRUE) {
        echo "Xe đã được thêm thành công!";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
        exit();
    }
}
//Xử lý sửa thông tin xe
if (isset($_POST['action']) && $_POST['action'] == 'suaxe') {
    $maxe = $_POST['maxe'];
    $trangthai = $_POST['trangthai'];
    $biensoxe = $_POST['bienso'];
    $tenxe = $_POST['tenxe'];
    $loaixe = $_POST['loaixe'];
    $giathue = $_POST['giathue'];

    // Thực hiện truy vấn cập nhật
    $sql = "UPDATE ttxe 
    SET trangthai='$trangthai', bienso='$biensoxe', tenxe='$tenxe', loaixe='$loaixe', giathue='$giathue' 
    WHERE maxe='$maxe'";
    if ($conn->query($sql) === TRUE) {
        echo "Thông tin xe đã được sửa thành công!";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
        exit();
    }
}
//Mã xử lý xóa thông tin xe
// Xử lý xóa khách hàng
if (isset($_POST['action']) && $_POST['action'] == 'xoaxe') {
    $maxe = $_POST['maxe'];
    $sql = "DELETE FROM ttxe WHERE maxe = '$maxe'";
    if ($conn->query($sql) === TRUE) {
        echo "Thông tin đã được xóa thành công!";
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="quantri.css">
    <title>Quản trị</title>
</head>

<!-- sidebar menu chức năng -->

<body>
    <div class="sidebar_menu">
        <!-- logo -->
        <a href="trangchu.php" style="background-color: white;">
            <img src="image/logocar.png" alt="Logo" style="height: 150px; width: 200px; background-color:white;">
        </a>
        <!-- nút chức năng -->
        <a href="#thong_tin_khach_hang" class="title_sidebar" data-target="thong_tin_khach_hang"><i
                class="fa-solid fa-users-gear"></i> Thông tin khách hàng</a>
        <a href="#quan_li_thong_tin_xe" class="title_sidebar" data-target="quan_li_thong_tin_xe"><i
                class="fa-solid fa-car"></i> Quản lí thông tin xe</a>
        <a href="#quan_li_hoa_don" class="title_sidebar" data-target="quan_li_hoa_don"><i
                class="fa-solid fa-file-invoice"></i> Quản lí hóa đơn</a>
        <a href="#bao_cao_doanh_thu" class="title_sidebar" data-target="bao_cao_doanh_thu"><i
                class="fa-solid fa-chart-line"></i> Báo cáo doanh thu</a>
        <!-- dropdown trạng thái thuê xe -->
        <div class="dropdown_tt">
            <a class="dropdown-btn"><i class="fa-solid fa-taxi"></i> Trạng thái thuê xe <i
                    class="fa-solid fa-caret-down"></i></a>
            <div class="dropdown_tt_content">
                <a href="#trang_thai_thue_xe_on" class="title_sidebar" data-target="trang_thai_thue_xe_on"><i
                        class="fa-solid fa-car-side"></i> Đang cho thuê</a>
                <a href="#trang_thai_thue_xe_off" class="title_sidebar" data-target="trang_thai_thue_xe_off"><i
                        class="fa-solid fa-motorcycle"></i> Chưa cho thuê</a>
                <a href="#trang_thai_thue_xe_fix" class="title_sidebar" data-target="trang_thai_thue_xe_fix"><i
                        class="fa-solid fa-wrench"></i> Bảo trì</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div id="thong_tin_khach_hang" class="content_section">
            <div class="header_quantri">
                <div class="form_dangxuat">
                    <a href="logout.php">
                        <i class="fa-solid fa-user-xmark"
                            style="font-size: 30px; margin: 20px 0 0 75%; color:black"></i>
                    </a>
                </div>
                <div class="form_textbox">
                    <input type="text" class="textbox_quantri" name="makh" placeholder="Mã khách hàng ..." style="width:100px">
                    <input type="text" class="textbox_quantri" name="firstname" placeholder="Họ ..." style="width:100px">
                    <input type="text" class="textbox_quantri" name="lastname" placeholder="Tên ..." style="width:120px">
                    <input type="text" class="textbox_quantri" name="cccd" placeholder="CCCD ..." style="width:100px">
                    <input type="text" class="textbox_quantri" name="phone" placeholder="SĐT ..." style="width:100px">
                    <input type="text" class="textbox_quantri" name="email" placeholder="Email">
                    <input type="text" class="textbox_quantri" name="sex" placeholder="Giới tính" style="width:100px">
                    <input type="text" class="textbox_quantri" name="birthday" placeholder="Ngày sinh" style="width:100px">
                </div>
                <div class="form_btn">
                    <input type="button" class="btn_quantri" name="them" value="Thêm" onclick="themKhachHang()">
                    <input type="button" class="btn_quantri" name="sua" value="Sửa" onclick="suaKhachHang()">
                    <input type="button" class="btn_quantri" name="xoa" value="Xóa" onclick="xoaKhachHang()">
                    <input type="button" class="btn_quantri" name="timkiem" value="Tìm kiếm" onclick="timKiemKhachHang()">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Danh sách khách hàng</h1>
                <div class="table_wrapper">
                    <table class="table_dulieu_kh">
                        <thead>
                            <tr>
                                <th>Mã KH</th>
                                <th>Họ</th>
                                <th>Tên</th>
                                <th>CCCD</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_kh->num_rows > 0) {
                                while ($row = $result_kh->fetch_assoc()) {
                                    echo "<tr>
                            <td>{$row['MaKH']}</td>
                            <td>{$row['firstname']}</td>
                            <td>{$row['lastname']}</td>
                            <td>{$row['CCCD']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['sex']}</td>
                            <td>{$row['birthday']}</td>
                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="quan_li_thong_tin_xe" class="content_section">
            <div class="header_quantri">
                <div class="form_dangxuat">
                    <i class="fa-solid fa-user-xmark" style="font-size: 30px; margin: 20px 0 0 75%"></i>
                </div>
                <div class="form_textbox">
                    <input type="text" class="textbox_quantri" name="maxe" placeholder="Mã xe ..."
                        style="width: 100px;">
                    <input type="text" class="textbox_quantri" name="trangthai" placeholder="Trạng thái ..."
                        style="width: 80px;">
                    <input type="text" class="textbox_quantri" name="tenxe" placeholder="Tên xe ...">
                    <input type="text" class="textbox_quantri" name="loaixe" placeholder="Loại xe ..."
                        style="width: 100px;">
                    <input type="text" class="textbox_quantri" name="bienso" placeholder="Biển số xe ...">
                    <input type="text" class="textbox_quantri" name="giathue" placeholder="Giá xe ...">
                </div>
                <div class="form_btn">
                    <input type="button" class="btn_quantri" name="themxe" value="Thêm" onclick="themXe()">
                    <input type="button" class="btn_quantri" name="suaxe" value="Sửa" onclick="suaXe()">
                    <input type="button" class="btn_quantri" name="xoaxe" value="Xóa" onclick="xoaXe()">
                    <input type="button" class="btn_quantri" name="timkiemxe" value="Tìm kiếm" onclick="timKiemXe()">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Thông tin xe</h1>
                <div class="table_wrapper">
                    <table class="table_dulieu_kh">
                        <thead>
                            <tr>
                                <th>Mã xe</th>
                                <th>Trạng thái</th>
                                <th>Tên xe</th>
                                <th>Loại xe</th>
                                <th>Biển số xe</th>
                                <th>Giá xe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kiểm tra và hiển thị dữ liệu
                            if ($result_ttxe->num_rows > 0) {
                                while ($row = $result_ttxe->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["Maxe"] . "</td>";
                                    echo "<td>" . $row["Trangthai"] . "</td>";
                                    echo "<td>" . $row["Tenxe"] . "</td>";
                                    echo "<td>" . $row["Loaixe"] . "</td>";
                                    echo "<td>" . $row["Bienso"] . "</td>";
                                    echo "<td>" . $row["GiaThue"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="quan_li_hoa_don" class="content_section">
            <div class="header_quantri" style="height: 220px;">
                <div class="form_dangxuat">
                    <i class="fa-solid fa-user-xmark" style="font-size: 30px; margin: 20px 0 0 75%"></i>
                </div>
                <div class="form_textbox" style="margin-left:16%">
                    <input type="text" class="textbox_quantri" name="mahd" placeholder="Mã hóa đơn ...">
                    <input type="text" class="textbox_quantri" name="makh" placeholder="Mã khách hàng ...">
                    <input type="text" class="textbox_quantri" name="lastname" placeholder="Mã xe ...">
                </div>
                <div style="margin-left:18%">
                    <label for="date_start">Ngày nhận xe: </label>
                    <input type="date" class="textbox_quantri" name="date_start">
                    <label for="date_end">Ngày trả xe:</label>
                    <input type="date" class="textbox_quantri" name="date_end">
                </div>
                <div class="form_btn" style="margin-left:45%">
                    <input type="button" class="btn_quantri" name="xuathd" value="Xuất">
                    <input type="button" class="btn_quantri" name="timkiem" value="Tìm kiếm">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Hóa đơn thuê xe</h1>
                <div class="table_wrapper">
                    <table class="table_dulieu_kh">
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Mã khách hàng</th>
                                <th>Mã xe</th>
                                <th>Nhận xe</th>
                                <th>Trả xe</th>
                                <th>Thời gian thuê</th>
                                <th>Tổng hóa đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kiểm tra xem có kết quả trả về không
                            if ($result_tthoadon->num_rows > 0) {
                                // Duyệt qua tất cả các kết quả
                                while ($row = $result_tthoadon->fetch_assoc()) {
                                    // Đảm bảo rằng dữ liệu có thể hiển thị đúng
                                    $starttime = date("d-m-Y H:i:s", strtotime($row['starttime']));  // Định dạng lại thời gian nếu cần
                                    $endtime = date("d-m-Y H:i:s", strtotime($row['endtime'])); // Định dạng lại thời gian nếu cần
                                    $totalAmount = $row['giathue']; // Bạn có thể tính toán thêm tổng hóa đơn nếu cần

                                    echo "<tr>
                                        <td>{$row['mahd']}</td>
                                        <td>{$row['makh']}</td>
                                        <td>{$row['maxe']}</td>
                                        <td>{$starttime}</td>
                                        <td>{$endtime}</td>
                                        <td>" . ($endtime - $starttime) . " hours</td> 
                                        <td>{$totalAmount}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="bao_cao_doanh_thu" class="content_section">
            <div class="header_quantri">
                <div class="form_dangxuat">
                    <i class="fa-solid fa-user-xmark" style="font-size: 30px; margin: 20px 0 0 75%"></i>
                </div>
                <div class="form_textbox" style="margin-left:25%; font-size:20px; color:red">
                    <input type="radio" name="groupradio1" id="chonkieu1" style="transform: scale(1.5);">
                    <label for="chonkieu">Báo cáo theo ngày</label>
                    <input type="radio" name="groupradio1" id="chonkieu2"
                        style="margin-left: 50px; transform: scale(1.5);">
                    <label for="chonkieu">Báo cáo theo tháng</label>
                </div>
                <div style="margin-left:18%">
                    <label for="date_start">Ngày bắt đầu: </label>
                    <input type="date" class="textbox_quantri" name="date_start">
                    <label for="date_end">Ngày kết thúc:</label>
                    <input type="date" class="textbox_quantri" name="date_end">
                </div>
                <div class="form_btn" style="margin-left:60%">
                    <input type="button" class="btn_quantri" name="xuat" value="Xuất">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Bảng doanh thu</h1>
                <table class="table_dulieu_kh" id="doanhthungay">
                    <thead>
                        <tr>
                            <th>Ngày/tháng/năm</th>
                            <th>Tổng doanh thu ngày</th>
                            <th>Đền bù</th>
                            <th>Dư</th>
                            <th>Nguồn tiền khác</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <table class="table_dulieu_kh" id="doanhthuthang">
                    <thead>
                        <tr>
                            <th>Tháng/năm</th>
                            <th>Tổng doanh thu ngày</th>
                            <th>Đền bù</th>
                            <th>Dư</th>
                            <th>Nguồn tiền khác</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="trang_thai_thue_xe_on" class="content_section">
            <div class="header_quantri">
                <div class="form_dangxuat">
                    <i class="fa-solid fa-user-xmark" style="font-size: 30px; margin: 20px 0 0 75%"></i>
                </div>
                <div class="form_textbox">
                    <input type="text" class="textbox_quantri" name="maxe" placeholder="Mã xe ..."
                        style="width: 100px;">
                    <input type="text" class="textbox_quantri" name="makh" placeholder="Mã khách hàng ..."
                        style="width: 100px;">
                    <input type="text" class="textbox_quantri" name="tenxe" placeholder="Tên xe ...">
                    <input type="text" class="textbox_quantri" name="biensoxe" placeholder="Biển số xe ...">
                    <input type="text" class="textbox_quantri" name="thoigiantraxe" placeholder="Thời gian trả xe ...">
                </div>
                <div class="form_btn" style="margin-left: 50%;">
                    <input type="button" class="btn_quantri" name="capnhat" value="Cập nhật">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Xe đang được thuê</h1>
                <div class="table_wrapper">
                    <table class="table_dulieu_kh">
                        <thead>
                            <tr>
                                <th>Mã xe</th>
                                <th>Mã khách hàng</th>
                                <th>Tên xe</th>
                                <th>Biển số xe</th>
                                <th>Trả xe</th>
                                <th>Thời gian thuê</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_on->num_rows > 0) {
                                while ($row = $result_on->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['Maxe']; ?></td>
                                        <td><?php echo $row['MaKH']; ?></td>
                                        <td><?php echo $row['Tenxe']; ?></td>
                                        <td><?php echo $row['Bienso']; ?></td>
                                        <td><?php echo $row['Endtime']; ?></td>
                                        <td><?php echo $row['Starttime'] . " - " . $row['Endtime']; ?></td>
                                    </tr>
                            <?php }
                            } else {
                                echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="trang_thai_thue_xe_off" class="content_section">
            <div class="header_quantri">
                <div class="form_dangxuat">
                    <i class="fa-solid fa-user-xmark" style="font-size: 30px; margin: 20px 0 0 75%"></i>
                </div>
                <div class="form_textbox">
                    <input type="text" class="textbox_quantri" name="makh" placeholder="Mã xe ...">
                    <input type="text" class="textbox_quantri" name="biensoxe" placeholder="Biển số xe ...">
                    <input type="text" class="textbox_quantri" name="loaixe" placeholder="Loại xe ...">
                    <input type="text" class="textbox_quantri" name="tenxe" placeholder="Tên xe ...">
                </div>
                <div class="form_btn" style="margin-left:50%;">
                    <input type="button" class="btn_quantri" name="capnhat" value="Cập nhật">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Xe đang trong hàng chờ</h1>
                <div class="table_wrapper">
                    <table class="table_dulieu_kh">
                        <thead>
                            <tr>
                                <th>Mã xe</th>
                                <th>Tên xe</th>
                                <th>Biển số xe</th>
                                <th>Loại xe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_off->num_rows > 0) {
                                while ($row = $result_off->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['Maxe']; ?></td>
                                        <td><?php echo $row['Tenxe']; ?></td>
                                        <td><?php echo $row['Bienso']; ?></td>
                                        <td><?php echo $row['Loaixe']; ?></td>
                                    </tr>
                            <?php }
                            } else {
                                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="trang_thai_thue_xe_fix" class="content_section">
            <div class="header_quantri">
                <div class="form_dangxuat">
                    <i class="fa-solid fa-user-xmark" style="font-size: 30px; margin: 20px 0 0 75%"></i>
                </div>
                <div class="form_textbox">
                    <input type="text" class="textbox_quantri" name="makh" placeholder="Mã xe ...">
                    <input type="text" class="textbox_quantri" name="biensoxe" placeholder="Biển số xe ...">
                    <input type="text" class="textbox_quantri" name="loaixe" placeholder="Loại xe ...">
                    <input type="text" class="textbox_quantri" name="tenxe" placeholder="Tên xe ...">
                </div>
                <div class="form_btn" style="margin-left:50%;">
                    <input type="button" class="btn_quantri" name="capnhat" value="Cập nhật">
                </div>
            </div>
            <div class="content_quantri">
                <h1 style="align-self: center;">Xe đang bảo trì</h1>
                <div class="table_wrapper">
                    <table class="table_dulieu_kh">
                        <thead>
                            <tr>
                                <th>Mã xe</th>
                                <th>Tên xe</th>
                                <th>Biển số xe</th>
                                <th>Loại xe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_fix->num_rows > 0) {
                                while ($row = $result_fix->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['Maxe']; ?></td>
                                        <td><?php echo $row['Tenxe']; ?></td>
                                        <td><?php echo $row['Bienso']; ?></td>
                                        <td><?php echo $row['Loaixe']; ?></td>
                                    </tr>
                            <?php }
                            } else {
                                echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Thông báo lỗi -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <p id="errorMessage">Đây là thông báo lỗi.</p>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const errorModal = document.getElementById("errorModal");
            const errorMessage = document.getElementById("errorMessage");
            const closeBtn = document.querySelector(".close-btn");
            const startDate = document.querySelector("input[name='date_start']");
            const endDate = document.querySelector("input[name='date_end']");

            // Hàm hiển thị modal thông báo lỗi
            function showError(message) {
                errorMessage.textContent = message; // Gán nội dung thông báo lỗi
                errorModal.style.display = "block"; // Hiển thị modal
            }

            // Sự kiện đóng modal khi nhấn nút đóng
            closeBtn.addEventListener("click", () => {
                errorModal.style.display = "none";
            });

            // Sự kiện đóng modal khi nhấn bên ngoài modal
            window.addEventListener("click", (event) => {
                if (event.target === errorModal) {
                    errorModal.style.display = "none";
                }
            });

            // Kiểm tra logic ngày bắt đầu và kết thúc
            startDate.addEventListener("change", () => {
                const startValue = startDate.value;
                const endValue = endDate.value;

                if (startValue && endValue && startValue > endValue) {
                    showError("Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc!");
                }
            });

            endDate.addEventListener("change", () => {
                const startValue = startDate.value;
                const endValue = endDate.value;
                if (startValue && endValue && startValue > endValue) {
                    showError("Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu!");
                }
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
            const doanhThuNgay = document.getElementById("doanhthungay");
            const doanhThuThang = document.getElementById("doanhthuthang");
            const radioNgay = document.getElementById("chonkieu1");
            const radioThang = document.getElementById("chonkieu2");

            // Mặc định hiển thị bảng ngày
            doanhThuNgay.style.display = "table";
            doanhThuThang.style.display = "none";
            radioNgay.checked = true;

            // Sự kiện thay đổi hiển thị khi chọn radio button
            radioNgay.addEventListener("change", () => {
                doanhThuNgay.style.display = "table";
                doanhThuThang.style.display = "none";
            });

            radioThang.addEventListener("change", () => {
                doanhThuNgay.style.display = "none";
                doanhThuThang.style.display = "table";
            });
        });


        // Thêm khách hàng
        function themKhachHang() {
            var makh = document.getElementsByName("makh")[0].value;
            var firstname = document.getElementsByName("firstname")[0].value;
            var lastname = document.getElementsByName("lastname")[0].value;
            var cccd = document.getElementsByName("cccd")[0].value;
            var phone = document.getElementsByName("phone")[0].value;
            var email = document.getElementsByName("email")[0].value;
            var sex = document.getElementsByName("sex")[0].value;
            var birthday = document.getElementsByName("birthday")[0].value;

            if (!makh || !firstname || !lastname || !cccd || !phone || !email || !sex || !birthday) {
                showError("Vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "quantri.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send("action=them&makh=" + makh + "&firstname=" + firstname + "&lastname=" + lastname + "&cccd=" + cccd + "&phone=" + phone + "&email=" + email + "&sex=" + sex + "&birthday=" + birthday);
        }

        // Sửa thông tin khách hàng
        function suaKhachHang() {
            var makh = document.getElementsByName("makh")[0].value;
            var firstname = document.getElementsByName("firstname")[0].value;
            var lastname = document.getElementsByName("lastname")[0].value;
            var cccd = document.getElementsByName("cccd")[0].value;
            var phone = document.getElementsByName("phone")[0].value;
            var email = document.getElementsByName("email")[0].value;
            var sex = document.getElementsByName("sex")[0].value;
            var birthday = document.getElementsByName("birthday")[0].value;

            if (!makh || !firstname || !lastname || !cccd || !phone || !email || !sex || !birthday) {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "quantri.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send("action=sua&makh=" + makh + "&firstname=" + firstname + "&lastname=" + lastname + "&cccd=" + cccd + "&phone=" + phone + "&email=" + email + "&sex=" + sex + "&birthday=" + birthday);
        }


        // Xóa khách hàng
        function xoaKhachHang() {
            var makh = document.getElementsByName("makh")[0].value;
            var firstname = document.getElementsByName("firstname")[0].value;
            var lastname = document.getElementsByName("lastname")[0].value;
            var cccd = document.getElementsByName("cccd")[0].value;
            var phone = document.getElementsByName("phone")[0].value;
            var email = document.getElementsByName("email")[0].value;
            var sex = document.getElementsByName("sex")[0].value;
            var birthday = document.getElementsByName("birthday")[0].value;

            if (!makh || !firstname || !lastname || !cccd || !phone || !email || !sex || !birthday) {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "quantri.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send("action=xoa&makh=" + makh);
        }
        // Hàm thêm xe
        function themXe() {
            var maxe = document.getElementsByName("maxe")[0].value;
            var trangthai = document.getElementsByName("trangthai")[0].value;
            var tenxe = document.getElementsByName("tenxe")[0].value;
            var loaixe = document.getElementsByName("loaixe")[0].value;
            var bienso = document.getElementsByName("bienso")[0].value;
            var giaxe = document.getElementsByName("giathue")[0].value;

            // Kiểm tra các trường thông tin đã được nhập đầy đủ chưa
            if (!maxe || !trangthai || !tenxe || !loaixe || !bienso || !giaxe) {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "quantri.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Thông báo kết quả thêm xe
                    location.reload(); // Tải lại trang để hiển thị danh sách xe mới
                }
            };

            // Gửi thông tin xe vào server
            xhr.send("action=themxe&maxe=" + maxe + "&trangthai=" + trangthai + "&tenxe=" + tenxe + "&loaixe=" + loaixe + "&bienso=" + bienso + "&giathue=" + giaxe);
        }
        //Hàm sửa thông tin xe
        function suaXe() {
            var maxe = document.getElementsByName("maxe")[0].value;
            var trangthai = document.getElementsByName("trangthai")[0].value;
            var tenxe = document.getElementsByName("tenxe")[0].value;
            var loaixe = document.getElementsByName("loaixe")[0].value;
            var bienso = document.getElementsByName("bienso")[0].value;
            var giaxe = document.getElementsByName("giathue")[0].value;

            // Kiểm tra các trường thông tin đã được nhập đầy đủ chưa
            if (!maxe || !trangthai || !tenxe || !loaixe || !bienso || !giaxe) {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "quantri.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Thông báo kết quả thêm xe
                    location.reload(); // Tải lại trang để hiển thị danh sách xe mới
                }
            };

            // Gửi thông tin xe vào server
            xhr.send("action=suaxe&maxe=" + maxe + "&trangthai=" + trangthai + "&tenxe=" + tenxe + "&loaixe=" + loaixe + "&bienso=" + bienso + "&giathue=" + giaxe);
        }
        //Hàm xóa thông tin xe
        function xoaXe() {
            var maxe = document.getElementsByName("maxe")[0].value;
            var trangthai = document.getElementsByName("trangthai")[0].value;
            var tenxe = document.getElementsByName("tenxe")[0].value;
            var loaixe = document.getElementsByName("loaixe")[0].value;
            var bienso = document.getElementsByName("bienso")[0].value;
            var giaxe = document.getElementsByName("giathue")[0].value;

            // Kiểm tra các trường thông tin đã được nhập đầy đủ chưa
            if (!maxe || !trangthai || !tenxe || !loaixe || !bienso || !giaxe) {
                alert("Vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "quantri.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Thông báo kết quả thêm xe
                    location.reload(); // Tải lại trang để hiển thị danh sách xe mới
                }
            };

            // Gửi thông tin xe vào server
            xhr.send("action=xoaxe&maxe=" + maxe);
        }
    </script>
    <?php
    // Đóng kết 
    $conn->close();
    ?>
</body>