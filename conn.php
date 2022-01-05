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
