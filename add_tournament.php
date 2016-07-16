<!DOCTYPE html>
<html lang="en">

<?php include('mysqli_connect.php'); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'>

    <title>Super Turbo Tournament Database</title>

<style>
    body {
        margin: 0 auto;
        width: 960px;
    }
    
    input, textarea {
        clear: both;
        float: left;
        margin-top: 0px;
        margin-bottom: 15px;
    }
    
/*
    :required {
        border-color: red;
    }
*/
    
</style>

</head>

<body>
    
    <h1>Add Tournament Result</h1>

    <?php // Script 12.5 - add_entry.php | WEBD166 Bob Painter
          // This script adds a blog entry to the database.
    
    // Check if the form has been submitted using the $_SERVER array and using the element we want to check called "Request Method".
    // If the Request Method is post, we want to execute the block of code in the conditional IF statement. We'll read the information
    // from the submitted form. Use the double equal signs to compare the two values. If the Request Method is NOT Post then we well
    // skip over this block of code and the register form will be displayed as normal.
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Connect to the database. Use include('mysqli_connect.php') instead of require('mysqli_connect.php')
        include('mysqli_connect.php');
        
        // Validate the form data. Use flag variable $problem:
        $problem = FALSE;
        
        // The mysquli_real_escape_string() funciton escapes special characters (such as aspostrophes in names) in a string for use
        // in an SQL string. For security purposes, mysqli_real_escape_string should be used on every text input in a form.
        
        // Apply strip_tags() to prevent cross-site scripting attacks. This function removes all HTML and PHP tags that users may
        // input into form fields. (page 100)
        
        // Always escape output.
        
        if (!empty($_POST['tournament_name']) && !empty($_POST['version_id']) && !empty($_POST['tournament_start_date'])) {
            
        // Need to change the order of the arguments:
            $tournament_name = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['tournament_name'])) );
            $version_id = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['version_id'])) );
            $tournament_start_date = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['tournament_start_date'])) );
            $tournament_end_date = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['tournament_end_date'])) );
            $entries = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['entries'])) );
            $location = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['location'])) );
            $bracket_url = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['bracket_url'])) );
            $video_url_1 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['video_url_1'])) );
            $video_url_2 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['video_url_2'])) );
            
            $place1  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place1'])) );
            $character1a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character1a'])) );
            $character1b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character1b'])) );
            $place2  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place2'])) );
            $character2a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character2a'])) );
            $character2b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character2b'])) );
            $place3  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place3'])) );
            $character3a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character3a'])) );
            $character3b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character3b'])) );
            $place4  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place4'])) );
            $character4a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character4a'])) );
            $character4b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character4b'])) );
            $place5  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place5'])) );
            $character5a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character5a'])) );
            $character5b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character5b'])) );
            $place6  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place6'])) );
            $character6a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character6a'])) );
            $character6b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character6b'])) );
            $place7  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place7'])) );
            $character7a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character7a'])) );
            $character7b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character7b'])) );
            $place8  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place8'])) );
            $character8a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character8a'])) );
            $character8b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character8b'])) );
            $place9  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place9'])) );
            $character9a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character9a'])) );
            $character9b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character9b'])) );
            $place10 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place10'])) );
            $character10a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character10a'])) );
            $character10b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character10b'])) );
            $place11 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place11'])) );
            $character11a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character11a'])) );
            $character11b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character11b'])) );
            $place12 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place12'])) );
            $character12a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character12a'])) );
            $character12b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character12b'])) );
            $place13 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place13'])) );
            $character13a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character13a'])) );
            $character13b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character13b'])) );
            $place14 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place14'])) );
            $character14a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character14a'])) );
            $character14b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character14b'])) );
            $place15 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place15'])) );
            $character15a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character15a'])) );
            $character15b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character15b'])) );
            $place16 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place16'])) );
            $character16a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character16a'])) );
            $character16b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character16b'])) );
            $place17 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place17'])) );
            $character17a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character17a'])) );
            $character17b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character17b'])) );
            $place18 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place18'])) );
            $character18a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character18a'])) );
            $character18b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character18b'])) );
            $place19 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place19'])) );
            $character19a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character19a'])) );
            $character19b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character19b'])) );
            $place20 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place20'])) );
            $character20a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character20a'])) );
            $character20b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character20b'])) );
            $place21 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place21'])) );
            $character21a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character21a'])) );
            $character21b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character21b'])) );
            $place22 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place22'])) );
            $character22a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character22a'])) );
            $character22b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character22b'])) );
            $place23 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place23'])) );
            $character23a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character23a'])) );
            $character23b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character23b'])) );
            $place24 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place24'])) );
            $character24a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character24a'])) );
            $character24b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character24b'])) );
            $place25 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place25'])) );
            $character25a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character25a'])) );
            $character25b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character25b'])) );
            $place26 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place26'])) );
            $character26a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character26a'])) );
            $character26b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character26b'])) );
            $place27 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place27'])) );
            $character27a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character27a'])) );
            $character27b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character27b'])) );
            $place28 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place28'])) );
            $character28a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character28a'])) );
            $character28b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character28b'])) );
            $place29 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place29'])) );
            $character29a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character29a'])) );
            $character29b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character29b'])) );
            $place30 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place30'])) );
            $character30a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character30a'])) );
            $character30b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character30b'])) );
            $place31 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place31'])) );
            $character31a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character31a'])) );
            $character31b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character31b'])) );
            $place32 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place32'])) );
            $character32a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character32a'])) );
            $character32b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character32b'])) );
            $place33 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place33'])) );
            $character33a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character33a'])) );
            $character33b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character33b'])) );
            $place34 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place34'])) );
            $character34a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character34a'])) );
            $character34b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character34b'])) );
            $place35 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place35'])) );
            $character35a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character35a'])) );
            $character35b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character35b'])) );
            $place36 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place36'])) );
            $character36a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character36a'])) );
            $character36b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character36b'])) );
            $place37 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place37'])) );
            $character37a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character37a'])) );
            $character37b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character37b'])) );
            $place38 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place38'])) );
            $character38a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character38a'])) );
            $character38b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character38b'])) );
            $place39 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place39'])) );
            $character39a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character39a'])) );
            $character39b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character39b'])) );
            $place40 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place40'])) );
            $character40a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character40a'])) );
            $character40b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character40b'])) );
            $place41 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place41'])) );
            $character41a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character41a'])) );
            $character41b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character41b'])) );
            $place42 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place42'])) );
            $character42a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character42a'])) );
            $character42b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character42b'])) );
            $place43 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place43'])) );
            $character43a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character43a'])) );
            $character43b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character43b'])) );
            $place44 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place44'])) );
            $character44a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character44a'])) );
            $character44b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character44b'])) );
            $place45 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place45'])) );
            $character45a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character45a'])) );
            $character45b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character45b'])) );
            $place46 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place46'])) );
            $character46a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character46a'])) );
            $character46b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character46b'])) );
            $place47 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place47'])) );
            $character47a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character47a'])) );
            $character47b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character47b'])) );
            $place48 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place48'])) );
            $character48a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character48a'])) );
            $character48b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character48b'])) );
            $place49 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place49'])) );
            $character49a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character49a'])) );
            $character49b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character49b'])) );
            $place50 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place50'])) );
            $character50a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character50a'])) );
            $character50b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character50b'])) );
            $place51 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place51'])) );
            $character51a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character51a'])) );
            $character51b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character51b'])) );
            $place52 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place52'])) );
            $character52a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character52a'])) );
            $character52b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character52b'])) );
            $place53 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place53'])) );
            $character53a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character53a'])) );
            $character53b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character53b'])) );
            $place54 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place54'])) );
            $character54a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character54a'])) );
            $character54b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character54b'])) );
            $place55 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place55'])) );
            $character55a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character55a'])) );
            $character55b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character55b'])) );
            $place56 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place56'])) );
            $character56a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character56a'])) );
            $character56b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character56b'])) );
            $place57 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place57'])) );
            $character57a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character57a'])) );
            $character57b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character57b'])) );
            $place58 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place58'])) );
            $character58a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character58a'])) );
            $character58b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character58b'])) );
            $place59 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place59'])) );
            $character59a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character59a'])) );
            $character59b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character59b'])) );
            $place60 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place60'])) );
            $character60a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character60a'])) );
            $character60b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character60b'])) );
            $place61 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place61'])) );
            $character61a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character61a'])) );
            $character61b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character61b'])) );
            $place62 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place62'])) );
            $character62a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character62a'])) );
            $character62b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character62b'])) );
            $place63 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place63'])) );
            $character63a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character63a'])) );
            $character63b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character63b'])) );
            $place64 = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['place64'])) );
            $character64a  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character64a'])) );
            $character64b  = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['character64b'])) );
            
        } else {
            echo '<p class="alert-danger">Please fill out all required fields.';
            $problem = TRUE;
        }
        
        if (!$problem) {
            
        // Define the query. Because of the way auto-incrementing primary keys work, this query is also fine. (TIP #3 page 357)
            
            $query = "INSERT INTO tournament
                      (tournament_name, version_id, tournament_start_date, tournament_end_date, entries, location, bracket_url, video_url_1, video_url_2, place1, character1a, character1b, place2, character2a, character2b, place3, character3a, character3b, place4, character4a, character4b, place5, character5a, character5b, place6, character6a, character6b, place7, character7a, character7b, place8, character8a, character8b, place9, character9a, character9b, place10, character10a, character10b, place11, character11a, character11b, place12, character12a, character12b, place13, character13a, character13b, place14, character14a, character14b, place15, character15a, character15b, place16, character16a, character16b, place17, character17a, character17b, place18, character18a, character18b, place19, character19a, character19b, place20, character20a, character20b, place21, character21a, character21b, place22, character22a, character22b, place23, character23a, character23b, place24, character24a, character24b, place25, character25a, character25b, place26, character26a, character26b, place27, character27a, character27b, place28, character28a, character28b, place29, character29a, character29b, place30, character30a, character30b, place31, character31a, character31b, place32, character32a, character32b, place33, character33a, character33b, place34, character34a, character34b, place35, character35a, character35b, place36, character36a, character36b, place37, character37a, character37b, place38, character38a, character38b, place39, character39a, character39b, place40, character40a, character40b, place41, character41a, character41b, place42, character42a, character42b, place43, character43a, character43b, place44, character44a, character44b, place45, character45a, character45b, place46, character46a, character46b, place47, character47a, character47b, place48, character48a, character48b, place49, character49a, character49b, place50, character50a, character50b, place51, character51a, character51b, place52, character52a, character52b, place53, character53a, character53b, place54, character54a, character54b, place55, character55a, character55b, place56, character56a, character56b, place57, character57a, character57b, place58, character58a, character58b, place59, character59a, character59b, place60, character60a, character60b, place61, character61a, character61b, place62, character62a, character62b, place63, character63a, character63b, place64, character64a, character64b)
                      VALUES
                      ('$tournament_name', '$version_id', '$tournament_start_date', '$tournament_end_date', '$entries', '$location', '$bracket_url', '$video_url_1', '$video_url_2', '$place1', '$character1a', '$character1b', '$place2', '$character2a', '$character2b', '$place3', '$character3a', '$character3b', '$place4', '$character4a', '$character4b', '$place5', '$character5a', '$character5b', '$place6', '$character6a', '$character6b', '$place7', '$character7a', '$character7b', '$place8', '$character8a', '$character8b', '$place9', '$character9a', '$character9b', '$place10', '$character10a', '$character10b', '$place11', '$character11a', '$character11b',  '$place12', '$character12a', '$character12b', '$place13', '$character13a', '$character13b', '$place14', '$character14a', '$character14b', '$place15', '$character15a', '$character15b', '$place16', '$character16a', '$character16b', '$place17', '$character17a', '$character17b', '$place18', '$character18a', '$character18b', '$place19', '$character19a', '$character19b', '$place20', '$character20a', '$character20b', '$place21', '$character21a', '$character21b', '$place22', '$character22a', '$character22b', '$place23', '$character23a', '$character23b', '$place24', '$character24a', '$character24b', '$place25',  '$character25a', '$character25b', '$place26', '$character26a', '$character26b', '$place27', '$character27a', '$character27b', '$place28', '$character28a', '$character28b', '$place29', '$character29a', '$character29b', '$place30', '$character30a', '$character30b', '$place31', '$character31a', '$character31b', '$place32', '$character32a', '$character32b', '$place33', '$character33a', '$character33b', '$place34', '$character34a', '$character34b', '$place35', '$character35a', '$character35b', '$place36', '$character36a', '$character36b', '$place37', '$character37a', '$character37b', '$place38', '$character38a', '$character38b', '$place39', '$character39a', '$character39b', '$place40', '$character40a', '$character40b', '$place41', '$character41a', '$character41b', '$place42', '$character42a', '$character42b', '$place43', '$character43a', '$character43b', '$place44', '$character44a', '$character44b', '$place45', '$character45a', '$character45b', '$place46', '$character46a', '$character46b', '$place47', '$character47a', '$character47b', '$place48', '$character48a', '$character48b', '$place49', '$character49a', '$character49b', '$place50', '$character50a', '$character50b', '$place51', '$character51a', '$character51b', '$place52', '$character52a', '$character52b', '$place53', '$character53a', '$character53b', '$place54', '$character54a', '$character54b', '$place55', '$character55a', '$character55b', '$place56', '$character56a', '$character56b', '$place57', '$character57a', '$character57b', '$place58', '$character58a', '$character58b', '$place59', '$character59a', '$character59b', '$place60', '$character60a', '$character60b', '$place61', '$character61a', '$character61b', '$place62', '$character62a', '$character62b', '$place63', '$character63a', '$character63b', '$place64', '$character64a', '$character64b');";
        
            if (@mysqli_query($dbc, $query)) {
                echo '<p class="alert-success">The tournament entry has been added!</p>';
            } else {
                echo '<p class="alert-danger">Cound not add the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }
        }
        
        mysqli_close($dbc);
        
    }
    
    // Display the form:
    
    ?>

        <!-- As a good rule of thumb, use the same name for your form inputs as the corresponding column names in the database. (page 357) -->
            <div style="margin-top: 25px; margin-bottom: 75px;">
            
            <form action="" method="post">
                <div class="form-group col-sm-12">
                    <label for="tournament_name">Tournament Name:*</label>
                    <input class="form-control" type="text" name="tournament_name" size="40" maxsize="100" required>
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="version_id">Version:*</label>
                    <select class="form-control" name="version_id" id="version">
                        <option value="1">ST</option>
                        <option value="2">HSF2:AE</option>
                        <option value="3">HDR</option>
                    </select>
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="tournament_start_date">Tournament Start Date:*</label>
                    <input class="form-control" type="date" name="tournament_start_date" required>
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="tournament_end_date">Tournament End Date:</label>
                    <input class="form-control" type="date" name="tournament_end_date">
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="entries">Number of Entries: (e.g. 32 or 32 teams)</label>
                    <input class="form-control" type="text" name="entries">
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="location">Location: (e.g. Las Vegas, NV)*</label>
                    <input class="form-control" type="text" name="location" required>
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="bracket_url">Bracket URL:</label>
                    <input class="form-control" type="text" name="bracket_url">
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="video_url_1">Video URL #1:</label>
                    <input class="form-control" type="text" name="video_url_1">
                </div>
                
                <div class="form-group col-sm-12">
                    <label for="video_url_2">Video URL #2:</label>
                    <input class="form-control" type="text" name="video_url_2">
                </div>
                
                <!-- ---------- ADD PLACES ---------- -->
                
                <div class="form-group col-sm-4">
                    <label for="place1">1st place:</label>
                    <input class="form-control" type="text" name="place1">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character1a">Character #1:</label>
                    <input class="form-control" type="text" name="character1a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character1b">Character #2:</label>
                    <input class="form-control" type="text" name="character1b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place2">2nd place:</label>
                    <input class="form-control" type="text" name="place2">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character2a">Character #1:</label>
                    <input class="form-control" type="text" name="character2a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character2b">Character #2:</label>
                    <input class="form-control" type="text" name="character2b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place3">3rd place:</label>
                    <input class="form-control" type="text" name="place3">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character3a">Character #1:</label>
                    <input class="form-control" type="text" name="character3a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character3b">Character #2:</label>
                    <input class="form-control" type="text" name="character3b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place4">4th place:</label>
                    <input class="form-control" type="text" name="place4">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character4a">Character #1:</label>
                    <input class="form-control" type="text" name="character4a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character4b">Character #2:</label>
                    <input class="form-control" type="text" name="character4b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place5">5th place:</label>
                    <input class="form-control" type="text" name="place5">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character5a">Character #1:</label>
                    <input class="form-control" type="text" name="character5a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character5b">Character #2:</label>
                    <input class="form-control" type="text" name="character5b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place6">5th place:</label>
                    <input class="form-control" type="text" name="place6">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character6a">Character #1:</label>
                    <input class="form-control" type="text" name="character6a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character6b">Character #2:</label>
                    <input class="form-control" type="text" name="character6b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place7">7th place:</label>
                    <input class="form-control" type="text" name="place7">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character7a">Character #1:</label>
                    <input class="form-control" type="text" name="character7a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character7b">Character #2:</label>
                    <input class="form-control" type="text" name="character7b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place8">7th place:</label>
                    <input class="form-control" type="text" name="place8">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character8a">Character #1:</label>
                    <input class="form-control" type="text" name="character8a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character8b">Character #2:</label>
                    <input class="form-control" type="text" name="character8b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place9">9th place:</label>
                    <input class="form-control" type="text" name="place9">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character9a">Character #1:</label>
                    <input class="form-control" type="text" name="character9a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character9b">Character #2:</label>
                    <input class="form-control" type="text" name="character9b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place10">9th place:</label>
                    <input class="form-control" type="text" name="place10">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character10a">Character #1:</label>
                    <input class="form-control" type="text" name="character10a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character10b">Character #2:</label>
                    <input class="form-control" type="text" name="character10b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place11">9th place:</label>
                    <input class="form-control" type="text" name="place11">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character11a">Character #1:</label>
                    <input class="form-control" type="text" name="character11a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character11b">Character #2:</label>
                    <input class="form-control" type="text" name="character11b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place12">9th place:</label>
                    <input class="form-control" type="text" name="place12">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character12a">Character #1:</label>
                    <input class="form-control" type="text" name="character12a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character12b">Character #2:</label>
                    <input class="form-control" type="text" name="character12b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place13">13th place:</label>
                    <input class="form-control" type="text" name="place13">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character13a">Character #1:</label>
                    <input class="form-control" type="text" name="character13a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character13b">Character #2:</label>
                    <input class="form-control" type="text" name="character13b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place14">13th place:</label>
                    <input class="form-control" type="text" name="place14">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character14a">Character #1:</label>
                    <input class="form-control" type="text" name="character14a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character14b">Character #2:</label>
                    <input class="form-control" type="text" name="character14b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place15">13th place:</label>
                    <input class="form-control" type="text" name="place15">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character15a">Character #1:</label>
                    <input class="form-control" type="text" name="character15a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character15b">Character #2:</label>
                    <input class="form-control" type="text" name="character15b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place16">13th place:</label>
                    <input class="form-control" type="text" name="place16">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character16a">Character #1:</label>
                    <input class="form-control" type="text" name="character16a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character16b">Character #2:</label>
                    <input class="form-control" type="text" name="character16b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place17">17th place:</label>
                    <input class="form-control" type="text" name="place17">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character17a">Character #1:</label>
                    <input class="form-control" type="text" name="character17a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character17b">Character #2:</label>
                    <input class="form-control" type="text" name="character17b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place18">17th place:</label>
                    <input class="form-control" type="text" name="place18">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character18a">Character #1:</label>
                    <input class="form-control" type="text" name="character18a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character18b">Character #2:</label>
                    <input class="form-control" type="text" name="character18b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place19">17th place:</label>
                    <input class="form-control" type="text" name="place19">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character19a">Character #1:</label>
                    <input class="form-control" type="text" name="character19a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character19b">Character #2:</label>
                    <input class="form-control" type="text" name="character19b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place20">17th place:</label>
                    <input class="form-control" type="text" name="place20">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character20a">Character #1:</label>
                    <input class="form-control" type="text" name="character20a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character20b">Character #2:</label>
                    <input class="form-control" type="text" name="character20b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place21">17th place:</label>
                    <input class="form-control" type="text" name="place21">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character21a">Character #1:</label>
                    <input class="form-control" type="text" name="character21a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character21b">Character #2:</label>
                    <input class="form-control" type="text" name="character21b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place22">17th place:</label>
                    <input class="form-control" type="text" name="place22">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character22a">Character #1:</label>
                    <input class="form-control" type="text" name="character22a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character22b">Character #2:</label>
                    <input class="form-control" type="text" name="character22b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place23">17th place:</label>
                    <input class="form-control" type="text" name="place23">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character23a">Character #1:</label>
                    <input class="form-control" type="text" name="character23a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character23b">Character #2:</label>
                    <input class="form-control" type="text" name="character23b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place24">17th place:</label>
                    <input class="form-control" type="text" name="place24">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character24a">Character #1:</label>
                    <input class="form-control" type="text" name="character24a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character24b">Character #2:</label>
                    <input class="form-control" type="text" name="character24b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place25">25th place:</label>
                    <input class="form-control" type="text" name="place25">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character25a">Character #1:</label>
                    <input class="form-control" type="text" name="character25a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character25b">Character #2:</label>
                    <input class="form-control" type="text" name="character25b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place26">25th place:</label>
                    <input class="form-control" type="text" name="place26">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character26a">Character #1:</label>
                    <input class="form-control" type="text" name="character26a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character26b">Character #2:</label>
                    <input class="form-control" type="text" name="character26b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place27">25th place:</label>
                    <input class="form-control" type="text" name="place27">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character27a">Character #1:</label>
                    <input class="form-control" type="text" name="character27a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character27b">Character #2:</label>
                    <input class="form-control" type="text" name="character27b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place28">25th place:</label>
                    <input class="form-control" type="text" name="place28">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character28a">Character #1:</label>
                    <input class="form-control" type="text" name="character28a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character28b">Character #2:</label>
                    <input class="form-control" type="text" name="character28b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place29">25th place:</label>
                    <input class="form-control" type="text" name="place29">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character29a">Character #1:</label>
                    <input class="form-control" type="text" name="character29a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character29b">Character #2:</label>
                    <input class="form-control" type="text" name="character29b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place30">25th place:</label>
                    <input class="form-control" type="text" name="place30">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character30a">Character #1:</label>
                    <input class="form-control" type="text" name="character30a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character30b">Character #2:</label>
                    <input class="form-control" type="text" name="character30b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place31">25th place:</label>
                    <input class="form-control" type="text" name="place31">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character31a">Character #1:</label>
                    <input class="form-control" type="text" name="character31a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character31b">Character #2:</label>
                    <input class="form-control" type="text" name="character31b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place32">25th place:</label>
                    <input class="form-control" type="text" name="place32">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character32a">Character #1:</label>
                    <input class="form-control" type="text" name="character32a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character32b">Character #2:</label>
                    <input class="form-control" type="text" name="character32b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place33">33rd place:</label>
                    <input class="form-control" type="text" name="place33">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character33a">Character #1:</label>
                    <input class="form-control" type="text" name="character33a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character33b">Character #2:</label>
                    <input class="form-control" type="text" name="character33b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place34">33rd place:</label>
                    <input class="form-control" type="text" name="place34">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character34a">Character #1:</label>
                    <input class="form-control" type="text" name="character34a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character34b">Character #2:</label>
                    <input class="form-control" type="text" name="character34b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place35">33rd place:</label>
                    <input class="form-control" type="text" name="place35">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character35a">Character #1:</label>
                    <input class="form-control" type="text" name="character35a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character35b">Character #2:</label>
                    <input class="form-control" type="text" name="character35b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place36">33rd place:</label>
                    <input class="form-control" type="text" name="place36">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character36a">Character #1:</label>
                    <input class="form-control" type="text" name="character36a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character36b">Character #2:</label>
                    <input class="form-control" type="text" name="character36b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place37">33rd place:</label>
                    <input class="form-control" type="text" name="place37">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character37a">Character #1:</label>
                    <input class="form-control" type="text" name="character37a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character37b">Character #2:</label>
                    <input class="form-control" type="text" name="character37b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place38">33rd place:</label>
                    <input class="form-control" type="text" name="place38">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character38a">Character #1:</label>
                    <input class="form-control" type="text" name="character38a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character38b">Character #2:</label>
                    <input class="form-control" type="text" name="character38b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place39">33rd place:</label>
                    <input class="form-control" type="text" name="place39">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character39a">Character #1:</label>
                    <input class="form-control" type="text" name="character39a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character39b">Character #2:</label>
                    <input class="form-control" type="text" name="character39b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place40">33rd place:</label>
                    <input class="form-control" type="text" name="place40">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character40a">Character #1:</label>
                    <input class="form-control" type="text" name="character40a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character40b">Character #2:</label>
                    <input class="form-control" type="text" name="character40b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place41">33rd place:</label>
                    <input class="form-control" type="text" name="place41">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character41a">Character #1:</label>
                    <input class="form-control" type="text" name="character41a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character41b">Character #2:</label>
                    <input class="form-control" type="text" name="character41b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place42">33rd place:</label>
                    <input class="form-control" type="text" name="place42">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character42a">Character #1:</label>
                    <input class="form-control" type="text" name="character42a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character42b">Character #2:</label>
                    <input class="form-control" type="text" name="character42b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place43">33rd place:</label>
                    <input class="form-control" type="text" name="place43">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character43a">Character #1:</label>
                    <input class="form-control" type="text" name="character43a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character43b">Character #2:</label>
                    <input class="form-control" type="text" name="character43b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place44">33rd place:</label>
                    <input class="form-control" type="text" name="place44">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character44a">Character #1:</label>
                    <input class="form-control" type="text" name="character44a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character44b">Character #2:</label>
                    <input class="form-control" type="text" name="character44b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place45">33rd place:</label>
                    <input class="form-control" type="text" name="place45">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character45a">Character #1:</label>
                    <input class="form-control" type="text" name="character45a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character45b">Character #2:</label>
                    <input class="form-control" type="text" name="character45b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place46">33rd place:</label>
                    <input class="form-control" type="text" name="place46">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character46a">Character #1:</label>
                    <input class="form-control" type="text" name="character46a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character46b">Character #2:</label>
                    <input class="form-control" type="text" name="character46b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place47">33rd place:</label>
                    <input class="form-control" type="text" name="place47">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character47a">Character #1:</label>
                    <input class="form-control" type="text" name="character47a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character47b">Character #2:</label>
                    <input class="form-control" type="text" name="character47b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place48">33rd place:</label>
                    <input class="form-control" type="text" name="place48">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character48a">Character #1:</label>
                    <input class="form-control" type="text" name="character48a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character48b">Character #2:</label>
                    <input class="form-control" type="text" name="character48b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place49">49th place:</label>
                    <input class="form-control" type="text" name="place49">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character49a">Character #1:</label>
                    <input class="form-control" type="text" name="character49a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character49b">Character #2:</label>
                    <input class="form-control" type="text" name="character49b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place50">49th place:</label>
                    <input class="form-control" type="text" name="place50">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character50a">Character #1:</label>
                    <input class="form-control" type="text" name="character50a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character50b">Character #2:</label>
                    <input class="form-control" type="text" name="character50b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place51">49th place:</label>
                    <input class="form-control" type="text" name="place51">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character51a">Character #1:</label>
                    <input class="form-control" type="text" name="character51a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character51b">Character #2:</label>
                    <input class="form-control" type="text" name="character51b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place52">49th place:</label>
                    <input class="form-control" type="text" name="place52">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character52a">Character #1:</label>
                    <input class="form-control" type="text" name="character52a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character52b">Character #2:</label>
                    <input class="form-control" type="text" name="character52b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place53">49th place:</label>
                    <input class="form-control" type="text" name="place53">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character53a">Character #1:</label>
                    <input class="form-control" type="text" name="character53a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character53b">Character #2:</label>
                    <input class="form-control" type="text" name="character53b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place54">49th place:</label>
                    <input class="form-control" type="text" name="place54">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character54a">Character #1:</label>
                    <input class="form-control" type="text" name="character54a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character54b">Character #2:</label>
                    <input class="form-control" type="text" name="character54b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place55">49th place:</label>
                    <input class="form-control" type="text" name="place55">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character55a">Character #1:</label>
                    <input class="form-control" type="text" name="character55a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character55b">Character #2:</label>
                    <input class="form-control" type="text" name="character55b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place56">49th place:</label>
                    <input class="form-control" type="text" name="place56">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character56a">Character #1:</label>
                    <input class="form-control" type="text" name="character56a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character56b">Character #2:</label>
                    <input class="form-control" type="text" name="character56b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place57">49th place:</label>
                    <input class="form-control" type="text" name="place57">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character57a">Character #1:</label>
                    <input class="form-control" type="text" name="character57a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character57b">Character #2:</label>
                    <input class="form-control" type="text" name="character57b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place58">49th place:</label>
                    <input class="form-control" type="text" name="place58">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character58a">Character #1:</label>
                    <input class="form-control" type="text" name="character58a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character58b">Character #2:</label>
                    <input class="form-control" type="text" name="character58b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place59">49th place:</label>
                    <input class="form-control" type="text" name="place59">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character59a">Character #1:</label>
                    <input class="form-control" type="text" name="character59a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character59b">Character #2:</label>
                    <input class="form-control" type="text" name="character59b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place60">49th place:</label>
                    <input class="form-control" type="text" name="place60">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character60a">Character #1:</label>
                    <input class="form-control" type="text" name="character60a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character60b">Character #2:</label>
                    <input class="form-control" type="text" name="character60b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place61">49th place:</label>
                    <input class="form-control" type="text" name="place61">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character61a">Character #1:</label>
                    <input class="form-control" type="text" name="character61a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character61b">Character #2:</label>
                    <input class="form-control" type="text" name="character61b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place62">49th place:</label>
                    <input class="form-control" type="text" name="place62">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character62a">Character #1:</label>
                    <input class="form-control" type="text" name="character62a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character62b">Character #2:</label>
                    <input class="form-control" type="text" name="character62b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place63">49th place:</label>
                    <input class="form-control" type="text" name="place63">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character63a">Character #1:</label>
                    <input class="form-control" type="text" name="character63a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character63b">Character #2:</label>
                    <input class="form-control" type="text" name="character63b">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="place64">49th place:</label>
                    <input class="form-control" type="text" name="place64">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character64a">Character #1:</label>
                    <input class="form-control" type="text" name="character64a">
                </div>
                
                <div class="form-group col-sm-4">
                    <label for="character64b">Character #2:</label>
                    <input class="form-control" type="text" name="character64b">
                </div>
                
                <button type="submit" class="btn btn-default btn-block btn-info" name="submit" style="padding: 15px 0; font-size: 1.5em;">Add this tournament!</button>
                
            </form>
            
            </div>
</body>