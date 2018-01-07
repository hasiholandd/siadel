/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_siadel

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-07 17:47:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ms_angkatan
-- ----------------------------
DROP TABLE IF EXISTS `ms_angkatan`;
CREATE TABLE `ms_angkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_angkatan` varchar(4) DEFAULT NULL,
  `nama_angkatan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_angkatan
-- ----------------------------
INSERT INTO `ms_angkatan` VALUES ('1', '2001', '2001', '2018-01-07 16:30:26', null);
INSERT INTO `ms_angkatan` VALUES ('2', '2002', '2002', '2018-01-07 16:30:30', null);
INSERT INTO `ms_angkatan` VALUES ('3', '2003', '2003', '2018-01-07 16:30:34', null);
INSERT INTO `ms_angkatan` VALUES ('4', '2004', '2004', '2018-01-07 16:30:38', null);
INSERT INTO `ms_angkatan` VALUES ('5', '2005', '2005', '2018-01-07 16:30:41', null);
INSERT INTO `ms_angkatan` VALUES ('6', '2006', '2006', '2018-01-07 16:30:47', null);
INSERT INTO `ms_angkatan` VALUES ('7', '2007', '2007', '2018-01-07 16:30:50', null);
INSERT INTO `ms_angkatan` VALUES ('8', '2008', '2008', '2018-01-07 16:30:54', null);
INSERT INTO `ms_angkatan` VALUES ('9', '2009', '2009', '2018-01-07 16:30:58', null);
INSERT INTO `ms_angkatan` VALUES ('10', '2010', 'CONIO', '2018-01-07 16:31:03', null);
INSERT INTO `ms_angkatan` VALUES ('11', '2011', 'WINNING ELEVEN', '2018-01-07 16:31:08', null);
INSERT INTO `ms_angkatan` VALUES ('12', '2012', 'DELTA', '2018-01-07 16:31:14', null);
INSERT INTO `ms_angkatan` VALUES ('13', '2013', 'CORE-13', '2018-01-07 16:31:23', null);
INSERT INTO `ms_angkatan` VALUES ('14', '2014', '2014', '2018-01-07 16:31:28', null);
INSERT INTO `ms_angkatan` VALUES ('15', '2015', '2015', '2018-01-07 16:31:30', null);

-- ----------------------------
-- Table structure for ms_bank
-- ----------------------------
DROP TABLE IF EXISTS `ms_bank`;
CREATE TABLE `ms_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_bank
-- ----------------------------
INSERT INTO `ms_bank` VALUES ('1', 'BCA - Bank Central Asia', '2018-01-07 16:32:24', null);
INSERT INTO `ms_bank` VALUES ('2', 'BRI - Bank Rakyat Indonesia', '2018-01-07 16:32:35', null);
INSERT INTO `ms_bank` VALUES ('3', 'Mandiri - Bank Mandiri', '2018-01-07 16:32:40', null);
INSERT INTO `ms_bank` VALUES ('4', 'Mandiri Syariah - Bank Mandiri Syariah', '2018-01-07 16:32:44', null);
INSERT INTO `ms_bank` VALUES ('5', 'BNI46 - Bank Negara Indonesia', '2018-01-07 16:32:57', null);
INSERT INTO `ms_bank` VALUES ('6', 'Permata - Bank Permata', '2018-01-07 16:33:14', null);
INSERT INTO `ms_bank` VALUES ('7', 'CIMB - Bank CIMB Niaga', '2018-01-07 16:33:24', null);
INSERT INTO `ms_bank` VALUES ('8', 'BTPN - Bank Tabungan Pensiunan Nasional', '2018-01-07 16:34:11', null);
INSERT INTO `ms_bank` VALUES ('9', 'Mayapada - Bank Mayapada', '2018-01-07 16:34:34', null);
INSERT INTO `ms_bank` VALUES ('10', 'Mega - Bank Mega', '2018-01-07 16:34:46', null);
INSERT INTO `ms_bank` VALUES ('11', 'Danamon - Bank Danamon Indonesia', '2018-01-07 16:35:10', null);
INSERT INTO `ms_bank` VALUES ('12', 'Maybank - Bank Maybank Indonesia', '2018-01-07 16:35:24', null);
INSERT INTO `ms_bank` VALUES ('13', 'Panin - Bank Panin', '2018-01-07 16:35:37', null);
INSERT INTO `ms_bank` VALUES ('14', 'Bank Sumut -  Bank Sumut', '2018-01-07 16:35:57', null);
INSERT INTO `ms_bank` VALUES ('15', 'Bank DKI - Bank DKI', '2018-01-07 16:36:07', null);
INSERT INTO `ms_bank` VALUES ('16', 'Bukopin - Bank Bukopin', '2018-01-07 16:36:28', null);
INSERT INTO `ms_bank` VALUES ('17', 'J Trust - Bank J Trust Indonesia', '2018-01-07 16:36:43', null);
INSERT INTO `ms_bank` VALUES ('18', 'Sinarmas - Bank Sinarmas', '2018-01-07 16:36:54', null);
INSERT INTO `ms_bank` VALUES ('19', 'MNC Internasional - Bank MNC Internasional', '2018-01-07 16:37:16', null);
INSERT INTO `ms_bank` VALUES ('20', 'BTN - Bank Tabungan Negara', '2018-01-07 16:37:38', null);
INSERT INTO `ms_bank` VALUES ('21', 'Bank Lainnya', '2018-01-07 16:38:04', null);

-- ----------------------------
-- Table structure for ms_iuran
-- ----------------------------
DROP TABLE IF EXISTS `ms_iuran`;
CREATE TABLE `ms_iuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_iuran` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_iuran
-- ----------------------------

-- ----------------------------
-- Table structure for ms_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `ms_jurusan`;
CREATE TABLE `ms_jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_jurusan
-- ----------------------------
INSERT INTO `ms_jurusan` VALUES ('1', 'D3 - Teknik Informatika', '2018-01-07 16:38:39', null);
INSERT INTO `ms_jurusan` VALUES ('2', 'D3 - Manajemen Informatika', '2018-01-07 16:38:50', null);
INSERT INTO `ms_jurusan` VALUES ('3', 'D3 - Teknik Komputer', '2018-01-07 16:38:59', null);
INSERT INTO `ms_jurusan` VALUES ('4', 'D4 - Teknik Informatika', '2018-01-07 16:39:56', null);
INSERT INTO `ms_jurusan` VALUES ('5', 'S1 - Teknik Elektro', '2018-01-07 16:40:29', null);
INSERT INTO `ms_jurusan` VALUES ('6', 'S1 - Teknik Informatika', '2018-01-07 16:40:32', null);
INSERT INTO `ms_jurusan` VALUES ('7', 'S1 - Sistem Informasi', '2018-01-07 16:40:36', null);
INSERT INTO `ms_jurusan` VALUES ('8', 'S1 - Teknik Bioproses', '2018-01-07 16:41:29', null);
INSERT INTO `ms_jurusan` VALUES ('9', 'S1 - Manajemen Rekayasa', '2018-01-07 16:41:33', null);

-- ----------------------------
-- Table structure for ms_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `ms_pekerjaan`;
CREATE TABLE `ms_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_pekerjaan
-- ----------------------------
INSERT INTO `ms_pekerjaan` VALUES ('1', 'KS - Karyawan Swasta', '2018-01-07 16:43:36', null);
INSERT INTO `ms_pekerjaan` VALUES ('2', 'KB - Karyawan BUMN', '2018-01-07 16:43:48', null);
INSERT INTO `ms_pekerjaan` VALUES ('3', 'PNS - Pegawai Negeri Sipil', '2018-01-07 16:43:55', null);
INSERT INTO `ms_pekerjaan` VALUES ('4', 'W - Wiraswasta', '2018-01-07 16:44:08', null);
INSERT INTO `ms_pekerjaan` VALUES ('5', 'D - Dosen', '2018-01-07 16:44:33', null);
INSERT INTO `ms_pekerjaan` VALUES ('6', 'G - Guru', '2018-01-07 16:44:36', null);
INSERT INTO `ms_pekerjaan` VALUES ('7', 'B - 	Belum/tidak bekerja', '2018-01-07 16:44:56', null);
INSERT INTO `ms_pekerjaan` VALUES ('8', 'P - Pelajar/Mahasiswa', '2018-01-07 16:45:10', null);
INSERT INTO `ms_pekerjaan` VALUES ('9', 'KBD - Karyawan BUMD', '2018-01-07 16:45:30', null);
INSERT INTO `ms_pekerjaan` VALUES ('10', 'L -Lainnya', '2018-01-07 16:45:50', null);

-- ----------------------------
-- Table structure for ms_pemasukan
-- ----------------------------
DROP TABLE IF EXISTS `ms_pemasukan`;
CREATE TABLE `ms_pemasukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemasukan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_pemasukan
-- ----------------------------
INSERT INTO `ms_pemasukan` VALUES ('1', 'I - Iuran', '2018-01-07 16:46:05', null);
INSERT INTO `ms_pemasukan` VALUES ('2', 'SS - Sumbangan Sukarela', '2018-01-07 16:46:17', null);
INSERT INTO `ms_pemasukan` VALUES ('3', 'H - Hibah', '2018-01-07 16:46:20', null);
INSERT INTO `ms_pemasukan` VALUES ('4', 'PD- Penggalan Dana', '2018-01-07 16:47:12', null);
INSERT INTO `ms_pemasukan` VALUES ('5', 'L - Lainnya', '2018-01-07 16:48:32', null);

-- ----------------------------
-- Table structure for ms_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `ms_pendidikan`;
CREATE TABLE `ms_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pendidikan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_pendidikan
-- ----------------------------
INSERT INTO `ms_pendidikan` VALUES ('1', 'D3 - Diploma 3', '2018-01-07 16:48:14', null);
INSERT INTO `ms_pendidikan` VALUES ('2', 'D4 - Diploma 4', '2018-01-07 16:48:22', null);
INSERT INTO `ms_pendidikan` VALUES ('3', 'S1 - Sarjana', '2018-01-07 16:48:42', null);
INSERT INTO `ms_pendidikan` VALUES ('4', 'S2 - Master', '2018-01-07 16:48:47', null);
INSERT INTO `ms_pendidikan` VALUES ('5', 'S3 - Doktor', '2018-01-07 16:48:53', null);
INSERT INTO `ms_pendidikan` VALUES ('6', 'P - Professor', '2018-01-07 16:48:59', null);
INSERT INTO `ms_pendidikan` VALUES ('7', 'L - Lainnya', '2018-01-07 16:49:06', null);

-- ----------------------------
-- Table structure for ms_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `ms_pengeluaran`;
CREATE TABLE `ms_pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_pengeluaran
-- ----------------------------

-- ----------------------------
-- Table structure for ms_pengumuman
-- ----------------------------
DROP TABLE IF EXISTS `ms_pengumuman`;
CREATE TABLE `ms_pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengumuman` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ms_pengumuman
-- ----------------------------
INSERT INTO `ms_pengumuman` VALUES ('1', 'S - Sukacita', '2018-01-07 16:49:36', null);
INSERT INTO `ms_pengumuman` VALUES ('2', 'D -Dukacita', '2018-01-07 16:49:42', null);
INSERT INTO `ms_pengumuman` VALUES ('3', 'LP - Lowongan Pekerjaan', '2018-01-07 16:49:53', null);
INSERT INTO `ms_pengumuman` VALUES ('4', 'K - Kegiatan', '2018-01-07 16:50:03', null);
INSERT INTO `ms_pengumuman` VALUES ('5', 'LK - Laporan Kegiattan', '2018-01-07 16:50:31', null);

-- ----------------------------
-- Table structure for tr_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tr_anggota`;
CREATE TABLE `tr_anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `pendidikan_terakhir` int(11) DEFAULT NULL,
  `pekerjaan` int(11) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `alamat_domisili` varchar(255) DEFAULT NULL,
  `status_kawin` int(11) DEFAULT NULL,
  `status_hidup` int(11) DEFAULT '1',
  `url_foto` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_anggota
-- ----------------------------

-- ----------------------------
-- Table structure for tr_iuran
-- ----------------------------
DROP TABLE IF EXISTS `tr_iuran`;
CREATE TABLE `tr_iuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `id_pemasukan` int(11) DEFAULT NULL,
  `id_iuran` int(11) DEFAULT NULL,
  `jumlah_bayar` bigint(20) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `tanggal_konfirmasi_pembayaran` datetime DEFAULT NULL,
  `tanggal_approval_pembayaran` datetime DEFAULT NULL,
  `approval_by` int(11) DEFAULT NULL,
  `id_bank_pengirim` int(11) DEFAULT NULL,
  `id_bank_penerima` int(11) DEFAULT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `url_bukti_pembayaran` text,
  `history_pembayaran` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_iuran
-- ----------------------------

-- ----------------------------
-- Table structure for tr_laporan_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `tr_laporan_kegiatan`;
CREATE TABLE `tr_laporan_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposal` int(11) DEFAULT NULL,
  `approval_by` int(11) DEFAULT NULL,
  `keterangan_approval` text,
  `keterangan_kegiatan` text,
  `tanggal_pengajuan` datetime DEFAULT NULL,
  `tanggal_approval` datetime DEFAULT NULL,
  `url_dokumen_laporan_kegiatan` text,
  `history_laporan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_laporan_kegiatan
-- ----------------------------

-- ----------------------------
-- Table structure for tr_pemasukan
-- ----------------------------
DROP TABLE IF EXISTS `tr_pemasukan`;
CREATE TABLE `tr_pemasukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemasukan` int(11) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `sumber_pemasukan` int(11) DEFAULT NULL,
  `tanggal_pemasukan` datetime DEFAULT NULL,
  `url_bukti_pemasukan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pemasukan
-- ----------------------------

-- ----------------------------
-- Table structure for tr_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `tr_pengeluaran`;
CREATE TABLE `tr_pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `jumlah_pengeluaran` bigint(20) DEFAULT NULL,
  `tanggal_pengeluaran` datetime DEFAULT NULL,
  `keterangan_pengeluaran` text,
  `url_bukti_pengeluaran` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pengeluaran
-- ----------------------------

-- ----------------------------
-- Table structure for tr_pengumuman
-- ----------------------------
DROP TABLE IF EXISTS `tr_pengumuman`;
CREATE TABLE `tr_pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengumuman` int(11) DEFAULT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `keterangan_pengumuman` text,
  `url_dokumen_pengumuman` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pengumuman
-- ----------------------------

-- ----------------------------
-- Table structure for tr_proposal
-- ----------------------------
DROP TABLE IF EXISTS `tr_proposal`;
CREATE TABLE `tr_proposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proposal` int(11) DEFAULT NULL,
  `approval_by` int(11) DEFAULT NULL,
  `tujuan_proposal` text,
  `keterangan` text,
  `tanggal_pengajuan` datetime DEFAULT NULL,
  `tanggal_approval` datetime DEFAULT NULL,
  `status_proposal` int(11) DEFAULT NULL,
  `url_dokumen_pengeluaran` text,
  `history_proposal` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_proposal
-- ----------------------------
