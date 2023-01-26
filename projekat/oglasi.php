<!DOCTYPE html>
<html>

<head>
    <title>InfoStud</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <?php
    include_once("./php/database.php");
    session_start();

    if (!isset($_SESSION['ime']) || !isset($_SESSION['prezime']) || !isset($_SESSION['email']) || !isset($_SESSION['role'])) {
        header("Location: index.php");
        exit;
    }
    ?>

</head>

<body>
    <?php
    if (isset($_REQUEST["success"])) {
        switch ($_REQUEST["success"]) {
            case 1:
                echo '<div class="alert alert-success" role="alert">';
                echo "Poslodavac prijavljen";
                echo '</div>';
                break;
            case 2:
                echo '<div class="alert alert-success" role="alert">';
                echo "User logging out";
                echo '</div>';
                break;
            case 3:
                echo '<div class="alert alert-success" role="alert">';
                echo "Uspesno ste kontaktirali radnika";
                echo '</div>';
                break;
            case 4:
                echo '<div class="alert alert-success" role="alert">';
                echo "Uspesno ste kreirali oglas";
                echo '</div>';
                break;
        }
    }
    if (isset($_REQUEST["error"])) {
        switch ($_REQUEST["error"]) {
            case 1:
                echo '<div class="alert alert-success" role="alert">';
                echo "Doslo je do greske";
                echo '</div>';
                break;
        }
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><span style="color: #E2016A;">I</span><span style="color: #053488;">nfoStud</span><span style="color: #E2016A; font-size: 30px;">.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction(event)" style="color: #053488" ;" myFunction(event)">Poslovi <span style="color: #E2016A;">▾</span></button>

                        <div id="myDropdown" class="dropdown-content">
                            <a href="#" style="color: #053488;">Arhiva poslova</a>
                            <a href="#" style="color: #053488;">Oceni poslodavce</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item boja">
                    <a class="nav-link" id="poslodavci" href="./oglasi.php" style="color: #053488;">Pregledaj svoje oglase</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="" id="za-poslodavce" style="color: #E2016A;"><i class="fas fa-user-tie"></i> <?php echo $_SESSION["role"] ?>, <?php echo $_SESSION["ime"] ?> <?php echo $_SESSION["prezime"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" href="./php/logout.php" style="color: #E2016A;">Odjavite se</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" href="./createoglas.php" style="color: #053488;">Napravi oglas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="notifications" href="#" style="color: #053488;"><i class="fas fa-bell fa-lg"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <section class='top-page'>
        <div class="container">
            <div class="row">
                <h1>Vasi oglasi<span>.</span></h1>
            </div>
        </div>
    </section>
    <section id="main">
        <div class="container">
            <?php
            require_once './php/database.php';

            $match = false;

            if (isset($_SESSION['email'])) {
                $posao = getAllData("poslovi");
                foreach ($posao as $poslovi) {
                    if ($_SESSION['email'] == $poslovi['email_poslodavca']) {
                        $match = true;
                        break;
                    }
                }
            }
            if ($match) {
                if (isset($_SESSION['email'])) {
                    $posao = getAllData("poslovi");
                    foreach ($posao as $poslovi) {
                        if ($_SESSION['email'] == $poslovi['email_poslodavca']) {
                            echo "<div class='card'>";
                            echo "<div class='card-header'>" . $poslovi['poslodavac'] . "</div><div class='card-body'>";
                            echo "<h5 class='card-title'>" . $poslovi['ime_posla'] . ", " . $poslovi['grad'] . "</h5>";
                            echo "<p class='card-text'>" . $poslovi['opis'] . "</p>";
                            echo "<p class='card-text'>" . $poslovi['email_poslodavca'] . "</p>";
                            echo "<p class='card-text'>" . $poslovi['vreme_objave'] . "</p>";;
                            echo "<a href='./php/deleteoglas.php?id=" . $poslovi['id'] . "' class='btn btn-primary' style='margin-right: 1rem;'>Obrisi</a><a href='./php/modifyoglas.php?id=" . $poslovi['id'] . "' class='btn btn-primary' style='margin-right: 1rem;'>Izmeni</a></div></div><br>";
                        }
                    }
                }
            } else {
                echo "<div class='row'><h1>Nemate postavljenih oglasa<span>!</span></h1></div>";
            }
            ?>

        </div>
    </section>
    <section id="footer">
        <div class="container">
            <div class="row">
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-twitter-square share"></i></a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-instagram-square share"></i></a>

                    </li>
                </ul>
            </div>
            <div class="row">
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-facebook-square share"></i></a>
                    </li>

                </ul>
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