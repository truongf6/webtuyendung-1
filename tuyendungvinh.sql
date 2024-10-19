-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 19, 2024 lúc 08:39 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuyendungvinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_categories_id` bigint UNSIGNED NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `slug`, `thumb`, `description`, `position`, `location`, `requirements`, `type`, `job_categories_id`, `salary`, `Experience`, `gender`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 3, 'công việc 1', 'cong-viec-1', 'cong-viec-1.jpg', '<h3 style=\"text-align:justify;\">\n<strong>Tiêu đề</strong>\n</h3>\n<p style=\"text-align:justify;\">Một số tiêu chuẩn cơ bản khi tạo tiêu đề cho <strong>bảng mô tả công việc</strong>:</p>\n<ul>\n<li>Thể hiện vai trò của vị trí ứng tuyển một cách rõ ràng, dễ hình dung</li>\n<li>Tiêu đề ngắn gọn</li>\n<li>Tiêu đề có từ khóa được tối ưu trên công cụ tìm kiếm để tăng khả năng tiếp cận</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Mô tả vị trí</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là phần nội dung giới thiệu tổng quan về doanh nghiệp và vị trí cần tuyển. Vì thế, bạn phải đảm bảo:</p>\n<ul>\n<li>Có tên công ty</li>\n<li>Giới thiệu ngắn gọn về sản phẩm, thị trường, môi trường làm việc</li>\n<li>Mục tiêu của vị trí đang tuyển dụng</li>\n<li>Một, hai điểm chính mà nhà tuyển dụng kỳ vọng ở ứng viên, thường nhắc về tính cách, kỹ năng đặc biệt</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Nhiệm vụ</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là nội dung quan trọng nhất trong <strong>bảng mô tả công việc</strong>. Do đó, ngoài việc càng chi tiết càng tốt, một số điều nhà tuyển dụng cần lưu ý là:</p>\n<ul>\n<li>Chi tiết và rõ ràng, không nên dài dòng hay quá phức tạp</li>\n<li>Phân rõ những nhiệm vụ mà vị trí này đảm nhiệm</li>\n<li>Với một số chức vụ cấp cao, phần nhiệm vụ có thể chia theo từng thời kỳ hay từng kỹ năng cụ thế. Điều này giúp ứng viên càng dễ hình dung và đo lường độ phù hợp</li>\n</ul>\n<p>\n<img src=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg\" alt=\"nêu rõ các đề mục trách nhiệm của vị trí\" srcset=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg 800w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-300x218.jpg 300w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-768x559.jpg 768w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-16x12.jpg 16w\" sizes=\"100vw\" width=\"800\">\n</p>\n<p>\n<i>Bảng mô tả công việc cần nêu rõ các đề mục trách nhiệm của vị trí</i>\n</p>', 'Kỹ thuật viên', 'tòa nhà A', '<h3 style=\"text-align:justify;\">\n<strong>Yêu cầu</strong>\n</h3>\n<p style=\"text-align:justify;\">Dựa vào yêu cầu, ứng viên biết mình có đủ năng lực trước khi ứng tuyển vào vị trí hay không. Thông thường nội dung này sẽ bao gồm:</p>\n<ul>\n<li>Nhân khẩu học: giới tính, độ tuổi, học vấn nếu vị trí yêu cầu</li>\n<li>Số năm kinh nghiệm</li>\n<li>Yêu cầu về kiến thức, chuyên môn</li>\n<li>Yêu cầu về kỹ năng sử dụng công cụ hay nghiệp vụ cụ thể</li>\n<li>Yêu cầu về địa điểm làm việc, các thiết bị bổ trợ</li>\n<li>Yêu cầu về tố chất</li>\n</ul>\n<p style=\"text-align:justify;\">Đây là nội dung để nhà tuyển dụng thuyết phục ứng viên gia nhập tổ chức sau khi họ nhận thấy sự phù hợp từ phần nhiệm vụ và yêu cầu.</p>\n<ul>\n<li>Lương, thưởng và chế độ đãi ngộ dành cho vị trí</li>\n<li>Các phúc lợi đi kèm</li>\n<li>Thời gian làm việc, môi trường văn phòng</li>\n<li>Cơ hội khác về thăng tiến, rèn luyện, phát triển</li>\n</ul>', 'Full Time', 3, '2000k - 4000k VNĐ', '2-3 năm', 'Nam', '2024-10-17 17:00:00', '2024-10-19 07:27:45', '2024-10-19 07:27:45'),
(6, 2, 'Tuyển nhân viên sửa máy tính', 'tuyen-nhan-vien-sua-may-tinh', 'tuyen-nhan-vien-sua-may-tinh.jpg', '<h3 style=\"text-align:justify;\">\n<strong>Tiêu đề</strong>\n</h3>\n<p style=\"text-align:justify;\">Một số tiêu chuẩn cơ bản khi tạo tiêu đề cho <strong>bảng mô tả công việc</strong>:</p>\n<ul>\n<li>Thể hiện vai trò của vị trí ứng tuyển một cách rõ ràng, dễ hình dung</li>\n<li>Tiêu đề ngắn gọn</li>\n<li>Tiêu đề có từ khóa được tối ưu trên công cụ tìm kiếm để tăng khả năng tiếp cận</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Mô tả vị trí</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là phần nội dung giới thiệu tổng quan về doanh nghiệp và vị trí cần tuyển. Vì thế, bạn phải đảm bảo:</p>\n<ul>\n<li>Có tên công ty</li>\n<li>Giới thiệu ngắn gọn về sản phẩm, thị trường, môi trường làm việc</li>\n<li>Mục tiêu của vị trí đang tuyển dụng</li>\n<li>Một, hai điểm chính mà nhà tuyển dụng kỳ vọng ở ứng viên, thường nhắc về tính cách, kỹ năng đặc biệt</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Nhiệm vụ</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là nội dung quan trọng nhất trong <strong>bảng mô tả công việc</strong>. Do đó, ngoài việc càng chi tiết càng tốt, một số điều nhà tuyển dụng cần lưu ý là:</p>\n<ul>\n<li>Chi tiết và rõ ràng, không nên dài dòng hay quá phức tạp</li>\n<li>Phân rõ những nhiệm vụ mà vị trí này đảm nhiệm</li>\n<li>Với một số chức vụ cấp cao, phần nhiệm vụ có thể chia theo từng thời kỳ hay từng kỹ năng cụ thế. Điều này giúp ứng viên càng dễ hình dung và đo lường độ phù hợp</li>\n</ul>\n<p>\n<img src=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg\" alt=\"nêu rõ các đề mục trách nhiệm của vị trí\" srcset=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg 800w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-300x218.jpg 300w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-768x559.jpg 768w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-16x12.jpg 16w\" sizes=\"100vw\" width=\"800\">\n</p>\n<p>\n<i>Bảng mô tả công việc cần nêu rõ các đề mục trách nhiệm của vị trí</i>\n</p>', 'Kỹ thuật viên', 'tòa nhà A', '<h3 style=\"text-align:justify;\">\n<strong>Yêu cầu</strong>\n</h3>\n<p style=\"text-align:justify;\">Dựa vào yêu cầu, ứng viên biết mình có đủ năng lực trước khi ứng tuyển vào vị trí hay không. Thông thường nội dung này sẽ bao gồm:</p>\n<ul>\n<li>Nhân khẩu học: giới tính, độ tuổi, học vấn nếu vị trí yêu cầu</li>\n<li>Số năm kinh nghiệm</li>\n<li>Yêu cầu về kiến thức, chuyên môn</li>\n<li>Yêu cầu về kỹ năng sử dụng công cụ hay nghiệp vụ cụ thể</li>\n<li>Yêu cầu về địa điểm làm việc, các thiết bị bổ trợ</li>\n<li>Yêu cầu về tố chất</li>\n</ul>\n<p style=\"text-align:justify;\">Đây là nội dung để nhà tuyển dụng thuyết phục ứng viên gia nhập tổ chức sau khi họ nhận thấy sự phù hợp từ phần nhiệm vụ và yêu cầu.</p>\n<ul>\n<li>Lương, thưởng và chế độ đãi ngộ dành cho vị trí</li>\n<li>Các phúc lợi đi kèm</li>\n<li>Thời gian làm việc, môi trường văn phòng</li>\n<li>Cơ hội khác về thăng tiến, rèn luyện, phát triển</li>\n</ul>', 'Part Time', 3, '600k - 4000k vnđ', '2 - 3 năm', 'Nam', '2024-10-19 17:00:00', '2024-10-19 13:33:31', '2024-10-19 13:33:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_job_categories_id_foreign` (`job_categories_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_job_categories_id_foreign` FOREIGN KEY (`job_categories_id`) REFERENCES `job_categories` (`id`),
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
