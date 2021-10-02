<?php
 
    

    function selectAllItems($conn, $id, $table) {

        $conn->query("SET NAMES 'utf8'");

                if($id!=null) {
                    $sql = " SELECT _id, 
                                    _name,
                                    _description,
                                    _condition, 
                                    _price, 
                                    _status,
                                    _photo1_min,
                                    _photo2_min,
                                    _photo3_min,
                                    _photo4_min,
                                    _photo5_min,
                                    _photo6_min,
                                    _photo1,
                                    _photo2,
                                    _photo3,
                                    _photo4,
                                    _photo5,
                                    _photo6
                            FROM ".$table. 
                            " WHERE _id = ".$id;
                } else {
                
                     $sql = "SELECT _id, 
                                    _name,
                                    _description,
                                    _condition, 
                                    _price, 
                                    _status,
                                    _photo1_min,
                                    _photo2_min,
                                    _photo3_min,
                                    _photo4_min,
                                    _photo5_min,
                                    _photo6_min,
                                    _photo1,
                                    _photo2,
                                    _photo3,
                                    _photo4,
                                    _photo5,
                                    _photo6

                                FROM ".$table;
                }
           

        $result = $conn->query($sql);

        return  $result;
    }


    function getItemData($conn, $id, $table){
       
        $result = selectAllItems($conn, $id, $table);
    
            while($row = $result->fetch_assoc()) {
    
                $itemData = array(
                $row["_id"],
                $row["_name"],
                $row["_description"],
                $row["_price"]
               
                );
            }
            return $itemData;
        }


    function getItemMinPhotos($conn, $cdID, $table){
       
        $result = selectAllItems($conn, $cdID, $table);
    
            while($row = $result->fetch_assoc()) {
    
                $itemMinPhotos = array(
                $row["_photo1_min"],
                $row["_photo2_min"], 
                $row["_photo3_min"],
                $row["_photo4_min"],
                $row["_photo5_min"],
                $row["_photo6_min"]
                );
            }
            return $itemMinPhotos;
        }


        function getItemPhotos($conn, $cdID, $table){
       
            $result = selectAllItems($conn, $cdID, $table);
        
                while($row = $result->fetch_assoc()) {
        
                    $itemPhotos = array(
                    $row["_photo1"],
                    $row["_photo2"], 
                    $row["_photo3"],
                    $row["_photo4"],
                    $row["_photo5"],
                    $row["_photo6"]
                    );
                }

                return $itemPhotos;
        }


        function getNextID($conn, $tableName){
     
         /*    $sql = "SELECT AUTO_INCREMENT
            FROM information_schema.TABLES
            WHERE TABLE_SCHEMA = 'db_kramark'
            AND TABLE_NAME = ".$tableName; */


            $sql = "SHOW TABLE STATUS LIKE '".$tableName."'";
            $result=$conn->query($sql);
            $row = $result->fetch_assoc();
            return  $row['Auto_increment'];


          }



          

    ?>