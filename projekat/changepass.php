<!DOCTYPE html>
<html>

<head>
    <title>Prijava</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <?php
    require_once './php/database.php';
    session_start();
    ?>
</head>

<body style="background-image: url('./img/background.jpg'); background-size:cover;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><span style="color: #E2016A;">I</span><span style="color: #053488;">nfoStud</span><span style="color: #E2016A; font-size: 30px;">.</span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="kontejner">
        <div class="form-container">
            <h1>Promena Sifre</h1>
            <form action="./php/changepass.php?id=<?php echo $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputPassword4">Sifra</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Potvrdi sifru</label>
                    <input type="password" name="passwordre" class="form-control" id="inputPassword4" placeholder="Password" required>
                </div><br>
                <button type="submit" class="btn btn-outline-dark">Promeni sifru</button>
            </form>
            <br>

        </div>
    </div>
</body>

</html>