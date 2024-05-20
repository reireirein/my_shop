<?php 
require_once 'env.php';

// PATH
const BASE_DIR = __DIR__;
const APP_DIR = __DIR__ . "/app/";
const LIB_DIR = __DIR__ . "/lib/";
const DATA_DIR = __DIR__ . "/data/";
const IMAGE_DIR = __DIR__ . "/images/";
const MODEL_DIR = APP_DIR . "models/";
const VIEW_DIR = APP_DIR . "views/";
const CONTROLLER_DIR = APP_DIR . "controllers/";
const VALIDATE_DIR = APP_DIR . "validate/";
const LAYOUT_DIR = VIEW_DIR . "layouts/";

session_start();
session_regenerate_id(true);

require_once LIB_DIR . 'DB.php';
?>