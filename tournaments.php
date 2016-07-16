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

    <body>

        <header>
            
        </header>

        <div class="container">
            
            

            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>TOURNAMENT NAME</th>
                        <th>DATE</th>
                        <th>LOCATION</th>
                        <th>WINNER</th>
                    </tr>
                </thead>
                
                <tbody>

                <?php
                    
                $query = "SELECT *, DATE_FORMAT(tournament_start_date,'%m-%d-%Y') tournament_start_date, DATE_FORMAT(tournament_end_date,'%M %D %Y') tournament_end_date FROM tournament AS t
                          INNER JOIN
                          version AS v
                          on t.version_id = v.version_id
                          ORDER BY t.tournament_id DESC";
            
                if ($r = mysqli_query($dbc, $query)) {
                    while ($row = mysqli_fetch_array($r)) {
                        print "<tr>
                                   <td><a href=\"results.php?id={$row['tournament_id']}\">{$row['tournament_name']}</a></td>
                                   <td>{$row['tournament_start_date']}</td>
                                   <td>{$row['location']}</td>
                                   <td><a href=\"players.php?id={$row['player_id']}\">{$row['place1']}</a></td>
                               </tr>";
                    }
                }
                    
//                    $result = mysqli_query($query);
//                    while ($row = mysqli_fetch_assoc($result)) {
//                        print_r($row);
//                        
//                    }
            
            mysqli_close($dbc);
            
            ?>
            
                 </tbody>
                
            </table>
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
