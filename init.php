<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/mfm-data/utils.php";

onlyInDebug();

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

query("DROP TABLE IF EXISTS `candles`;");
query("CREATE TABLE IF NOT EXISTS `candles` (
  `key` varchar(256) COLLATE utf8_bin NOT NULL,
  `period_name` varchar(2) COLLATE utf8_bin NOT NULL,
  `period_time` int(11) NOT NULL,
  `low` float NOT NULL,
  `high` float NOT NULL,
  `open` float NOT NULL,
  `close` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");

query("DROP TABLE IF EXISTS `events`;");
query("CREATE TABLE IF NOT EXISTS `events` (
  `from` varchar(64) COLLATE utf8_bin NOT NULL,
  `from_id` varchar(64) COLLATE utf8_bin NOT NULL,
  `to` varchar(64) COLLATE utf8_bin NOT NULL,
  `to_id` varchar(64) COLLATE utf8_bin NOT NULL,
  `event` varchar(64) COLLATE utf8_bin NOT NULL,
  `param` varchar(64) COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");

$response[success] = true;

echo json_encode($response);

