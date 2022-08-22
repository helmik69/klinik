-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2022 pada 10.20
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `00`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `status` enum('Published','Pending','Draft') NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `status`, `judul`, `isi`, `post_date`, `img`) VALUES
(19, 'Published', 'Jadwal Layanan Dokter', 'Jadwal Praktek Dokter Umum\r\n\r\ndr. Kartini Anisa Lafonda\r\ndr. Nuttidia Sepdwikawati\r\ndr. Putri TiaraSari\r\ndr. Ade Ramadhaniyah Shaliha Siregar\r\nJadwal Praktek : \r\nSenin - Sabtu PKL 08.00 s.d 20.00 WIB \r\n\r\nBidan\r\nApriliyanti Wulandari, Amd. Keb\r\nRatih Damayanti, Amd. Keb\r\n\r\nPraktek Dokter Spesialis THT\r\ndr. Apriyanza Akbar, Sp. T.H.T.K.L, FICS\r\n\r\nJadwal Praktek:\r\nSenin- Sabtu: 15.00 s.d 17.30 WIB\r\n\r\nPraktek  \r\ndr. Kartini Anisa Lafonda\r\nSenin- Sabtu \r\nPukul: 08.00 - 20.00 ', '2022-08-04 17:39:34', '1659634774-photo1659634097.jpeg'),
(20, 'Published', 'BAGAIMANA CARA MEMULAI POLA MAKAN SEHAT?', 'Mengkonsumsi makanan enak merupakan kenikmatan tersendiri dalam hidup. Makanan juga menjadi inti dari sebuah pesta atau acara. Pemilihan makanan dapat membawa dampak baik atau buruk bagi tubuh. Apakah menyehatkan tubuh atau menimbulkan penyakit seperti jantung dan diabetes?\r\nMakanan sehari-hari yang masuk kedalam tubuh dapat mempengaruhi kesehatan dan resiko penyakit tertentu. Mengubah kebiasaan sehari-hari dengan mengkonsumsi makanan yang lebih sehat dapat memberikan dampak yang baik bagi tubuh. Perubahan yang dilakukan sebaiknya perlahan dan sedikit demi sedikit agar tetap bisa konstan menjalani pola makan sehat. Perubahan pola makan dapat membantu menurunkan berat badan dan tetap menjaga berat badan agar tetap normal.\r\n\r\nBagaimana cara mengubah kebiasaan makan?\r\nDibutuhkan beberapa perubahan untuk mengubah kebiasaan makan. Memulai dengan perubahan kecil lebih mudah dilakukan dan dapat memberikan kesehatan yang lebih baik. Berikut beberapa perubahan yang dapat dilakukan :\r\n\r\n1.Memperbanyak konsumsi sayuran\r\nSayuran memiliki banyak kandungan serat dan vitamin yang bagus untuk tubuh. Direkomendasikan untuk mengganti makanan yang mengandung tinggi kalori dengan sayuran.\r\n\r\n2.Mengganti camilan dengan makanan yang mengandung protein\r\nMengganti camilan diantara jadwal makan dengan menggunakan makanan yang mengandung tinggi protein seperti telur rebus, yogurt, ayam rebus tanpa kulit, dan mengurangi makanan mengandung tinggi karbohidrat.\r\nMemilih produk susu rendah lemak\r\nMemastikan prouk susu yang dipilih tidak mengandung tinggi kalori dan lemak.\r\n3.Menentukan porsi makan\r\nMengkonsumsi makanan ketika tubuh mengalami rasa lapar dapat menimbulkan keinginan untuk mendapatkan porsi lebih besar. Seseorang juga kemungkinan menginginkan porsi besar jika disajikan dalam wadah yag besar.\r\n\r\n4.Memperbanyak sayuran pada pagi hari\r\nSayuran memiliki kandungan kalori yang rendah dan serat yang berada pada sayuran menyebabkan rasa kenyang lebih lama.\r\n\r\n5.Hindari melihat foto-foto makanan pada blog atau media sosial\r\nFoto-foto makan dapat mempengaruhi tubuh untuk menghasilkan hormon yangmenyebabkan rasa lapar\r\n\r\n6.Membuat jadwal menu\r\nMenjadwalkan menu makanan setiap hari dan menu camilan dapat menghindarkan dari keinginan untuk mengkonsumsi camilan.\r\n\r\n7.Memotong sayuran dengan ukuran kecil untuk camilan\r\nMemotong sayuran dengan ukuran yang pas untuk camilan dapat bermanfaat untuk membatasi diri mengambil camilan seperti biskuit. Jika takut sayuran menjadi rusak karena sudah dipotong maka dapat memilih sayuran-sayuran yang berukuran kecil.\r\n\r\n8.Mengkonsumsi air putih lebih banyak daripada minuman manis dan bersoda.\r\nJangan menunda jadwal makan karena akan menyebabkan makan dalam jumlah yang besar jika perut terlalu lapar.\r\n\r\nPerubahan kebiasaan bukan hanya pada pemilihan makanan, namun juga pada proses pengolahan makanan. Memilih proses makan dengan dikukus, direbus, atau di oven dapat menghasilkan makanan yang lebih menyehatkan.\r\n\r\nTubuh yang sehat berasal dari pola makan yang sehat.', '2022-08-04 17:41:03', '1659634863-photo1659634097 (1).jpeg'),
(21, 'Published', 'Cara Menjaga Kesehatan Tubud Agar Terhindar Dari Penyakit', 'Agar terhindar dari berbagai macam penyakit, ada banyak cara menjaga kesehatan tubuh yang bisa dilakukan. Dengan menerapkan cara-cara tersebut, kualitas hidup yang sehat dapat terjaga.\r\n\r\nSebenarnya menerapkan berbagai cara menjaga kesehatan tubuh bukanlah hal yang sulit. Hanya saja, Anda harus konsisten dalam melakukannya. Hal ini perlu dibiasakan, mulai dari hal kecil seperti istirahat dengan cukup dan olahraga secara teratur.\r\n\r\nCara Menjaga Kesehatan Tubuh\r\n\r\nMengubah pola hidup menjadi lebih sehat merupakan cara menjaga kesehatan tubuh yang disarankan. Beberapa pola hidup sehat yang dapat Anda jalani yaitu:\r\n\r\n1. Konsumsi makanan sehat\r\n\r\nAnda disarankan untuk mengonsumsi makanan sehat setiap hari, termasuk makanan yang mengandung protein, karbohidrat, lemak, vitamin dan mineral. Sebagai sumber protein, Anda dapat mengonsumsi daging tanpa lemak, susu, produk olahan susu, telur, aneka jenis ikan laut, dan ikan air tawar. Sementara untuk memenuhi kebutuhan karbohidrat, Anda dapat memperolehnya dari nasi merah, oat, quinoa, dan roti gandum.\r\n\r\nKonsumsilah aneka jenis sayuran, seperti asparagus, brokoli, wortel, kembang kol, kale, mentimun, kubis, lobak, jamur, labu, terong, aneka jenis kacang-kacangan, serta paprika. Sayuran mengandung berbagai macam vitamin dan nutrisi yang dibutuhkan tubuh. Selain sayuran, aneka jenis buah juga sangat baik untuk kesehatan, seperti apel, alpukat, pisang, blueberry, jeruk, strawberry, kiwi, mangga, lemon, nanas, pir dan anggur. Buah-buahan ini juga sangat baik bagi Anda yang sedang menjalani diet.\r\n\r\n2. Olahraga secara rutin\r\n\r\nCara menjaga kesehatan tubuh berikutnya adalah tetap aktif bergerak dan rutin berolahraga. Olahraga tak hanya baik untuk kesehatan, tetapi juga mampu mencegah dan mengelola masalah kesehatan yang diderita, seperti stroke, diabetes, depresi, tekanan darah tinggi, osteoporosis, radang sendi, hingga kanker.\r\n\r\nUntuk mendapatkan berbagai macam manfaat olahraga tersebut, disarankan untuk berolahraga selama 150 menit dalam seminggu. Atau luangkan waktu selama 20-30 menit setiap harinya untuk berolahraga.\r\n\r\n3. Jaga berat badan ideal\r\n\r\nKelebihan berat badan dapat meningkatkan risiko berbagai jenis penyakit. Penyakit seperti tekanan darah tinggi, kolesterol, diabetes tipe 2, penyakit jantung, stroke, dan kanker, rentan untuk diderita penderita obesitas atau kelebihan berat badan. Untuk mengontrol berat badan, Anda dapat melakukan pengecekan indeks masa tubuh (IMT).\r\n\r\n4. Berhenti merokok\r\n\r\nBagi perokok, disarankan untuk menghentikan kebiasaan merokok sedini mungkin. Rokok dapat membahayakan kesehatan Anda. Selain kebiasaan merokok, hentikan pula kebiasaan mengonsumsi minuman beralkohol demi kesehatan tubuh.\r\n\r\n5. Suplementasi bagi orang yang memiliki high-risk disease\r\n\r\nJika Anda sudah memiliki high risk-disease, seperti diabetes, penyakit jantung, atau penyakit paru kronis, konsumsi suplemen tertentu dapat memperbaiki kondisi kesehatan dan memperkuat sistem imun Anda, mencegah komplikasi, serta melindungi Anda dari penyakit infeksi. Hal ini berkat senyawa antioksidan yang banyak ditemukan pada suplemen, misalnya astaxanthin.\r\n\r\nAstaxanthin alami diketahui mampu menangkal efek radikal bebas berlebih yang dapat merusak jaringan tubuh Anda, termasuk jaringan kulit dan organ dalam. Tak hanya itu, kemampuan astaxanthin dalam menangkal radikal bebas juga mampu membantu memelihara kesehatan jantung dan pembuluh darah.\r\n\r\n6. Lindungi kulit Anda\r\n\r\nAnda disarankan untuk menggunakan tabir surya, agar kulit terlindungi dengan baik. Selain itu, gunakan pakaian berlengan panjang atau topi bertepi lebar saat beraktivitas di luar ruangan, agar kulit tetap terlindungi, sebab paparan sinar matahari dalam jangka panjang tak hanya menyebabkan kulit terbakar, tetapi juga dapat meningkatkan risiko penuan dini dan kanker kulit.\r\n\r\n7. Seks yang aman\r\n\r\nSeks sehat tidak hanya memberikan kepuasan secara emosional saja, tetapi juga membawa manfaat bagi kesehatan tubuh. Anda yang sudah aktif secara seksual harus menghindari seks bebas atau berganti-ganti pasangan. Tujuannya agar terhindar dari penyakit menular seksual yang bisa membahayakan kesehatan tubuh.\r\n\r\nAnda dapat mempraktikkan berbagai cara menjaga kesehatan tubuh di atas. Agar kesehatan tubuh tetap terpantau dengan baik, lakukan medical checkup secara berkala sesuai dengan anjuran dokter. Pemeriksaan ini memungkinkan Anda mengetahui sedini mungkin gangguan kesehatan atau penyakit yang mungkin diderita. Semakin dini penyakit terdeteksi, maka akan semakin cepat pula penanganan yang dapat dilakukan.', '2022-08-04 17:41:40', '1659634900-photo1659634097 (2).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobat`
--

CREATE TABLE `berobat` (
  `id_pendaftaran` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `jadwal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_berobat` date DEFAULT NULL,
  `status` enum('waiting','diterima','ditolak','selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berobat`
--

INSERT INTO `berobat` (`id_pendaftaran`, `nik`, `id_dokter`, `jadwal`, `created_at`, `tanggal_berobat`, `status`) VALUES
(16, '1671120202710001', 20, '00:00:00 s/d 12:00:00 ', '2022-08-04 18:14:09', '2022-08-03', 'ditolak'),
(17, '1671124101720014', 17, '10:00:00 s/d 12:00:00 ', '2022-08-04 18:15:56', '2022-08-04', 'ditolak'),
(18, '1671014408880003', 20, '00:00:00 s/d 12:00:00 ', '2022-08-04 18:17:00', '2022-08-05', 'selesai'),
(19, '1671074105860012', 21, '13:00:00 s/d 20:00:00 ', '2022-08-04 18:17:42', '2022-08-05', 'selesai'),
(20, '1671124205680001', 22, '08:00:00 s/d 20:00:00 ', '2022-08-04 18:18:25', '2022-08-05', 'selesai'),
(21, '165789900', 16, '08:00:00 s/d 10:00:00 ', '2022-08-05 02:28:23', '2022-08-05', 'selesai'),
(22, '1671074105860012', 20, '00:00:00 s/d 12:00:00 ', '2022-08-12 03:20:18', '2022-08-19', 'waiting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_hint` varchar(30) NOT NULL,
  `poli_id` int(11) NOT NULL,
  `start` time DEFAULT NULL,
  `off` time DEFAULT NULL,
  `mulai` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') DEFAULT NULL,
  `selesai` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `username`, `password`, `password_hint`, `poli_id`, `start`, `off`, `mulai`, `selesai`) VALUES
(16, 'dr. Kartini Anisa Lafonda', 'kartini', '508994ba1d02531e88feae95246b9d30', 'kartini', 1, '08:00:00', '10:00:00', 'senin', 'sabtu'),
(17, 'dr. Nuttidia Sepdwikawati', 'nuttidia', '981cb1a109fa921c55cc6c8c45800898', 'nuttidia', 1, '10:00:00', '12:00:00', 'senin', 'sabtu'),
(18, 'dr. Putri TiaraSari', 'putri', '4093fed663717c843bea100d17fb67c8', 'putri', 1, '13:00:00', '16:00:00', 'senin', 'sabtu'),
(19, 'dr. Ade Ramadhaniyah Shaliha Siregar', 'ade', 'a562cfa07c2b1213b3a5c99b756fc206', 'ade', 1, '16:00:00', '20:00:00', 'senin', 'sabtu'),
(20, 'Apriliyanti Wulandari, Amd. Keb', 'apriliyanti', '77970aab598210002ed9c88da91f6eb8', 'apriliyanti', 4, '00:00:00', '12:00:00', 'senin', 'sabtu'),
(21, 'Ratih Damayanti, Amd. Keb', 'ratih', 'a5bd72a3d2c4d1686415f93a46fc7a0a', 'ratih', 4, '13:00:00', '20:00:00', 'senin', 'sabtu'),
(22, 'dr. Apriyanza Akbar, Sp. T.H.T.K.L, FICS', 'apriyanza', 'cf3347db821e9dd2b950c7459a8038bb', 'apriyanza', 2, '08:00:00', '20:00:00', 'senin', 'sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id_jenis` int(11) NOT NULL,
  `jenis_obat` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_obat`
--

INSERT INTO `jenis_obat` (`id_jenis`, `jenis_obat`) VALUES
(1, 'Tablet'),
(3, 'cair'),
(6, 'Kapsul'),
(7, 'Oles'),
(8, 'Tetes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `no_obat` varchar(50) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `namax` varchar(200) NOT NULL,
  `harga` int(25) NOT NULL,
  `stok_awal` int(30) NOT NULL,
  `stok` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `no_obat`, `id_jenis`, `namax`, `harga`, `stok_awal`, `stok`, `created_at`, `updated_at`) VALUES
(16, '1239801128790123', 6, 'Diapet', 3500, 40, 0, '2022-08-04 18:34:00', '2022-08-04 18:39:13'),
(17, '1239801128790127', 3, 'Antihistamin', 4500, 55, 43, '2022-08-04 18:34:36', '2022-08-04 18:42:56'),
(18, '1239801128790187', 6, 'Propranolol', 3500, 66, 63, '2022-08-04 18:35:44', '2022-08-04 18:42:32'),
(19, '1239801128790189', 1, 'Amoxilin', 4000, 50, 36, '2022-08-04 18:36:30', '2022-08-04 18:42:56'),
(20, '123980112879021', 1, 'Paracetamol', 4000, 50, 43, '2022-08-04 18:36:55', '2022-08-05 02:34:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_keluar`
--

CREATE TABLE `obat_keluar` (
  `id_keluar` int(11) NOT NULL,
  `no_obat` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `stok` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `tanggal_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat_keluar`
--

INSERT INTO `obat_keluar` (`id_keluar`, `no_obat`, `admin`, `stok`, `created_at`, `update_at`, `tanggal_expired`) VALUES
(1, '1111243', 'nuraini', 10, '2022-07-09 15:47:54', NULL, '2022-07-08'),
(2, '1111243', 'nuraini', 10, '2022-07-11 07:18:53', NULL, '2022-07-10'),
(3, '1231313', 'nuraini', 10, '2022-07-18 02:16:25', NULL, '2022-07-18'),
(4, '123131444', 'nuraini', 2, '2022-07-26 03:54:53', NULL, '2022-07-27'),
(6, '1239801128790123', 'Utami Gusty', 55, '2022-08-04 18:39:13', NULL, '2024-06-10'),
(7, '1239801128790127', 'Utami Gusty', 30, '2022-08-04 18:39:40', NULL, '2024-10-08'),
(8, '1239801128790187', 'Utami Gusty', 22, '2022-08-04 18:40:02', NULL, '2024-07-11'),
(9, '1239801128790189', 'Utami Gusty', 33, '2022-08-04 18:40:23', NULL, '2025-06-09'),
(10, '123980112879021', 'Utami Gusty', 22, '2022-08-04 18:40:42', NULL, '2024-06-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `id_masuk` int(11) NOT NULL,
  `no_obat` varchar(50) NOT NULL,
  `stok` int(30) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat_masuk`
--

INSERT INTO `obat_masuk` (`id_masuk`, `no_obat`, `stok`, `penerima`, `created_at`, `updated_at`) VALUES
(5, '1111243', 33, 'indah', '2022-07-03 10:08:04', NULL),
(6, '1111243', 10, 'hana', '2022-07-11 07:18:32', NULL),
(7, '1231313', 100, 'susanti', '2022-07-18 02:13:40', NULL),
(8, '123131444', 20, 'arya', '2022-07-26 03:22:49', NULL),
(10, '1239801128790123', 15, 'Utami', '2022-08-04 18:37:41', NULL),
(11, '1239801128790127', 20, 'Utami', '2022-08-04 18:37:55', NULL),
(12, '1239801128790187', 20, 'Utami', '2022-08-04 18:38:08', NULL),
(13, '1239801128790189', 20, 'Utami', '2022-08-04 18:38:21', NULL),
(14, '123980112879021', 20, 'Utami', '2022-08-04 18:38:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` enum('pria','wanita') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jenis_pasien` enum('mandiri','bpjs') NOT NULL,
  `no_bpjs` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_hint` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `nik`, `email`, `jk`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_pasien`, `no_bpjs`, `username`, `password`, `password_hint`, `created_at`, `updated_at`) VALUES
(10, 'Rasyid', '1671120202710001', 'rasyid01@gmail.com', 'pria', '081245676543', 'Palembang', '1971-02-02', 'Jl. Psi Kenayan Lr Sei Sawah II No. 485', 'bpjs', '72623719092172621', 'rasyid', 'bae46ce6405d58fec5eb87a145248a16', 'rasyid', '2022-08-02 12:45:58', NULL),
(11, 'Maruya', '1671124101720014', 'maruya14@gmail.com', 'wanita', '085369349261', 'Palembang', '1972-01-01', 'Jl. Kadir TKR Karang Anyar', 'bpjs', '62729200383939447274', 'maruya', '3cb14d39588c1e7d7b95f5c50034a4ee', 'maruya', '2022-08-02 12:48:23', NULL),
(12, 'Pidiah', '1671014408880003', 'pidiah03@gmail.com', 'wanita', '082267584396', 'Palembang', '1988-08-04', 'Lrg Serengam I No. 387', 'mandiri', '', 'pidiah', '83ba4621d93688e8ec384be458dba55f', 'pidiah', '2022-08-02 12:56:29', NULL),
(13, 'Evi Farida', '1671074105860012', 'evi012@gmail.com', 'wanita', '082156432345', 'Palembang', '1986-05-01', 'Perum Gading Pesona', 'mandiri', '', 'evi', '689635ad79c4a248aa87d21ad4f28422', 'evi', '2022-08-02 13:02:23', NULL),
(14, 'Syahrul', '1671078793848617', 'syahrul@gmail.com', 'wanita', '089624768563', 'Palembang', '2001-05-17', 'Jl Nias Lr nias', 'mandiri', '', 'ican', 'e705697d5a6bc67a679136a3c3ae78f7', 'ican', '2022-08-02 13:06:41', NULL),
(16, 'Asmawati', '1671124205680001', 'asma@gmail.com', 'wanita', '081267543456', 'Palembang', '1996-05-02', 'Jl Syakyakirti', 'mandiri', '', 'asma', 'f93a40ec0518673f1242ab46b844d919', 'asma', '2022-08-02 13:19:00', NULL),
(28, 'manda', '165789900', 'manda@gmail.com', 'wanita', '0987697578', 'Palembang', '1990-02-07', 'jl nias', 'mandiri', '', 'manda', '86cc266e1c70ed60524b9f23c79e3a28', 'manda', '2022-08-05 02:27:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `pasien` varchar(50) NOT NULL,
  `namax` varchar(100) NOT NULL,
  `namax1` varchar(100) NOT NULL,
  `namax2` varchar(100) NOT NULL,
  `namax3` varchar(100) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah1` int(11) NOT NULL,
  `jumlah2` int(11) NOT NULL,
  `jumlah3` int(11) NOT NULL,
  `hargax` int(25) NOT NULL,
  `hargax1` int(25) NOT NULL,
  `hargax2` int(25) NOT NULL,
  `hargax3` int(25) NOT NULL,
  `total_harga` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `pasien`, `namax`, `namax1`, `namax2`, `namax3`, `admin`, `jumlah`, `jumlah1`, `jumlah2`, `jumlah3`, `hargax`, `hargax1`, `hargax2`, `hargax3`, `total_harga`, `created_at`) VALUES
(18, 'Asmawati', 'Paracetamol', '', '', '', ' Utami Gusty', 1, 0, 0, 0, 4000, 0, 0, 0, 4000, '2022-08-04 18:42:10'),
(19, 'Pidiah', 'Propranolol', '', '', '', ' Utami Gusty', 1, 0, 0, 0, 3500, 0, 0, 0, 3500, '2022-08-04 18:42:32'),
(20, 'Evi Farida', 'Amoxilin', 'Antihistamin', '', '', ' Utami Gusty', 1, 2, 0, 0, 4000, 4500, 0, 0, 13000, '2022-08-04 18:42:56'),
(21, 'Syahrul', 'Paracetamol', '', '', '', ' Utami Gusty', 3, 0, 0, 0, 4000, 0, 0, 0, 12000, '2022-08-04 18:43:51'),
(22, 'manda', 'Paracetamol', '', '', '', ' Utami Gusty', 1, 0, 0, 0, 4000, 0, 0, 0, 4000, '2022-08-05 02:34:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama`) VALUES
(4, 'Bidan'),
(2, 'THT'),
(1, 'umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `jk` enum('pria','wanita') NOT NULL,
  `anamnesa` text NOT NULL,
  `diagnosa` text NOT NULL,
  `resep` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `nik`, `id_dokter`, `jk`, `anamnesa`, `diagnosa`, `resep`, `created_at`) VALUES
(8, '1671124205680001', 22, 'pria', 'Jantung berdebar, gelisah, penglihatan kabur, mufah merasa gerah dan berkeringat.', 'hipertirodisme', 'propranolol', '2022-08-04 18:26:46'),
(9, '1671014408880003', 20, 'pria', 'Demam tinggi, sakit perut, muntah .', 'Diare Akut', 'Diapet', '2022-08-04 18:29:04'),
(10, '1671074105860012', 21, 'pria', 'Gatal - gatal dikulit', 'Alergi obat', 'Antihistamin', '2022-08-04 18:32:05'),
(11, '165789900', 16, 'pria', 'sakit tenggorokan', 'batuk', 'paracetamol', '2022-08-05 02:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `nomor_transaksi` varchar(25) DEFAULT NULL,
  `metode` varchar(25) NOT NULL,
  `jenis_obat` varchar(25) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `harga` int(25) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `pasien` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nomor_transaksi`, `metode`, `jenis_obat`, `nama_obat`, `jumlah`, `harga`, `admin`, `pasien`) VALUES
(15, 'TRX001', 'mandiri', 'sirup', 'aa1', 1, 1000, ' Utami Gusty', 'yudha'),
(16, 'TRX001', 'mandiri', 'pil', 'bb2', 2, 2000, ' Utami Gusty', 'yudha'),
(17, 'TRX001', 'mandiri', 'tablet', 'cc3', 3, 3000, ' Utami Gusty', 'yudha'),
(18, 'TRX002', 'bpjs', 'tablet', 'amoxilin', 2, 2000, ' Utami Gusty', 'gabriel'),
(19, 'TRX002', 'bpjs', 'sirup', 'antangin', 2, 5000, ' Utami Gusty', 'gabriel'),
(20, 'TRX003', 'bpjs', 'tablet', 'amoxilin', 2, 1000, ' Utami Gusty', 'suhelmi'),
(21, 'TRX003', 'bpjs', 'pil', 'aa', 2, 2000, ' Utami Gusty', 'suhelmi'),
(22, 'TRX003', 'bpjs', 'cair', 'bb', 2, 2000, ' Utami Gusty', 'suhelmi'),
(23, 'TRX003', 'bpjs', 'sirup', 'cc', 2, 2000, ' Utami Gusty', 'suhelmi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `level` enum('admin','dokter','pimpinan','apoteker','pengelolaan','pendaftaran') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_hint` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `no_hp`, `level`, `username`, `password`, `password_hint`) VALUES
(1, 'Ayu', '089678987643', 'admin', 'ayu', '29c65f781a1068a41f735e1b092546de', 'ayu'),
(3, 'Utami Gusty', '081271304677', 'apoteker', 'utami', '7e011c80e602960d00a65e5153cf9275', 'utami'),
(7, 'H. Sofiyan, SH. MH', '081256458954', 'pimpinan', 'sofiyan', '9b0f0e29fd6234b1199e8c615b8c15a5', 'sofiyan'),
(8, 'Lia', '081231292929', 'pendaftaran', 'lia', '8d84dd7c18bdcb39fbb17ceeea1218cd', 'lia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `nama` (`no_obat`),
  ADD UNIQUE KEY `namax` (`namax`);

--
-- Indeks untuk tabel `obat_keluar`
--
ALTER TABLE `obat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `obat_keluar`
--
ALTER TABLE `obat_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
