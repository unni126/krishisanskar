<?php

class ProductCategoryModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get() {        
        $query = $this->db->get('product_category');
        return $query->result();
    }
    
    function add($data) {
        try{
            $this->db->insert('product_category',$data );
        }
        catch (Exception $e){
             if ($e->errorInfo[1] == 1062) 
             {
                 return  "Duplicate Category. Please check the values!";
             }             
        }
    }
    
    function delete($id) {
        try{
            $this->db->where('Id', $id);
            $this->db->delete('product_category');
        }
        catch (Exception $e){
                 return  "Unable to delete this item!";
        }
    }
    
    function getById($id) {
        try{
            return $this->db->get_where('product_category', array('id' => $id))->row();
        }
        catch (Exception $e){
                 return  "Unable to delete this item!";
        }
    }
    
    function update($data, $id) {
        try{
            $this->db->where('Id', $id);
            $this->db->update('product_category', $data);
            return true;
        }
        catch (Exception $e){
                 return  "Unable to update this item!";
        }
    }
    
    function changeStatus($data, $id) {
        try{
            $this->db->where('Id', $id);
            $this->db->update('product_category', $data);
            return true;
        }
        catch (Exception $e){
                 return  "Unable to change the status of this item!";
        }
    }
}
