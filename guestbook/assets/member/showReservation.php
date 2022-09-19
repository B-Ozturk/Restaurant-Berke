<?php
include_once("./userStructure.php");
?>
<html>
<body>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../member/profile.php">Profiel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reserveringen</li>
        </ol>
    </nav>

    <h3 class="text-center">Hoi <?= $_SESSION['user']->name ?> hier kan je al je reserveringen zien</h3><br>
    <center>
        <?= showMemberReservations(); ?>
    </center>
</div>
</body>
</html>
