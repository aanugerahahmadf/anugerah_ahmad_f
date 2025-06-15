<?php
class Mhs {
    private $db;

    public function __construct() {
        // Koneksi ke database
        $this->db = new mysqli("localhost", "root", "", "nama_database");

        if ($this->db->connect_error) {
            die("Koneksi gagal: " . $this->db->connect_error);
        }
    }

    public function getAllMhs() {
        $result = $this->db->query("SELECT * FROM mahasiswa");
        return $result;
    }

    public function deleteMhs($nama): void {
        $sql = "DELETE FROM mahasiswa WHERE nama='$nama'";

        if ($this->db->query($sql) === TRUE) {
            echo "<div style='color: green;'>Data mahasiswa berhasil dihapus.</div>";
        } else {
            echo "<div style='color: red;'>Error deleting record: " . $this->db->error . "</div>";
        }
    }
}
?>
