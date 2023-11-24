<?php 
	session_start();
	if (empty($_SESSION["id"])){
		header("Location: index.php");
  
	}
	
include_once("_header.php"); 


 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image: url('assets/img/Princi.png');">

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
          <div class="col-sm-6" >
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


 <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >
        

		 <!-- INICIO -->
		
		<h3  style="padding-left: 300px; color: black;"> Bem vindo ao Sistema: <?php echo $_SESSION["username"]; ?></h3><br>
		
		 <!-- FIM -->  
		 
      </div><!-- /.container-fluid -->

          <!-- ./col -->
        
          </div>
          <!-- ./col -->
        </div>
    </section>





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php include_once("_footer.php");  ?> 

 <form method="POST" action="index.php" class="logout-form">
    <button type="submit" class="btn btn-danger logout-btn">
        <span class="fa fa-sign-out"></span> SAIR
    </button>
</form>

<style>
    .logout-btn {
        background-color: #d9534f;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        float: right;
    }

    .logout-btn:hover {
        background-color: #c0392b;
    }

    .logout-btn span {
        margin-right: 10px;
    }

    .fa-sign-out {
        color: #fff;
        font-size: 18px;
    }
</style>

