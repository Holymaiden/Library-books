<?php
require_once("./conn.php");
if (isset($_POST['id'])) {
        echo deletes($_POST['id'], $_POST['del']);
} else {
        echo json_encode(array('success' => 0));
}
