<?php
require_once("./conn.php");
if (isset($_POST['username']) && isset($_POST['password'])) {
        echo create_user($_POST, 1);
} else {
        echo json_encode(array('success' => 0));
}
