<?php
require_once("./conn.php");
if (isset($_POST['username']) && isset($_POST['password'])) {
        echo login($_POST);
} else {
        echo json_encode(array('success' => 0));
}
