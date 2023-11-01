<!DOCTYPE html>
<html><?php echo  $user_id; ?>
    <title>Crud Application - Update User</title>
    <link rel="stylesheet"type="text/css"href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
 <body>
 <div class="navbar navbar-dark bg-dark">
          <div class ="Container">
             <a href="#" class="navbar-brand"> CRUD APPLICATION</a>
</div>
</div>
<div class="container" style="padding-top:10px;">
    <h3>Update User</h3>
    <hr>
    <form method="post" name="CreateUser" action="<?php echo base_url().'index.php/user/create';?>">
    <div class ="row">
           <div class="col-md-6">
            <div class ="form"-group">
            <label>Name</label>
            <input type="text"name="name"value="<?php echo set_value('name');?>"class="form-control">

</div>
<div class="form-group">
<label>email</label>
            <input type="text"name="email" value="<?php echo set_value('email');?>"class="form-control">
</div>
<div class ="form-group">
           <button class="btn btn-primary">Update</button>
           <a href="<?php  echo base_url().'index.php/user/index';?>"class ="btn-secondary btn">
    </div>
</div>
</div>
</form>
</div>
</html>



"Enter Price "[0-9]+"



public function Addae($id= "")
       {
             $request_method =$this->input->method();
             $data=array();
             //add page design
             if ($request_method === 'get' && empty($id))
               {
                $this->load->view('food_ae', $data);
            }  //
             elseif ($request_method === 'post'  && !empty($id))
               {
                    $this->load->database();
                    $query =$this->db->get_where('food_data', array('Id'=> $id));
                    $data['food_itemedit'] =$query->row_array();
                    redirect("Addae/$id");
                } 
                 //EDIt  page design
                elseif ($request_method ==='get'  && !empty($id))
                {
                  $this->load->database();
                  $query =$this->db->get_where('food_data', array('Id'=> $id));
                  $data['food_itemedit'] =$query->row_array();
                  $this->load->view('food_ae', $data);

                }
                 //add  page insert code
                 elseif($request_method ==='post' && empty($id))
                 
                 {
                  // echo (bool)empty($id);
                  // // echo $id,'hyfth';
                  // exit();
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
                      echo "Data inserted successfully.";
                    }
                 else
                    {
                echo "Data insertion failed.";
                }
              //  else {
              //  $this->load->view('food_ae');
              // }
            }
          }



          
          $this->db->where('Id',$id);
              $this->db->update('food_ae',$data);
              $query =$this->db->get_where('food_data', array('Id'=> $id));
              $data['food_itemedit'] =$query->row_array();
               $this->load->view('food_ae', $data);
               if ($this->db->affected_rows() > 0)
               {
                 echo "Data inserted successfully.";
               }
            else
               {
           echo "Data insertion failed.";
           }










           <?php
Class Food extends CI_Controller
{
    public function index()
    { 
    // print_r($this->input->get()); exit;
        $this->load->database();
        $page=1;
        $page_input= $this->input->get('page');
            if($page_input) {
               $page=max(1,(int)$page_input);
        }
          $query = $this->db->get('food_data');
          $data['food_data'] = $query->result_array();
          $this->load->view('Foodview', $data);
          $total_records =54;
          $records_per_page =10;
          $offset =($page-1) * $records_per_page;

         $this->db->limit($records_per_page,$offset);
         $query= $this->db->get('food_data');
         $data['food_data']= $query->result_array();
         $total_records =$this->db->count_all('food_data');
         $total_pages=ceil($total_records/ $records_per_page);
         $data['totalPages']=$total_pages;
         //echo"<pre>";
        //print_r($data); exit;
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
               }
              
              
            
              
               
            
        
        
            

             
              //add  page insert code
           elseif($request_method ==='post' && empty($id))
          
              {
               // echo (bool)empty($id);
               // // echo $id,'hyfth';
               // exit();
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
                   echo "Data inserted successfully.";
                 }
              else
                 {
             echo "Data insertion failed.";
             }
           //  else {
           //  $this->load->view('food_ae');
           // }
         }
         else {
          $this->load->view('food_ae',$data);
         }
       }

             
             
        
            
            // $data =array();
            // $data['Foodname']=$this->input->post('FoodName');
            // if(isset($_FILES['Image']['name'])){
            // $data['Image']=$_FILES['Image']['name']
            //  }

            // }
        //    if(isset($_FILES ['Image'])){
        //     $Image_name=$_FILES['Image']['name'];
        //     $Image_type=$_FILES['Image']['type'];
        //     $Image_size=$_FILES['Image']['size'];
        //     $Image_tmpname=$_FILES['Image']['tmpname'];
        //    } else{
        //     echo "Please select an image to upload";
        //    }
           
            // $tempFilePath = $_FILES["Image"]["tmp_name"];
            // echo "Temporary Path: " . $tempFilePath . "<br>";
            // echo move_uploaded_file($tempFilePath,'uploader/'.$_FILES['Image']['name']);

            // $this->db->insert('food_data', $data);
        
            // if ($this->db->affected_rows() > 0) {
            // echo "Data inserted successfully.";
            // } 
            // else 
            // {
            // echo "Data insertion failed.";
            // }
            // }
                    
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
   public function delete_food($food_id)
   {
        $this->load->database();
        $this->db->get_where('food_data',array('Id' => $food_id));
     //   $data['food_itemdelete']=$query->row_array();
//     if($food_item)
//         {
//             $this->db->where('Id', $food_id);
//             $this->db->delete('food_data');
//             if($this->db->affected_rows()>0)
//         }
        $this->load->view('food_ae', $data);
        redirect('food');
    }
 }


 <a href="<?php echo base_url('Addfood/'. $item['Id']); ?>"class="btn btn-danger"> Delete</a>
 </td>




 <script src= "<?php echo base_url();?>assets/jquery/jquery.min.js"></script> 
 <script>
  $(document).ready(function () {
  $('.deleteButton').click(function () {
   var Id = $('#Id').val();
   var confirmation = confirm('Are you sure you want to delete?');
 if (confirmation) {
   $.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>Food/delete_food/" + Id,
     success: function (response) {
         alert('Food deleted successfully.'); // You can display a success message
    },
     error: function (xhr, status, error) {
         alert('Failed to delete food.'); // Handle the error
     }
 });
}
});
});
</script>


    

 

  

  
 