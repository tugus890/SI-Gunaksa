<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_model extends CI_Model {

    public function getData() {
        $this->db->select('tb_objek_wisata.nama_wisata, YEAR(tb_review.tanggal) AS tahun, COUNT(tb_review.idtb_review) AS jumlah_review');
        $this->db->from('tb_review');
        $this->db->join('tb_objek_wisata', 'tb_review.id_objek_wisata = tb_objek_wisata.id_objek_wisata', 'left');
        $this->db->where('tb_review.acc', 'y');
        $this->db->group_by('tb_objek_wisata.nama_wisata, YEAR(tb_review.tanggal)');
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('jumlah_review', 'DESC');

        $this->db->limit(10);
        

        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Chart_model.php */

?>