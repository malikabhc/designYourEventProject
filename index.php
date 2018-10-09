<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet" />
        <!-- Fonts Google -->
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush|Abel" rel="stylesheet"> 
        <!-- Icon Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <!-- Feuille de style -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Design Your Event</title>
    </head>
    <body>
        <div class="container border border-dark mb-3">
            <?php include 'navbar.php'; ?>
            <div class="row">
                <div class="col-lg-6 text-center border-bottom border-dark border-right border-dark"><span>S'inscrire</span></div>
                <div class="col-lg-6 text-center border-bottom border-dark"><span>Se connecter</span></div>
            </div>
            <form class="inscription form-group mt-2 mb-3">
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" class="form-control mb-2" placeholder="Nom" />
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" class="form-control mb-2" placeholder="Prénom" />
                <label for="birthdate">Date de naissance</label>
                <input type="date" name="birthdate" class="form-control mb-2" placeholder="birthdate" />
                <label for="city">Ville</label>
                <input type="text" name="city" class="form-control mb-2" placeholder="Ville" />
                <label for="email">Email</label>
                <input type="mail" name="email" class="form-control mb-2" placeholder="Email" />
                <label for="password">Mot de passe</label>
                <input type="text" name="password" class="form-control mb-2" placeholder="Mot de passe" />
                <label for="confirmPassword">Confirmation de mot de passe</label>
                <input type="text" name="confirmPassword" class="form-control" placeholder="Confirmation de mot de passe" />
                <input type="submit" name="submit" class="form-control mt-2" value="S'inscrire" />
            </form>
            <form class="connection form-group mt-2 mb-3">
                <label for="email">Email</label>
                <input type="mail" name="email" class="form-control mb-2" placeholder="Email" />
                <label for="password">Mot de passe</label>
                <input type="text" name="password" class="form-control mb-2" placeholder="Mot de passe" />
                <input type="submit" name="submit" class="form-control mt-2" value="S'inscrire" />
            </form>
        </div>
        <?php include 'footer.php'; ?>
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
    </body>
</html>
