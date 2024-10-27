-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 27, 2024 lúc 11:17 AM
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
-- Cấu trúc bảng cho bảng `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `fileCv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `name`, `thumb`, `phone_number`, `description`, `location`, `website`, `created_at`, `updated_at`) VALUES
(1, 3, 'công ty 1', NULL, '0904848855', NULL, 'Sudo', NULL, '2024-10-19 03:39:05', '2024-10-19 03:39:05'),
(2, 3, 'công ty 1', NULL, '0904848855', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\" data-placeholder=\"Compose an epic...\"><p>Mô tả công ty</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'Sudo', NULL, '2024-10-19 03:46:44', '2024-10-19 03:46:44'),
(3, 3, 'công ty 1', NULL, '0904848855', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\" data-placeholder=\"Compose an epic...\"><p><span class=\"ql-cursor\">﻿</span>Mô tả</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'Sudo', NULL, '2024-10-19 07:27:45', '2024-10-19 07:27:45'),
(4, 2, 'công ty 1', 'cong-ty-1.jpg', '0904848855', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\" data-placeholder=\"Compose an epic...\"><p><span class=\"ql-cursor\">﻿</span>Mô tả</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'Sudo', NULL, '2024-10-19 13:31:13', '2024-10-19 13:31:13'),
(5, 2, 'công ty 1', 'cong-ty-1.jpg', '0904848855', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\" data-placeholder=\"Compose an epic...\"><p><span class=\"ql-cursor\">﻿</span>Mô tả</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'Sudo', NULL, '2024-10-19 13:33:31', '2024-10-19 13:33:31');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `slug`, `thumb`, `description`, `position`, `location`, `requirements`, `type`, `job_categories_id`, `salary`, `Experience`, `gender`, `expires_at`, `created_at`, `updated_at`, `company_id`) VALUES
(4, 3, 'công việc 1', 'cong-viec-1', 'cong-viec-1.jpg', '<h3 style=\"text-align:justify;\">\n<strong>Tiêu đề</strong>\n</h3>\n<p style=\"text-align:justify;\">Một số tiêu chuẩn cơ bản khi tạo tiêu đề cho <strong>bảng mô tả công việc</strong>:</p>\n<ul>\n<li>Thể hiện vai trò của vị trí ứng tuyển một cách rõ ràng, dễ hình dung</li>\n<li>Tiêu đề ngắn gọn</li>\n<li>Tiêu đề có từ khóa được tối ưu trên công cụ tìm kiếm để tăng khả năng tiếp cận</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Mô tả vị trí</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là phần nội dung giới thiệu tổng quan về doanh nghiệp và vị trí cần tuyển. Vì thế, bạn phải đảm bảo:</p>\n<ul>\n<li>Có tên công ty</li>\n<li>Giới thiệu ngắn gọn về sản phẩm, thị trường, môi trường làm việc</li>\n<li>Mục tiêu của vị trí đang tuyển dụng</li>\n<li>Một, hai điểm chính mà nhà tuyển dụng kỳ vọng ở ứng viên, thường nhắc về tính cách, kỹ năng đặc biệt</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Nhiệm vụ</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là nội dung quan trọng nhất trong <strong>bảng mô tả công việc</strong>. Do đó, ngoài việc càng chi tiết càng tốt, một số điều nhà tuyển dụng cần lưu ý là:</p>\n<ul>\n<li>Chi tiết và rõ ràng, không nên dài dòng hay quá phức tạp</li>\n<li>Phân rõ những nhiệm vụ mà vị trí này đảm nhiệm</li>\n<li>Với một số chức vụ cấp cao, phần nhiệm vụ có thể chia theo từng thời kỳ hay từng kỹ năng cụ thế. Điều này giúp ứng viên càng dễ hình dung và đo lường độ phù hợp</li>\n</ul>\n<p>\n<img src=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg\" alt=\"nêu rõ các đề mục trách nhiệm của vị trí\" srcset=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg 800w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-300x218.jpg 300w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-768x559.jpg 768w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-16x12.jpg 16w\" sizes=\"100vw\" width=\"800\">\n</p>\n<p>\n<i>Bảng mô tả công việc cần nêu rõ các đề mục trách nhiệm của vị trí</i>\n</p>', 'Kỹ thuật viên', 'tòa nhà A', '<h3 style=\"text-align:justify;\">\n<strong>Yêu cầu</strong>\n</h3>\n<p style=\"text-align:justify;\">Dựa vào yêu cầu, ứng viên biết mình có đủ năng lực trước khi ứng tuyển vào vị trí hay không. Thông thường nội dung này sẽ bao gồm:</p>\n<ul>\n<li>Nhân khẩu học: giới tính, độ tuổi, học vấn nếu vị trí yêu cầu</li>\n<li>Số năm kinh nghiệm</li>\n<li>Yêu cầu về kiến thức, chuyên môn</li>\n<li>Yêu cầu về kỹ năng sử dụng công cụ hay nghiệp vụ cụ thể</li>\n<li>Yêu cầu về địa điểm làm việc, các thiết bị bổ trợ</li>\n<li>Yêu cầu về tố chất</li>\n</ul>\n<p style=\"text-align:justify;\">Đây là nội dung để nhà tuyển dụng thuyết phục ứng viên gia nhập tổ chức sau khi họ nhận thấy sự phù hợp từ phần nhiệm vụ và yêu cầu.</p>\n<ul>\n<li>Lương, thưởng và chế độ đãi ngộ dành cho vị trí</li>\n<li>Các phúc lợi đi kèm</li>\n<li>Thời gian làm việc, môi trường văn phòng</li>\n<li>Cơ hội khác về thăng tiến, rèn luyện, phát triển</li>\n</ul>', 'Full Time', 3, '2000k - 4000k VNĐ', '2-3 năm', 'Nam', '2024-10-17 17:00:00', '2024-10-19 07:27:45', '2024-10-19 07:27:45', 4),
(6, 2, 'Tuyển nhân viên sửa máy tính', 'tuyen-nhan-vien-sua-may-tinh', 'tuyen-nhan-vien-sua-may-tinh.jpg', '<h3 style=\"text-align:justify;\">\n<strong>Tiêu đề</strong>\n</h3>\n<p style=\"text-align:justify;\">Một số tiêu chuẩn cơ bản khi tạo tiêu đề cho <strong>bảng mô tả công việc</strong>:</p>\n<ul>\n<li>Thể hiện vai trò của vị trí ứng tuyển một cách rõ ràng, dễ hình dung</li>\n<li>Tiêu đề ngắn gọn</li>\n<li>Tiêu đề có từ khóa được tối ưu trên công cụ tìm kiếm để tăng khả năng tiếp cận</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Mô tả vị trí</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là phần nội dung giới thiệu tổng quan về doanh nghiệp và vị trí cần tuyển. Vì thế, bạn phải đảm bảo:</p>\n<ul>\n<li>Có tên công ty</li>\n<li>Giới thiệu ngắn gọn về sản phẩm, thị trường, môi trường làm việc</li>\n<li>Mục tiêu của vị trí đang tuyển dụng</li>\n<li>Một, hai điểm chính mà nhà tuyển dụng kỳ vọng ở ứng viên, thường nhắc về tính cách, kỹ năng đặc biệt</li>\n</ul>\n<h3 style=\"text-align:justify;\">\n<strong>Nhiệm vụ</strong>\n</h3>\n<p style=\"text-align:justify;\">Đây là nội dung quan trọng nhất trong <strong>bảng mô tả công việc</strong>. Do đó, ngoài việc càng chi tiết càng tốt, một số điều nhà tuyển dụng cần lưu ý là:</p>\n<ul>\n<li>Chi tiết và rõ ràng, không nên dài dòng hay quá phức tạp</li>\n<li>Phân rõ những nhiệm vụ mà vị trí này đảm nhiệm</li>\n<li>Với một số chức vụ cấp cao, phần nhiệm vụ có thể chia theo từng thời kỳ hay từng kỹ năng cụ thế. Điều này giúp ứng viên càng dễ hình dung và đo lường độ phù hợp</li>\n</ul>\n<p>\n<img src=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg\" alt=\"nêu rõ các đề mục trách nhiệm của vị trí\" srcset=\"https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri.jpg 800w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-300x218.jpg 300w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-768x559.jpg 768w, https://coffeehr.com.vn/wp-content/uploads/2022/06/neu-ro-cac-de-muc-trach-nhiem-cua-vi-tri-16x12.jpg 16w\" sizes=\"100vw\" width=\"800\">\n</p>\n<p>\n<i>Bảng mô tả công việc cần nêu rõ các đề mục trách nhiệm của vị trí</i>\n</p>', 'Kỹ thuật viên', 'tòa nhà A', '<h3 style=\"text-align:justify;\">\n<strong>Yêu cầu</strong>\n</h3>\n<p style=\"text-align:justify;\">Dựa vào yêu cầu, ứng viên biết mình có đủ năng lực trước khi ứng tuyển vào vị trí hay không. Thông thường nội dung này sẽ bao gồm:</p>\n<ul>\n<li>Nhân khẩu học: giới tính, độ tuổi, học vấn nếu vị trí yêu cầu</li>\n<li>Số năm kinh nghiệm</li>\n<li>Yêu cầu về kiến thức, chuyên môn</li>\n<li>Yêu cầu về kỹ năng sử dụng công cụ hay nghiệp vụ cụ thể</li>\n<li>Yêu cầu về địa điểm làm việc, các thiết bị bổ trợ</li>\n<li>Yêu cầu về tố chất</li>\n</ul>\n<p style=\"text-align:justify;\">Đây là nội dung để nhà tuyển dụng thuyết phục ứng viên gia nhập tổ chức sau khi họ nhận thấy sự phù hợp từ phần nhiệm vụ và yêu cầu.</p>\n<ul>\n<li>Lương, thưởng và chế độ đãi ngộ dành cho vị trí</li>\n<li>Các phúc lợi đi kèm</li>\n<li>Thời gian làm việc, môi trường văn phòng</li>\n<li>Cơ hội khác về thăng tiến, rèn luyện, phát triển</li>\n</ul>', 'Part Time', 3, '600k - 4000k vnđ', '2 - 3 năm', 'Nam', '2024-10-19 17:00:00', '2024-10-19 13:33:31', '2024-10-19 13:33:31', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `job_categories`
--

INSERT INTO `job_categories` (`id`, `title`, `slug`, `desc`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Job Category 1', 'job-category-1', 'Mô tả cho Job Category 1', NULL, '2024-10-15 08:40:29', '2024-10-15 08:40:29'),
(2, 'Job Category 2', 'job-category-2', 'Mô tả cho Job Category 2', NULL, '2024-10-15 08:40:29', '2024-10-15 08:40:29'),
(3, 'Job Category 3', 'job-category-3', 'Mô tả cho Job Category 3', NULL, '2024-10-15 08:40:29', '2024-10-15 08:40:29'),
(4, 'Job Category 4', 'job-category-4', 'Mô tả cho Job Category 4', NULL, '2024-10-15 08:40:29', '2024-10-15 08:40:29'),
(5, 'Job Category 5', 'job-category-5', 'Mô tả cho Job Category 5', NULL, '2024-10-15 08:40:29', '2024-10-15 08:40:29'),
(6, 'Job Category 6', 'job-category-6', 'Mô tả cho Job Category 6', NULL, '2024-10-15 08:40:29', '2024-10-15 08:40:29'),
(7, 'Job Category 7', 'job-category-7', 'Mô tả cho Job Category 7', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(8, 'Job Category 8', 'job-category-8', 'Mô tả cho Job Category 8', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(9, 'Job Category 9', 'job-category-9', 'Mô tả cho Job Category 9', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(10, 'Job Category 10', 'job-category-10', 'Mô tả cho Job Category 10', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(11, 'Job Category 11', 'job-category-11', 'Mô tả cho Job Category 11', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(12, 'Job Category 12', 'job-category-12', 'Mô tả cho Job Category 12', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(13, 'Job Category 13', 'job-category-13', 'Mô tả cho Job Category 13', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(14, 'Job Category 14', 'job-category-14', 'Mô tả cho Job Category 14', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(15, 'Job Category 15', 'job-category-15', 'Mô tả cho Job Category 15', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(16, 'Job Category 16', 'job-category-16', 'Mô tả cho Job Category 16', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(17, 'Job Category 17', 'job-category-17', 'Mô tả cho Job Category 17', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(18, 'Job Category 18', 'job-category-18', 'Mô tả cho Job Category 18', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(19, 'Job Category 19', 'job-category-19', 'Mô tả cho Job Category 19', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(20, 'Job Category 20', 'job-category-20', 'Mô tả cho Job Category 20', NULL, '2024-10-15 08:40:30', '2024-10-15 08:40:30'),
(21, 'fgfdg', 'title', '342', NULL, '2024-10-15 09:38:29', '2024-10-15 09:38:29'),
(22, 'fgfdg', 'title', '342', NULL, '2024-10-15 09:38:29', '2024-10-15 09:38:29'),
(23, 'gfdg', 'title', '342', NULL, '2024-10-15 09:41:45', '2024-10-15 09:41:45'),
(24, 'Slide header', 'title', 'fsgf', NULL, '2024-10-15 16:49:22', '2024-10-15 16:49:22'),
(25, 'Slide header', 'title', 'fsgf', NULL, '2024-10-15 16:49:22', '2024-10-15 16:49:22'),
(26, 'fgfdg', 'title', 'dfgdfg', NULL, '2024-10-16 07:03:13', '2024-10-16 07:03:13'),
(27, 'dsgsd', 'title', 'sdfdsf', NULL, '2024-10-16 07:03:47', '2024-10-16 07:03:47'),
(30, 'gf23343', 'title', '23423', NULL, '2024-10-16 07:08:51', '2024-10-16 07:08:51'),
(31, 'gfh', 'title', 'fghfh', 2, '2024-10-16 07:16:16', '2024-10-16 07:16:16'),
(32, 'gfh123', 'title', 'fghfh', 2, '2024-10-16 07:45:36', '2024-10-16 07:45:36'),
(33, 'gf23343', 'gf23343', '23423fsg', NULL, '2024-10-16 08:10:06', '2024-10-16 08:10:06'),
(34, 'gf23343', 'gf23343', '23423fdgdfg', NULL, '2024-10-16 08:10:25', '2024-10-16 08:10:25'),
(35, 'gf23343', 'gf23343', '23423fdgdfg', 10, '2024-10-16 08:11:43', '2024-10-16 08:11:43'),
(36, 'gf23343', 'gf23343', '23423fdgdfg', NULL, '2024-10-16 09:02:21', '2024-10-16 09:02:21'),
(37, 'gf2334333333333333333333', 'gf2334333333333333333333', '23423fsg', NULL, '2024-10-16 09:02:33', '2024-10-16 09:02:33'),
(38, 'gf2334333333333333333333', 'gf2334333333333333333333', '23423fsg', 3, '2024-10-16 09:02:47', '2024-10-16 09:02:47'),
(39, 'gf2334333333333333333333', 'gf2334333333333333333333', '23423fsg', 16, '2024-10-16 09:03:10', '2024-10-16 09:03:10'),
(43, 'gf23343cc', 'gf23343cc', '23423fsg', NULL, '2024-10-16 09:39:22', '2024-10-16 09:39:22'),
(44, 'gf23343cc123', 'gf23343cc123', '23423fsg', NULL, '2024-10-16 09:39:29', '2024-10-16 09:39:29'),
(45, 'gf23343cc123111', 'gf23343cc123111', '23423fsg', NULL, '2024-10-16 09:40:13', '2024-10-16 09:40:13'),
(46, 'test', 'test', 'sdf', 3, '2024-10-16 10:10:01', '2024-10-16 10:10:01'),
(47, 'test123', 'test123', 'sdf', 3, '2024-10-16 10:11:53', '2024-10-16 10:11:53'),
(48, 'test123456', 'test123456', 'sdf', 3, '2024-10-16 10:17:04', '2024-10-16 10:17:04'),
(49, 'test123456789', 'test123456789', 'sdf', 3, '2024-10-16 10:18:19', '2024-10-16 10:18:19'),
(50, 'test123456789111123', 'test123456789111123', 'sdf123', 3, '2024-10-16 10:19:34', '2024-10-16 16:12:59'),
(51, 'test123456789111gfgf', 'test123456789111gfgf', 'fgf', NULL, '2024-10-16 15:49:36', '2024-10-16 15:49:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_10_05_142701_create_roles_table', 1),
(2, '0001_01_01_000000_create_users_table', 2),
(3, '2024_10_05_142939_create_job__categories_table', 3),
(4, '0001_01_01_000002_create_jobs_table', 4),
(5, '2024_10_05_142856_create_applications_table', 5),
(6, '2024_10_05_142907_create_companies_table', 6),
(7, '2024_10_27_033950_update_job', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'nhà quản trị', NULL, NULL),
(2, 'company', 'cho nhà tuyển dụng', NULL, NULL),
(3, 'EMPLOYEE', 'người tìm việc', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6xQdNYOdQpUflpcQg3maTPU46n33QdaqmY1YtkNi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidGRQUzhoTWdUd3hISnFrV3FScVptUk9tckp3aWZ5ZWp2ZENkSGx0dSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUxOiJodHRwOi8vdHV5ZW5kdW5ndmluaC50ZXN0OjgwODAvYWRtaW4vam9iX2NhdGVnb3JpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1729370343),
('7H8MbxPXTwrBKEYysP4JjpWRmCcPpZAcH9ll25j1', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoielBUd3RhTklXUFFCTVlNb0lCS2ZyZGxDbm1uTnQ0bVRGWVJURGVPTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1729370226),
('A3RaF1hMIAGvBaSRPfVRF05Mwbo9VuSNyKB95ybN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2w3bW5JV2dnZk9tVkJLYml0T2REQ3VOQ1JiMW01Y0JBODFUYXVLbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MC9zaG93TG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729736612),
('H7NMnoY8axESmglx892dcehJ5BKA0WemwXmFUiNT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVo1a3hQd1FMUFBrendUQkJyQXk0ZDBaYXZwdTd1T1BDYWloYWgzZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MC9zaG93TG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729393106),
('JhlF88fey6y5dp8sG5tZEiCshJgaVB80Zo3KpXqi', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYU1Oem1pVGhsc3VIbkJ5dW9ob2lHTDFXWGR4em1ncTg1dVV4QlFGayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1729788500),
('kAqVhdPUR1EBG8oYH4zKEWE00TVbV0U9Q4l69DFh', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS2VXdkdVY09qNzNheXZLNk9QMVhNd2dsSkNJNmdFaEhVRGZsSTBLdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1730027812),
('UijFaiugkM3li8oxZ41SlJr4CMm0T8jHDAFlVR67', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFR0SlQ0bEN1ZGpsMXZRWGYyYUh3UlI0YnpFb0FBaWhpZHZtRWZXOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MC9hZG1pbi9qb2JzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1729996278),
('VtK7Y8Wr8IH3i00eoqZdpFz0tsGVqLvSnW1VJMnr', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR2xyN29YeXNWQ2JFcjA0VGpRM0NjNzRHbXdlS3FzMkZMbUplOU92TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly90dXllbmR1bmd2aW5oLnRlc3Q6ODA4MC9hZG1pbi9qb2JzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1729876975);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `thumb`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phan Duy Hào', NULL, 'admin@gmail.com', NULL, '$2y$12$o9jBqrkJpTKb4MeKDA3YyemTT2cZ9swswLYgjN2dP86Fado/tjrqq', 2, NULL, '2024-10-07 10:52:09', '2024-10-07 10:52:09'),
(2, 'Tho Mai Huy', NULL, '19574802010116@vinhuni.edu.vn', NULL, '$2y$12$oGqGLdD1KGwgS1UH04BeQu.8vGrBf8rwA7HovzlVsxzVa5lxmjpfS', 1, NULL, '2024-10-08 09:41:49', '2024-10-08 09:41:49'),
(3, 'Tho Mai Huy', 'tho-mai-huy.jpg', 'tho@vinhuni.edu.vn', NULL, '$2y$12$SVzZ9gwtByUxbtaD1y2qSOXFtUf8/b8QIFLKZdsvP1Rjry1X7f1xa', 3, NULL, '2024-10-08 09:46:44', '2024-10-19 03:39:05'),
(4, 'User 1', NULL, 'user1@example.com', NULL, '$2y$12$/FXzeaHt755dzHXuN/Cfl.E9sowjcbSZcEHHd1MSspdSV.1JLpWim', 1, NULL, '2024-10-13 07:05:05', '2024-10-13 07:05:05'),
(5, 'User 2', NULL, 'user2@example.com', NULL, '$2y$12$AT9AfTh03srBcEozobmdKeaTawITZPZ2oH4RwXmxZkufdac3Q9ayC', 1, NULL, '2024-10-13 07:05:06', '2024-10-13 07:05:06'),
(6, 'User 3', NULL, 'user3@example.com', NULL, '$2y$12$vS5tj668c133aWScfI8Dn..R2iVZYdwUaE4qtI2LkGtE2yC.zuMua', 1, NULL, '2024-10-13 07:05:06', '2024-10-13 07:05:06'),
(7, 'User 4', NULL, 'user4@example.com', NULL, '$2y$12$4QDZw5XR0HFlULh/MXX5D.QlKA4fs2hRip8/YrYQRNL9YlGnlD1Ky', 1, NULL, '2024-10-13 07:05:07', '2024-10-13 07:05:07'),
(8, 'User 5', NULL, 'user5@example.com', NULL, '$2y$12$VL9J73HJAgXFHCD5dqJQ5em6n4yFYh9EpI.YptsFqm5jDapC9KrV.', 1, NULL, '2024-10-13 07:05:07', '2024-10-13 07:05:07'),
(9, 'User 6', NULL, 'user6@example.com', NULL, '$2y$12$KpPwquhV1NrI9pki36.OD.wcaDKXGbYlfm9VtllaKD4uVxdBhN9Xa', 1, NULL, '2024-10-13 07:05:07', '2024-10-13 07:05:07'),
(10, 'User 7', NULL, 'user7@example.com', NULL, '$2y$12$3uU0FwwDHXgIecJYFXZ1t.HvNGV48FQ4qrRcrwN7bpbGh5zlr5IgK', 1, NULL, '2024-10-13 07:05:07', '2024-10-13 07:05:07'),
(11, 'User 8', NULL, 'user8@example.com', NULL, '$2y$12$jlabvSWxgJXDsbiLpvqOBe2KQd9K92mvmsfIWkKgLQrEi3ujyWv/a', 1, NULL, '2024-10-13 07:05:08', '2024-10-13 07:05:08'),
(12, 'User 9qưe', NULL, 'user9@example.com', NULL, '$2y$12$2hT.POgzdAcQk3Vqfgm0a.6EqMC15xFrHbw1x.2gOp629da02truq', 1, NULL, '2024-10-13 07:05:08', '2024-10-16 09:41:05'),
(13, 'User 10', NULL, 'user10@example.com', NULL, '$2y$12$dVOWx9HUw.83H6fRiGx3G.h9ku2OpEVA3ULcrmsfbQd2ElCOCHegy', 1, NULL, '2024-10-13 07:05:08', '2024-10-13 07:05:08'),
(14, 'User 11', NULL, 'user11@example.com', NULL, '$2y$12$L.orU0kGZBz1LUgKghGaHu9WIPt4WzdGM8dcswf5INYrCXMfsYUBy', 2, NULL, '2024-10-13 07:05:09', '2024-10-13 07:05:09'),
(15, 'User 12', NULL, 'user12@example.com', NULL, '$2y$12$WjkEl.Y7wR9sI7xq4ggXJ.Jva7IHrFTZvkznWTiE60wrvAFQ5pJSe', 2, NULL, '2024-10-13 07:05:09', '2024-10-13 07:05:09'),
(16, 'User 13', NULL, 'user13@example.com', NULL, '$2y$12$zQcffO4SLi2kibfd1BOczuVb9LDF4Wsq5pLjJnM2c5KhtNHbAhtAu', 2, NULL, '2024-10-13 07:05:09', '2024-10-13 07:05:09'),
(17, 'User 14', NULL, 'user14@example.com', NULL, '$2y$12$SlVquN0eoUwXrJTrCmz0OO8WgtIu8hIlkLn8AL9Ac0X7/Ruo2Sk8K', 2, NULL, '2024-10-13 07:05:09', '2024-10-13 07:05:09'),
(18, 'User 15', NULL, 'user15@example.com', NULL, '$2y$12$EHMW2iBnNNL2LzSpIeJ5ZOSPX1hIctvxkbsRuSNRZk3n28TpwoEXO', 2, NULL, '2024-10-13 07:05:10', '2024-10-13 07:05:10'),
(19, 'User 16', NULL, 'user16@example.com', NULL, '$2y$12$nSAy9AkamfSFQWU69XmnqOKbxEco3EJXeCk57L4ZHO5Z4qm/gDbLK', 2, NULL, '2024-10-13 07:05:10', '2024-10-13 07:05:10'),
(20, 'User 17', NULL, 'user17@example.com', NULL, '$2y$12$6QmNbAtKajco2qI2bXjAR.58Y/HKb1s05Zlqh331WANicGHVeFmFS', 2, NULL, '2024-10-13 07:05:10', '2024-10-13 07:05:10'),
(21, 'User 18', NULL, 'user18@example.com', NULL, '$2y$12$Y0zMlNxbo9/rEzxxWEa/6eLyj6yOeHkJj1wlVH7LTKIomwbsHuyL6', 2, NULL, '2024-10-13 07:05:11', '2024-10-13 07:05:11'),
(22, 'User 19', NULL, 'user19@example.com', NULL, '$2y$12$4hbzNO6rbhYhLdASQZ94perPskYC6ajXp7oi1/.VxHr0ZcEuDCU0q', 2, NULL, '2024-10-13 07:05:11', '2024-10-13 07:05:11'),
(23, 'User 20', NULL, 'user20@example.com', NULL, '$2y$12$UUxaQM5aCygq1fCepgY3a.w2jga2Cixl4ZcYpoyYSyYz0b59Nfw0G', 2, NULL, '2024-10-13 07:05:11', '2024-10-13 07:05:11'),
(24, 'User 21', NULL, 'user21@example.com', NULL, '$2y$12$Mv/.2nIWRnJ0A7j1CkcpGO9g8.9SUgvm9s0l8MGKeW.KdzJjm/5Hi', 3, NULL, '2024-10-13 07:05:11', '2024-10-13 07:05:11'),
(25, 'User 22', NULL, 'user22@example.com', NULL, '$2y$12$5V8bemug6R.ioX1yHfYrJOMAad3kYmVCbB0md1lkQau9SPG5nyf.O', 3, NULL, '2024-10-13 07:05:12', '2024-10-13 07:05:12'),
(26, 'User 23', NULL, 'user23@example.com', NULL, '$2y$12$Jn4glgGLuoDPHPt0QhbvkONXZpSckfMiWu5fwWTnIwezMMIsFS4aq', 3, NULL, '2024-10-13 07:05:12', '2024-10-13 07:05:12'),
(27, 'User 24', NULL, 'user24@example.com', NULL, '$2y$12$YI4aTfA.h2RSZ7tYEXDpiuC3LZZATaXCNuk2nxXHH63OaymEcoHcq', 3, NULL, '2024-10-13 07:05:13', '2024-10-13 07:05:13'),
(28, 'User 25', NULL, 'user25@example.com', NULL, '$2y$12$j2VFl2gD26qSr04143lrQ.7VmBOnNRGft3btJlp4brwcrkScsJgiO', 3, NULL, '2024-10-13 07:05:13', '2024-10-13 07:05:13'),
(29, 'User 26', NULL, 'user26@example.com', NULL, '$2y$12$3960lihLDxsTimzwlsIXfebePoT8zZ1NmW8QFVtUjFY.SQvv8/Gpa', 3, NULL, '2024-10-13 07:05:13', '2024-10-13 07:05:13'),
(30, 'User 27', NULL, 'user27@example.com', NULL, '$2y$12$X4NwhFSUh6dKxIUiGz5jsufcChwsTZRa6uvdTnWpv8tB8p6rgkxyS', 3, NULL, '2024-10-13 07:05:13', '2024-10-13 07:05:13'),
(31, 'User 28', NULL, 'user28@example.com', NULL, '$2y$12$JK8U9U9thIXbO29b6lYA..AindOOG1AdUyNvL8A6A5ElP/qFfE1Qi', 3, NULL, '2024-10-13 07:05:14', '2024-10-13 07:05:14'),
(32, 'User 29', NULL, 'user29@example.com', NULL, '$2y$12$Uh.2UzpCSeUhhLDzJoeDaOg267cVJEoUJd2k8kNyTzIy1C8j7ZwzC', 3, NULL, '2024-10-13 07:05:14', '2024-10-13 07:05:14'),
(33, 'User 30', NULL, 'user30@example.com', NULL, '$2y$12$tvuwvPSx7sFYSOt/iR7VqesXqzOL3V8/f21dPRa61ZWRDAfYaY47u', 3, NULL, '2024-10-13 07:05:14', '2024-10-13 07:05:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`),
  ADD KEY `applications_job_id_foreign` (`job_id`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`),
  ADD KEY `jobs_job_categories_id_foreign` (`job_categories_id`),
  ADD KEY `jobs_company_id_foreign` (`company_id`);

--
-- Chỉ mục cho bảng `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `jobs_job_categories_id_foreign` FOREIGN KEY (`job_categories_id`) REFERENCES `job_categories` (`id`),
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `job_categories`
--
ALTER TABLE `job_categories`
  ADD CONSTRAINT `job_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
