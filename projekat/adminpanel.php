<!DOCTYPE html>
<html>

<head>
    <title>InfoStud Admin</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <?php
    include_once("./php/database.php");
    session_start();
    if (!isset($_SESSION['role']) && $_SESSION['role'] != 'Admin') {
        header("Location: index.php");
        exit;
    }
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><span style="color: #E2016A;">A</span><span style="color: #053488;">dminPanel</span><span style="color: #E2016A; font-size: 30px;">.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="" id="za-poslodavce" style="color: #E2016A;"><i class="fas fa-user-tie"></i> <?php echo $_SESSION["role"] ?> <?php echo $_SESSION["username"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" href="./php/logout.php" style="color: #E2016A;">Odjavite se</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if (isset($_REQUEST["success"])) {
        switch ($_REQUEST["success"]) {
            case 4:
                echo '<div class="alert alert-success" role="alert">';
                echo "Sifra resetovana";
                echo '</div>';
                break;
        }
    } ?>

    <section id="main">
        <div class="container">
            <h1>Korisnici</h1>
            <?php
            if (isset($_REQUEST["success"])) {
                switch ($_REQUEST["success"]) {
                    case 1:
                        echo '<div class="alert alert-success" role="alert">';
                        echo "Korisnik obirsan";
                        echo '</div>';
                        break;
                }
            } ?>
            <div class="row hidden-md-up">
                <?php
                require_once './php/database.php';
                $radnik = getAllData("radnici");
                foreach ($radnik as $radnici) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card' style='margin-bottom: 2rem;'>";
                    echo "<img src='./img/placeholder.png' alt='Placeholder' height='130' width='130' style='display: block; margin: 0 auto;'>";
                    echo "<div class='card-block'>";
                    echo "<h4 class='card-title' style='display:flex; justify-content:center;'>" . $radnici['ime_radnika'] . " " . $radnici['prezime_radnika'] . "</h4>";
                    echo "<h6 class='card-subtitle text-muted' style='display:flex; justify-content:center;'>" . $radnici['struka'] . "</h6><br>";
                    echo "<p class='card-text p-y-1' style='display:flex; justify-content:center;'>" . $radnici['email_radnika'] . "</p>";
                    echo "<a href='./php/admindeletek.php?id=" . $radnici['id'] . "' class='btn btn-danger' style='margin-right: 5rem;'>Obrisi</a><a href='./php/adminchangepass.php?email=" . $radnici['email_radnika'] . "' class='btn btn-primary'>Resetuj sifru</a></div></div></div>";
                }
                ?>
            </div>

        </div>
        </div>
        <br><br>
        <div class="container">
            <h1>Poslodavci</h1>
            <?php
            if (isset($_REQUEST["success"])) {
                switch ($_REQUEST["success"]) {
                    case 2:
                        echo '<div class="alert alert-success" role="alert">';
                        echo "Poslodavac obirsan";
                        echo '</div>';
                        break;
                }
            } ?>
            <div class="row hidden-md-up">
                <?php
                require_once './php/database.php';
                $user = getAllData("user");
                foreach ($user as $useri) {
                    if ($useri['role'] == 'Poslodavac') {
                        echo "<div class='col-md-4'>";
                        echo "<div class='card' style='margin-bottom: 2rem;'>";
                        echo "<img src='./img/placeholder.png' alt='Placeholder' height='130' width='130' style='display: block; margin: 0 auto;'>";
                        echo "<div class='card-block'>";
                        echo "<h4 class='card-title' style='display:flex; justify-content:center;'>" . $useri['ime'] . " " . $useri['prezime'] . "</h4>";
                        echo "<h6 class='card-subtitle text-muted' style='display:flex; justify-content:center;'>" . $useri['role'] . "</h6>";
                        echo "<p class='card-text p-y-1' style='display:flex; justify-content:center;'>" . $useri['email'] . "</p>";
                        echo "<a href='./php/admindeletep.php?id=" . $useri['id'] . "' class='btn btn-danger' style='margin-right: 5rem;'>Obrisi</a><a href='./php/adminchangepass.php?email=" . $useri['email'] . "' class='btn btn-primary'>Resetuj sifru</a></div></div></div>";
                    }
                }
                ?>
            </div>
        </div>
        <br><br>
        <div class="container">
            <h1>Oglasi</h1>
            <?php
            if (isset($_REQUEST["success"])) {
                switch ($_REQUEST["success"]) {
                    case 3:
                        echo '<div class="alert alert-success" role="alert">';
                        echo "Oglas obirsan";
                        echo '</div>';
                        break;
                }
            } ?>
            <div class="row hidden-md-up">
                <?php
                require_once './php/database.php';
                $poslovi = getAllData("poslovi");
                foreach ($poslovi as $posao) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card' style='margin-bottom: 2rem;'>";
                    echo "<img src='./img/placeholder-firm.png' alt='Placeholder' height='130' width='130' style='display: block; margin: 0 auto;'>";
                    echo "<div class='card-block'>";
                    echo "<h4 class='card-title' style='display:flex; justify-content:center;'>" . $posao['ime_posla'] . " " . $posao['poslodavac'] . "</h4>";
                    echo "<h6 class='card-subtitle text-muted' style='display:flex; justify-content:center;'>" . $posao['oblast_rada'] . "</h6><br>";
                    echo "<p class='card-text p-y-1' style='display:flex; justify-content:center;'>" . $posao['email_poslodavca'] . "</p>";
                    echo "<a href='./php/admindeleteoglas.php?id=" . $posao['id'] . "' class='btn btn-danger' style='margin-right: 7rem;'>Obrisi</a><a href='./modifyoglas.php?id=" . $posao['id'] . "' class='btn btn-primary'>Izmeni</a></div></div></div>";
                }
                ?>
            </div>
        </div>

    </section>

    <script src="https://kit.fontawesome.com/b246e96d93.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.6/dist/umd/popper.min.js" integrity="sha384-3u3mG4aJZ1Yjl5BvhMb9SVgS8O1JKlHp+xzLwVc+KfZOcH+bq3Z9+O1r0TtTjKGz" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="./script/script.js"></script>
</body>

</html>