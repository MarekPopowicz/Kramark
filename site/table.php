<?php 

echo"<div style='padding: 10px;'>
		<div class='tm-bg-transparent-black tm-content'>
			<div class='table-responsive'>
						
										<h2 class='tm-text-shadow'>
										$title
										</h2>

							<table id=table class='table table-bordered table-hover table-sm'>
								<thead>
									<tr>
									<th>Nr</th>
									<th>Przedmiot</th>
									<th>Nazwa</th>
									<th>Szczegóły</th>
									<th>Cena</th>
									</tr>
								</thead>
		
								<tbody>";

									$photoPath = "img/photo/".$table."/";
                                    include 'php/table_data.php';	
                
				          echo" </tbody>
							</table>
			</div>
		</div>
    </div>";
?>