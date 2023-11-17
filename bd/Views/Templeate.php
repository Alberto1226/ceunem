<!-- Navbar -->
<?php include "Modules/Header.php" ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "Modules/Navar.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?php
  if (isset($_GET["Pages"])) {
    if (
      $_GET["Pages"] == "Licenciaturas" ||
      $_GET["Pages"] == "Maestrias" ||
      $_GET["Pages"] == "EducacionContinua" ||
      $_GET["Pages"] == "Blog" ||
      $_GET["Pages"] == "Home"
    ) {
      include "Pages/" . $_GET["Pages"] . ".php";
    }
  }
  ?>
</div>

<!-- /.content-wrapper -->

<?php include "Modules/Footer.php" ?>