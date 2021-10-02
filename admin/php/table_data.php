<?php 

		
			$not_found = "img/photo/image-not-found.png";
			

			while($row = $result->fetch_assoc()) {
				echo "<tr>
							<td>".$row["_id"]."</td>";
								if (!file_exists($photoPath.$row["_photo1_min"])) 
										echo "<td><img src='".$not_found."' alt='Image' class='img-table'></td>";
											else 
										echo "<td><img src='".$photoPath.$row["_photo1_min"]."' alt='Image' class='img-table'>
							</td>";

						echo "<td>".$row["_name"]."</td>";

					    echo "<td>"
								.$row["_description"]." &emsp;
								<span class = 'details tm-text-shadow'>Stan:</span> ".$row["_condition"]." &emsp;
								<span class = 'details tm-text-shadow'>Dostępność:</span> ".$row["_status"]."
							</td>
							<td>".$row["_price"]."</td>
					</tr>";
									
            }
                                        

				
?>