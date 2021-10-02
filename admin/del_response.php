<?php 

    if(isset($_COOKIE['product']) && isset($_COOKIE['optVal']))
        {  
            $productID = (int)$_COOKIE['product'];
            $table = $_COOKIE['optVal'];
            
            require_once("php/db_connection.php");

            $conn = OpenCon();
          
            $returnHref = '/admin/index.php?section=#tm-section-3';

             $sql = "DELETE FROM ".$table." WHERE _id = ".$productID ; 

                if(!$result = $conn->query($sql))
                    $message = "Wystąpił błąd przy wykonaniu kwerendy";
                else 
                    $message = "Informacja o przedmiocie nr ".$productID." została trwale usunięta.";
        }
        else
            $message = "Nie wskazano numeru produktu i/lub tabeli.";

    echo "<script type='text/javascript'>
            alert('$message');
            location.href = '$returnHref'; 
        </script>";

        $conn -> close();
        unset($conn);
?>