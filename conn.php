<?php

require("./database.php");

function query($query)
{
        global $connect;
        $data = mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($data);
        return $data;
}

function get_data($query)
{
        global $connect;
        $hasil = mysqli_query($connect, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($hasil)) {
                $rows[] = $row;
        }
        return $rows;
}

function get_rows($query)
{
        global $connect;
        $data = mysqli_query($connect, $query);
        $data = mysqli_num_rows($data);
        return $data;
}

function login($data)
{
        $name = $data['username'];
        $pass = $data['password'];

        $sql = get_rows("SELECT * FROM users WHERE username='" . $name . "' OR email='" . $name . "' AND pass='" . $pass . "'");
        if ($sql > 0) {
                session_start();
                $data = query("SELECT * FROM users WHERE username='" . $name . "' AND pass='" . $pass . "'");
                $_SESSION['username'] = $data['username'];
                $_SESSION['l'] = $data['role'];
                $_SESSION['i'] = $data['id'];
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function register($data)
{
        global $connect;
        $username = $data['username'];
        $pass = $data['password'];

        $sql = get_rows("SELECT * FROM users WHERE username='" . $username . "'");
        if ($sql == 0) {
                session_start();
                $data = mysqli_query($connect, "INSERT INTO `users` (`username`, `pass`, `role`) VALUES ('" . $username . "','" . $pass . "', '2')");
                $_SESSION['username'] = $username;
                $_SESSION['l'] = 2;
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function show_user()
{
        global $connect;
        $data = "SELECT * FROM `users` WHERE `role`='2' ";
        if (!empty($_POST["search"]["value"])) {
                $data .= 'AND id LIKE "%' . $_POST["search"]["value"] . '%" ';
                $data .= 'OR `role`="2" AND username LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
        if (!empty($_POST["order"])) {
                $data .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
                $data .= 'ORDER BY id DESC ';
        }
        if ($_POST["length"] != -1) {
                $data .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $h = mysqli_query($connect, $data);
        $rows = mysqli_num_rows($h);
        $l = mysqli_query($connect, "SELECT * FROM `users` WHERE `role`='2'");
        $rowsTotal = mysqli_num_rows($l);

        $datas = [];
        $i = 1;
        while ($v = mysqli_fetch_assoc($h)) {
                $datas[] = [
                        'id' => $i++,
                        'username' => $v['username'],
                        'role' => 'User',
                        'button' => '<td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item updateData" data-toggle="modal" data-id="' . $v['id'] . '" title="Update" data-target="#updateModal">Edit</a>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $v['id'] . '" class="dropdown-item text-danger deleteData">Delete</a>
                            </div>
                        </div>
                    </td>'
                ];
        }
        $output = array(
                "draw" => intval($_POST["draw"]),
                "iTotalRecords" => $rows,
                "iTotalDisplayRecords" => $rowsTotal,
                "data" => $datas
        );
        echo json_encode($output);
}

function create_user($data, $role)
{
        global $connect;
        $username = $data['username'];
        $pass = $data['password'];

        $sql = get_rows("SELECT * FROM users WHERE username='" . $username . "'");
        if ($sql == 0) {
                $data = mysqli_query($connect, "INSERT INTO `users` (`username`, `pass`, `role`) VALUES ('" . $username . "','" . $pass . "', " . $role . ")");
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function update_user($data, $role)
{
        global $connect;
        $username = $data['username'];
        $pass = $data['password'];

        $sql = get_rows("SELECT * FROM users WHERE username='" . $username . "'");
        if ($sql == 0) {
                $data = mysqli_query($connect, "UPDATE `users` SET `username`='" . $username . "', `pass`='" . $pass . "', `role`=" . $role . " WHERE id='" . $data['id'] . "'");
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function deletes($data, $del)
{
        global $connect;
        $data = mysqli_query($connect, "DELETE FROM $del WHERE id=" . $data . "");
        if ($data) {
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function show_admin()
{
        global $connect;
        $data = "SELECT * FROM `users` WHERE `role`='1' ";
        if (!empty($_POST["search"]["value"])) {
                $data .= 'AND id LIKE "%' . $_POST["search"]["value"] . '%" ';
                $data .= 'OR `role`="1" AND username LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
        if (!empty($_POST["order"])) {
                $data .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
                $data .= 'ORDER BY id DESC ';
        }
        if ($_POST["length"] != -1) {
                $data .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $h = mysqli_query($connect, $data);
        $rows = mysqli_num_rows($h);
        $l = mysqli_query($connect, "SELECT * FROM `users` WHERE `role`='1'");
        $rowsTotal = mysqli_num_rows($l);

        $datas = [];
        $i = 1;

        while ($v = mysqli_fetch_assoc($h)) {
                $datas[] = [
                        'id' => $i++,
                        'username' => $v['username'],
                        'role' => 'Admin',
                        'button' => '<td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item updateData" data-toggle="modal" data-id="' . $v['id'] . '" title="Update" data-target="#updateModal">Edit</a>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $v['id'] . '" class="dropdown-item text-danger deleteData">Delete</a>
                            </div>
                        </div>
                    </td>'
                ];
        }
        $output = array(
                "draw" => intval($_POST["draw"]),
                "iTotalRecords" => $rows,
                "iTotalDisplayRecords" => $rowsTotal,
                "data" => $datas
        );
        echo json_encode($output);
}

function show_Books()
{
        global $connect;
        $data = "SELECT `books`.*, `categorys`.`name` FROM `books` LEFT JOIN `categorys` ON `categorys`.`id`=`books`.`category_id`  ";
        if (!empty($_POST["search"]["value"])) {
                $data .= 'WHERE `books`.`title` LIKE "%' . $_POST["search"]["value"] . '%" ';
                $data .= 'OR `books`.`description` LIKE "%' . $_POST["search"]["value"] . '%" ';
                $data .= 'OR `categorys`.`name` LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
        if (!empty($_POST["order"])) {
                $data .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
                $data .= 'ORDER BY id DESC ';
        }
        if ($_POST["length"] != -1) {
                $data .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $h = mysqli_query($connect, $data);
        $rows = mysqli_num_rows($h);
        $l = mysqli_query($connect, "SELECT * FROM `books`");
        $rowsTotal = mysqli_num_rows($l);

        $datas = [];
        $i = 1;
        while ($v = mysqli_fetch_assoc($h)) {
                $datas[] = [
                        'id' => $i++,
                        'title' => $v['title'],
                        'name' => $v['name'],
                        'description' => substr($v['description'], 0, 100),
                        'button' => '<td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item updateData" data-toggle="modal" data-id="' . $v['id'] . '" title="Update" data-target="#updateModal">Edit</a>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $v['id'] . '" class="dropdown-item text-danger deleteData">Delete</a>
                            </div>
                        </div>
                    </td>'
                ];
        }

        $output = array(
                "draw" => intval($_POST["draw"]),
                "iTotalRecords" => $rows,
                "iTotalDisplayRecords" => $rowsTotal,
                "data" => $datas
        );
        echo json_encode($output);
}

function byId($data, $table)
{
        $data = query("SELECT * FROM $table WHERE `id`=" . $data['id'] . "");
        echo json_encode($data);
}

function create_book($data, $file)
{
        global $connect;
        $title = $data['title'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $category = $data['category'];
        $description = $data['description'];

        $filename = date('Y-m-d') . $file["name"];
        $tempname =  $file["tmp_name"];
        $folder = "image/" . $filename;


        $sql = get_rows("SELECT * FROM `books` WHERE title='" . $title . "'");
        if ($sql == 0) {
                $data = mysqli_query($connect, "INSERT INTO `books` (`title`, `slug`, `category_id`, `description`, `image`) VALUES ('" . $title . "','" . $slug . "'," . $category . ", '" . $description . "','" . $filename . "')");

                if (move_uploaded_file($tempname, $folder)) {
                        return json_encode(array('success' => 1));
                }
                return json_encode(array('success' => 0));
        } else {
                return json_encode(array('success' => 2));
        }
}

function update_book($data, $file)
{
        global $connect;
        $title = $data['title'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $category = $data['category'];
        $description = $data['description'];

        $filename = $file["name"];
        $tempname =  $file["tmp_name"];
        $folder = "image/" . date('Y-m-d') . $filename;

        $sql = get_rows("SELECT * FROM `books` WHERE title='" . $title . "'");
        if ($sql == 0) {
                $data = mysqli_query($connect, "UPDATE `books` SET `title`='" . $title . "', `slug`='" . $slug . "', `category_id`='" . $category . "', `description`='" . $description . "',`image`='" . $filename . "' WHERE id='" . $data['id'] . "'");

                if (move_uploaded_file($tempname, $folder)) {
                        return json_encode(array('success' => 1));
                }

                return json_encode(array('success' => 0));
        } else {
                return json_encode(array('success' => 2));
        }
}

function show_Chapters()
{
        global $connect;
        $data = "SELECT `books`.`title`, `content`.`id`,`content`.`page`, `content`.`content` FROM `books` RIGHT JOIN `content` ON `content`.`book_id`=`books`.`id`  ";
        if (!empty($_POST["search"]["value"])) {
                $data .= 'WHERE `books`.`title` LIKE "%' . $_POST["search"]["value"] . '%" ';
                $data .= 'OR `content`.`content` LIKE "%' . $_POST["search"]["value"] . '%" ';
                $data .= 'OR `content`.`page` LIKE "%' . $_POST["search"]["value"] . '%" ';
        }
        if (!empty($_POST["sear"])) {
                $data .= 'WHERE `books`.`title` LIKE "%' . $_POST["sear"] . '%" ';
                $data .= 'OR `content`.`content` LIKE "%' . $_POST["sear"] . '%" ';
                $data .= 'OR `content`.`page` LIKE "%' . $_POST["sear"] . '%" ';
        }

        if (!empty($_POST["order"])) {
                $data .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
                $data .= 'ORDER BY id DESC ';
        }
        if ($_POST["length"] != -1) {
                $data .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $h = mysqli_query($connect, $data);
        $rows = mysqli_num_rows($h);
        $l = mysqli_query($connect, "SELECT `books`.`title`, `content`.`id`,`content`.`page`, `content`.`content` FROM `books` RIGHT JOIN `content` ON `content`.`book_id`=`books`.`id`");
        $rowsTotal = mysqli_num_rows($l);

        $datas = [];
        $i = 1;
        while ($v = mysqli_fetch_assoc($h)) {
                $datas[] = [
                        'id' => $i++,
                        'title' => $v['title'],
                        'page' => $v['page'],
                        'content' => substr($v['content'], 0, 100),
                        'button' => '<td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item updateData" data-toggle="modal" data-id="' . $v['id'] . '" title="Update" data-target="#updateModal">Edit</a>
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $v['id'] . '" class="dropdown-item text-danger deleteData">Delete</a>
                            </div>
                        </div>
                    </td>'
                ];
        }

        $output = array(
                "draw" => intval($_POST["draw"]),
                "iTotalRecords" => $rows,
                "iTotalDisplayRecords" => $rowsTotal,
                "data" => $datas
        );
        echo json_encode($output);
}

function create_Chapter($data)
{
        global $connect;
        $book = $data['book'];
        $content = $data['content'];


        $sql = query("SELECT `page` FROM `content` WHERE `book_id`='" . $book . "' ORDER BY `id` DESC LIMIT 1");
        if ($sql >= 0) {
                $data = mysqli_query($connect, "INSERT INTO `content` (`book_id`, `page`, `content`) VALUES ('" . $book . "','" . ($sql['page'] ? $sql['page'] : 0) + 1 . "','" . $content . "')");
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function byIdPage($data)
{
        $data = get_data("SELECT * FROM `content` WHERE `book_id`='" . $data['id'] . "'");
        echo json_encode($data);
}

function profile_setting()
{
        global $connect;
        $mu = get_rows("SELECT * FROM `users` WHERE username='" . $_POST['username'] . "' AND email='" . $_POST['email'] . "'");
        if ($mu == 0) {
                mysqli_query($connect, "UPDATE `users` SET `username`='" . $_POST['username'] . "', `email`='" . $_POST['email'] . "' WHERE id=" . $_POST['id'] . "");
                session_start();
                $_SESSION['username'] = $_POST['username'];
                return json_encode(array('success' => 1));
        }

        return json_encode(array('success' => 2));
}

function password_setting()
{
        global $connect;
        mysqli_query($connect, "UPDATE `users` SET `pass`='" . $_POST['password1'] . "' WHERE id=" . $_POST['id'] . "");
        return json_encode(array('success' => 1));
}
