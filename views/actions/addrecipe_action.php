<?php
include'connect_action.php';
$ingredient_array = array();
$ingredientString = "";

if(isset($POST['check_list']))
{
    //add selected ingredients to array
    foreach($_POST['check_list'] as $ingredient)
    {
        aray_push($ingredient_array, $ingredient);
    }
    
    //format the selected ingredients
    $numberOfIngredients = count($ingredient_array);
    for($i=0, $i<($numberOfIngredients-1), $i++)
    {
        $ingredientString .= $ingredient_array[$i] . ", ";
    }
    $ingredientString .= $ingredient_array[$numberOfIngredients];

    //add recipe to recipes database
    $addRecipeQuery = "INSERT INTO recipes (RecipeURL, TotalIngredients)
                            VALUES (($ingredientString), ($numberOfIngredients))";
    mysqli_query($conn, $addRecipeQuery);
}
else
{
    //case that the user has entered a recipe with zero ingredients
    echo '<script type="text/javascript">alert("' . "No ingredients entered!" . '")</script>';
}
?>