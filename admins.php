<?php session_start();
if (isset($_SESSION['l'])) if ($_SESSION['l'] != 1) header('Location: index.php');
$title = "Admin | Perpustakaan Hakim";
require_once("./templates/header.php");
require_once("./conn.php");

$data = get_data("SELECT * FROM `users` WHERE `role`='1'");
?>
<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header d-md-flex justify-content-between">
            <div>
                <h3>Admins</h3>
                <nav aria-label="breadcrumb" class="d-flex align-items-start">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href=index.html>Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admins</li>
                    </ol>
                </nav>
            </div>
            <div class="mt-2 mt-md-0">
                <div class="dropdown">
                    <a href="#" class="btn btn-success dropdown-toggle" title="Filter" data-toggle="dropdown">Filters</a>
                    <div class="dropdown-menu dropdown-menu-big p-4 dropdown-menu-right">
                        <form>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control">
                                    <option value="">Select</option>
                                    <option value="">User</option>
                                    <option value="">Staff</option>
                                    <option value="">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Active</option>
                                    <option value="">Blocked</option>
                                    <option value="">Admin</option>
                                </select>
                            </div>
                            <button class="btn btn-primary">Get Results</button>
                            <button class="btn btn-link ml-2">Save Filter</button>
                        </form>
                    </div>
                </div>
                <div class="dropdown ml-2">
                    <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Actions</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Edit</a>
                        <a href="#" class="dropdown-item">Change Status</a>
                        <a href="#" class="dropdown-item text-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user-list" class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="user-list-select-all">
                                                <label class="custom-control-label" for="user-list-select-all"></label>
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $i => $v) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= ++$i ?></td>
                                            <td>
                                                <a href="#">
                                                    <figure class="avatar avatar-sm mr-2">
                                                        <img src="assets/media/image/user/man_avatar3.jpg" class="rounded-circle" alt="avatar">
                                                    </figure>
                                                    <?= $v['username'] ?>
                                                </a>
                                            </td>
                                            <td>Admin</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more-alt"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">View Profile</a>
                                                        <a href="#" class="dropdown-item">Edit</a>
                                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./ Content -->

    <?php require_once("./templates/footer.php") ?>