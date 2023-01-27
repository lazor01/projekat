<html>

<head>
  <title>Informacije</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/loginstyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <?php
  require_once './php/database.php';
  session_start();

  // Check if session data exists
  if (isset($_SESSION['ime']) && isset($_SESSION['prezime']) && isset($_SESSION['email'])) {
    $ime = $_SESSION['ime'];
    $prezime = $_SESSION['prezime'];
    $email = $_SESSION['email'];

    // Check if session data matches data in the 'radnici' table
    $sql = "SELECT * FROM radnici WHERE ime_radnika='$ime' AND prezime_radnika='$prezime' AND email_radnika='$email'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
      // Session data matches data in the 'radnici' table, redirect to different PHP file
      header("Location: indexlog.php?error=2");
      exit();
    }
  }

  $mysqli->close();
  ?>
</head>

<body style="background-image: url('./img/background.jpg'); background-size:cover;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><span style="color: #E2016A;">I</span><span style="color: #053488;">nfoStud</span><span style="color: #E2016A; font-size: 30px;">.</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="kontejner">
    <div class="form-container">
      <h1>Informacije na profilu</h1>
      <form action="./php/add.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="cv">Upload your CV (PDF only):</label>
          <input type="file" name="cv" accept="application/pdf" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
          <label for="datum_rodjenja">Datum rodjenja:</label>
          <input type="date" name="datum_rodjenja" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control-file" id="exampleFormControlFile1" required>
        </div>
        <div class="form-group">
          <label for="mesto_rodjenja">Mesto rodjenja:</label>
          <input type="text" name="mesto_rodjenja" class="form-control-file" id="exampleFormControlFile1" required>
        </div>
        <div class="form-group">
          <label for="struka">Struka:</label>
          <input type="text" name="struka" class="form-control-file" id="exampleFormControlFile1" required>
        </div>
        <input type="submit" value="Submit">
      </form>

      <br>
    </div>
  </div>
</body>

</html>