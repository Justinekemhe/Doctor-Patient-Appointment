<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Doctor-Patient</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style type="text/css">
    .meddon{
  font-family: 'Meddon', cursive;
}
img{
  background-repeat: norepeat;
    -webkit-animation: myfirst 20s; /* Chrome, Safari, Opera */
    animation: myfirst 2000;
    animation-play-state: running;
    -webkit-animation-play-state: running;
 
}
nav .brand-logo{
  color:White;
  font-family: 'Meddon', cursive;
  margin:2px 220px 2px 0;
}

@-webkit-keyframes myfirst {
    from {
    background-position: bottom center;
    background-size: cover;
    }
    to { 
      background-position: top center;
      background-size: cover;
    }
}
  </style>
</head>
<body>
<div class="navbar-fixed">
  <nav class="nav-wraper teal darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo center">DPAS</a>
      <!-- <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
      </ul> -->

      <ul id="nav-mobile" class="sidenav">
        <li><a href="index.php">LOGIN</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </div>