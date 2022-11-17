-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 24 Eyl 2022, 23:54:15
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sifadb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_admin_page`
--

DROP TABLE IF EXISTS `sifa_admin_page`;
CREATE TABLE IF NOT EXISTS `sifa_admin_page` (
  `sifa_admin_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_admin_page_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_admin_page_url` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_admin_page_icons` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_admin_page_yetki` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_admin_page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_admin_page`
--

INSERT INTO `sifa_admin_page` (`sifa_admin_page_id`, `sifa_admin_page_name`, `sifa_admin_page_url`, `sifa_admin_page_icons`, `sifa_admin_page_yetki`) VALUES
(1, 'Panel Sayfaları', 'panel_sayfalar.php', 'mdi mdi-book-open-page-variant', 'Admin'),
(3, 'Hastalıklar', 'hastaliklar.php', 'mdi mdi-biohazard', 'Herkes'),
(6, 'Bitki Ekle', 'bitki_ekle.php', 'mdi mdi-bookmark-plus-outline', 'Herkes'),
(4, 'Hastalık Ekle', 'Hastalik_ekle.php', 'mdi mdi-bookmark-plus-outline', 'Herkes'),
(7, 'Site Navbar Link', 'site_navbar.php', 'mdi mdi-link-variant', 'Admin'),
(8, 'Site Slider', 'site_slider.php', 'mdi mdi-cards', 'Herkes'),
(9, 'Site İletişim Bilgileri', 'site_iletisim.php', 'mdi mdi-contact-mail', 'Herkes'),
(5, 'Bitkiler', 'bitkiler.php', 'mdi mdi-flower', 'Herkes'),
(2, 'Panel Sayfa Ekle', 'panel_sayfa_ekle.php', 'mdi mdi-book-plus', 'Admin'),
(68, 'Site Anasayfa', 'site_anasayfa.php', 'mdi mdi-home', 'Herkes'),
(80, 'Site Görüşler Formu', 'site_form.php', 'mdi mdi-forum', 'Herkes');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_bitkiler`
--

DROP TABLE IF EXISTS `sifa_bitkiler`;
CREATE TABLE IF NOT EXISTS `sifa_bitkiler` (
  `sifa_bitki_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_bitki_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_bitki_aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sifa_bitki_detay` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sifa_bitki_foto` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_bitki_foto_site` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_bitki_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_hastaliklar`
--

DROP TABLE IF EXISTS `sifa_hastaliklar`;
CREATE TABLE IF NOT EXISTS `sifa_hastaliklar` (
  `sifa_hastalik_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_hastalik_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_hastalik_aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sifa_hastalik_foto` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_hastalik_foto_site` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_hastalik_bitkiler` longtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_hastalik_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_head`
--

DROP TABLE IF EXISTS `sifa_head`;
CREATE TABLE IF NOT EXISTS `sifa_head` (
  `sifa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_icon` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_logo` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_head`
--

INSERT INTO `sifa_head` (`sifa_id`, `sifa_name`, `sifa_icon`, `sifa_logo`) VALUES
(1, 'Şifalı Bitkiler', '../assets/images/logo/logo.png', 'admin/template/assets/images/logo/logo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_iletisim`
--

DROP TABLE IF EXISTS `sifa_iletisim`;
CREATE TABLE IF NOT EXISTS `sifa_iletisim` (
  `sifa_iletisim_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_iletisim_telefon` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_iletisim_adres` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sifa_iletisim_mail` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_iletisim_insta` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_iletisim_tiktok` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_iletisim_youtube` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_iletisim_facebook` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_footer_aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_iletisim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_iletisim`
--

INSERT INTO `sifa_iletisim` (`sifa_iletisim_id`, `sifa_iletisim_telefon`, `sifa_iletisim_adres`, `sifa_iletisim_mail`, `sifa_iletisim_insta`, `sifa_iletisim_tiktok`, `sifa_iletisim_youtube`, `sifa_iletisim_facebook`, `sifa_footer_aciklama`) VALUES
(1, '+90 212 444 4213', 'Maruzlar,2, 74110, Merkez/Istanbul, Turkey', 'loremipsum@hotmail.com', 'instagram', 'tiktok', 'youtube', 'facebook', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi assumenda facilis similique quae!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_site_anasayfa`
--

DROP TABLE IF EXISTS `sifa_site_anasayfa`;
CREATE TABLE IF NOT EXISTS `sifa_site_anasayfa` (
  `sifa_site_anasayfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_site_anasayfa_baslik` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_anasayfa_aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_anasayfa_foto` varchar(512) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_site_anasayfa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_site_anasayfa`
--

INSERT INTO `sifa_site_anasayfa` (`sifa_site_anasayfa_id`, `sifa_site_anasayfa_baslik`, `sifa_site_anasayfa_aciklama`, `sifa_site_anasayfa_foto`) VALUES
(1, 'ŞİFALI BİTKİLER', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores soluta sit reiciendis dolor facilis nemo voluptates neque blanditiis deserunt fugit, quo maiores eaque, doloribus quae quidem ipsum molestiae eius. Corrupti.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores soluta sit reiciendis dolor facilis nemo voluptates neque blanditiis deserunt fugit, quo maiores eaque, doloribus quae quidem ipsum molestiae eius. Corrupti.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores soluta sit reiciendis dolor facilis nemo voluptates neque blanditiis deserunt fugit, quo maiores eaque, doloribus quae quidem ipsum molestiae eius. Corrupti.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores soluta sit reiciendis dolor facilis nemo voluptates neque blanditiis deserunt fugit, quo maiores eaque, doloribus quae quidem ipsum molestiae eius. Corrupti.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores soluta sit reiciendis dolor facilis nemo voluptates neque blanditiis deserunt fugit, quo maiores eaque, doloribus quae quidem ipsum molestiae eius. Corrupti.', 'https://images.pexels.com/photos/4202258/pexels-photo-4202258.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_site_anasayfa_2`
--

DROP TABLE IF EXISTS `sifa_site_anasayfa_2`;
CREATE TABLE IF NOT EXISTS `sifa_site_anasayfa_2` (
  `sifa_site_anasayfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_site_anasayfa_baslik` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_anasayfa_aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_site_anasayfa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_site_anasayfa_2`
--

INSERT INTO `sifa_site_anasayfa_2` (`sifa_site_anasayfa_id`, `sifa_site_anasayfa_baslik`, `sifa_site_anasayfa_aciklama`) VALUES
(1, 'Başlık - 1', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae consectetur ipsa ut nisi suscipit. Beatae quas dolorum voluptates, deleniti nulla libero iusto delectus reiciendis enim aperiam exercitationem qui facere!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae consectetur ipsa ut nisi suscipit. Beatae quas dolorum voluptates, deleniti nulla libero iusto delectus reiciendis enim aperiam exercitationem qui facere!'),
(2, 'Başlık - 2', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae consectetur ipsa ut nisi suscipit. Beatae quas dolorum voluptates, deleniti nulla libero iusto delectus reiciendis enim aperiam exercitationem qui facere!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae consectetur ipsa ut nisi suscipit. Beatae quas dolorum voluptates, deleniti nulla libero iusto delectus reiciendis enim aperiam exercitationem qui facere!'),
(3, 'Başlık - 3', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae consectetur ipsa ut nisi suscipit. Beatae quas dolorum voluptates, deleniti nulla libero iusto delectus reiciendis enim aperiam exercitationem qui facere!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae repudiandae consectetur ipsa ut nisi suscipit. Beatae quas dolorum voluptates, deleniti nulla libero iusto delectus reiciendis enim aperiam exercitationem qui facere!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_site_iletisim_form`
--

DROP TABLE IF EXISTS `sifa_site_iletisim_form`;
CREATE TABLE IF NOT EXISTS `sifa_site_iletisim_form` (
  `sifa_site_form_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_site_form_isim` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_form_mail` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_form_mesaj` longtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_site_form_id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_site_iletisim_form`
--

INSERT INTO `sifa_site_iletisim_form` (`sifa_site_form_id`, `sifa_site_form_isim`, `sifa_site_form_mail`, `sifa_site_form_mesaj`) VALUES
(91, 'Deneme Ziyaretçi - 1', 'ziyaretci@mail.com', 'Ziyaretçi Görüş Mesajı'),
(90, 'Deneme Ziyaretçi - 2', 'ziyaretci@mail.com', 'Ziyaretçi Görüş Mesajı'),
(92, 'Deneme Ziyaretçi - 3', 'ziyaretci@mail.com', 'Ziyaretçi Görüş Mesajı'),
(93, 'Deneme Ziyaretçi - 4', 'ziyaretci@mail.com', 'Ziyaretçi Görüş Mesajı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_site_navbar`
--

DROP TABLE IF EXISTS `sifa_site_navbar`;
CREATE TABLE IF NOT EXISTS `sifa_site_navbar` (
  `sifa_site_navbar_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_site_navbar_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_navbar_link` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_navbar_class` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_site_navbar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_site_navbar`
--

INSERT INTO `sifa_site_navbar` (`sifa_site_navbar_id`, `sifa_site_navbar_name`, `sifa_site_navbar_link`, `sifa_site_navbar_class`) VALUES
(1, 'Anasayfa', 'index.php', 'panel'),
(2, 'Bitkiler', 'bitki.php', '-'),
(3, 'Hastalıklar', 'hastalik.php', '-'),
(5, 'Admin Girişi', 'admin/index.php', '-');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_site_slider`
--

DROP TABLE IF EXISTS `sifa_site_slider`;
CREATE TABLE IF NOT EXISTS `sifa_site_slider` (
  `sifa_site_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_site_slider_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_slider_foto` varchar(512) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_slider_baslik` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_site_slider_aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_site_slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_site_slider`
--

INSERT INTO `sifa_site_slider` (`sifa_site_slider_id`, `sifa_site_slider_name`, `sifa_site_slider_foto`, `sifa_site_slider_baslik`, `sifa_site_slider_aciklama`) VALUES
(1, 'slider1', 'https://images.pexels.com/photos/4075085/pexels-photo-4075085.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'LOREM IPSUM DOLOR 1', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione molestiae non, distinctio maxime et nesciunt tenetur veritatis, qui facere quasi impedit natus numquam incidunt inventore dolores iste, molestias nostrum exercitationem?'),
(2, 'slider2', 'https://images.pexels.com/photos/1113145/pexels-photo-1113145.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'LOREM IPSUM DOLOR 2', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione molestiae non, distinctio maxime et nesciunt tenetur veritatis, qui facere quasi impedit natus numquam incidunt inventore dolores iste, molestias nostrum exercitationem?'),
(3, 'slider3', 'https://images.pexels.com/photos/1113145/pexels-photo-1113145.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'LOREM IPSUM DOLOR 3', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione molestiae non, distinctio maxime et nesciunt tenetur veritatis, qui facere quasi impedit natus numquam incidunt inventore dolores iste, molestias nostrum exercitationem?');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_user`
--

DROP TABLE IF EXISTS `sifa_user`;
CREATE TABLE IF NOT EXISTS `sifa_user` (
  `sifa_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_user_profile` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_user_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_user_passwd` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_user_yetki` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`sifa_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_user`
--

INSERT INTO `sifa_user` (`sifa_user_id`, `sifa_user_profile`, `sifa_user_name`, `sifa_user_passwd`, `sifa_user_yetki`) VALUES
(1, 'face15.jpg', 'admin', 'wApWK66ce12HKeiZvvoJyg==', 'Admin'),
(2, 'face8.jpg', 'user', '23E7emt0JKQKqfw8XbQ90Q==', 'Herkes'),
(9, 'face15.jpg', 'asd', 'G7gNQK9BFIGGTX8ZCT+DPQ==', 'Herkes');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifa_yetkiler`
--

DROP TABLE IF EXISTS `sifa_yetkiler`;
CREATE TABLE IF NOT EXISTS `sifa_yetkiler` (
  `sifa_yetki_id` int(11) NOT NULL AUTO_INCREMENT,
  `sifa_yetki_name` varchar(256) COLLATE utf8_turkish_ci NOT NULL,
  `sifa_yetki_kod` int(11) NOT NULL,
  PRIMARY KEY (`sifa_yetki_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifa_yetkiler`
--

INSERT INTO `sifa_yetkiler` (`sifa_yetki_id`, `sifa_yetki_name`, `sifa_yetki_kod`) VALUES
(1, 'Admin', 1),
(2, 'Herkes', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
