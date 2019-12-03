<?php
include'connect_action.php';
$ingredient_array = array();
$ingredientString = "";
$ingredientName = 'blank';
$ingredientCodes = array();

if(!empty($_POST['check_list']))
{
    //load all ingredients into an array
    foreach($_POST['check_list'] as $ingredient)
    {
        array_push($ingredient_array, $ingredient);
    }

    //load recipe title
    $recipeName = $_POST['recipeName'];
    //echo $recipeName;

    //load recipe description
    $description = $_POST['description'];
    //echo $description;

    //load recipe URL
    $recipeURL = $_POST['recipeURL'];

    //load recipe image
    $recipeimg = $_POST['imgURL'];

    //push recipe url, recipe name, recipe description and number of ingredients to recipes table
    $addMeta_query = "INSERT INTO recipes (RecipeURL,TotalIngredients,RecipeName,RecipeDescription,RecipePictureURL) 
                        VALUES ('".$recipeURL."', ".count($ingredient_array).", '".$recipeName."', '".$description."', '".$recipeimg."')";
    //echo $addMeta_query;
    mysqli_query($conn, $addMeta_query);
    //store the recipeID
    $findRecipeID_query = "SELECT RecipeID FROM Recipes WHERE RecipeName = '".$recipeName."'";
    
    
    $recipeIDresult = mysqli_query($conn, $findRecipeID_query);


    $recipeID = -1;


    while($row = mysqli_fetch_array($recipeIDresult))
    {
        $recipeID = $row['RecipeID'];
    }

    //echo $recipeID;

    //push each ingredient ID and recipe ID to ingredients table
    
    foreach($ingredient_array as $code)
    {
        $addIngredient_query = "INSERT INTO ingredients(IngredientCode, RecipeID) VALUES ($code, $recipeID)";
        mysqli_query($conn, $addIngredient_query);
        //echo $addIngredient_query;
    }
}
else
{
    //case that the user has entered a recipe with zero ingredients
    echo '<script type="text/javascript">alert("' . "No ingredients entered!" . '")</script>';
}
?>