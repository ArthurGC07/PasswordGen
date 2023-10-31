<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--call bootstrap here-->
    <link rel = "stylesheet" href = "<?php echo HOME_URI?>views/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "<?php echo HOME_URI?>views/css/bootstrap.css">
    <link rel = "stylesheet" href = "<?php echo HOME_URI?>views/css/mycss.css">
    <!--bootstrap scripts-->
    <script src = "<?php echo HOME_URI?>views/js/jquery.min.js"></script>
    <script src = "<?php echo HOME_URI?>views/js/bootstrap.min.js"></script>
    <script src = "<?php echo HOME_URI?>views/js/bootstrap.js"></script>
    <script src = "<?php echo HOME_URI?>views/js/bootstrap.js"></script>

    <title>Password Generator</title>
</head>
<body style="background-color: #212529;">

<script>
    function logout(){
        var answer = window.confirm('Disconnect?')
        if(answer == true){
            window.location.href = "user_home.php?dropdown=logout"
        }
        else{
            return false
        }
    }
</script>

<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 95%; margin-left: 3%;">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo HOME_URI;?>controller/user_home.php">Password Generator</a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--search bar-->

    <form class="d-flex" action="form_view.php" method="GET">
        <input class="form-control me-2" name="app_name" type="search" placeholder="WIP" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <!--end search bar-->

    <div class="dropdown" style="float: right;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?PHP echo $_SESSION['nm_user']; //gets the user name to display?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="user_home.php">Passwords</a></li>
            <li><a class="dropdown-item" onclick="return logout()" href="">Logout</a></li>
        </ul>
    </div>
    
    
  </div>
</nav>
<!--end navbar-->