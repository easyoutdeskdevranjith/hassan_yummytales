<?php
 // print_r($food_itemedit);
include 'header.php';

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src= "<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<style>
  /* CSS to adjust the border for the card element */
  .card {
    border-left: 1px solid #ddd; /* Add a left border */
    border-right: 1px solid #ddd; /* Add a right border */
    border-top: none; /* Remove the top border */
    border-bottom: none; /* Remove the bottom border */
  }
 </style>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:100%;margin:10;padding:10;">
    <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
         <a href="<?php echo base_url(); ?>Food" class="small-box-footer">BACK<i class="fas fa-arrow-circle-right"></i></a>
          </div><!-- /.col -->
           <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
           <section class="content">
            <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
                <div class=" row "> 
                <div class="col-sm-12">
                                 <!-- general form elements -->
                                     <div class="card card-primary">
                                     <div class="card-header">
                                        <h3 class="card-title"> Add Food</h3>
                                           </div>
                                           <div class="card-body">
                                           <div class="form-group">
                                         <!-- /.card-header -->
                                          <!-- form start -->
                                       <form id="myForm"  action="" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                     <label for="FoodName">FoodName</label>
                                    <input type="text" class="form-control" id="FoodName" name="FoodName" placeholder="" 
                                    value="<?=isset($food_itemedit) && isset($food_itemedit['Foodname']) && !empty($food_itemedit['Foodname'])?$food_itemedit['Foodname']:'' ?>"
                                    >
                                    <div id ="alphabetValidationMessage" class="text-danger"></div>
                                    <span id="FoodName" style="color:red;"></span>
                                    </div>
                          
                              <div class="form-group">
                              <label for="price">FoodPrice</label>
                           <input type="text" class="form-control" id="FoodPrice" name="FoodPrice" placeholder="Enter Price [0-9]+"
                            value="<?=isset($food_itemedit) && isset($food_itemedit['Price']) && !empty($food_itemedit['Price'])?$food_itemedit['Price']:''?>">
                           <div id="FoodPriceError" class="text-danger"></div>
                          <span id="FoodPricespan" style="color:red;"></span>
                          </div>

                       <div class="form-group">
                         <label for="FoodImage">FoodImage</label>
                         <input type="file" class="form-control" id="FoodImage" name="FoodImage" accept=".jpg, .jpeg">
                         
                          <div id ="FoodImageError" class="text-danger"></div> 
                         <span id="FoodImage" style="color:red;"></span> 
                         <img id="thumbnail" src="<?= isset($food_itemedit['Image']) ? base_url( 'uploader/'. $food_itemedit['Image']): ''?>" alt="thumbnail"style="max-width:100px; max-height:100px;"> 
                        
                         <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                        </form>
                        <script src= "<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
                        <script>
                       $(document).ready(function ()
                        {
                         $('#myForm').submit(function) (event){
                         alert('Form submitted successfully!');
                          event.preventDefault();
                          var FoodNameInput = $('#FoodName');
                          var FoodPriceInput = $('#FoodPrice');
                          var FoodImageInput = $('#FoodImage');
                          var thumbnail = $('#thumbnail');
            
                          var alphabetValidationMessage = $('#alphabetValidationMessage');
                          var FoodPriceError = $('#FoodPriceError');
                          var files= FoodImageInput[0].files;
                         

                          FoodNameInput.removeClass('error');
                          FoodPriceInput.removeClass('error');
                          FoodImageInput.removeClass('error');

                          alphabetValidationMessage.text('');
                          FoodPriceError.text('');
                          if ($.trim(FoodNameInput.val()) == ''){
                          alphabetValidationMessage.text('FoodName is required.');
                          return false;
                          } else {
                          alphabetValidationMessage.text('');
                          }
                        if ($.trim(FoodPriceInput.val()) == '' || !/^[0-9]+$/.test(FoodPriceInput.val())) {
                           FoodPriceError.text('Please enter a valid number for Food Price.');
                             return false;
                           } else {
                        alphabetValidationMessage.text('');
                        }
                       var allowedExtensions = /(\.jpg|\.jpeg)$/i;
                       for(var i=0;i<files.length; i++)
                       { 
                       if (!allowedExtensions.exec(files[i].name))
                       {
                      alert('Please select a JPG or JPEG image file.');
                      return false;
                       } 
                      <?php
                      if(isset($food_itemedit) && isset($food_itemedit['Image']))
                     {
                     ?> 
                      if(files.length == 0)
                        {
                        alert('Please select an image file.');
                        return false;
                        }
                        
                       <?php } ?>
                        var allowedExtensions = /(\.jpg|\.jpeg)$/i;
                       for(var i=0;i<files.length; i++)
                       { 
                       if (!allowedExtensions.exec(files[i].name))
                       {
                      alert('Please select a JPG or JPEG image file.');
                      return false;
                       } 
                       } 
                      } 
                      else {
                        alert('Please select a file before checking the extension.');
                        return false;
                      }
                     if (files[i].size >2048) {
                      alert('Please select an image file below 2 KB in size.');
                      return false;
                       }
                      var reader = new FileReader();
                      reader.onload=function(e){
                      console.log(e.target.result);
                      thumbnail.attr('src',e.target.result);
                      };
                     reader.readAsDataURL(files[i]);
                      }
                   alert('Form submitted successfully!');
                    return true; 
                   });
                  });
                 </script>
                </div>
              </div>
  </div>
   </div>
    </div>
    </section>
    </div>
     </div>

    
               