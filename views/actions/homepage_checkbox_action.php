<?php
	include 'connect_action.php';

	$query_meat = "SELECT IngredientName, IngredientCode FROM IngredientName WHERE ingredienttype = 1";
	$meat_result = mysqli_query($conn, $query_meat);


	if($_SESSION['vegetarian'] == 0){
		if(mysqli_num_rows($meat_result) > 0){
			echo '<h4>MEATS</h4>';
			echo '<div style="padding: 5%" class="form-row">';
			while($row = mysqli_fetch_array($meat_result)){
				echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
				echo '<input name="check_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="'. strtolower($row['IngredientName']) .'">';
				echo '<label class="custom-control-label" for="' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
				echo '</div>';
			}
			echo '</div>';
		}
	}
	else{
		echo '<h4>MEATS</h4>';
		echo '<div style="padding: 5%" class="form-row">';
		echo '<div class="alert alert-warning" role="alert">
  				Meats disabled in settings.
				</div></div>';
		echo '<br>';
	}

?>