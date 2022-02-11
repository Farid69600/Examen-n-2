
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar nav-expand-lg navbar-light bg-dark mb-5 ">
  <a href="/hb_php/cyclisterie" class="navbar-brand mr-5">BASE FRAMEWORK</a>
  <div class="d-flex flex-row">
      <ul class="d-flex flex-row">

          <?php if(isset($_SESSION['user'])){ ?>
              <li class="nav-item"><a href="/" class="btn btn-warning"><?= $_SESSION['user']['displayName'] ?></a></li>
          <?php } ?>


          <li class="nav-item"><a href="?type=user&action=signup" class="btn btn-warning">Créer votre compte</a></li>
          <br>
          <li class="nav-item"><a href="?type=user&action=signin" class="btn btn-warning">Se connecter</a></li>
          <br>
          <li class="nav-item"><a href="?type=user&action=signout" class="btn btn-danger">Déconnexion</a></li>
      </ul>
  </div>
</nav>

<div class="alert alert-warning alert-dismissible fade <?php if(isset($_GET['info'])){ echo"show";}?>" role="alert">
  <strong>Erreur</strong> <?=$_GET['info'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="alert alert-warning alert-dismissible fade <?php if($_GET['info']=='noId'){ echo"show";}?>" role="alert">
  <strong>Erreur</strong> ce vélo n'existe pas.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="container">


            <?=  $pageContent ?>


</div>
        

<h1 class="mt-5" >FIN DE PAGE</h1>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>