<?php
$emailValue = "";
$lnameValue = "";
$fnameValue = "";
$errorMesage = "";
$successMesage = "";
//include connection file
//code
//create in instance of class Connection
//code
//call the selectDatabase method
//code
//include the client file
//code
if($_SERVER['REQUEST_METHOD']=='GET'){
$id = $_GET['id'];
//call the staticbselectClientById method and store the result of the method
in $row
//code
$emailValue = $row["email"];
$lnameValue = $row["lastname"];
$fnameValue = $row["firstname"];
}
else if(isset($_POST["submit"])){
$emailValue = $_POST["email"];
$lnameValue = $_POST["lastName"];
$fnameValue = $_POST["firstName"];
if(empty($emailValue) || empty($fnameValue) || empty($lnameValue) ){
$errorMesage = "all fileds must be filed out!";
}else{
//create a new instance of client ($client) with inputs values
//code
//call the static updateClient method and give $client in the
parameters
//code
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD</title>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min
.js"></script>
</head>
<body>
<div class="container my-5 ">
<h2>Update</h2>
<?php
if(!empty($errorMesage)){
echo "<div class='alert alert-warning alert-dismissible fade show'
role='alert'>
<strong>$errorMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' arialabel='
Close'>
</button>
</div>";
}
?>
<br>
<form method="post">
<div class="row mb-3">
<label class="col-form-label col-sm-1" for="fname">First
Name:</label>
<div class="col-sm-6">
<input value="<?php echo $fnameValue ?>" class="formcontrol"
type="text" id="fname" name="firstName">
</div>
</div>
<div class="row mb-3">
<label class="col-form-label col-sm-1" for="lname">Last
Name:</label>
<div class="col-sm-6">
<input value="<?php echo $lnameValue ?>" class="formcontrol"
type="text" id="lname" name="lastName">
</div>
</div>
<div class="row mb-3 ">
<label class="col-form-label col-sm-1"
for="email">Email:</label>
<div class="col-sm-6">
<input value=" <?php echo $emailValue ?>" class="formcontrol"
type="email" id="email" name="email">
</div>
</div>
<?php
if(!empty($successMesage)){
echo "<div class='alert alert-success alert-dismissible fade show'
role='alert'>
<strong>$successMesage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' arialabel='
Close'>
</button>
</div>";
}
?>
<div class="row mb-3">
<div class="offset-sm-1 col-sm-3 d-grid">
<button name="submit" type="submit" class=" btn btnprimary">
Update</button>
</div>
<div class="col-sm-1 col-sm-3 d-grid">
<a class="btn btn-outline-primary"
href="read.php">Cancel</a>
</div>
</div>
</form>
</div>
</body>
</html>