<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
 

    <h1>LeetCode Solver</h1>

    <table>
        <tr>
            <th>Users</th>
            <th>Status</th>
        </tr>
       <!-- this is my php test -->
        <?php

        global $dec_api;
        date_default_timezone_set("UTC");
        $users_array = array("sakuna_123", "mskerba", "sultan_ael-oual", "toufa7", "Abdeljalil-Bouchfar", "hamzazaouya18");
        $file_json = file_get_contents("data.json");
        $dec_file = json_decode($file_json, true);
        $date_file = $dec_file["date"];

        $bad_nwita = "You are such Loser";
        $good_nwita = "Good see you tomorow";

        $get_day = date("l");
        $check = 0;
        $site = 'https://leetcode-stats-api.herokuapp.com/';
        $len = count($users_array);

        for ($i = 0; $i < $len; $i++)
        {
            if ($date_file != $get_day)
            {
                
                $check = 1;
                $concatenate = $site.$users_array[$i];
                $api = file_get_contents($concatenate);
                $dec_api = json_decode($api);
                $dec_file[$users_array[$i]["date"]] = $get_day; 
            }
            if (check == 1)
            {
                if(($dec_api["easySolved"] >=  $dec_file["easy"] + 2) || 
                ($dec_api["mediumSolved"] >=  $dec_file["mid"] + 1) ||
                ($dec_api["hardSolved"] >=  $dec_file["hardSolved"] + 1))
                {
                    dec_file[$i]["status"] = $good_nwita;
                }
                else
                    dec_file[$i]["status"] = $bad_nwita;
            }

        ?>
        <!-- this is my end test of php -->
        <tr>
            <td><?php echo $users_array[$i]?></td>
            <td><?php echo $users_array[$i]["status"]?></td>
        </tr>
        <!-- i need to update data.json file after loop end -->
        <?php } 
             $encode_file = json_encode($dec_file);
             file_put_contents('data.json', $encode_file);
        ?>
        <!-- end of php -->
        
    </table>



</body>

</html>