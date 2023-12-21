<?php require 'views/templete/header.php'; ?>
<?php require 'views/templete/navar.php'; ?>

<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card card-outline card-success">
            <div class="card-header">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-6">
                                <h1>Slider 1</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?php echo constant('URL') ?>panel">Home</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="card-body">
                <?php

                require 'views/slider1/formInsertImg.php';
                require 'views/slider1/previewImg.php';
                ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo constant('URL') ?>assets/js/formInsertImg1.js"></script>
<script src="<?php echo constant('URL') ?>assets/js/previewImg.js"></script>
<?php require 'views/templete/footer.php'; ?>