-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2023 at 04:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuahangonline`
--

-- --------------------------------------------------------
USE cuahangonline;
--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `image`, `status`, `slug`) VALUES
(11, 'Dell', 'Thương hiệu DELL', '1696587334Dell_Logo_svg.png', 1, 'dell'),
(12, 'HP', 'Thương hiệu HP', '16965873602048px-HP_logo_2012_svg.png', 1, 'hp'),
(13, 'Samsung', 'Thương hiệu Samsung', '1696587395Samsung_Logo_svg.png', 1, 'samsung'),
(14, 'Xiaomi', 'Thương hiệu Xiaomi', '1696587430Xiaomi_logo_svg.png', 1, 'xiaomi'),
(15, 'Apple', 'Thương hiệu APPLE', '16965874521685279753620.png', 1, 'apple');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `image`, `slug`) VALUES
(7, 'Laptop', 'Danh mục laptop', 1, '1696588558360_F_249825007_f5dzNTBuUZoV5nERUWTlPDoU3cvLIBzn.jpg', 'laptop'),
(8, 'Smartphone', 'Danh mục smartphone', 1, '1696588582download.png', 'smartphone'),
(9, 'Smartwatch', 'Danh mục smartwatch', 1, '1696588635images.png', 'smartwatch');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(355) NOT NULL,
  `status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dated` varchar(50) DEFAULT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(13, 'BlueSoul123', 'email1@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '123'),
(14, 'BlueSoul', 'bnvtoi5@gmail.com', '202cb962ac59075b964b07152d234b70', '1234', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(50) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `category_id`, `brand_id`, `slug`, `quantity`, `price`, `stars`) VALUES
(20, 'Galaxy Watch6 (Bluetooth, 40mm)', 'Màn hình tròn lớn trên cổ tay Hình thành thói quen ngủ lành mạnh Nhận thông tin chuyên sâu chi tiết về cơ thể và sức khỏe', '1696589161Screenshot-2023-10-06-at-17_44_31.png', 1, 9, 13, 'galaxy-watch-6-bluetooth-40mm', 50, 6990000, 0),
(21, 'Galaxy Watch6 Classic (Bluetooth, 43mm)', 'Cuộn mượt mà, trực quan. Bạn có thể quay theo bất kỳ cách nào Theo dõi các bài tập để đạt được kết quả tốt nhất Hiểu rõ thói quen của bạn để cải thiện giấc ngủ', '1696589282Screenshot-2023-10-06-at-17_46_53.png', 1, 9, 13, 'galaxy-watch-6-classic-bluetooth-43mm', 90, 8990000, 0),
(22, 'Galaxy Watch5 Pro Bluetooth (45mm)', 'Tính năng theo dõi tuyến đường GPS hướng dẫn đường đi từng chặng cho người đạp xe và đi bộ đường dài. Dung lượng pin khủng nhất ở thiết bị đeo tay cho hoạt động ngoài trời. Đạt được mục tiêu sức khỏe của bạn bằng cách đo thành phần cơ thể với cảm biến Samsung BioActive Sensor.', '1696589417Screenshot-2023-10-06-at-17_49_17.png', 1, 9, 13, 'galaxy-watch-5-pro-bluetooth-45mm', 40, 9990000, 0),
(23, 'IPhone 15 Pro', 'iPhone 15 Pro Max là chiếc iPhone cao cấp nhất với màn hình lớn nhất, thời lượng pin tốt nhất, cấu hình mạnh nhất và thiết kế khung Titan chuẩn hàng không vũ trụ siêu bền, siêu nhẹ. iPhone 15 Pro Max sở hữu những điểm vượt trội nhất nhà Apple. Theo đó, người dùng sẽ trải nghiệm chiếc iPhone cao cấp với hiệu năng “khủng” chip A17 Pro, khung titan, khả năng zoom nâng cấp, nút tác vụ mới,…', '16965896561349547788.jpeg', 1, 8, 15, 'iphone-15-pro', 70, 36500000, 0),
(24, 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max đem đến những trải nghiệm không thể tìm thấy trên mọi thế hệ iPhone trước đó với màu Tím Deep Purple sang trọng, camera 48MP lần đầu xuất hiện, chip A16 Bionic và màn hình “viên thuốc” Dynamic Island linh hoạt, nịnh mắt.', '169658976416632365567975.jpg', 1, 8, 15, 'iphone-14-pro-max-128gb', 55, 25990000, 0),
(25, 'iPhone 13 mini 128GB', 'iPhone 13 mini là chiếc điện thoại dành cho những ai yêu thích sự nhỏ gọn. Với một kiểu dáng dễ thương, nằm gọn trong bàn tay hay túi quần của bạn, iPhone 13 mini còn gây bất ngờ hơn nữa với sức mạnh đáng kinh ngạc, màn hình OLED siêu nét và camera nhiếp ảnh chuyên nghiệp.', '1696589888Screenshot-2023-10-06-at-17_57_24.png', 1, 8, 15, 'iphone-13-mini-128gb', 20, 18990000, 0),
(26, 'iPhone 12 64GB', 'iPhone 12 ra mắt với vai trò mở ra một kỷ nguyên hoàn toàn mới. Tốc độ mạng 5G siêu tốc, bộ vi xử lý A14 Bionic nhanh nhất thế giới smartphone, màn hình OLED tràn cạnh tuyệt đẹp và camera siêu chụp đêm, tất cả đều có mặt trên điện thoại iPhone 12.', '1696589980Screenshot-2023-10-06-at-17_59_26.png', 1, 8, 15, 'iphone-12-64gb', 80, 13490000, 0),
(27, 'iPhone 11 64GB', 'Điện thoại iPhone 11 với 6 phiên bản màu sắc, camera có khả năng chụp ảnh vượt trội, thời lượng pin cực dài và bộ vi xử lý mạnh nhất từ trước đến nay sẽ mang đến trải nghiệm tuyệt vời dành cho bạn.', '1696590058Screenshot-2023-10-06-at-18_00_33.png', 1, 8, 15, 'iphone-11-64gb', 12, 10190000, 0),
(28, 'IPhone 8 plus 64gb', 'Điện thoại iPhone 8 kết hợp giữa những đường nét đã làm nên chuẩn mực, thương hiệu với sự thời thượng và hiện đại của mặt lưng phủ kính cường lực thay vì nguyên khối kim loại. Điểm thiết kế này mang lại độ bóng bẩy, đẹp mắt hơn cho sản phẩm.', '1696590221iphone8-plus-silver-select-2018_6_3.png', 1, 8, 15, 'iphone-8-plus-64gb', 78, 5290000, 0),
(29, 'IPhone X 64GB', 'iPhone X 64 GB là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.', '1696590355iphone-x-64gb-bac-org.png', 1, 8, 15, 'iphone-x-64gb', 10, 8290000, 0),
(30, 'IPhone 9 không tồn tại', 'Đây là một sản phẩm tin đồn không tồn tại', '1696590469iphone-9-plus-600x600-600x600.jpg', 1, 8, 15, 'iphone-9-khong-ton-tai', 999, 12900000, 0),
(31, 'Laptop Dell Inspiron 14 5430', '- CPU: Intel Core i7-1360P - Màn hình: 14', '1696591356Screenshot-2023-10-06-at-18_21_57.png', 1, 7, 11, 'laptop-dell-inspiron-14-5430', 100, 31490000, 0),
(32, 'Laptop Dell Vostro 3430', 'CPU: Intel Core i3-1305U - Màn hình: 14\" IPS (1920 x 1080) - RAM: 1 x 8GB DDR4 2666MHz - Đồ họa: Onboard Intel UHD Graphics - Lưu trữ: 256GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 - Pin: 3 cell Pin liền - Khối lượng: 1.5kg', '1696591489Screenshot-2023-10-06-at-18_24_29.png', 1, 7, 11, 'laptop-dell-vostro-3430', 90, 13490000, 0),
(33, 'Laptop Dell XPS 13 Plus 9320', 'CPU: Intel Core i7-1360P - Màn hình: 13.4\" WVA (3456 x 2160) - RAM: 16GB Onboard LPDDR5 6400MHz - Đồ họa: Onboard Intel Iris Xe Graphics - Lưu trữ: 512GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 - Pin: 3 cell 55 Wh Pin liền - Khối lượng: 1.3kg - Chuẩn Intel EVO', '1696591589Screenshot-2023-10-06-at-18_26_04.png', 1, 7, 11, 'laptop-dell-inspiron-13-9320', 50, 61990000, 0),
(34, 'Laptop Dell Vostro 16 5630', 'CPU: Intel Core i7-1360P - Màn hình: 16\" WVA (1920 x 1200) - RAM: 16GB Onboard LPDDR5 4800MHz - Đồ họa: RTX 2050 4GB GDDR6 / Intel Iris Xe Graphics - Lưu trữ: 512GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 - Pin: 4 cell 54 Wh Pin liền - Khối lượng: 1.8kg - Chuẩn Non-EVO', '1696591671Screenshot-2023-10-06-at-18_27_42.png', 1, 7, 11, 'laptop-dell-vostro-16-5630', 70, 29890000, 0),
(35, 'Laptop Dell Inspiron 14 T7420 N4I5021W', 'CPU: Intel Core i5-1235U - Màn hình: 14\" WVA (1920 x 1200) - RAM: 1 x 8GB DDR4 3200MHz - Đồ họa: Onboard Intel Iris Xe Graphics - Lưu trữ: 512GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 - Pin: 4 cell 54 Wh Pin liền - Khối lượng: 1.6kg - Chuẩn Non-EVO', '1696591776Screenshot-2023-10-06-at-18_29_27.png', 1, 7, 11, 'laptop-dell-inspiron-14-T7420-N4I5021W', 30, 24890000, 0),
(36, 'Laptop HP Pavilion 15-eg3091TU - 8C5L2PA', 'CPU: Intel Core i7-1355U - Màn hình: 15.6\" IPS (1920 x 1080) - RAM: 2 x 8GB DDR4 3200MHz - Đồ họa: Onboard Intel Iris Xe Graphics - Lưu trữ: 512GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home SL - Pin: 3 cell 41 Wh Pin liền - Khối lượng: 1.7kg', '1696591908Screenshot-2023-10-06-at-18_30_52.png', 1, 7, 12, 'laptop-hp-pavilion-15-eg3091TU-8C5L2PA', 60, 25290000, 0),
(37, 'Laptop HP ProBook 450 G10 - 873J7PA', 'CPU: Intel Core i5-1340P - Màn hình: 15.6\" IPS (1920 x 1080) - RAM: 1 x 16GB DDR4 3200MHz - Đồ họa: Onboard Intel Iris Xe Graphics - Lưu trữ: 512GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home SL - Pin: 3 cell 51 Wh Pin liền - Khối lượng: 1.8kg', '1696592006Screenshot-2023-10-06-at-18_32_03.png', 1, 7, 12, 'laptop-hp-probook-450-G10-873J7PA', 40, 22890000, 0),
(38, 'Laptop HP Victus 16-r0127TX - 8C5N2PA', 'CPU: Intel Core i7-13700H - Màn hình: 16.1\" IPS (1920 x 1080),144Hz - RAM: 2 x 8GB DDR5 5200MHz - Đồ họa: RTX 4060 8GB GDDR6 / Intel Iris Xe Graphics - Lưu trữ: 512GB SSD M.2 NVMe / - Hệ điều hành: Windows 11 Home - Pin: 4 cell 70 Wh Pin liền - Khối lượng: 2.3kg', '1696592119Screenshot-2023-10-06-at-18_34_31.png', 1, 7, 12, 'laptop-hp-victus-16-r0127tx-8c5n2pa', 20, 36990000, 0),
(39, 'Xiaomi Redmi Watch 3 Active', 'Xiaomi Redmi Watch 3 Active được thiết kế theo phong cách hiện đại, cả nam lẫn nữ đeo đều đẹp. Đồng hồ thông minh cũng được Xiaomi tích hợp nhiều tính năng từ sức khỏe đến thể thao để người dùng chăm sóc cơ thể một cách khoa học và hiệu quả hơn.', '1696597031Screenshot-2023-10-06-at-19_56_01.png', 1, 9, 14, 'xiaomi-redmi-watch-3-active', 37, 1290000, 0),
(40, 'Mi Band 8', 'Thương hiệu “smartband quốc dân” vừa cho ra mắt thế hệ sản phẩm tiếp theo của mình mang tên Mi Band 8, với nhiều tính năng theo dõi sức khỏe, hỗ trợ luyện tập cùng vô vàn tiện ích hằng ngày, đáp ứng tốt mọi nhu cầu sử dụng cơ bản của người dùng.', '1696597186Screenshot-2023-10-06-at-19_59_19.png', 1, 9, 14, 'mi-band-8', 87, 890000, 0),
(41, 'Xiaomi Redmi Band 2', 'Vòng đeo tay thông minh Xiaomi Redmi Band 2 một thiết bị đeo nhỏ gọn, bất kỳ ai cũng có thể sử dụng. Sản phẩm sở hữu thiết kế hiện đại, đa dạng các tính năng sức khỏe, chế độ luyện tập, khả năng kết nối ổn định, thời lượng pin kéo dài,... sẵn sàng đồng hành cùng người dùng trong mọi trường hợp.', '1696597278Screenshot-2023-10-06-at-20_01_06.png', 1, 9, 14, 'xiaomi-redmi-band-2', 67, 540000, 0),
(42, 'Xiaomi Redmi Watch 3 42.6mm', 'Tầm giá chưa đến 3 triệu đồng thì một chiếc smartwatch vừa có nghe gọi vừa được trang bị GPS độc lập khá hiếm thấy nhưng gần đây Xiaomi đã cho ra mắt sản phẩm đồng hồ thông minh Xiaomi Redmi Watch 3 có cả hai tính năng trên. Bên cạnh đó còn được trang bị nhiều tính năng hỗ trợ theo dõi sức khỏe và luyện tập phục vụ cho người dùng.', '1696597360Screenshot-2023-10-06-at-20_02_30.png', 1, 9, 14, 'xiaomi-redmi-watch-3-426mm', 23, 2390000, 0),
(43, 'Xiaomi Watch S1 46.5mm', 'Xiaomi Watch S1 là chiếc smartwatch mới nhất được nhà Xiaomi cho ra mắt, với diện mạo vô cùng thanh lịch được nâng cấp về mặt thiết kế cũng như tính năng so với thế hệ trước.', '1696597429Screenshot-2023-10-06-at-20_03_34.png', 1, 9, 14, 'xiaomi-watch-s1-465mm', 754, 2990000, 0),
(44, 'MacBook Air 13 inch M1 2020 8CPU 7GPU 8GB/256GB', 'Chiếc MacBook Air có hiệu năng đột phá nhất từ trước đến nay đã xuất hiện. Bộ vi xử lý Apple M1 hoàn toàn mới đưa sức mạnh của MacBook Air M1 13 inch 2020 vượt xa khỏi mong đợi người dùng, có thể chạy được những tác vụ nặng và thời lượng pin đáng kinh ngạc.', '1696597567Screenshot-2023-10-06-at-20_05_09.png', 1, 7, 15, 'macbook-air-13-inch-m1-2020-8cpu-7gpu-8gb256gb', 78, 19190000, 0),
(45, 'MacBook Pro 14 inch M2 Pro 2023 10CPU 16GPU 32GB/512GB', 'Bản nâng cấp 32GB RAM sẽ trao cho MacBook Pro 14 2023 nguồn sức mạnh tuyệt vời để dễ dàng đa nhiệm mọi tác vụ nặng và đòi hỏi cấu hình chuyên nghiệp nhất. Dung lượng RAM rộng rãi tạo điều kiện cho chip xử lý M2 Pro giải phóng được toàn bộ hiệu năng ẩn chứa, đem lại trải nghiệm vượt quá kỳ vọng của bạn.', '1696597667Screenshot-2023-10-06-at-20_07_27.png', 1, 7, 15, 'macbook-pro-14-inch-m2-pro-2023-10cpu-16gpu-32gb512gb', 25, 58490000, 0),
(46, 'MacBook Air 15 inch M2 2023 8CPU 10GPU 8GB/256GB', 'MacBook Air M2 2023 giờ đây sẽ mở ra trải nghiệm hình ảnh rộng lớn hơn khi gia tăng kích cỡ màn hình Liquid Retina lên ngưỡng 15 inch ấn tượng. Độ tương thích tuyệt đối giữa chip M2 và nền tảng macOS đem lại trải nghiệm mượt mà và chuyên nghiệp nhất, giúp phản hồi cực nhanh mọi tác vụ của bạn.', '1696597741Screenshot-2023-10-06-at-20_08_07.png', 1, 7, 15, 'macbook-air-15-inch-m2-2023-8cpu-10gpu-8gb256gb', 36, 31490000, 0),
(47, 'Samsung Galaxy Z Flip5 5G 256GB', 'Samsung Galaxy Z Flip5 đã chính thức ra mắt vào ngày 26 tháng 7. Đây là một chiếc điện thoại thông minh có thiết kế độc đáo với màn hình gập, được trang bị bộ vi xử lý cao cấp Snapdragon 8 Gen 2 for Galaxy, RAM 8 GB, bộ nhớ trong 256 GB, camera kép 12 MP và pin 3700 mAh.', '1696597887samsung-galaxy-z-flip5-xanh-mint-thumb-600x600.jpg', 1, 8, 13, 'samsung-galaxy-z-flip5-5g-256gb', 72, 21990000, 0),
(48, 'Samsung Galaxy Z Fold5 5G 512GB', 'Samsung Galaxy Z Fold5 5G 512GB cũng đã chính thức ra mắt vào tháng 07/2023 với sự bứt phá mạnh mẽ, mở ra những trải nghiệm linh hoạt mới mẻ thông qua khả năng gập độc đáo, màn hình lớn sắc nét, hiệu năng vượt trội cho khả năng đa nhiệm tối ưu và cùng nhiều tính năng hấp dẫn khác đáp ứng những yêu cầu cao hơn từ người dùng.', '1696598047Screenshot-2023-10-06-at-20_13_55.png', 1, 8, 13, 'samsung-galaxy-z-fold5-5g-512gb', 53, 40990000, 0),
(49, 'Samsung Galaxy A14 4GB', 'Samsung Galaxy A14 4GB là chiếc điện thoại mới thuộc dòng A, được ra mắt tại thị trường Việt Nam vào tháng 03/2023 và được định hình là mẫu điện thoại thuộc phân khúc giá rẻ. Với mức giá phù hợp, máy là sự lựa chọn tuyệt vời cho học sinh và sinh viên khi được trang bị vi xử lý Exynos 850 và màn hình Full HD+ chất lượng cao.', '1696598121Screenshot-2023-10-06-at-20_14_31.png', 1, 8, 13, 'samsung-galaxy-a14-4gb', 55, 3590000, 0),
(50, 'Samsung Galaxy A23 6GB', 'Được Samsung cho ra mắt vào 03/2022 - Samsung Galaxy A23 6GB có một thiết kế trẻ trung cùng bộ thông số kỹ thuật khá ấn tượng trong tầm giá, đáp ứng nhu cầu sử dụng cả ngày một cách ổn định nhờ trang bị chipset đến từ nhà Qualcomm và một viên pin dung lượng khủng.', '1696598192Screenshot-2023-10-06-at-20_15_46.png', 1, 8, 13, 'samsung-galaxy-a23-6gb', 32, 4690000, 0),
(51, 'Samsung Galaxy A04 (4GB/64GB)', 'Nếu bạn đang tìm kiếm một chiếc điện thoại giá rẻ nhưng vẫn đáp ứng tốt nhu cầu sử dụng cơ bản hằng ngày, Samsung Galaxy A04 (4GB/64GB) với màn hình kích thước lớn, camera 50 MP sắc nét và viên pin lên đến 5000 mAh, sẽ mang đến cho bạn trải nghiệm sử dụng hài lòng.', '1696598278Screenshot-2023-10-06-at-20_17_01.png', 1, 8, 13, 'samsung-galaxy-a04-4gb64gb', 67, 2590000, 0),
(52, 'Xiaomi Redmi Note 12 Pro 5G', 'Xiaomi Redmi Note 12 Pro sở hữu cấu hình vượt trội gồm chip MediaTek Dimensity 1080, hệ thống ba camera với cảm biến chính 50MP và mạng 5G. Ngoài ra, màn hình Note 12 Pro 5G có kích thước khá lớn khoảng 6.67 inch, tấm nền AMOLED, tần số quét 120Hz khiến chiếc điện thoại nổi bật trong tầm giá dưới 8 triệu.', '1696598423Screenshot-2023-10-06-at-20_19_20.png', 1, 8, 14, 'xiaomi-redmi-note-12-pro-5g', 28, 8490000, 0),
(53, 'Xiaomi Redmi Note 12 8GB 128GB', 'Xiaomi Redmi Note 12 8GB 128GB tỏa sáng với diện mạo viền vuông cực thời thượng cùng hiệu suất mạnh mẽ nhờ sở hữu con chip Snapdragon 685 ấn tượng. Chất lượng hiển thị hình ảnh của Redmi Note 12 Vàng cũng khá sắc nét thông qua tấm nền AMOLED 120Hz hiện đại. Chưa hết, máy còn sở hữu cụm 3 camera với độ rõ nét lên tới 50MP cùng viên pin 5000mAh và s ạc nhanh 33W giúp đáp ứng được mọi nhu cầu sử dụng của người dùng.', '1696598529Screenshot-2023-10-06-at-20_21_27.png', 1, 8, 14, 'xiaomi-redmi-note-12-8gb-128gb', 16, 4990000, 0),
(54, 'Xiaomi Redmi Note 12 4GB 128GB', 'Xiaomi Redmi Note 12 sở hữu màn hình Super AMOLED với tần số quét 120Hz giúp trải nghiệm chạm vuốt diễn ra mượt mà, camera AI 50MP chất lượng. Bên cạnh đó, điện thoại sẽ được chạy trên con chip Qualcomm Snapdragon 685 kết hợp với card đồ họa GPU Qualcomm Adreno 610 mang lại trải nghiệm dùng ổn định. Điện thoại Xiaomi Redmi Note 12 mang lại thời gian sử dụng vượt trội với viên pin 5000mAh cùng sạc nhanh công suất 33W.', '1696598610Screenshot-2023-10-06-at-20_22_58.png', 1, 8, 14, 'xiaomi-redmi-note-12-4gb-128gb', 22, 4290000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `method` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `email`, `address`, `phone`, `method`) VALUES
(21, 'BlueSoul', 'email1@gmail.com', '123', '123', 'cod'),
(22, 'BlueSoul123', 'email1@gmail.com', '123', '123', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `email`) VALUES
(1, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 1, 'admin1@gmail.com'),
(2, 'admin2', '202cb962ac59075b964b07152d234b70', 1, 'admin2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_id` (`ship_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ship_id`) REFERENCES `shipping` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
