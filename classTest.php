<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 1/4/2019
 * Time: 6:27 AM
 */

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
echo $id . "<br><br><br>";

//all stats
var_dump($data[0]);
echo "<br><br>";

//per contestant
var_dump($data[0]->participants[1]);
?>