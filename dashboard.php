<!DOCTYPE html>
<html>

<head>
    <title>Ajax Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="./assets/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="styleSheet" href="./assets/dashboard.css">
</head>

<body>
    <nav>   <a href="./modules/logout.php"><button class="btn btn-danger">Log Out</button></a>
        <?php
        require_once "./modules/sessionControl.php";
        sessionCheck();
        ?></nav>
    <main>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">City</th>
      <th scope="col">Street Adress</th>
      <th scope="col">State</th>
      <th scope="col">Age</th>
      <th scope="col">Postal Code</th>
      <th scope="col">Phone Number</th>

    </tr>
  </thead>
  <tbody id="TableBod">

  </tbody>
</table>
    </div>
    </main>
</body>

</html>