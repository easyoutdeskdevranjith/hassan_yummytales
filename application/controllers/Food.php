<?php
Class Food extends CI_Controller
{
    public function index()
    { 
    // print_r($this->input->get()); exit;
        $this->load->database();
      
        $page= $this->input->get('page') ?(int) $this->input->get('page') :1;
       $records_per_page =10;
       $offset =($page-1) *$records_per_page;
       $this->db->limit($records_per_page,$offset);
       $query =$this->db->get('food_data');
       $data['food_data'] =$query->result_array();
       $total_records =$this->db->count_all('food_data');
        $total_pages =ceil($total_records/ $records_per_page);
        $data['currentPage'] =$page;
        $data['totalPages'] =$total_pages;
        
        $this->load->view('Foodview', $data);
    }

    //  public function Addfood()
    //  {
    //  $this->load->view('food_ae');
    //      }

     public function Addae($id= "")
     {
          $request_method =$this->input->method();
          $data=array();
          //add page design
          if ($request_method === 'get' && empty($id))
            {
             $this->load->view('food_ae', $data);
         }  //Edit page logic
              //EDIT  page design
              elseif ($request_method ==='get'  && !empty($id))
              { 
               $this->load->database();
               $query = $this->db->get_where('food_data',array('Id' =>$id));
               $data['food_itemedit'] =$query->row_array();
               $this->load->view('food_ae',$data);
                  }
              //updated design
             elseif ($request_method ==='post' && !empty($id))
             { 
               $updatedData =array(
              'Foodname' => $this->input->post('FoodName'), 
               'Price'=>$this->input->post('FoodPrice'),
             );
            if($_FILES['FoodImage']['error'] !==4){
              $Image =$_FILES['FoodImage']['name'];
              $updatedData['Image']=$Image;
            }
                   $this->load->database();
                //   $query = $this->db->get_where('food_data',array('Id' =>$id));
                //    $data['food_itemedit'] =$query->row_array();
                //  //  $this->load->view('food_ae',$data);
                    $this->db->where('Id', $id);
                   $this->db->update('food_data', $updatedData);


            // Check if the update was successful
            
              if ($this->db->affected_rows() > 0) 
              {
                redirect( base_url ("Addfood/$id"));
                //echo "Data updated successfully.";
               } 
               else {
                redirect(base_url ("Addfood/$id"));
               }
               }
              //add  page insert code
            elseif($request_method ==='post' && empty($id))
          
              {
               
                $data = array(
                 'Foodname' => $this->input->post('FoodName'), 
                 'Image' => $_FILES['FoodImage']['name'],
                 'Price'=>$this->input->post('FoodPrice'),
               );
                 $tempFilePath = $_FILES["FoodImage"]["tmp_name"];
                 echo "Temporary Path: " . $tempFilePath . "<br>";
                 echo move_uploaded_file($tempFilePath,'uploader/'.$_FILES['FoodImage']['name']);
                $this->load->database();
                 $this->db->insert('food_data', $data);
         
                if ($this->db->affected_rows() > 0)
                 {
                  redirect( base_url ("Addfood"));
                 }
              else
                 {
                 redirect(base_url("Addfood"));
             }
          }
         else {
          $this->load->view('food_ae',$data);
         }
       }
  
   public function insert_data()
   {
     $this->load->database();

     $query = $this->db->get('food_data');

    if ($query->num_rows() > 0) {
    $result_array = $query->result_array();
     print_r($result_array);
    } 
    else
    {
    echo "No data found.";
    }
    $data = array(
    'Foodname' => $this->input->post('FoodName'), 
    'Image' => $_FILES['Image']['name'],
    'Price'=>$this->input->post('price'),
   );
    $this->input->post();
    $tempFilePath = $_FILES["Image"]["tmp_name"];
    echo "Temporary Path: " . $tempFilePath . "<br>";
    echo move_uploaded_file($tempFilePath,'uploader/'.$_FILES['Image']['name']);
    $this->db->insert('food_data', $data);

    if ($this->db->affected_rows() > 0) {
    echo "Data inserted successfully.";
    } 
    else 
    {
    echo "Data insertion failed.";
    }
    }
    public function  edit_food($food_id)
    {

    
        $this->load->database();
        $query =$this->db->get_where('food_data', array('Id'=> $food_id));
        $data['food_itemedit'] =$query->row_array();
        $this->load->view('food_ae', $data);
    }
   public function update_data()
    {

    }
   public function Delete_food()
   {
    $IDDelete =$this->input->post('IDDelete');
      $this->load->database(); 

      if(!empty($IDDelete)){
        $this->db->where('Id', $IDDelete);
        $this->db->delete('food_data');
      
        if($this->db->affected_rows()>0)
       {
        redirect(base_url("Addfood"));
       } 
    }
  }
   }
  
   
   






    

 

  

  
 