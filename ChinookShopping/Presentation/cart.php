<!DOCTYPE html>
<html>
    <head>
        <title>Chinook Music Store</title>
        <meta charset="UTF-8" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <h1>Cart</h1>
        </header>
        <?php
        session_start();
        require_once("../Business/Cart.php");
        if(!isset($_SESSION['username'])){
            header("location:index.html");
        }

        if(isset($_POST['add'])){
            $_SESSION['myCart'][]=$_POST['add'];
            if(!isset($_SESSION['total'])){
                $_SESSION['total'] = 0;
            }
        }

        if(isset($_SESSION['myCart'])){
            $cart = $_SESSION['myCart']; ?>
        <table id="shoppingcart">
            <thead><h2>Your shopping cart:</h2>
                <th>TrackId</th>
                <th>Song Title</th>
                <th>Unit Price</th>
            </thead>
            <tbody>
            <?php
            foreach($cart as $item):

            $trackArray = Cart::retrieveOne($item);
            ?>
                <tr>
                    <td><?php echo $trackArray->getID(); ?></td>
                    <td><?php echo $trackArray->getName(); ?></td>
                    <td><?php echo $trackArray->getUnitPrice(); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr><td colspan="3"><?php echo "Total: $".$_SESSION['total'] += $trackArray->getUnitPrice(); ?></td></tr>
            </tbody>
        </table>
        <?php }
        else {
            echo "No items in your cart.";
        };?>
        <form method="post" action="trackDisplay.php">
            <input type="submit" value="Back to tracks">
        </form>
    </body>
</html>