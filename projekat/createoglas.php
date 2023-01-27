<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <?php
    if (isset($_REQUEST["error"])) {
        switch ($_REQUEST["error"]) {
            case 1:
                echo '<div class="alert alert-danger" role="alert">';
                echo "Sifre se ne poklapaju";
                echo '</div>';
                break;
        }
    } ?>
    <div class="form-container">
        <h1>Registracija</h1>
        <form action="./php/addoglas.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Ime oglasa</label>
                <input type="text" name='ime_posla' class="form-control" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Poslodavac</label>
                <input type="text" name='poslodavac' class="form-control" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Oblast rada</label>
                <input type="text" name='oblast_rada' class="form-control" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Grad</label>
                <input type="text" name='grad' class="form-control" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Opis</label>
                <textarea class="form-control" name='opis' id="exampleFormControlTextarea1" rows="4" required></textarea>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>

</html>