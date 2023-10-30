
<?php
include 'header.php';

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<script src= "<?php echo base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     
    <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="card">
            <h3 style="text-align: center; background-color: #007bff; color: #fff; padding: 20px;">Restaurant</h3>
           <div class="card-header" style="text-align: center;"> 
                <div style="text-align: right;">
            <a href="<?php echo base_url();?>Addfood" style="text-decoration: none;">
         <div style="background-color: #007bff; color: #fff;  
        top: 50px; right:50px; padding: 4px 4px; border-radius: 3px; display: inline-block;">Add food</div>
        </a> 
     </div>
     </div>
     </div>
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
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
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="briyani3.jpg">
          <img src="<?php echo base_url();?>/assets/img/briyani3.jpg" alt="strawberry.jpg" class="brand-image-img-circle elevation-3" style="width: 100px; height: auto;">

           
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
              <div style="text-align: right;">
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
              
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="food touch">
              <div class="centre">
                <h4> Food</h4>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            
          </div>
          <!-- ./col -->
        </div>
        <table class="table m-9">
                    <thead>
                    <tr>
                     <th>Sno</th>
                     <th>FOOD IMAGE</th>
                     <th>FOOD NAME</th>
                      <th>FOOD PRICE</th>
                      <th>ACTIONS</th>
                      </tr>
                     </thead>
                  
                      </tbody>
                      
                      <?php
                     $Sno = 1;
                   foreach ($food_data as $index => $item) {
                      ?>
        <tr>
      <td><?= $Sno; ?></td>
      <td><img src= "<?= base_url('uploader/'.$item['Image']); ?>" alt= ""width="90" height="90"></td>
      <td><?= $item['Foodname']; ?></td>
      <td><?= $item['Price']; ?></td>
      <td>
       <a href="<?php echo base_url('Addfood/' .$item['Id']); ?>"class="btn btn-primary">Edit</a>
      <a href="<?php echo base_url('Addfood/'. $item['Id']); ?>"class="btn btn-danger"> Delete</a>
    </td>
   
  </tr>
<?php
  $Sno++;
         }
?>
</table>
 <td>
 <div class="pagination">
    <?php if (1> 1): ?>
        <a href="<?= base_url('Foodview?page=1') ?>" id="prevPage" class="pagination-link">1</a>
    <?php endif; ?>

    <?php if (1 > 2): ?>
        <a href="<?= base_url('Foodview?page=' . ($page - 1)) ?>" class="pagination-link">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= 54; $i++) {
        $url = base_url('Foodview?page=' . $i);
        $class = ($i == 1) ? 'pagination-link current' : 'pagination-link';
        echo '<a href="' . $url . '" class="' . $class . '">' . $i . '</a>';
    } ?>

    <?php if (1 < 54 - 1): ?>
        <a href="<?= base_url('Foodview?page=' . ($page + 1)) ?>" class="pagination-link">Next</a>
    <?php endif; ?>

    <?php if (1 < 54): ?>
        <a href="<?= base_url('Foodview?page=' . 54) ?>" id="nextPage" class="pagination-link"><?= 54 ?></a>
    <?php endif; ?>
</div>
    </div>

    <style>
    /* Your existing styles here */
    
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
    }

    .pagination a {
        text-decoration: none;
        color: #007BFF;
        padding: 5px 10px;
        border: 1px solid #007BFF;
        border-radius: 5px;
        margin: 0 5px;
    }

    .pagination a:hover {
        background-color: #007BFF;
        color: #fff;
    }

    .pagination #currentPage {
        padding: 5px 10px;
        background-color: #007BFF;
        color: #fff;
        border: 1px solid #007BFF;
        border-radius: 5px;
        margin: 0 5px;
    }
</style>

   
                  
                 

      
      </div><!-- /.container-fluid -->
    </section>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

  
      <?php
     include 'footer.php';
     ?>
     
  