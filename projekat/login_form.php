<!DOCTYPE html>
<html>

<head>
    <title>Prijava</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><span style="color: #E2016A;">I</span><span style="color: #053488;">nfoStud</span><span style="color: #E2016A; font-size: 30px;">.</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction(event)" style="color: #053488" ;>Poslovi <span style="color: #E2016A;">▾</span></button>

                        <div id="myDropdown" class="dropdown-content">
                            <a href="#" style="color: #053488;">Pretraga poslova</a>
                            <a href="#" style="color: #053488;">Poslovi na email</a>
                            <a href="#" style="color: #053488;">Arhiva poslova</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item boja">
                    <a class="nav-link" id="poslodavci" href="#" style="color: #053488;">Upoznajte poslodavce</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" id="pretraga" href="#" style="color: #053488;">Pretraga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="za-poslodavce" href="login_form.php" style="color: #E2016A;">Prijavite se</a>
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
    <div class="kontejner">
        <div class="form-container">
            <h1>Dobro Došli</h1>
            <form action="./php/login.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name='email' class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sifra</label>
                    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Prijava</button>
            </form>
            <form action="" method="post">

                <label for="exampleFormControlInput1">Ukoliko nemate nalog</label>
                <br>
                <button type="submit" name='sign_up' class="btn btn-primary">Napravi nalog</button>
            </form>
            <br>
            <?php
            if (isset($_POST['sign_up'])) {
                header("Location: register_form.php");
                exit;
            }
            ?>
        </div>
    </div>
</body>

</html>