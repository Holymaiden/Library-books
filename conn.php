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

        $sql = get_rows("SELECT * FROM users WHERE username='" . $name . "' AND pass='" . $pass . "'");
        if ($sql > 0) {
                session_start();
                $data = query("SELECT * FROM users WHERE username='" . $name . "' AND pass='" . $pass . "'");
                $_SESSION['username'] = $data['username'];
                $_SESSION['l'] = $data['role'];
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
        while ($v = mysqli_fetch_assoc($h)) {
                $i = 1;
                $datas[] = [
                        'id' => $i++,
                        'username' => $v['username'],
                        'role' => $v['role'],
                        'button' => '<td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" data-toggle="modal" data-target="#updateModal" data-id="' . $v['id'] . '">Edit</button>
                                <a href="#" class="dropdown-item text-danger">Delete</a>
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

function create_user($data)
{
        global $connect;
        $username = $data['username'];
        $pass = $data['password'];

        $sql = get_rows("SELECT * FROM users WHERE username='" . $username . "'");
        if ($sql == 0) {
                $data = mysqli_query($connect, "INSERT INTO `users` (`username`, `pass`, `role`) VALUES ('" . $username . "','" . $pass . "', '2')");
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}

function update_user($data)
{
        global $connect;
        $username = $data['username'];
        $pass = $data['password'];

        $sql = get_rows("SELECT * FROM users WHERE username='" . $username . "'");
        if ($sql == 0) {
                $data = mysqli_query($connect, "UPDATE `users` SET `username`='" . $username . "', `pass`='" . $pass . "', `role`='2' WHERE id='" . $_POST['id'] . "'");
                return json_encode(array('success' => 1));
        } else {
                return json_encode(array('success' => 2));
        }
}
