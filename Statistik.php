<?php
    class Statistik{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }
        public function getTotalPelanggan(){
            $result = $this->db->koneksi->query("SELECT * FROM pelanggan");
            return mysqli_num_rows($result);
        }
        public function getTotalProduk(){
            $result = $this->db->koneksi->query("SELECT * FROM produk");
            return mysqli_num_rows($result);
        }
        public function getTotalPembelian(){
            $result = $this->db->koneksi->query("SELECT * FROM penjualan");
            return mysqli_num_rows($result);
        }
        public function getTotalUser(){
            $result = $this->db->koneksi->query("SELECT * FROM user");
            return mysqli_num_rows($result);
        }
    }
?>