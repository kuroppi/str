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

    </head>

    <body id="tournament-results">

        <header>
            
        </header>

        <div class="container">
        
        <?php
            
            if ( isset($_GET['id']) && is_numeric($_GET['id']) ) {
            $id = ($_GET['id']);
    
        } ?>
           
        <?php
            
        $query = "SELECT *, DATE_FORMAT(tournament_start_date,'%M %D %Y') tournament_start_date, DATE_FORMAT(tournament_end_date,'%M %D %Y') tournament_end_date FROM tournament AS t
                  INNER JOIN
                  version AS v
                  on t.version_id = v.version_id
                  WHERE tournament_id = '$id'
                  ORDER BY t.tournament_id DESC";
        ?>
           
                
                
        <?php
            
                if ($result = mysqli_query($dbc, $query)) {
                    while ($output = mysqli_fetch_array($result)) { 
                        echo  "<h1>{$output['tournament_name']} ({$output['version']})</h1>";
                    ?>
                        
                    <div style='padding: 15px 0; width: 100px; float: left; clear: both;'>
                        <p><strong>Date:</strong><br>
                           <strong>Location:</strong><br>
                           <strong>Players:</strong><br>
                           <strong>Bracket:</strong><br>
                           <strong>Video:</strong></p>
                    </div>
                        
                    <?php
                        echo "<div style='padding: 15px 0; width: calc(100% - 100px); float: left;'>";
                        
                        echo  "<p>{$output['tournament_start_date']} ";
                        
                    if ( !empty($output['tournament_end_date']) ) {
                        echo  "- {$output['tournament_end_date']}<br>";
                    } else {
                        echo  "<br>";
                    }
                        
                        echo  "{$output['location']}<br>";
                        
                    if ( !empty($output['entries']) ) {
                        echo  "{$output['entries']}<br>";
                    } else {
                        echo  "N/A<br>";
                    }
                    
                    if ( !empty($output['bracket_url']) ) {
                        echo  "<a href='{$output['bracket_url']}' target='_blank'>Link</a><br>";
                    } else {
                        echo  "N/A<br>";
                    }
                    
                    if ( !empty($output['video_url_1']) ) {
                        echo  "<a href='{$output['video_url_1']}' target='_blank'>Link</a> ";
                    } else {
                        echo  "N/A<br>";
                    }
                    
                    if ( !empty($output['video_url_2']) ) {
                        echo  "- <a href='{$output['video_url_2']}' target='_blank'>Link</a><br>";
                    }
                    
                    echo "</p></div>";
                        
                        echo  "<table class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>PLACE</th>
                                            <th>NAME</th>
                                            <th>COUNTRY</th>
                                            <th>CHARACTER</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                        
                        $i = 1;
                        while ($i < 64 && !empty($output['place'.$i]) ) {
                            echo          "<tr>
                                            <td style='padding-left: 25px;'>$i</td>
                                            <td><a href=\"results.php?id={$output['place'.$i]}\">{$output['place'.$i]}</td>
                                            <td>{$output['country']}</td>
                                            <td>{$output['character'.$i.'a']} ";
                            if ( !empty($output['character'.$i.'b']) ) {
                                echo          "/ {$output['character'.$i.'b']}</td>";
                            } else {
                                echo          "</td>";
                            }
                                echo          "</tr>";
                                $i++;
                        }
                            echo        "</table>";
                        
                    }
                }
            
        ?>
        
        </div>

        <footer>

        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
        
        <script>
        
                $(document).ready(function() 
                    { 
                        $("#myTable").tablesorter(); 
                    } 
                ); 
        
        </script>

    </body>

</html>
