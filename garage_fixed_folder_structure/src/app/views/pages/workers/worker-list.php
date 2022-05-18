<html>
<head>
    <title>AHA DIY Garage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./worker.css">
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
<div style="margin:auto;width:1500px;">
<H1>Worker list</H1>
			<?php
			
				$emaitza=mysqli_query($link,"select * from employee");
				
			?>



        <table border='1'>
		<tr>
        <Th>employee id</Th><Th>name</Th><Th>surname</Th><Th>address</Th><Th>phone number</Th><Th>age</Th><Th>salary</Th><Th>position</Th><Th>password</Th><Th>edit</Th><Th>remove</Th>
		</tr>
				<?php
					while($erregistroa = mysqli_fetch_array($emaitza))
					{
printf("

		<tr>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td> %s </td>
            <td><a><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#ModalEdit%s'>Edit information</button></a></td>
            <td><a><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#ModalRemove%s'>Remove worker</button></a></td>

        </tr>
        	
", $erregistroa["employee_id"], $erregistroa["name"], $erregistroa["surname"], $erregistroa["adress"], $erregistroa["phone_number"], $erregistroa["age"], $erregistroa["salary"], $erregistroa["position"], $erregistroa["password"], $erregistroa["employee_id"], $erregistroa["employee_id"]);              		

              printf("<div class='modal fade' id='ModalEdit%s' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>",$erregistroa["employee_id"]);
   ?>
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Change worker information</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="./worker-edit.php" method="post">

                                <input style="display:none" type="number" class="form-control" id="izena" placeholder="id" name="employee_id" value='<?php printf("%s",$erregistroa["employee_id"]); ?>' required>

                                <div class="form-group">
                                  <label>Name:</label>
                                  <input type="text" class="form-control" id="izena" placeholder="Name" name="name" value='<?php printf("%s",$erregistroa["name"]); ?>' required>
                                </div>

                                <div class="form-group">
                                  <label>Surname:</label>
                                  <input type="text" class="form-control" id="izena" placeholder="Surname" name="surname" value='<?php printf("%s",$erregistroa["surname"]); ?>' required>
                                </div>
                                <div class="form-group">
                                  <label>Address:</label>
                                  <input type="text" class="form-control" id="izena" placeholder="Address" name="adress" value='<?php printf("%s",$erregistroa["adress"]); ?>' required>
                                </div>
                                <div class="form-group">
                                  <label>Phone number:</label>
                                  <input type="number" class="form-control" id="izena" placeholder="Phone number" name="phone_number" value='<?php printf("%s",$erregistroa["phone_number"]); ?>' required>
                                </div>
                                <div class="form-group">
                                  <label>Age:</label>
                                  <input type="number" class="form-control" id="izena" placeholder="Age" name="age" value='<?php printf("%s",$erregistroa["age"]); ?>' required>
                                </div>
                                <div class="form-group">
                                  <label>Salary:</label>
                                  <input type="number" class="form-control" id="izena" placeholder="Salary" name="salary" value='<?php printf("%s",$erregistroa["salary"]); ?>' required>
                                </div>
                                <div class="form-group">
                                  <label>Position:</label>
                                  <input type="text" class="form-control" id="izena" placeholder="Position" name="position" value='<?php printf("%s",$erregistroa["position"]); ?>' required>
                                </div>
                                <div class="form-group">
                                  <label>Password:</label>
                                  <input type="text" class="form-control" id="izena" placeholder="Password" name="password" value='<?php printf("%s",$erregistroa["password"]); ?>' required>
                                </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Edit information</button>
                              </form>
                              
                            </div>
                          </div>
                        </div>
                      </div>


<?php

                        printf("<div class='modal fade' id='ModalRemove%s' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>",$erregistroa["employee_id"]);
  ?>
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Remove worker</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>You are about to remove this worker. Are you sure that you want to remove this worker?
                                    </p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <?php 
                                        printf("<a href='./worker-delete.php?employee_id=%s'>",$erregistroa["employee_id"])
                                        ?>
                                        <button type="button" class="btn btn-danger">Remove worker</button>
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






	</body>
</html>

