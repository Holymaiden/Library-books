<?php session_start();
$title = "" . $_GET['v'] . " | Perpustakaan Hakim";
require_once("./templates/header.php");
require_once("./conn.php");
$data = query("SELECT * FROM `books` WHERE slug='" . $_GET['v'] . "'");
?>
<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">

        <div class="page-header d-md-flex justify-content-between">
            <div>
                <h3></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Books</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $data['title']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider-for">
                                    <div class="slick-slide-item" style="text-align: -webkit-center">
                                        <img src="image/<?= $data['image']; ?>" class="img-fluid rounded" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">New Collection</p>
                                    <span class="d-flex align-items-center">
                                        <i class="fa fa-heart text-danger mr-2"></i> 259
                                    </span>
                                </div>
                                <h2><?= $data['title']; ?></h2>
                                <p>
                                    <span class="badge bg-success-bright text-success">In stock</span>
                                </p>
                                <p><?= $data['description']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $content = get_data("SELECT `content`.`page`, `content`.`content` FROM `books` LEFT JOIN `content` ON `books`.`id`=`content`.`book_id` WHERE `books`.`slug`='" . $_GET['v'] . "'") ?>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-4" role="tablist">
                            <?php foreach ($content as $y) : ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($y['page'] == 1) echo 'active' ?> " id="page-<?= $y['page'] ?>-tab" data-toggle="tab" href="#page-<?= $y['page'] ?>" role="tab" aria-controls="page-<?= $y['page'] ?>" aria-selected="<?php if ($y['page'] == 1) echo 'true';
                                                                                                                                                                                                                                                        else echo 'false' ?>">Chapter <?= $y['page'] ?> </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="tab-content">
                            <?php foreach ($content as $y) : ?>
                                <div class="tab-pane fade <?php if ($y['page'] == 1) echo 'show active' ?> " id="page-<?= $y['page'] ?>" role="tabpanel" aria-labelledby="page-<?= $y['page'] ?>-tab">
                                    <h4 class="mb-4">Chapter <?= $y['page'] ?></h4>
                                    <p><?= $y['content']; ?></p>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- ./ Content -->

    <?php require_once("./templates/footer.php") ?>