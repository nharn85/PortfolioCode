<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Chinook Music Store</title>
    <meta charset="UTF-8" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="myCode.js" type="text/javascript"></script>
    <script type="text/javascript" src="tooltip.js"></script>
</head>
<body>
    <header>
        <p>Welcome to Chinook Music Store !</p>
    </header>
    <section>
        <form method="post" action="cart.php">
            <input type="submit" value="Go To Cart">
        </form>
        <form method="post" action="logout.php">
            <input type="submit" value="Logout">
        </form>
        <table id="grid" class="t01">
            <thead>
            <tr>
                <th colspan="11">Song List</th>
            </tr>
            <tr>
                <th>Track ID</th>
                <th>Name</th>
                <th>Artist</th>
                <th>Media Type</th>
                <th>Genre</th>
                <th>Composer(s)</th>
                <th>Milliseconds</th>
                <th>Bytes</th>
                <th>Unit Price</th>
                <th>Add To Cart</th>
            </tr>
            </thead>
            <tbody>
                <?php
                require_once("../Business/Track.php");
                require_once("../Business/Album.php");
                require_once("../Business/Artist.php");
                require_once("../Business/MediaType.php");
                require_once("../Business/Genre.php");
                require_once("../Business/User.php");

                if(isset($_POST['register'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $password2 = $_POST['password2'];

                    // To protect MySQL injection
                    $username = stripslashes($username);
                    $password = stripslashes($password);
                    $password2 = stripslashes($password2);
                    $username = mysql_real_escape_string($username);
                    $password = mysql_real_escape_string($password);
                    $password2 = mysql_real_escape_string($password2);

                    $validUser = User::validUsername($username);

                    if ($validUser == true) {

                        $passMatch = User::passwordsMatch($password,$password2);

                        if ($passMatch == true) {
                            $userAdded = User::registerUser($username,$password);
                            if ($userAdded == false) {
                                header("location:register.php");
                            } else {
                                header("location:trackDisplay.php");
                            }
                        } else {//else passMatch false
                            header("location:register.php");
                        }
                    } else {//else validUser false
                        header("location:register.php");
                    }
                }

                            $arrayOfTracks = Track::retrieveSome(0, 3600);

                            foreach ($arrayOfTracks as $track):

                                ?>
                                <tr>
                                    <td class="dt-center"><?php echo $track->getID(); ?></td>
                                    <td><?php echo $track->getName(); ?></td>
                                    <td><p class="masterTooltip"
                                           title="From album: <?php echo $track->getAlbum()->getName(); ?>"><?php echo $track->getArtistName()->getName(); ?>
                                            <img src="images/question.png" id="question"></p>
                                    </td>
                                    <td><?php echo $track->getMediaType()->getName(); ?></td>
                                    <td><?php echo $track->getGenre()->getName(); ?></td>
                                    <td><?php echo $track->getComposer(); ?></td>
                                    <td class="dt-center"><?php echo $track->getMilliseconds(); ?></td>
                                    <td class="dt-center"><?php echo $track->getBytes(); ?></td>
                                    <td class="dt-center"><?php echo $track->getUnitPrice(); ?></td>
                                    <td class="dt-center">
                                        <form id="add" name="add" method="post" action="cart.php">
                                            <input type="image" name="add" id="add" class="shoppingcart"
                                                   src="images/cart.png"
                                                   value="<?php echo $track->getID(); ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                </tr>
            </tbody>
            </table>
        </section>
        <div class="footer">
            <div class="container">
                Footer
            </div>
        </div>
    </body>
</html>