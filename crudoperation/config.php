<?php
mysqli_report(MYSQLI_REPORT_OFF);


define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "admin123");
define("DB_NAME", "crud");

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if (!$link) {
  echo "Connection error: " . mysqli_connect_error();
}