-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gunaksaa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gunaksaa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gunaksaa` DEFAULT CHARACTER SET utf8mb4 ;
USE `gunaksaa` ;

-- -----------------------------------------------------
-- Table `gunaksaa`.`tb_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gunaksaa`.`tb_user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(36) NOT NULL,
  `role` VARCHAR(15) NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `gunaksaa`.`berita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gunaksaa`.`berita` (
  `id_berita` INT(10) NOT NULL AUTO_INCREMENT,
  `tanggal` DATE NOT NULL,
  `gambar` VARCHAR(50) NOT NULL,
  `judul` VARCHAR(200) NOT NULL,
  `konten` TEXT NOT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_berita`),
  INDEX `fk_berita_tb_user1_idx` (`id_user` ASC),
  CONSTRAINT `fk_berita_tb_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `gunaksaa`.`tb_user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `gunaksaa`.`tb_objek_wisata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gunaksaa`.`tb_objek_wisata` (
  `id_objek_wisata` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_wisata` VARCHAR(100) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `maps` VARCHAR(200) NOT NULL,
  `link_maps` VARCHAR(255) NOT NULL,
  `keterangan` VARCHAR(200) NOT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_objek_wisata`),
  INDEX `fk_tb_objek_wisata_tb_user_idx` (`id_user` ASC),
  CONSTRAINT `fk_tb_objek_wisata_tb_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `gunaksaa`.`tb_user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `gunaksaa`.`tb_kontak`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gunaksaa`.`tb_kontak` (
  `id_kontak` INT NOT NULL,
  `alamat` VARCHAR(100) NULL,
  `no_tlp` VARCHAR(15) NULL,
  `ig` VARCHAR(100) NULL,
  `twitter` VARCHAR(100) NULL,
  `fb` VARCHAR(100) NULL,
  `tiktok` VARCHAR(100) NULL,
  `yt` VARCHAR(100) NULL,
  `link` VARCHAR(100) NULL,
  PRIMARY KEY (`id_kontak`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gunaksaa`.`tb_paket_wisata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gunaksaa`.`tb_paket_wisata` (
  `id_paket_wisata` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` VARCHAR(255) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `harga` INT(11) NOT NULL,
  `nama_pemilik` VARCHAR(100) NOT NULL,
  `keterangan` TEXT NOT NULL,
  `diskon` INT(11) NULL,
  `kesediaan` ENUM("Tersedia", "Tidak Tersedia") NOT NULL COMMENT 'cek tersedia/tidak tersedia paketnya',
  `id_user` INT(11) NOT NULL,
  `id_kontak` INT NOT NULL,
  PRIMARY KEY (`id_paket_wisata`, `id_kontak`),
  INDEX `fk_tb_paket_wisata_tb_user1_idx` (`id_user` ASC),
  INDEX `fk_tb_paket_wisata_tb_kontak1_idx` (`id_kontak` ASC),
  CONSTRAINT `fk_tb_paket_wisata_tb_user1`
    FOREIGN KEY (`id_user`)
    REFERENCES `gunaksaa`.`tb_user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_paket_wisata_tb_kontak1`
    FOREIGN KEY (`id_kontak`)
    REFERENCES `gunaksaa`.`tb_kontak` (`id_kontak`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
