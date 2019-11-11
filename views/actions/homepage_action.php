<?php
	include'connect_action.php';

	$ingredient_count = 1;
	$ingredient_array = array();
	$exclusions_array = array();
	$ingredient_string = "";
	$exclusion_string= "";
	$query = false;

	// inclusions
	if(isset($_POST['check_list'])){
		// add each value from HTML check_list array to PHP ingredien_array.
		foreach($_POST['check_list'] as $value){
			array_push($ingredient_array, $value);
		}
		$query = true;
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
		$ingredient_string .= -1;
		for($ingredient_count=1; $ingredient_count <= 10; $ingredient_count++){
			$ingredient_string .= $ingredient_count . ", ";
			if($ingredient_count == 10){
				$ingredient_string .= $ingredient_count;
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
		$exclusion_string .= '-1';
	}

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
			$recipeDescription = $row['RecipeDescription'];
			$recipePictureURL = $row['RecipePictureURL'];

				echo "<div class='card flex-item'>";
					echo "<div class='card-header'>" . $recipeName;
						echo "<div class='card-body'>";
							echo "<img src='" . $recipePictureURL ."' alt='not found' style='height:200px;width:200px;'> </img>";
							echo "<br>";
							echo "<p>" . $recipeDescription . "</p>";
							echo "<a href='" . $recipeURL ."' target='_blank'> Go here </a>";
				echo "</div></div></div>";
		}
	}
?>
