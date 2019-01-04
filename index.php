<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 6/19/2018
 * Time: 11:08 AM
 * Hope this one does better.
 */
echo "clashStats v0.1". "<br>";

$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6OTM3LCJpZGVuIjoiNDU4NTU5NjUzODc0MjM3NDQwIiwibWQiOnt9LCJ0cyI6MTUyOTQwMDY4OTAxN30.sHsNvd1XHd5HDc0UCEYwWQbYKGUef8FQrDsix_tgnIc";
$opts = [
    "http" => [
        "header" => "auth:" . $token
    ]
];
echo "\n";
$context = stream_context_create($opts);

$test = file_get_contents("https://api.royaleapi.com/clan/8QLPRUPQ/warlog",true, $context);
$data = json_decode($test);
$i = 0;
$id = $data[0]->createdDate;
echo $id . "<br>";
//var_dump($data[0]);
echo "WAR ID: " . $id . "<br>";
$members = $data[0]->participants;
foreach ($members as $member) {
    echo  $data[0]->participants[$i]->name . " -> Wins: " . $data[0]->participants[$i]->wins . "   Collection day:" . $data[0]->participants[$i]->collectionDayBattlesPlayed . "/3" . "Collected:" . $data[0]->participants[$i]->cardsEarned;
        if ($data[0]->participants[$i]->collectionDayBattlesPlayed != "3/3") { echo "<font color = red> Missed collection!</font>"; }
        if ($data[0]->participants[$i]->battlesPlayed != (1 or 2)) { echo "<b><font color = red> Missed battle!</font></b>"; }
    $i=$i +1;
        echo "<br>";
}
echo "<pre>";
echo "</pre>";
?>
