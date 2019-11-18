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
	if($_SESSION['vegetarian'] == 0){
		if(mysqli_num_rows($meat_result) > 0){
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
		// info box that says: "Meats disabled in settings."
		echo '<div class="alert alert-warning" role="alert">
  				Meats disabled in settings.
				</div></div>';
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


	/*

	This is for the exclusion list portion.

	*/
	$totalResults = mysqli_num_rows($dairy_result) + mysqli_num_rows($spices_result) + mysqli_num_rows($vegetable_result) + mysqli_num_rows($meat_result);

	//We have to restart from the begining of all of our results.
	mysqli_data_seek($dairy_result, 0);
	mysqli_data_seek($spices_result, 0);
	mysqli_data_seek($meat_result, 0);
	mysqli_data_seek($vegetable_result, 0);

	//This creates the exclusion button and the div that hides all the buttons. We also center the button here.
	echo "<div style='text-align:center'>";
	echo "<button class='btn btn-secondary' type='button' id='dropdownMenuButton' onclick=showExclusions(". $totalResults .")> Show Exclusions </button>";
	echo "</div><br>";
	echo "<div id='exclusion' style='visibility:collapse;height:0px;overflow:hidden;'><br>";


	/* - EXCLUSION MEATS SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to exluding meats.
	*/
	echo '<h4>Meat Exclusions</h4>';
	echo '<div style="padding: 5%" class="form-row">';
		if(mysqli_num_rows($meat_result) > 0){
			$isVeg = $_SESSION['vegetarian'] ? "checked" : "";
			while($row = mysqli_fetch_array($meat_result)){
				echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
				echo '<input name="exclusion_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="EX_'. strtolower($row['IngredientName']) .'" ' . $isVeg .'>';
				echo '<label class="custom-control-label" for="EX_' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
				echo '</div>';
			}
			echo '</div>';
		}

	echo '<br>';

	/* - EXCLUDING VEGETABLES SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to excluding vegetables.
	*/
	echo '<h4>Vegetable Exlusions</h4>';
	echo '<div style="padding: 5%" class="form-row">';
	if(mysqli_num_rows($vegetable_result) > 0){
		while($row = mysqli_fetch_array($vegetable_result)){
			echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
			echo '<input name="exclusion_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="EX_'. strtolower($row['IngredientName']) .'">';
			echo '<label class="custom-control-label" for="EX_' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
			echo '</div>';
		}
		echo '</div>';
	}
	echo '<br>';

	/* - EXCLUDING SPICES SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to excluding spices.
	*/
	echo '<h4>Spice Exclusions</h4>';
	echo '<div style="padding: 5%" class="form-row">';
	if(mysqli_num_rows($spices_result) > 0){
		while($row = mysqli_fetch_array($spices_result)){
			echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
			echo '<input name="exclusion_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="EX_'. strtolower($row['IngredientName']) .'">';
			echo '<label class="custom-control-label" for="EX_' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
			echo '</div>';
		}
		echo '</div>';
	}
	echo '<br>';

	/* - EXCLUDING DAIRY SECTION -
		* This is for printing out each checkbox in
			homepage.php that is related to excluding dairy.
	*/
	echo '<h4>Dairy Exclusions</h4>';
	echo '<div style="padding: 5%" class="form-row">';
	if(mysqli_num_rows($dairy_result) > 0){
		while($row = mysqli_fetch_array($dairy_result)){
			echo '<div style="margin-left: 5px;" class="custom-control custom-checkbox">';
			echo '<input name="exclusion_list[]" value="'. $row['IngredientCode'].'"type="checkbox" class="custom-control-input" id="EX_'. strtolower($row['IngredientName']) .'">';
			echo '<label class="custom-control-label" for="EX_' . strtolower($row['IngredientName']) . '">'. $row['IngredientName'] .'</label>';
			echo '</div>';
		}
		echo '</div>';
	}
	echo '<br>';
	echo "</div>";


?>
