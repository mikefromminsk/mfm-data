<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-data/utils.php";

$path = get_required(path);

$path = explode("/", $path);

if (!dataExist($path)) error("Path not found");

$response[value] = dataGet($path);

echo json_encode($response);