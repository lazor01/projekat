<!DOCTYPE html>
<html>

<head>
    <title>Prijava</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body style="background-image: url('./img/background.jpg'); background-size:cover;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><span style="color: #E2016A;">I</span><span style="color: #053488;">nfoStud</span><span style="color: #E2016A; font-size: 30px;">.</span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                <button type="submit" class="btn btn-dark">Prijava</button>
            </form>
            <form action="" method="post">

                <label for="exampleFormControlInput1">Ukoliko nemate nalog</label>
                <br>
                <button type="submit" name='sign_up' class="btn btn-dark">Napravi nalog</button>
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