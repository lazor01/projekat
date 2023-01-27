<html>

<head>
    <title>Edit Job Ad</title>
    <link rel="stylesheet" href="./css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <div class="form-container">
        <h1>Izmeni oglas</h1>
        <?php
        include './php/database.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM poslovi WHERE id='$id'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);

        ?>
        <form action="./php/updateoglas.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Ime posla</label>
                <input type="text" name='ime_posla' class="form-control" id="exampleFormControlInput1" value="<?php echo $row['ime_posla']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Poslodavac</label>
                <input type="text" name='poslodavac' class="form-control" id="exampleFormControlInput1" value="<?php echo $row['poslodavac']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Oblast rada</label>
                <input type="text" name='oblast_rada' class="form-control" id="exampleFormControlInput1" value="<?php echo $row['oblast_rada']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Grad</label>
                <input type="text" name='grad' class="form-control" id="exampleFormControlInput1" value="<?php echo $row['grad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Opis</label>
                <textarea class="form-control" name='opis' id="exampleFormControlTextarea1" rows="4" required><?php echo $row['opis']; ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <br>

            <button type="submit" class="btn btn-primary">Promeni</button>
        </form>

    </div>
</body>

</html>