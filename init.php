<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-db/utils.php";

onlyInDebug();

$address = get_required(wallet_admin_address);
$password = get_required(wallet_admin_password);

requestEquals("/mfm-token/init.php", [
    wallet_admin_address => $address,
    wallet_admin_password => $password
]);

query("DROP TABLE IF EXISTS `data`;");
query("CREATE TABLE IF NOT EXISTS `data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_parent_id` int(11) DEFAULT NULL,
  `data_key` varchar(256) COLLATE utf8_bin NOT NULL,
  `data_value` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `data_time` int(11) NOT NULL,
  `data_type` int(1) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");

query("DROP TABLE IF EXISTS `history`;");
query("CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_path` varchar(256) COLLATE utf8_bin NOT NULL,
  `data_value` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `data_time` int(11) NOT NULL,
  `data_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");

$response[success] = true;

echo json_encode($response);

