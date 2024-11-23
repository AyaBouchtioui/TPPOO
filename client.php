<?php
class Client{
public $id;
public $firstname;
public $lastname;
public $email;
public $password;
public $reg_date;
public static $errorMsg = "";
public static $successMsg="";
public function __construct($firstname,$lastname,$email,$password){
//initialize the attributs of the class with the parameters, and hash the
this->firstname=$firstname;
this->lastname=$lastname;
this->password=$password;

}
public function insertClient($tableName,$conn){
//insert a client in the database, and give a message to $successMsg and
$errorMsg
 $sql = "INSERT INTO testDb.Clients (firstname, lastname, email,password)
VALUES ('Mary', 'Moe', 'mary@example.com','$password');";
 $sql .= "INSERT INTO testDb.Clients (firstname, lastname, email,password)
 VALUES ('Julie', 'Dooley', 'julie@example.com','$password')";
 if (mysqli_multi_query($conn, $sql)) {
echo "New records created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
 }
}
public static function selectAllClients($tableName,$conn){
    //select all the client from database, and inset the rows results in an array
    $data[]
    include("database1.php");
    $sql = "SELECT id, firstname, lastname,email FROM $dbName.clients";
    $result = mysqli_query($this->conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo " <tr>
        <td>$row[id]</td>
        <td>$row[firstname]</td>
        <td>$row[lastname]</td>
        <td>$row[email]</td>
        <td>
        <a class ='btn btn-success btn-sm' href='update.php?id=$row[id]'>edit</a>
        <a class ='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>delete</a>
        </td>
    </tr>";
    }
    }
    }
    static function selectClientById($tableName,$conn,$id){
    //select a client by id, and return the row result
    include("database.php");
    $sql = "SELECT id FROM $dbName.clients";
    $result = mysqli_query($this->conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo " <tr>
        <td>$row[id]</td>
        <td>$row[firstname]</td>
        <td>$row[lastname]</td>
        <td>$row[email]</td>
        <td>
        <a class ='btn btn-success btn-sm' href='update.php?id=$row[id]'>edit</a>
        <a class ='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>delete</a>
        </td>
    </tr>";
    }
    }
    
    }
    static function updateClient($client,$tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    public function update($table,$conn){
        include("database.php");
        $ermes="";
        $sucmes="";
        $fnameValue="";
        $lnameValue="";
        $emailValue="";
        if($_SERVER['REQUEST_METHOD']=='GET'){$id=$_GET['idup'];
        $sql = "SELECT firstname, lastname, email FROM client WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
// output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        $fnameValue=$row['first'];
        $lnameValue=$row['last'];
        $emailValue=$row['email'];
}
} 
}
        else if (isset($_POST['submit'])) {
        $fnameValue=$_POST['nom'];
        $lnameValue=$_POST['prenom'];
        $emailValue = $_POST['namemail'];
        if($fnameValue==""||$lnameValue==""||$emailValue==""){
        $ermes="all field are required";
        }}}
    }
   
    //delet a client by his id, and send the user to read.php
    public function delete($table,$conn){
        // sql to delete a record
        include("database.php");
        $sql = "DELETE FROM Client WHERE id='$id'";
        if (mysqli_query($this->conn, $sql)) {
        echo "Record deleted successfully";
        header("Location: read.php");
        } else {
        echo "Error deleting record: " .
        mysqli_error($this->conn);
               }
    }
    }
    
    ?>