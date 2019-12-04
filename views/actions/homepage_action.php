<?php
	include'connect_action.php';

	$ingredient_count = 25; // TODO dynamically update
	$ingredient_array = array();
	$exclusions_array = array();
	$ingredient_string = "";
	$exclusion_string= "";

	// inclusions
	if(isset($_POST['check_list'])){
		// add each value from HTML check_list array to PHP ingredien_array.
		foreach($_POST['check_list'] as $value){
			array_push($ingredient_array, $value);
		}
		// need last element in array to format the last comma correctly
		$lastIngredient = end($ingredient_array);
		foreach($ingredient_array as $value){
			if($value == $lastIngredient){
				$ingredient_string .= $value;
			}
			else{
				$ingredient_string .= $value . ", ";
			}
		}
	}
	// if the user selected no items, then all ingredients are added.
	else{
		for($i=1; $i <= $ingredient_count; $i++){
			$ingredient_string .= $i . ", ";
			if($i == 25){
				$ingredient_string .= $i;
			}
		}
	}
	// exclusions
	if(isset($_POST['exclusion_list'])){
		foreach($_POST['exclusion_list'] as $value){
			array_push($exclusions_array, $value);
		}
		$lastExclusion = end($exclusions_array);
		foreach($exclusions_array as $value){
			if($value == $lastExclusion){
				$exclusion_string .= $value;
			}
			else{
				$exclusion_string .= $value . ", ";
			}
		}
	}
	else{
		$exclusion_string = '-1';
	}
	/* MAIN FILTER QUERY
		This section is the query for the filter.
		The filter will return results in order of how many ingredients
			were in a certain recipe.
	*/
	$recipe_query = "SELECT *, Count(*) as 'Likeness'
					    FROM Recipes R, (SELECT * FROM Ingredients WHERE IngredientCode in ($ingredient_string)) I #List of selected Ingredients
					    WHERE R.RecipeID = I.RecipeID AND R.RecipeID NOT IN (SELECT RecipeID FROM Ingredients WHERE IngredientCode in ($exclusion_string)) #Exclusion list
					    GROUP BY RecipeURL
					    ORDER BY Likeness desc";
	$result = mysqli_query($conn, $recipe_query) or die(mysqli_error($conn));

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)) {
			$recipeName = $row['RecipeName'];
			$recipeURL = $row['RecipeURL'];
			$likeness = $row['Likeness'];
			$totalIngredients = $row['TotalIngredients'];
			$recipeDescription = $row['RecipeDescription'];
			$recipePictureURL = $row['RecipePictureURL'];

				echo "<div class='card flex-item'>";
					echo "<div class='card-header' style='border-bottom:none'>" . $recipeName;
						echo "<div class='card-body'>";
							echo "<img src='" . $recipePictureURL ."' alt='not found' style='height:100px;width:100px;'> </img>";
							echo "<br>";
							echo "<p>" . $recipeDescription . "</p>";
							echo '<div style="text-align:center" class="form-group link-buttons">
										<a href="' . $recipeURL . '" class="btn-info" target="_blank">Link To Recipe</a>
										</div>';
							echo "<div class='container' style='text-align:right;padding-top:7%'> <h6> Matched " . $likeness . "/" .$totalIngredients . " Ingredients.
							 </h6> </div>";
				echo "</div></div></div>";
		}
	}
?>
