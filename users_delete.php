<?php
require_once("./conn.php");
if (isset($_POST['id'])) {
        echo delete_user($_POST['id']);
} else {
        echo json_encode(array('success' => 0));
}
