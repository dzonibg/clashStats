<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 6/19/2018
 * Time: 11:08 AM
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
$id = $data[1]->createdDate;
var_dump($data[1]);
echo "ID: " . $id . "<br>";
$members = $data[1]->participants;
foreach ($members as $member) {
    echo $data[1]->participants[$i]->name . "->" . $data[1]->participants[$i]->cardsEarned . " Win: " . $data[1]->participants[$i]->wins . "<br>";
    $i=$i +1;
}
echo "<pre>";
echo "</pre>";
?>
