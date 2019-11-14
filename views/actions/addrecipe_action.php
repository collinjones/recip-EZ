<?php
include'connect_action.php';
$ingredient_array = array();
$ingredientString = "";

if(!empty($_POST['check_list']))
{
    //load all ingredients into an array
    foreach($_POST['check_list'] as $ingredient)
    {
        array_push($ingredient_array, $ingredient);
    }

    //load recipe title
    $recipeName = $_POST['recipeName'];

    //load recipe description
    $description = $_POST['description'];

    //load recipe URL
    $recipeURL = $_POST['recipeURL'];


    //push recipe url, recipe name, recipe description and number of ingredients to recipes table
    $addMeta_query = "INSERT INTO recipes (RecipeURL,TotalIngredients,RecipeName,RecipeDescription) 
                        VALUES ('".$recipeURL."',count($ingredient_array),'".$recipeName."','".$description."')";

    //store the recipeID
    $findRecipeID_query = "SELECT RecipeID FROM Recipes WHERE (RecipeName = ($recipeName))";
    $recipeID = mysqli_query($conn, $findRecipeID_query);

    //find the ingredient ID for each ingredient in array
    $ingredientName = 'blank';
    $findIngredientCode_query = "SELECT IngredientCode FROM ingredientname WHERE IngredientName = ($ingredientName)";
    foreach($ingredient_array as $ingredientName)
    {
        $findIngredientCode_query = "SELECT IngredientCode FROM ingredientname WHERE IngredientName = '".$ingredientName."'";
        $result = mysqli_query($conn, $findIngredientCode_query);
        array_push($ingredientCodes, $result);
    }

    //push each ingredient ID and recipe ID to ingredients table
    $addIngredient_query = "INSERT INTO ingredients(IngredientCode, RecipeID) VALUES ($ingredient, $recipeID)";
    foreach($ingredientCodes as $code)
    {
        mysqli_query($conn, $addIngredient_query);
    }
}
else
{
    //case that the user has entered a recipe with zero ingredients
    echo '<script type="text/javascript">alert("' . "No ingredients entered!" . '")</script>';
}
?>