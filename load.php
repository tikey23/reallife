<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once('../functions/pageHandling.php');
require_once('../functions/eventfunctions.php');
require_once('functions/specialeventsfunctions.php');
require_once('models/Model.php');
require_once('models/Event.php');
require_once('models/SpecialEvent.php');
require_once('models/Member.php');
require_once('models/Picture.php');
require_once('models/Gallerycategory.php');
require_once('models/Month.php');

[$con, $twig] = bootstrap();