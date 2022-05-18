<html>
<head>
    <title>AHA DIY Garage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./product.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    </style>
</head>
    <body>
    <?php
    session_start();
    
    $name = $_SESSION['name'];
    $userID = $_SESSION['userID'];
    $position = $_SESSION['position'];
    $session = $_SESSION['session'];


	include("../../../module/connection.php");
  include("../../../includes/navigation/navigation-bar.php");
	$link=KonektatuDatuBasera();
?>

<div id="nagusia">
			<H1>Product list</H1>
			<?php
			
				$emaitza=mysqli_query($link,"select * from products");
				
			?>
			<table id ="tabla" >
				<!-- <Tr>
				<Th></Th><Th></Th><Th></Th><Th></Th><Th></Th>
        <Th>Image</Th><Th>Name</Th><Th>Description</Th><Th>Price</Th><Th>Click to delete</Th>
				</Tr> -->
				<Tr>
				<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#ModalAddProduct'> Add product </button></td><td></td><td></td><td></td><td></td>
				</Tr>


				<?php
					while($erregistroa = mysqli_fetch_array($emaitza))
					{
						printf("<tr><td>");


            // ---------------
              printf("<img src='../%s' id='argazkiaProducts'>",$erregistroa["img"]);
             // ---------------

						printf("</td><td>%s</td><td>%s</td><td>%s</td><td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#ModalProduct%s'> delete </button></td></tr>",$erregistroa["name"],$erregistroa["description"],$erregistroa["price"],$erregistroa["product_id"]);
         
// modal
            printf("<div class='modal fade' id='ModalProduct%s' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>",$erregistroa["product_id"]);
  ?>
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>You are about to delete this product. Are you sure that you want to delete this product?
            </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php 
                printf("<a href='./worker-deleteProduct.php?product_id=%s'>",$erregistroa["product_id"])
                ?>
                <button type="button" class="btn btn-danger">Delete product</button>
                </a>
              </div>
            </div>
          </div>
        </div>

              <?php
              		} 
             ?>
			</table>
</div>


<!-- AddModal -->
<div class="modal fade" id="ModalAddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="./worker-addProduct.php" method="post" enctype="multipart/form-data">
  

  <div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" id="izena" placeholder="Name" name="name" required>
  </div>

  <div class="form-group">
    <label>Description:</label>
    <input type="text" class="form-control" id="izena" placeholder="Description" name="desc" required>
  </div>

  <div class="form-group">
    <label>Stock:</label>
    <input type="text" class="form-control" id="izena" placeholder="Stock" name="stock" required>
  </div>

  <div class="form-group">
    <label>Price:</label>
    <input name=price type="number" step="0.01" min="1" value="1" class="form-control" required>
  </div>
  <div class="form-group">
  <label for="exampleFormControlFile1">Select image</label>
    <input type="file" class="form-control-file" name="img">
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add product</button>
        </form>

      </div>
    </div>
  </div>
</div>




	</body>
</html>

