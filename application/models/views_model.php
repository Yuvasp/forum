<?php

class Views_Model extends CI_Model {
 
    /**
     * update the view table
     * @return last insert id from DB.
     *
     * @public
     */
    public function insert_view()
    {
        $this->db->set('visit', 'visit+1', FALSE);
        return $this->db->update('views');
    }

    /**
     *
     * @return get view data
     * @public
     */
    public function get_views()
    {
        return $this->db->select()
                ->from('views')
                ->get()
                ->result();
    }
 
}