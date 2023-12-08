-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql300.infinityfree.com
-- Thời gian đã tạo: Th10 06, 2023 lúc 08:50 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `if0_34911367_bachhoaxanhh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `IDChiTiet` char(12) NOT NULL,
  `IDSanPham` char(12) DEFAULT NULL,
  `ChiTietSanPham` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `IDHoaDon` int(12) NOT NULL,
  `IDSanPham` char(12) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`IDHoaDon`, `IDSanPham`, `SoLuong`, `GiaBan`) VALUES
(3, '1', 2, 100),
(4, '1', 2, 100),
(5, '3', 2, 120),
(6, '2', 1, 110),
(7, '1', 1, 100),
(8, '7', 1, 88),
(9, '2', 8, 110),
(10, '3', 4, 120),
(11, '10', 1, 12),
(12, '1', 3, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `IDDanhGia` char(12) NOT NULL,
  `IDSanPham` char(12) DEFAULT NULL,
  `Username` char(30) DEFAULT NULL,
  `NoiDungDanhGia` varchar(200) DEFAULT NULL,
  `ThoiGian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `IDGioHang` char(12) NOT NULL,
  `IDSanPham` char(12) NOT NULL,
  `SoDienThoai` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`IDGioHang`, `IDSanPham`, `SoDienThoai`) VALUES
('1', '', 0),
('1', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `IDHangSX` int(12) NOT NULL,
  `TenHang` varchar(20) DEFAULT NULL,
  `SoDienThoaiHangSX` char(12) DEFAULT NULL,
  `EmailHangSX` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`IDHangSX`, `TenHang`, `SoDienThoaiHangSX`, `EmailHangSX`) VALUES
(1, 'ABC', '0123456789', 'abc@gmail.com'),
(2, 'DEF', '0123456788', 'def@gmail.com'),
(3, 'GHI', '0123456787', 'ghi@gmail.com'),
(4, 'KLM', '0123456786', 'klm@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonban`
--

CREATE TABLE `hoadonban` (
  `IDHoaDon` int(12) NOT NULL,
  `SoDienThoai` char(12) NOT NULL,
  `NgayBan` date NOT NULL,
  `NoiDung` varchar(50) NOT NULL,
  `PhuongThuc` varchar(50) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonban`
--

INSERT INTO `hoadonban` (`IDHoaDon`, `SoDienThoai`, `NgayBan`, `NoiDung`, `PhuongThuc`, `TrangThai`) VALUES
(3, '0905112113', '2023-06-03', 'Khách đặt hàng', '', 'Chờ xác nhận'),
(4, '0905112113', '2023-06-03', 'Khách đặt hàng', '', 'Chờ xác nhận'),
(5, '0905112113', '2023-06-03', 'Khách đặt hàng', 'Qua thẻ ATM', 'Chờ xác nhận'),
(6, '0905112113', '2023-06-03', 'Khách đặt hàng', 'Thanh toán khi nhận hàng', 'Chờ xác nhận'),
(7, '0905112113', '2023-06-04', 'Khách đặt hàng', 'Thanh toán khi nhận hàng', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `IDLoai` int(12) NOT NULL,
  `TenLoai` char(30) DEFAULT NULL,
  `MotaSanPham` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`IDLoai`, `TenLoai`, `MotaSanPham`) VALUES
(1, 'Thịt, Cá, Trứng, Hải Sản', NULL),
(2, 'Rau, Củ, Trái Cây', NULL),
(3, 'Kem, Thực Phẩm Đông Mát', NULL),
(4, 'Mỳ, Miến, Cháo, Phở', NULL),
(5, 'Gạo, Bột, Đồ Khô', NULL),
(6, 'Dầu Ăn, Nước Chấm, Gia Vị', NULL),
(7, 'Bia, Nước Giải Khát', NULL),
(8, 'Sữa Các Loại', NULL),
(9, 'Bánh Kẹo Các Loại', NULL),
(10, 'Chăm Sóc Bản Thân', NULL),
(11, 'Sản Phẩm Cho Mẹ Và Bé', NULL),
(12, 'Vệ Sinh Nhà Cửa', NULL),
(13, 'Đồ Dùng Gia Đình', NULL),
(14, 'Chăm Sóc Thú Cưng', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `IDLoaiTin` char(12) NOT NULL,
  `TenLoai` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `IDNhaCungCap` int(12) NOT NULL,
  `TenNhaCungCap` varchar(20) DEFAULT NULL,
  `DiaChiNhaCungCap` varchar(20) DEFAULT NULL,
  `SoDienThoaiNhaCungCap` char(12) DEFAULT NULL,
  `EmailNhaCungCap` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`IDNhaCungCap`, `TenNhaCungCap`, `DiaChiNhaCungCap`, `SoDienThoaiNhaCungCap`, `EmailNhaCungCap`) VALUES
(1, 'Nông Trại A', '33 Đồng Kè', '0123456789', 'nta@gmail.com'),
(2, 'Nông Trại B', '44 Đồng Kè', '0123456788', 'ntb@gmail.com'),
(3, 'Nông Trại C', '55 Đồng Kè', '0123456787', 'ntc@gmail.com'),
(4, 'Nông Trại D', '66 Đồng Kè', '0123456786', 'ntd@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaphang`
--

CREATE TABLE `nhaphang` (
  `IDSanPham` char(12) NOT NULL,
  `IDNhap` char(12) NOT NULL,
  `GiaNhap` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSanPham` int(12) NOT NULL,
  `TenSanPham` varchar(20) DEFAULT NULL,
  `IDLoai` int(12) NOT NULL,
  `IDHangSX` int(12) NOT NULL,
  `IDNhaCungCap` int(12) NOT NULL,
  `MoTaSanPham` varchar(500) DEFAULT NULL,
  `HinhAnhSanPham` varchar(200) NOT NULL,
  `TrangThai` bit(1) DEFAULT NULL,
  `giasp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `IDLoai`, `IDHangSX`, `IDNhaCungCap`, `MoTaSanPham`, `HinhAnhSanPham`, `TrangThai`, `giasp`) VALUES
(1, 'Thịt Ba Rọi Tươi', 1, 1, 1, 'Thịt heo xay khay 300g được xay sẵn sạch sẽ và tiện dùng vô cùng. Thịt heo xay là nguyên liệu không thể thiếu để nấu được nhiều món ăn thơm ngon, đầy đủ dưỡng chất cho cả nhà. Thịt xay CP có thể tham khảo món thịt xay nhồi cà chua, đậu hũ nhồi thịt,....', 'thitbaroi.png', b'1', 100),
(2, 'Thịt Ba Chỉ', 1, 1, 1, 'Thịt bò Mỹ Orifood là loại thịt bò đông lạnh nhập khẩu từ Mỹ được xem là lựa chọn hàng đầu cho các thực khách sành ăn. Thịt ba chỉ bò Mỹ Orifood King BBQ hộp 300g mang đến những thớ thịt săn chắc, vị ngọt, thơm và độ mềm lý tưởng, dễ dàng chế biến nhanh chóng trong các bữa tiệc.\r\n', 'thitbachi.jpg', b'1', 110),
(3, 'Ba Rọi CP Khai', 1, 1, 3, 'Thịt heo xay khay 300g được xay sẵn sạch sẽ và tiện dùng vô cùng. Thịt heo xay là nguyên liệu không thể thiếu để nấu được nhiều món ăn thơm ngon, đầy đủ dưỡng chất cho cả nhà. Thịt xay CP có thể tham khảo món thịt xay nhồi cà chua, đậu hũ nhồi thịt,....', 'baroicpkhay.jpg', b'1', 120),
(4, 'Bít Tết Đùi Bò Úc', 1, 1, 3, 'Thịt bò Mỹ Orifood là loại thịt bò đông lạnh nhập khẩu từ Mỹ được xem là lựa chọn hàng đầu cho các thực khách sành ăn. Thịt ba chỉ bò Mỹ Orifood King BBQ hộp 300g mang đến những thớ thịt săn chắc, vị ngọt, thơm và độ mềm lý tưởng, dễ dàng chế biến nhanh chóng trong các bữa tiệc.\r\n', 'bittetduibouc.jpg', b'1', 90),
(5, 'Cánh Gà CP Khai', 1, 4, 2, 'Cánh gà CP đạt các tiêu chuẩn về an toàn thực phẩm, đảm bảo về chất lượng, độ tươi và ngon, xuất xứ rõ ràng.. Thích hợp để nấu món cánh gà chiên nước mắm, gà rán, cánh gà kho,... Cánh gà tươi sạch, an toàn.', 'canhgacpkhay.jpg', b'1', 88),
(6, 'Chân Gà CP Khai', 1, 2, 3, 'Chân gà CP đạt các tiêu chuẩn về an toàn thực phẩm, đảm bảo về chất lượng, độ tươi và ngon, xuất xứ rõ ràng.. Thích hợp để nấu món chân gà chiên nước mắm, gà rán, chân gà kho,... chân gà tươi sạch, an toàn.', 'changacpkhay.jpg', b'1', 55),
(7, 'Cốt Lết Heo Ngon', 1, 3, 2, 'Cốt lết heo có xương G được đóng gói và bảo quản đạt các tiêu chuẩn về an toàn toàn thực phẩm. Bản thịt heo to, vân mỡ mỏng tạo độ béo nhẹ cho miếng thịt nên thường dùng để nướng, ram, chiên áp chảo.... Thịt heo G có thể dùng điện thoại quét mã QR trên tem sản phẩm để kiểm tra nguồn gốc.', 'cotletheocoxuong.jpg', b'1', 88),
(8, 'Đùi Gà Số 1', 1, 3, 4, 'Đùi gà CP đạt các tiêu chuẩn về an toàn thực phẩm, đảm bảo về chất lượng, độ tươi và ngon, xuất xứ rõ ràng.. Thích hợp để nấu món đùi gà chiên nước mắm, gà rán, đùi gà kho,... đùi gà tươi sạch, an toàn.', 'duigagoctucp.jpg', b'1', 78),
(9, 'Bắp Mỹ', 2, 3, 4, 'Bắp Mỹ là một loại thực phẩm được trồng rất nhiều ở khắp nơi trên thế giới. Đây là một loại quả vừa ngon, lại có rất nhiều chất khoáng chất và vitamin. Bắp có thể chế biến thành nhiều món ăn ngon như: cơm bắp, chè bắp, sữa bắp,... bất kỳ món gì cũng tạo nên hương vị tuyệt hảo.', 'bapmy.jpg', b'1', 30),
(10, 'Cà Chua Loại I', 2, 2, 4, 'Cà chua được trồng ở Lâm Đồng là loại rau củ rất tốt cho sức khoẻ của người sử dụng, loại rau củ này không những giúp bổ sung chất dinh dưỡng cần thiết cho cơ thể mà chúng có giúp làm đẹp da cho phái nữ. Cà chua có thể ăn sống hoặc chế biến các món ăn cũng rất ngon.', 'cachua.jpg', b'1', 12),
(11, 'Cải Bẹ Xanh', 2, 4, 3, 'Cải bẹ xanh baby được trồng bằng kỹ thuật canh tác chuyên biệt, có thời gian thu hoạch ngắn hơn 1 nửa so với thông thường, là rau non nên có độ giòn, ngọt hơn rất nhiều. Giữ được nguyên vẹn các giá trị dinh dưỡng,rất thích hợp dùng làm các món rau ăn kèm cho các món cuốn bánh tráng, bánh xèo,...', 'caibexanh.jpg', b'1', 11),
(12, 'Cải Thìa', 2, 1, 1, 'Cải thìa baby là giống rau được nuôi trồng và đóng gói theo những tiêu chuẩn nghiêm ngặt, bảo đảm các tiêu chuẩn xanh - sạch, chất lượng và an toàn với người dùng. Cải thìa nhỏ giòn ngọt, chứa nhiều chất xơ nên thường được dùng để luộc hoặc xào để giữ được độ tươi ngon nhất cho rau.', 'caithia.jpg', b'1', 15),
(13, 'Xà Lách Đà Lạt', 2, 3, 4, 'Rau xà lách lô lô xanh của Bách hóa Xanh được trồng tại Lâm Đồng và đóng gói theo những tiêu chuẩn nghiêm ngặt, bảo đảm các tiêu chuẩn xanh - sach. Xà lách lô lô nhiều chất xơ, hàm lượng dinh dưỡng cao, vị ngọt, giòn nên thường dùng làm rau ăn kèm cho các món cuốn', 'xalach.jpg', b'1', 19),
(14, 'Ớt hiểm cay', 2, 3, 3, 'Ớt hiểm có vị cay nồng, thơm, kích thích vị giác của người ăn, ớt là một trong những gia vị không thể thiếu trong nấu ăn cũng như mâm cơm của người Việt. Ớt hiểm luôn giữ được độ tươi mỗi ngày, được nuôi trồng theo quy trình nghiêm ngặt, bảo đảm các chỉ tiêu về an toàn và chất lượng.', 'ot.jpg', b'1', 5),
(15, 'Khoai Lang Lâm Đồng', 2, 1, 2, 'Khoai lang Nhật trồng tại Lâm Đồng là món ăn được rất nhiều người yêu thích, được trồng và có củ quanh năm, ngon nhất là khi được nướng lên trên một bếp than đổ hồng. Khoai lang Nhật có vị ngọt ngào như mật, tan tan trên đầu lưỡi, chứa nhiều vitamin A, B, C và nhiều khoáng chất cần thiết', 'khoailang.jpg', b'1', 18),
(16, 'Bắp Cải Tím', 2, 3, 2, 'Bắp cải tím là một loại rau vô cùng quen thuộc, có màu sắc vô cùng bắt mắt, rất dễ mua và chế biến thành nhiều món ăn đa dạng khác nhau trong bữa cơm hằng ngày. Bắp cải tím được trồng tại Lâm Đồng, đặc biệt mang đến lợi ích trong việc hỗ trợ phòng chống ung thư, giúp cơ thể khỏe mạnh toàn diện.', 'bapcaitim.jpg', b'1', 14),
(17, 'Bánh Xếp Hàn Quốc', 3, 1, 1, 'Há cảo, sủi cảo Bibigo là một trong những thương hiệu nổi tiếng nhất của Hàn Quốc về các loại bánh xếp Mandu. Bánh xếp Hàn Quốc nhân thịt Bibigo 350g có size vừa ăn với vỏ bánh mỏng hình gợn sóng, bọc bên trong là phần nhân thơm ngọt được làm từ những loại nguyên liệu tự nhiên, an toàn cho sức khoẻ.', 'banhxep.jpg', b'1', 14),
(18, 'Ba Rọi Xông Khói', 3, 1, 4, 'Là loại sản phẩm cao cấp đến từ thương hiệu thịt nguội Le Gourmet quen thuộc. Ba rọi xông khói xắt lát Le Gourmet gói 200g được chế biến từ thịt heo ba rọi tươi ngon. Thịt nguội là lựa chọn hàng đầu khi không có quá nhiều thời gian chế biến cho bữa ăn gia đình.', 'baroixongkhoi.png', b'1', 27),
(19, 'Chả Giò', 3, 4, 3, 'Chả giò Cầu Tre là thương hiệu không thể bỏ qua khi nhắc đến các món chả giò, chả ram chất lượng được chế biến từ những nguyên liệu tươi ngon. Chả giò đặc biệt hải sản Cầu Tre 500g mang đến những cuốn chả giò giòn rụm cùng với phần nhân hải sản tươi ngon, đầy dưỡng chất.', 'chagio.png\r\n', b'1', 29),
(20, 'Kem Dâu', 3, 1, 4, 'Sản phẩm đến từ thương hiệu kem iberri quen thuộc, mang đến sự kết hợp giữa nhiều hương vị. Kem dâu Iberri hộp 250g với hương thơm tươi mới nồng nàn đặc trưng của dâu tây thơm ngon, mang lại cảm giác sảng khoái khi thưởng thức một hộp kem mát lạnh giữa thời tiết nóng bức.', 'kemdau.jpg', b'1', 15),
(21, 'Kem Socola', 3, 3, 2, 'Sản phẩm đến từ thương hiệu kem iberri quen thuộc, mang đến sự kết hợp giữa nhiều hương vị. Kem socola Iberri hộp 250g với sự kết hợp của nhiều loại trái cây nhiệt đới, mang lại cảm giác sảng khoái khi thưởng thức một que kem mát lạnh giữa thời tiết nóng bức.', 'kemsocola.jpg', b'1', 15),
(22, 'Lạp Xưởng', 3, 1, 4, 'Lạp xưởng được chế biến an toàn, sạch sẽ mang đến sản phẩm thơm ngon, màu sắc đẹp mắt. Lạp xưởng vị tiêu truyền thống G Kitchen gói 200g có thể chiên, nướng, hấp, ăn trực tiếp hoặc ăn kèm cơm, xôi, củ kiệu,...Lạp xưởng G Kitchen chất lượng, thơm ngon, hấp dẫn và tiện lợi cho người dùng.', 'lapxuong.png', b'1', 40),
(23, 'Xúc Xích ', 3, 2, 4, 'Xúc Xích được chế biến an toàn, sạch sẽ mang đến sản phẩm thơm ngon, màu sắc đẹp mắt. Xúc Xích vị tiêu truyền thống G Kitchen gói 200g có thể chiên, nướng, hấp, ăn trực tiếp hoặc ăn kèm cơm, xôi, củ kiệu,...Xúc Xích G Kitchen chất lượng, thơm ngon, hấp dẫn và tiện lợi cho người dùng.', 'xucxich.jpg', b'1', 33),
(24, 'Xủi Cảo', 3, 2, 3, 'Há cảo, sủi cảo Bibigo là một trong những thương hiệu nổi tiếng nhất của Hàn Quốc về các loại bánh xếp Mandu. Bánh xếp Hàn Quốc nhân thịt Bibigo 350g có size vừa ăn với vỏ bánh mỏng hình gợn sóng, bọc bên trong là phần nhân thơm ngọt được làm từ những loại nguyên liệu tự nhiên, an toàn cho sức khoẻ.', 'xuicao.png', b'1', 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Password1` char(30) DEFAULT NULL,
  `TenKhachHang` varchar(20) DEFAULT NULL,
  `DiaChi` varchar(200) DEFAULT NULL,
  `SoDienThoai` char(12) NOT NULL,
  `Email` char(30) DEFAULT NULL,
  `Phanquyen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Password1`, `TenKhachHang`, `DiaChi`, `SoDienThoai`, `Email`, `Phanquyen`) VALUES
('ngocngu123', 'Lê Tiến Ngọc', '196 Âu Cơ, Hòa Khánh Bắc, Liên Chiểu, Đà Nẵng', '0905112113', 'ngocngu@gmail.com', 0),
('thanhtam11', '', '144 Ngô Quyền, An Hải, Sơn Trà, Đà Nẵng', '0905113114', 'thanhtam11@gmail.com', 0),
('haongu33', '', '', '0905114115', '', 0),
('conganh212', '', '143 Nguyễn Lương Bằng', '0905115116', 'conganh212@gmail.com', 0),
('admin123', 'Admin', '-------', '0905709480', 'a@gmail.com', 1),
('1234', 'Ngọc Trịnh', '79 Đồng Kè, Hòa Khánh Bắc, Liên Chiểu, Đà Nẵng', '123456', 'ngoctrinh11@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `IDTinTuc` char(12) NOT NULL,
  `IDLoaiTin` char(12) DEFAULT NULL,
  `NoiDungTin` varchar(200) DEFAULT NULL,
  `NgayDang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tonkho`
--

CREATE TABLE `tonkho` (
  `IDSanPham` char(12) NOT NULL,
  `SoLuongTon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatnhapsp`
--

CREATE TABLE `xuatnhapsp` (
  `IDXuatNhap` char(12) NOT NULL,
  `IDSanPham` char(12) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `SoLuongNhap` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`IDChiTiet`),
  ADD KEY `FK_CTSP_SP` (`IDSanPham`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `FK_CTHD_SP` (`IDSanPham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD KEY `danhgia` (`IDSanPham`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`IDHangSX`);

--
-- Chỉ mục cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`IDHoaDon`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`IDLoai`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`IDLoaiTin`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`IDNhaCungCap`);

--
-- Chỉ mục cho bảng `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD PRIMARY KEY (`IDSanPham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSanPham`),
  ADD KEY `fk_hsx` (`IDHangSX`) USING BTREE,
  ADD KEY `FK_SP_NCC` (`IDNhaCungCap`) USING BTREE,
  ADD KEY `idloaisp` (`IDLoai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`SoDienThoai`) USING HASH;

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`IDTinTuc`),
  ADD KEY `FK_TT_LT` (`IDLoaiTin`);

--
-- Chỉ mục cho bảng `tonkho`
--
ALTER TABLE `tonkho`
  ADD PRIMARY KEY (`IDSanPham`);

--
-- Chỉ mục cho bảng `xuatnhapsp`
--
ALTER TABLE `xuatnhapsp`
  ADD PRIMARY KEY (`IDXuatNhap`),
  ADD KEY `FK_XN_SP` (`IDSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `IDHoaDon` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `IDHoaDon` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `IDLoai` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `IDNhaCungCap` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSanPham` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `idhangsx` FOREIGN KEY (`IDHangSX`) REFERENCES `hangsx` (`IDHangSX`),
  ADD CONSTRAINT `idloaisp` FOREIGN KEY (`IDLoai`) REFERENCES `loaisanpham` (`IDLoai`),
  ADD CONSTRAINT `idnhacc` FOREIGN KEY (`IDNhaCungCap`) REFERENCES `nhacungcap` (`IDNhaCungCap`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `FK_TT_LT` FOREIGN KEY (`IDLoaiTin`) REFERENCES `loaitin` (`IDLoaiTin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
