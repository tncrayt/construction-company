-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insaat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_kadi` varchar(80) NOT NULL,
  `admin_sifre` varchar(255) NOT NULL,
  `admin_mail` varchar(255) NOT NULL,
  `admin_ad` varchar(80) NOT NULL,
  `admin_soyad` varchar(80) NOT NULL,
  `son_guncelleme` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_kadi`, `admin_sifre`, `admin_mail`, `admin_ad`, `admin_soyad`, `son_guncelleme`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yönetici@gmail.com', 'Mustafa', 'Biler', '2022-03-23 21:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_ad` varchar(255) NOT NULL,
  `logo_img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `kisa_tanitim` text NOT NULL,
  `adres` text NOT NULL,
  `harita_link` longtext NOT NULL,
  `header_renk` varchar(255) NOT NULL,
  `footer_renk` varchar(255) NOT NULL,
  `bg_renk` varchar(255) NOT NULL,
  `acilis_zaman` time NOT NULL,
  `kapanis_zaman` time NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_ad`, `logo_img`, `email`, `tel`, `kisa_tanitim`, `adres`, `harita_link`, `header_renk`, `footer_renk`, `bg_renk`, `acilis_zaman`, `kapanis_zaman`, `tarih`) VALUES
(1, 'İnşaat Kurumsal', 'images/logo.png', 'bilgi@suryapi.com', '0530-348-85-13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since ', 'Altunizade, Abdullahağa Cd. No.21, 34676 Üsküdar/İstanbul', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d192573.6107330623!2d28.741773813626658!3d41.04794547713867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab7db512ad435%3A0x8aa9c257baf9fb95!2sSuryap%C4%B1%20%7C%20Tilia!5e0!3m2!1str!2str!4v1646468930097!5m2!1str!2str\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '#0e2bc5', '#0e2bc5', '#ffffff', '08:30:00', '17:35:00', '2022-04-30 08:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `bolum_1`
--

CREATE TABLE `bolum_1` (
  `id` int(11) NOT NULL,
  `ana_baslik` varchar(255) NOT NULL,
  `alt_baslik` varchar(255) NOT NULL,
  `proje_sayi` varchar(255) NOT NULL,
  `personel_sayi` varchar(255) NOT NULL,
  `görsel` varchar(255) NOT NULL,
  `icerik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bolum_1`
--

INSERT INTO `bolum_1` (`id`, `ana_baslik`, `alt_baslik`, `proje_sayi`, `personel_sayi`, `görsel`, `icerik`) VALUES
(1, 'Bina ve İnşaat İnşaat Alanında Öncülük Ediyoruz', 'Yüksek Kaliteli İnşaat Projeleri Sunmaya ve Yenilikçi Tasarıma Adanmış!', '6,150', '2,500', 'images/1 (1).jpg', '<p>Yine de değişimi kucaklayanlar gelişiyor, her zamankinden daha büyük, daha iyi, daha hızlı ve daha güçlü ürünler üretiyorlar. Suçu yönetmeye yardımcı oluyorsunuz; geçmişinizi inşa etmenize ve geleceği hazırlamanıza yardımcı olabiliriz.&nbsp;</p><p>Dünya her zamankinden daha hızlı değişiyor, teknoloji bozuldukça ve yazılımlar değiştikçe Eteon inşaatları tehdit ediliyor. Kalite Kontrol Sistemi %100 Memnuniyet Garantisi Son Derece Profesyonel Kadro Rakipsiz Işçilik Doğru Test Süreçleri Profesyonel Ve Nitelikli</p>');

-- --------------------------------------------------------

--
-- Table structure for table `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `icerik` longtext NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `baslik`, `icerik`, `tarih`) VALUES
(1, 'Biz Kimiz ?', '<h2><strong>Biz Kimiz?</strong></h2><p>Faaliyetlerimize başladığımız 1992 yılından bu yana pek çok prestijli projeyi başarıyla hayata geçirerek sektörde öncü bir kimlik kazandık. Sur Yapı olarak, proje aşamasından başlayarak ürün geliştirme, mimarı yapım-üretim dahil yüksek kalitede, anahtar teslim işlerin yanı sıra ofis ve AVM projeleri üretimi, site yönetimleri, sitelerin ikinci ellerinin yönetimi, AVM projelerinin kiralama ve yönetimlerini de yapan bir şirketler grubu olarak sektörde öne çıkıyoruz. Geleceğe yatırım yaparak yaşam için en ideal koşulları oluşturmayı hedefleyerek ürettiğimiz her eserle içinde yaşadığımız topluma kalıcı değerler katmayı amaçlıyoruz. İnşaat sektöründe istikrarlı büyümemizi sürdürürken 2007 yılında başladığımız enerji sektöründe de başarılara imza atıyoruz.</p><h3><strong>Neden Farklıyız?</strong></h3><p>Faaliyet gösterdiğimiz ilk günden bu yana dürüstlük, mükemmeliyetçilik, ekip ruhu, yenilikçilik, sahiplenme, istikrar ve girişimcilik en önemli değerlerimizin arasında yer aldı. Müşterilerimize, iş ortaklarıma ve çalışanlarımıza karşı şeffaflık ilkesini benimsedik. En kısa sürede en ideal bütçe ile yeni teknolojiyi takip ederek en iyi işi başarmayı hedefliyoruz. Kazandığımız itibar, deneyim, bilgi ve birikim ile geleceğe daha güçlü yürüyoruz. Yalnızca proje başlangıcından anahtar teslimine kadar tüm süreçleri takip etmekle kalmıyor, satış sonrası hizmetlerimizle projelerimizden ev sahibi olanların bizi her zaman yanlarında hissetmelerini sağlıyoruz. Müşteri memnuniyetini en önde tutarak, müşterilerimizle en iyi şekilde iletişim kurmanın yollarını günümüz koşulları içerisinde sürekli geliştiriyoruz. Müşterilerimizle olan iletişimize verdiğimiz önemi, teknoloji ile birleştirerek iHome uygulamamız ile gayrimenkul sektörüne yeni bir soluk kazandırıyoruz. Bu anlayış ile projelerimizde marka kimliğimizi ve Sur Yapı güvenirliğini vurgulamak adına tüm gücümüzle çalışıyor, her yeni projemizi ilk günkü heyecanımızla inşa ediyoruz.</p><h3><strong>Misyonumuz</strong></h3><p>Yatırımımız gelecek, amacımız ideal koşullarda yaşayan insan. Misyonumuz uygarlığı imar</p><p>etmek, ürettiğimiz her eserle içinde yaşadığımız topluma kalıcı değerler katmak.</p><h3><strong>Vizyonumuz</strong></h3><p>Kazandığımız itibar, deneyim, bilgi ve birikim idealimize yönelişimize destek oluyor. Biz,</p><p>geçmişten aldığımız güçle geleceğe yürüyoruz. Çünkü bir idealimiz ve ideale ulaşmak için</p><p>yapacak çok şeyimiz var.</p>', '2022-04-02 15:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `görsel` varchar(255) NOT NULL,
  `icerik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `baslik`, `görsel`, `icerik`) VALUES
(4, 'MÜHENDİSLİK', 'images/engineer.png', 'Reyapı İnşaat Şirketi olarak birden fazla hizmet sunuyoruz. Sektörde uzun süredir yer almanın\r\n                verdiği deneyimler ve profesyonellik neticesinde, sektöre ilişkin tüm ihtiyaçlara cevap\r\n                veren her hizmet için destek olmaya çalışıyoruz.…'),
(5, 'MİMARLIK', 'images/appartment.png', 'Reyapı İnşaat Şirketi olarak birden fazla hizmet sunuyoruz. Sektörde uzun süredir yer almanın\r\n                verdiği deneyimler ve profesyonellik neticesinde, sektöre ilişkin tüm ihtiyaçlara cevap\r\n                veren her hizmet için destek olmaya çalışıyoruz.…'),
(7, 'SERVİSLER', 'images/service-icon.png', 'Reyapı İnşaat Şirketi olarak birden fazla hizmet sunuyoruz. Sektörde uzun süredir yer almanın verdiği deneyimler ve profesyonellik neticesinde, sektöre ilişkin tüm ihtiyaçlara cevap veren her hizmet için destek olmaya çalışıyoruz.…	\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `loglar`
--

CREATE TABLE `loglar` (
  `id` int(11) NOT NULL,
  `ip_adres` varchar(255) NOT NULL,
  `giris_tarih` datetime NOT NULL,
  `cikis_tarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loglar`
--

INSERT INTO `loglar` (`id`, `ip_adres`, `giris_tarih`, `cikis_tarih`) VALUES
(8, '::1', '2022-04-16 16:04:18', '2022-04-16 18:04:33'),
(9, '::1', '2022-04-24 12:04:41', '2022-04-24 18:04:52'),
(10, '::1', '2022-04-30 09:04:51', '2022-04-30 10:04:52'),
(11, '::1', '2022-05-18 07:05:39', '2022-05-18 07:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `menuler`
--

CREATE TABLE `menuler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT 1,
  `sira` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuler`
--

INSERT INTO `menuler` (`id`, `ad`, `url`, `durum`, `sira`, `tarih`) VALUES
(18, 'İletişim', './iletisim.php', 1, 2, '2022-05-17 11:50:51'),
(19, 'Hakkımızda', './hakkımızda.php', 1, 1, '2022-05-17 11:50:51'),
(20, 'Anasayfa', './index.php', 1, 0, '2022-05-17 11:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT 1,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `baslik`, `resim`, `aciklama`, `durum`, `tarih`) VALUES
(20, 'Proje Yönetimi ve İnşaat Yapıları', 'images/emma-houghton-EixJzIdl4bc-unsplash.jpg', 'Yine de değişimi kucaklayanlar gelişiyor, her zamankinden daha büyük, daha iyi, daha hızlı ve daha güçlü ürünler üretiyorlar. Suçu yönetmeye yardımcı oluyorsunuz; geçmişinizi inşa etmenize ve geleceği hazırlamanıza yardımcı olabiliriz.', 1, '2022-04-23 16:24:36'),
(23, 'Slider 2', 'images/mufid-majnun-cXOmuS-iKPE-unsplash.jpg', 'Açıklama giriniz....', 1, '2022-05-17 11:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `sosyal`
--

CREATE TABLE `sosyal` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `görsel` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sosyal`
--

INSERT INTO `sosyal` (`id`, `ad`, `görsel`, `link`) VALUES
(7, 'Facebook', 'images/5296499_fb_facebook_facebook logo_icon.png', 'https://www.facebook.com/suryapi/'),
(8, 'Twitter', 'images/5296516_tweet_twitter_twitter logo_icon.png', 'https://twitter.com/suryapi');

-- --------------------------------------------------------

--
-- Table structure for table `yazilar`
--

CREATE TABLE `yazilar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `icerik` longtext NOT NULL,
  `yazi_resim` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yazilar`
--

INSERT INTO `yazilar` (`id`, `baslik`, `icerik`, `yazi_resim`, `tarih`) VALUES
(14, 'Test Başlık 1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>', 'images/4.jpg', '2022-04-16 15:25:18'),
(15, 'Test Başlık 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'images/1 (1).jpg', '2022-04-16 15:25:55'),
(16, 'Test Başlık 3', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'images/2.jpg', '2022-04-16 15:28:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bolum_1`
--
ALTER TABLE `bolum_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loglar`
--
ALTER TABLE `loglar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosyal`
--
ALTER TABLE `sosyal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bolum_1`
--
ALTER TABLE `bolum_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loglar`
--
ALTER TABLE `loglar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sosyal`
--
ALTER TABLE `sosyal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
