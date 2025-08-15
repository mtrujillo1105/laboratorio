<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
	$(document).ready(function() {
  	$("#boton_modal").click(function() {
    $('#mimodaltema').on('shown.bs.modal', function() {
      $('#primero').focus();
    })
  	});
	});
	</script>
	<title></title>
</head>
<body>


<div class="container-fluid" >
            <br>
            <h1 style="text-align:center;color:black;">Acceder a la Intranet del Administrador del Sistema</h1>
            <hr>
            <form action="" method="post" class="form-horizontal form-control" style="width:340px;height:230px;margin:0 auto;color:black;">
                Cuenta de Usuario:
                <input type="text" name="txtId" class="form-control" />
                Password:
                <input type="text" name="txtDNI" class="form-control" />
                <br>
                
                <input type="submit" value="Acceder" class="btn btn-primary" />
                
            </form>
            <br>
        </div>

</body>
</html>