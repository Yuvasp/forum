<?php

class Files_Model extends CI_Model {
 
    /**
     *
     * @param $filename filename of images.
     * @param $title title for users.
     * @return insert_id last insert id from DB.
     *
     * @public
     */
    public function insert_file($filename, $title) {
        $data = array(
            'filename' => $filename,
            'title' => $title
        );
        $this->db->insert('files', $data);
        return $this->db->insert_id();
    }

    /**
     *
     * @return get all the files
     * @public
     */
    public function get_files() {
        return $this->db->select()
                ->from('files')
                ->order_by("UPPER(id)","desc")
                ->get()
                ->result();
    }

    /**
     * convert into CSV
     * @return convert to CSV
     *
     * @public
     */
    public function export() {
      $this->load->dbutil();
      $q=$this->db->query("select title, filename from files order by id desc");
      $delimiter = ",";
      $newline = "\r\n";
      return $this->dbutil->csv_from_result($q,$delimiter,$newline);
    }
 
}