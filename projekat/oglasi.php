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
            case 5:
                echo '<div class="alert alert-success" role="alert">';
                echo "Uspesno ste izmenili oglas";
                echo '</div>';
                break;
            case 6:
                echo '<div class="alert alert-success" role="alert">';
                echo "Uspesno ste obrisali oglas";
                echo '</div>';
                break;
            case 7:
                echo '<div class="alert alert-success" role="alert">';
                echo "Uspesno ste odbili prijavu za vas oglas";
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
        <a class="navbar-brand" href="indexposlodavac.php"><span style="color: #E2016A;">I</span><span style="color: #053488;">nfoStud</span><span style="color: #E2016A; font-size: 30px;">.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item boja">
                    <a class="nav-link" id="poslodavci" href="./oglasi.php" style="color: #053488;">Pregledaj svoje oglase</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./changepass.php" id="za-poslodavce" style="color: #E2016A;"><i class="fas fa-user-tie"></i> <?php echo $_SESSION["role"] ?>, <?php echo $_SESSION["ime"] ?> <?php echo $_SESSION["prezime"] ?></a>
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
    <section class='top-page' style="background-image: url('./img/background.jpg'); background-size:cover;">
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
                    $notifikacija = getAllData("notifikacije");
                    $radnik = getAllData("radnici");
                    foreach ($posao as $poslovi) {
                        if ($_SESSION['email'] == $poslovi['email_poslodavca']) {
                            echo "<div class='card'>";
                            echo "<div class='card-header white-text'>" . $poslovi['poslodavac'] . "</div><div class='card-body'>";
                            echo "<h4 class='card-title'>" . $poslovi['ime_posla'] . ", " . $poslovi['grad'] . "</h4><br>";
                            $opis = "- " . str_replace("<br />", "<br />- ", nl2br($poslovi['opis']));
                            echo "<p class='card-text'>" . $opis . "</p>";
                            echo "<p class='card-text'>" . $poslovi['email_poslodavca'] . "</p>";
                            echo "<p class='card-text'>" . $poslovi['vreme_objave'] . "</p>";
                            echo "<a href='./php/deleteoglas.php?id=" . $poslovi['id'] . "' class='btn btn-outline-dark' style='margin-right: 1rem;'>Obrisi</a><a href='./modifyoglas.php?id=" . $poslovi['id'] . "' class='btn btn-outline-dark' style='margin-right: 1rem;'>Izmeni</a>";
                            echo "<div><br><h5>Prijave za oglas</h5>";
                            foreach ($notifikacija as $notifikacije) {
                                if ($_SESSION['email'] == $notifikacije['za_email'] && $notifikacije['prijava_id'] == $poslovi['id']) {
                                    foreach ($radnik as $radnici) {
                                        if ($notifikacije['od_email'] == $radnici['email_radnika']) {
                                            echo "<div class='card'>";
                                            echo "<div class='card-header white-text'><img src='./img/placeholder.png' alt='...' class='rounded-circle'>" . " <strong><span style='font-size: 20px'>" . $radnici['ime_radnika'] . " " . $radnici['prezime_radnika'] . "</span></strong></div><div class='card-body'>";
                                            echo "<h5 class='card-title'>" . $radnici['datum_rodjenja'] . ", " . $radnici['mesto_rodjenja'] . "</h5>";
                                            echo "<p class='card-text'>CV: <a href='./php/download.php?id=" . $radnici['id'] . "'>Download CV ovog korisnika</a></p>";
                                            echo "<p class='card-text'>" . $radnici['struka'] . "</p>";
                                            echo "<p class='card-text'>" . $radnici['email_radnika'] . "</p>";
                                            echo "<a href='./php/notifyk.php?id=" . $radnici['id'] . "' class='btn btn-outline-dark' style='margin-right: 1rem;'>Kontaktiraj</a><a href='./php/notifydelete.php?id=" . $notifikacije['id'] . "' class='btn btn-outline-dark'>Obrisi prijavu</a></div></div><br>";
                                        }
                                    }
                                }
                            }
                            echo "</div></div></div><br>";
                        }
                    }
                }
            } else {
                echo "<div class='row'><h1>Nemate postavljenih oglasa<span>!</span></h1></div>";
            }
            ?>

        </div>
    </section>
    <section id="footer" style="background-image: url('./img/background.jpg'); color:white;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 color:white">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor, magna euismod malesuada faucibus, augue magna tincidunt leo, id viverra magna erat at risus.</p>
                </div>
                <div class="col-sm-12 col-md-4 color:white">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>Phone: 555-555-5555</li>
                        <li>Email: info@example.com</li>
                        <li>Address: 123 Main St, Anytown USA</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h3>Follow Us</h3>
                    <ul class="social-icons">
                        <li><a href="twitter.com"><i class="fab fa-twitter-square color:white"></i></a></li>
                        <li><a href="instagram.com"><i class="fab fa-instagram-square color:white"></i></a></li>
                        <li><a href="facebook.com"><i class="fab fa-facebook-square color:white"></i></a></li>
                    </ul>
                </div>
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