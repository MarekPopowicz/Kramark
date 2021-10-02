<!DOCTYPE html>
<html>
<head>

      <script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
      <script type='text/javascript' src='js/jquery.backstretch.min.js'></script>
 
</head>
   
   
   <body>
 
<?php 
 


    if( (isset($_POST['_id']) && $_POST['_id'] !='') &&
        (isset($_POST['_name']) && $_POST['_name'] !='') && 
        (isset($_POST['_description']) && $_POST['_description'] !='') &&
        (isset($_POST['_condition']) && $_POST['_condition'] !='') &&
        (isset($_POST['_price']) && $_POST['_price'] !='') &&
        (isset($_POST['_status']) && $_POST['_status'] !='') &&
        (isset($_POST['_photo1_min']) && $_POST['_photo1_min'] !='') &&
        (isset($_POST['_photo2_min']) && $_POST['_photo2_min'] !='') &&
        (isset($_POST['_photo3_min']) && $_POST['_photo3_min'] !='') &&
        (isset($_POST['_photo1']) && $_POST['_photo1'] !='') &&
        (isset($_POST['_photo2']) && $_POST['_photo2'] !='') &&
        (isset($_POST['_photo3']) && $_POST['_photo3'] !=''))

        {     
            require_once("php/db_connection.php"); 
            
            $conn = OpenCon();
            $conn->query("SET NAMES 'utf8'");
            $id = $conn->real_escape_string($_POST['_id']);
            $name = $conn->real_escape_string($_POST['_name']);
            $description = $conn->real_escape_string($_POST['_description']);
            $condition = $conn->real_escape_string($_POST['_condition']);
            $price = $conn->real_escape_string($_POST['_price']);
            $status = $conn->real_escape_string($_POST['_status']);

            $photo1_min = $conn->real_escape_string($_POST['_photo1_min']);
            $photo2_min = $conn->real_escape_string($_POST['_photo2_min']);
            $photo3_min = $conn->real_escape_string($_POST['_photo3_min']);
            $photo4_min = $conn->real_escape_string($_POST['_photo4_min']);
            $photo5_min = $conn->real_escape_string($_POST['_photo5_min']);
            $photo6_min = $conn->real_escape_string($_POST['_photo6_min']);

            $photo1 = $conn->real_escape_string($_POST['_photo1']);
            $photo2 = $conn->real_escape_string($_POST['_photo2']);
            $photo3 = $conn->real_escape_string($_POST['_photo3']);
            $photo4 = $conn->real_escape_string($_POST['_photo4']);
            $photo5 = $conn->real_escape_string($_POST['_photo5']);
            $photo6 = $conn->real_escape_string($_POST['_photo6']);

            $table = $conn->real_escape_string($_POST['tablename']);
            $returnHref = '/admin/index.php?section=#edit';

            $sql = "UPDATE " .$table. "
            SET 
                _name = '$name',
                _description = '$description',
                _condition = '$condition',
                _price = '$price',
                _status = '$status', 
                _photo1_min = '$photo1_min',
                _photo2_min = '$photo2_min',
                _photo3_min = '$photo3_min',
                _photo4_min = '$photo4_min',
                _photo5_min = '$photo5_min',
                _photo6_min = '$photo6_min',
                _photo1 = '$photo1',
                _photo2 = '$photo2',
                _photo3 = '$photo3',
                _photo4 = '$photo4',
                _photo5 = '$photo5',
                _photo6 = '$photo6' 
            WHERE _id = " .$id;


                if(!$result = $conn->query($sql))
                    $message = "Wystąpił błąd przy wykonaniu kwerendy";
                else 
                    $message = "Przedmiot został zaktualizowany.";
        }
        else
            $message = "Nie wszystkie wymagane pola zostały wypełnione.";

            echo "<script language='javascript'>
    
                alert('$message');
            window.location.href = '$returnHref';";


           
            echo '</script>';


            $conn -> close();
            unset($conn);
     
?>

</body>


</html>	





