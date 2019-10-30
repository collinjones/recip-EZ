<?php
	ob_start();
	include'actions/session_action.php';
?>

<!DOCTYPE html>
<html lang="en-US">
    
<head>
    <title>Recip-Ez: Add Recipe</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../resources/css/normalize.css">	
	<link rel="stylesheet" type="text/css" href="../resources/css/layout.css">
</head>

<body>
    <!-- MEATS SELECTIONS -->
    <h4>MEATS</h4>
    <div style="padding: 5%" class="form-row">
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="1" type="checkbox" class="custom-control-input" id="steak">
                <label class="custom-control-label" for="steak">Steak</label>
            </div>
        </div>
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="2" type="checkbox" class="custom-control-input" id="chicken">
                <label class="custom-control-label" for="chicken">Chicken</label>
            </div>
        </div>
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="3" type="checkbox" class="custom-control-input" id="salmon">
                <label class="custom-control-label" for="salmon">Salmon</label>
            </div>
        </div>		
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="4" type="checkbox" class="custom-control-input" id="pork">
                <label class="custom-control-label" for="pork">Pork</label>
            </div>
        </div>
    </div>
    <!-- VEGETABLES SELECTIONS -->
    <h4>VEGETABLES</h4>
    <div style="padding: 5%" class="form-row">
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="5" type="checkbox" class="custom-control-input" id="green_beans">
                <label class="custom-control-label" for="green_beans">Green Beans</label>
            </div>
        </div>
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="6" type="checkbox" class="custom-control-input" id="brussel_sprouts">
                <label class="custom-control-label" for="brussel_sprouts">Brussel Sprouts</label>
            </div>
        </div>
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="7" type="checkbox" class="custom-control-input" id="zuccinni">
                <label class="custom-control-label" for="zuccinni">Zuccinni</label>
            </div>
        </div>
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="8" type="checkbox" class="custom-control-input" id="eggplant">
                <label class="custom-control-label" for="eggplant">Eggplant</label>
            </div>
        </div>
    </div>
    <!-- SPICES SELECTIONS -->
    <h4>SPICES</h4>
    <div style="padding: 5%" class="form-row">
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="9" type="checkbox" class="custom-control-input" id="salt">
                <label class="custom-control-label" for="salt">Salt</label>
            </div>
        </div>
        <div class="form-column" style="padding: 5px">
            <div class="custom-control custom-checkbox">
                <input name="check_list[]" value="10" type="checkbox" class="custom-control-input" id="pepper">
                <label class="custom-control-label" for="pepper">Pepper</label>
            </div>
        </div>
    </div>
    <!-- SUBMIT BUTTON -->
    <div style="text-align:center" class="form-group">
	    <input name="send" type="submit" class="btnSubmit" value="Submit Recipe" />
	</div>
    <div class="col-lg">
		<?php
            if(isset($_POST['send']))
            {
			    include'actions/addrecipe_action.php';
			}
		?>
	</div>
</body>