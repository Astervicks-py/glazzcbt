<?php

include_once "./header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kortana CBT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
</head>
<body>
    <?php include_once "nav-bar.php" ?>
    <?php include_once "decor.php" ?>
    <a href="#courses" class="floating"><i class="fa fa-long-arrow-down"></i></a>
    
<div style="margin-top:calc(20vh + 2rem)"></div>
        <!-- AEB -->
    <section class="leaderboard">
        <h1 class="title">AEB 301.2</h1>
        <section class="table-body">
            <table>
                <colgroup>
                    <col style="background:var(--primary);color: #fff;">
                </colgroup>
                
                <thead style="background:var(--primary);color:#fff">
                    <tr>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Score (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM leaderboard WHERE course = 'aeb' ORDER BY score DESC LIMIT 7";
                        $result = $DB->read($sql);
                        // print_r($result);
                        if ($result) {
                            for ($i=0; $i < count($result); $i++) { 
                                include "single_row.php";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
        
    </section>

     <!-- CHEM 130 -->
     <section class="leaderboard">
        <h1 class="title">CHEM 130</h1>
        <section class="table-body">
            <table>
                <colgroup>
                    <col style="background:var(--primary);color: #fff;">
                </colgroup>
                
                <thead style="background:var(--primary);color:#fff">
                    <tr>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Score (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM leaderboard WHERE course = 'chem130' ORDER BY score DESC LIMIT 7";
                        $result = $DB->read($sql);
                        // print_r($result);
                        if ($result) {
                            for ($i=0; $i < count($result); $i++) { 
                                include "single_row.php";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
                        
    </section>

    <!-- FSB -->
    <section class="leaderboard">
        <h1 class="title">FSB</h1>
        <section class="table-body">
            <table>
                <colgroup>
                    <col style="background:var(--primary);color: #fff;">
                </colgroup>
                
                <thead style="background:var(--primary);color:#fff">
                    <tr>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Score (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM leaderboard WHERE course = 'fsb' ORDER BY score DESC LIMIT 7";
                        $result = $DB->read($sql);
                        // print_r($result);
                        if ($result) {
                            for ($i=0; $i < count($result); $i++) { 
                                include "single_row.php";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
        
    </section>
   
    <!-- GES 100 -->
    <section class="leaderboard">
        <h1 class="title">GES 100</h1>
        <section class="table-body">
            <table>
                <colgroup>
                    <col style="background:var(--primary);color: #fff;">
                </colgroup>
                
                <thead style="background:var(--primary);color:#fff">
                    <tr>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Score (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM leaderboard WHERE course = 'ges100' ORDER BY score DESC LIMIT 7";
                        $result = $DB->read($sql);
                        // print_r($result);
                        if ($result) {
                            for ($i=0; $i < count($result); $i++) { 
                                include "single_row.php";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
        
    </section>

    <!--GES 102 -->
    <section class="leaderboard">
        <h1 class="title">GES 102</h1>
        <section class="table-body">
            <table>
                <colgroup>
                    <col style="background:var(--primary);color: #fff;">
                </colgroup>
                
                <thead style="background:var(--primary);color:#fff">
                    <tr>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Score (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM leaderboard WHERE course = 'ges102' ORDER BY score DESC LIMIT 7";
                        $result = $DB->read($sql);
                        // print_r($result);
                        if ($result) {
                            for ($i=0; $i < count($result); $i++) { 
                                include "single_row.php";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </section>
        
    </section>
    <?php include_once "./footer.php " ?>
</body>
</html>