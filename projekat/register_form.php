<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <div class="form-container">
        <h1>Registracija</h1>
        <form action="php/addoglas.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col">
                    <label for="exampleFormControlInput1">Ime</label>
                    <input type="text" name="ime" class="form-control" placeholder="Petar" required>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1">Prezime</label>
                    <input type="text" name="prezime" class="form-control" placeholder="Petrovic" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="ime@primer.com" required>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Sifra</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Potvrdi sifru</label>
                    <input type="password" name="passwordre" class="form-control" id="inputPassword4" placeholder="Password" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Vrsta prijave</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    <option>Korisnik</option>
                    <option>Poslodavac</option>
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if (isset($_REQUEST["error"])) {
            switch ($_REQUEST["error"]) {
                case 1:
                    echo '<div class="alert alert-danger" role="alert">';
                    echo "Sifre se ne poklapaju";
                    echo '</div>';
                    break;
                case 2:
                    echo '<div class="alert alert-danger" role="alert">';
                    echo "Email vec u upotrebi";
                    echo '</div>';
                    break;
            }
        }

        ?>

    </div>
</body>

</html>