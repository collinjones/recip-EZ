<?php
	include 'connect_action.php';
	/* - QUERIES -
 		* these are for selecting the names and codes
 			of the specific ingredients where the ingredient
 			types are:
	 		1: meats
	 		2: vegetables
	 		3: spices
	 		4: dairy
	*/
	$query_meat = "SELECT IngredientName, IngredientCode FROM IngredientName WHERE ingredienttype = 1";
	$query_vegetables = "SELECT IngredientName, IngredientCode FROM IngredientName WHERE ingredienttype = 2";
	$query_spices = "SELECT IngredientName, IngredientCode FROM IngredientName WHERE ingredienttype = 3";
	$query_dairy = "SELECT IngredientName, IngredientCode FROM IngredientName WHERE ingredienttype = 4";

	// - DATABASE REQUESTS -
	$meat_result = mysqli_query($conn, $query_meat); // 1
	$vegetable_result = mysqli_query($conn, $query_vegetables); // 2
	$spices_result = mysqli_query($conn, $query_spices); // 3
	$dairy_result = mysqli_query($conn, $query_dairy); // 4


	/* - MEATS SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to meats.
		* If the user is a vegetarian, then else is executed.
			No checkboxes are printed and an info box mentioning
			the user has this set in their settings.
	*/
	echo '<h4>MEATS</h4>';
	echo '<div style="padding: 5%" class="form-row">';
		if(mysqli_num_rows($meat_result) > 0){
			while($row = mysqli_fetch_array($meat_result)){
				echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
				echo '<input name="check_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="'. strtolower($row['IngredientName']) .'">';
				echo '<label class="custom-control-label" for="' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
				echo '</div>';
			}
			echo '</div>';
		}
	echo '<br>';

	/* - VEGETABLES SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to vegetables.
	*/
	echo '<h4>VEGETABLES</h4>';
	echo '<div style="padding: 5%" class="form-row">';
	if(mysqli_num_rows($vegetable_result) > 0){
		while($row = mysqli_fetch_array($vegetable_result)){
			echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
			echo '<input name="check_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="'. strtolower($row['IngredientName']) .'">';
			echo '<label class="custom-control-label" for="' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
			echo '</div>';
		}
		echo '</div>';
	}
	echo '<br>';

	/* - SPICES SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to spices.
	*/
	echo '<h4>SPICES</h4>';
	echo '<div style="padding: 5%" class="form-row">';
	if(mysqli_num_rows($spices_result) > 0){
		while($row = mysqli_fetch_array($spices_result)){
			echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
			echo '<input name="check_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="'. strtolower($row['IngredientName']) .'">';
			echo '<label class="custom-control-label" for="' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
			echo '</div>';
		}
		echo '</div>';
	}
	echo '<br>';

	/* - DAIRY SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to dairy.
	*/
	echo '<h4>DAIRY</h4>';
	echo '<div style="padding: 5%" class="form-row">';
	if(mysqli_num_rows($dairy_result) > 0){
		while($row = mysqli_fetch_array($dairy_result)){
			echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
			echo '<input name="check_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="'. strtolower($row['IngredientName']) .'">';
			echo '<label class="custom-control-label" for="' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
			echo '</div>';
		}
		echo '</div>';
	}
	echo '<br>';

?>
