<?php
class Adminmodel extends CI_Model {
   public function __construct()
    {
        $this->load->database();
    }
    
 
    

    public function up()
    {
        $this->load->helper('url');
   
$file="images/".$_FILES["userfile"]["name"];

       
        $data = array(
            'serial' => $this->input->post('serial'),
            
            'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			
			'picture' => $file
        );
        
         $this->db->insert('products', $data);
        
    }
	public function delete($serial)
    {
        $this->db->where('serial', $serial);
        return $this->db->delete('products');
    }
	  public function update($data,$serial) { 
       
         $this->db->where("serial",$serial); 
     return $this->db->update("products",$data); 
      } 
    public function get_news_by_id($serial)
    {
        if ($serial === 0)
        {
            $query = $this->db->get('products');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('products', array('serial' => $serial));
        return $query->row_array();
    }
	
	public function set_news($serial = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
            'serial' => $this->input->post('serial'),
            
            'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			
			'picture' => $this->input->post('picture')
        );
        
        if ($serial == 0) {
            return $this->db->insert('products', $data);
        } else {
            $this->db->where('serial', $serial);
            return $this->db->update('products', $data);
        }
    }
}
    
   
