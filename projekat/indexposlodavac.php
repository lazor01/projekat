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
                            <a href="#" style="color: #053488;">Pretraga radnika</a>
                            <a href="#" style="color: #053488;">Poslovi na email</a>
                            <a href="#" style="color: #053488;">Arhiva poslova</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item boja">
                    <a class="nav-link" id="poslodavci" href="#" style="color: #053488;">Upoznajte radnike</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" id="pretraga" href="#" style="color: #053488;">Pretraga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" style="color: #E2016A;"><i class="fas fa-user-tie"></i> <?php echo $_SESSION["role"] ?>, <?php echo $_SESSION["ime"] ?> <?php echo $_SESSION["prezime"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" href="./php/logout.php" style="color: #E2016A;">Odjavite se</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" href="#" style="color: #053488;">Za poslodavce</a>
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
                <h1>Najveći izbor oglasa za posao na jednom mestu<span>.</span></h1>
            </div>
            <div class="row">
                <p>2723 oglasa za posao, 1652 kompanije</p>
            </div>
            <div class="row">
                <form class="mt-5">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Pozicija, poslodavac, ili ključna reč" title="Pretražite poslove po poziciji, poslodavcu, ili ključnoj reči">
                    </div>
                    <div class="form-group">

                        <select class="form-control" id="exampleFormControlSelect1">
                            <option value="0">Izaberi grad</option>
                            <option value="1">Beograd</option>
                            <option value="2">Novi Sad</option>
                            <option value="3">Nis</option>
                            <option value="4">Kragujevac</option>
                            <option value="5">Cacak</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <select class="form-control1" id="exampleFormControlSelect2">
                            <option value="0">Oblast rada</option>
                            <option value="1">IT</option>
                            <option value="2">Trgovina</option>
                            <option value="3">Masinstvo</option>
                            <option value="4">Administracija</option>
                            <option value="5">Ekonomija</option>
                            <option value="6">Arhitektura</option>
                            <option value="7">Bankarstvo</option>
                            <option value="8">Biologija</option>
                            <option value="9">Briga o lepoti</option>
                            <option value="10">Dizajn</option>
                            <option value="11">Farmacija</option>
                            <option value="12">Finansije</option>
                            <option value="13">Hemioja</option>
                            <option value="14">Drugo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2 fa fa-search fa-3x " style="margin-top:7px; background-color:#E2016A; background-clip:  padding:0px; box-shadow: 0 0 0 4px white;"></button>
                    </div>

                </form>
            </div>
            <div class="row">
                <p class="PopularCity">Najnoviji oglasi</p>
                <p class="city">Danas</p>
                <p class="city">poslednja 2 dana</p>
                <p class="city">poslednja 3 dana</p>
                <p class="city">poslednjih 7 dana</p>
            </div>
        </div>
    </section>
    <section id="main">
        <div class="container">
            <?php
            require_once './php/database.php';
            $radnik = getAllData("radnici");
            foreach ($radnik as $radnici) {
                echo "<div class='card'>";
                echo "<div class='card-header'><img src='./img/placeholder.png' alt='...' class='rounded-circle'>" . " <strong><span style='font-size: 20px'>" . $radnici['ime_radnika'] . " " . $radnici['prezime_radnika'] . "</span></strong></div><div class='card-body'>";
                echo "<h5 class='card-title'>" . $radnici['datum_rodjenja'] . ", " . $radnici['mesto_rodjenja'] . "</h5>";
                echo "<p class='card-text'>" . $radnici['opis_radnika'] . "</p><br>";
                echo "<p class='card-text'>" . $radnici['email_radnika'] . "</p>";
                echo "<a href='./php/notifyk.php?id=" . $radnici['id'] . "' class='btn btn-primary'>Kontaktiraj</a></div></div><br>";
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