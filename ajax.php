<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once 'config.php';


if(isset($_GET['qr'])){
    $q = $_GET['qr'];
    if(isset($q) || !empty($q)) {
        $query = "SELECT id,cou_name FROM coustomeradd WHERE mobile_no = '$q'";
        $result = mysqli_query($link, $query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $data = array("name" => $row["cou_name"] , "id" => $row["id"]) ;
             

            }
          } else {
            $data = array("name" => "No Data");

          }
          
          $link->close();
          
          // return the data as a JSON object
          header('Content-Type: application/json');
          echo json_encode($data);
}
}

?>
