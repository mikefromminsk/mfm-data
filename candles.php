<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-data/track.php";

$key = get_required(key);
$period_name = get_required(period_name);

$response[candles] = getCandles($key, $period_name);
$response[value] = getCandleLastValue($key);
$response[change24] = getCandleChange24($key);

echo json_encode($response);