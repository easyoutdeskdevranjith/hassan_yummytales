

<!DOCTYPE html>
<html>
<head>
    <title>User Admin</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src= "<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+French+Canon:ital@1&display=swap" rel="stylesheet">
        
    <style>

        /* @font-face {
            font-family: "FrenchLettersFont";
           
        }
        body {
             
            font-family: 'IM Fell French Canon', serif;
            background-image:('Background.jpg');
            background-size:cover;
        }

        .colorful-title {
            font-family: "FrenchLettersFont";
            font-size: 32px;
            background: linear-gradient(to right, #FFC107, #2196F3);
            -webkit-background-clip: text;
            color: transparent;
            display: inline;
        }

        .bubble-content {
            padding: 20px;
        }

        .bubble-content h2 {
            text-align: left;
            font-family: 'FrenchLettersFont';
        }

        .bubble-content .form-group {
  display: flex;
  flex-direction: column;
}
.bubble-content .form-group label {
  text-transform: Uppercase;
}

    .colorful-title {
            background-color: #FFC107;
            color: #2196F3;
            padding: 20px;
            text-align: center;
        }

        .btn-array_search {
            background-color: #FF5733;
            color: #fff;
        }
        
.form-group {
    margin: 0;
    padding: 0;
}

     form-group label {
            text-transform: uppercase;
        }

        .split-container {
            display: flex;
        }

        .split-left {
            flex: 1;
            padding: 20px;
            background-color: skyblue;
        }
        

        .split-right {
            flex: 1;
            padding: 20px;
            background-color: skyblue;
        }
        .split-right .form-group input[type="text"]
        {
            width:400px;
            margin:0;
        } */
       </style>
        <style>
            
            .error {
            border: 1px solid blue;
            background-color: #FFAFAF;
            }
                  </style>

    </head>
<body>

<form id="myForm" action="<?php echo base_url();?>con" method  ="POST">
    <div class="d-flex align-items-center justify-content-center" style="height:100vh;">
    <div style="background-color: skyblue; width: 500px;">
   <div class="header" style="text-align: center;">
            <h2 style="font-family: 'FrenchLettersFont';" class="colorful-title"> TOORANT  RESTAURANT</h2>
        </div>
        <br><br>
        <div class="bubble-content p-5">
            <div class="row">
                <div class="col-sm-12" style="text-align:left;">
                    <div class="form-group">
                        <label for="Userid">Userid:</label>
                        <input type="text" id="id" class="form-control"name="Id" placeholder="Id" style="width:100%;" >
                        <span id="Userid-error" style="color: red;"></span>
    </div>
    </div>
    </div>
    <div class="row">
                <div class="col-sm-12" style="text-align:left;">
                    <div class="form-group">
                        <label for="Userid">Userpassword:</label>
                        <input type="password" id="password" class="form-control"name="password" placeholder="password" style="width:100%;" >
                        <span id="Userpassworderror" style="color:red;"></span>
    </div>
    </div>
    </div>
    <div class ="split-right">
        <div class="row justify -content-center">
            <div class="col-sm-12">
      <br>
      
                        <input type="submit" class="btn btn-primary w-100" value="Login" name="submit">
                </form>
            </div>
        </div>

        <div class="card-footer text-right">
            <!-- Additional content goes here -->
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Your user administration forms, tables, or other content can go here -->
            </div>
        </div>
    </div>
    </body>
            <script src= "<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
            <script>
           $(document).ready(function ()  {
           $('#myForm').submit(function (event)
           {  
             event.preventDefault();
               var UseridInput = $('#id');
               var UserpasswordInput=$('#password');
               var UseridError= $('#Userid-error');
               var UserpasswordError =$('#Userpassworderror');
             
               UseridInput.removeClass('error');
               UserpasswordInput.removeClass('error');
               UseridError.text('');
              UserpasswordError.text('');
           if ($.trim(UseridInput.val()) =='') {
             UseridInput.addClass('error');
           UseridError.text('User ID  is  required.');
           return false;
           } else {
               UseridError.text('');
           }
           if($.trim(UserpasswordInput.val()) =='') {
               UserpasswordInput.addClass('error');
               UserpasswordError.text('Password is required.');
               return false;
           } else { 
             UserpasswordError.text('');
         
         }
         alert('Form submitted successfully!');
          return true;
  });
  });
 </script>
</html>
