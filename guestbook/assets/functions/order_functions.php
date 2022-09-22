<html>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</html>

<?php
require_once('config.php');
require_once('User.php');
include_once('login_functions.php');

// This function generates a breadcrumb for on the category page
function breadCrumbs(){
    global $pdo;
    $category_id = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM categories WHERE `id` = :category_id');
    $stmnt = $sql;
    $stmnt->bindParam(':category_id',$category_id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        echo "
            <nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='../member/categories.php'>Menu</a></li>
                    <li class='breadcrumb-item active' aria-current='page'>". $data['name'] ."</li>
                </ol>
            </nav>
        ";
    }
}

// This function shows all the categories that are in the database
function showCat(){
    global $pdo;
    $sql = $pdo->prepare("SELECT * FROM categories");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"
            <div class='col-sm-4 col-md-3'>
                <div class='card'>
                  <div class='card-body text-center'> 
                        <a href='../member/items.php?id=" . $data['id'] . "'>
                            <img class='product-img img-responsive center-block' src='../image/categories/". $data['picture'] ."' width='200px' height='150px'>
                        </a> 
                        <div class='card-title mb-3'><h5>
                            ". $data['name'] ."
                        </h5></div>
                  </div>
                </div>
            </div>
        ";
    }
}

// This function shows the menu of the category that is selected
function showItems(){
    global $pdo;
    $id = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM menu WHERE `category_id` = :id');
    $stmnt = $sql;
    $stmnt->bindParam(':id',$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"
            <div class='col-sm-4 col-md-3'>
                <div class='card'>
                  <div class='card-body text-center'> 
                        <img class='product-img img-responsive center-block' src='../image/categories/". $data['picture'] ."' width='200px' height='150px'>
                        <div class='card-title mb-3'><h5>". $data['name'] ."</h5></div>
                  </div>
                  <div class='card-body text-center'>
                        <p class='card-text'>". $data['description'] ."</p>
                        <p class='card-text'>&euro; ". $data['price'] ."</p>
                        <a class='btn btn-primary' href='../member/bestellen.php?id=" . $data['id'] . "'>Bestellen</a>
                  </div>
                </div>
            </div>
        ";
    }
}

function showItem(){
    global $pdo;
    $id = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM menu WHERE `id` = :id');
    $stmnt = $sql;
    $stmnt->bindParam(':id',$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"
                <div class='card'>
                  <div class='card-body text-center'> 
                        <img class='product-img img-responsive center-block' src='../image/categories/". $data['picture'] ."' width='200px' height='150px'>
                        <div class='card-title mb-3'><h5>". $data['name'] ."</h5></div>
                  </div>
                  <div class='card-body text-center'>
                        <p class='card-text'>&euro; ". $data['price'] ."</p>
                  </div>
                </div>
        ";
    }
}

// This function makes the order and puts it in the database
function makeOrder(){
    global $pdo;
    $id = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM menu WHERE `id` = :id');
    $stmnt = $sql;
    $stmnt->bindParam(':id',$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        $menu_id = $data['id'];
        $dish = $data['name'];
        $price = $data['price'];
    }

    if (isset($_POST['order'])){
        //  Variabeles
        $name = $_POST['name'];
        $email = $_POST['email'];
        $adres = $_POST['adres'];
        $quantity = $_POST['quantity'];
        $totalPrice = $price * $quantity;
        $user_id = $_SESSION['user']->id;

        $sth = $pdo->prepare('INSERT INTO bestelling (name,email,adres,dish,price,quantity,totalPrice,user_id,menu_id) VALUES (?,?,?,?,?,?,?,?,?)');
        $sth->bindParam(1, $name);
        $sth->bindParam(2, $email);
        $sth->bindParam(3, $adres);
        $sth->bindParam(4, $dish);
        $sth->bindParam(5, $price);
        $sth->bindParam(6, $quantity);
        $sth->bindParam(7, $totalPrice);
        $sth->bindParam(8, $user_id);
        $sth->bindParam(9, $menu_id);

        if ($sth->execute()){
            echo '<div class="alert alert-success" role="alert">Uw bestelling is succesvol geplaatst!</div>';
        }
    }
}

// This function generates a card with a order button
function generateOrderCard(){
    global $pdo;
    $sql = $pdo->prepare("SELECT * FROM menu ORDER BY category_id ASC");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row)
    {
        ?>
        <div class="col-md-4">
            <form method="post" action="categories.php?action=add&id=<?php echo $row["id"]; ?>">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                    <img src="../image/categories/<?php echo $row['picture']; ?>" width="100px" height="100px"><br />
                    <h4><?php echo $row["name"]; ?></h4>
                    <h5 class="text-dark">&euro; <?php echo $row["price"]; ?></h5>
                    <input type="text" name="quantity" class="form-control" value="1" min="1" max="100">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-primary" value="Voeg toe">
                </div>
            </form>
        </div>
        <?php
    }
}

// This function generates the table with the orderd items
function generateOrderTable(){
    if(!empty($_SESSION["shopping_cart"]))
    {
        $total = 0;
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td><?php echo $values["item_quantity"]; ?></td>
                <td>&euro; <?php echo $values["item_price"]; ?></td>
                <td>&euro; <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                <td><a href="categories.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            </tr>
            <?php
            $total = $total + ($values["item_quantity"] * $values["item_price"]);
        }
        ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">€ <?php echo number_format($total, 2); ?></td>
            <td>
                <form method="post"><input type="submit" name="placeOrder" value="Bestel" class="btn btn-primary"></form>
            </td>
        </tr>
        <?php
    }
}

// This checks the actions of the order page
function actionOrder(){
    if(isset($_POST["add_to_cart"]))
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if(!in_array($_GET["id"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'=>$_GET["id"],
                    'item_name'=>$_POST["hidden_name"],
                    'item_price'=>$_POST["hidden_price"],
                    'item_quantity'=>$_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            }
            else
            {
                echo '<script>alert("Item Already Added")</script>';
                echo '<script>window.location="categories.php"</script>';
            }
        }
        else
        {
            $item_array = array(
                'item_id'=>$_GET["id"],
                'item_name'=>$_POST["hidden_name"],
                'item_price'=>$_POST["hidden_price"],
                'item_quantity'=>$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="categories.php"</script>';
                }
            }
        }
    }
}

// This function makes the order and puts it in the database
function storeOrder(){
    error_reporting(0);
    global $pdo;

    if (isset($_POST['placeOrder'])){
        $shoppingCart = $_SESSION['shopping_cart'];
        $shoppingCart_str = serialize($shoppingCart);

        $name = $_SESSION['user']->name;
        $email = $_SESSION['user']->email;
        $user_id = $_SESSION['user']->id;
        $adres = $_SESSION['user']->adres;

        $sth = $pdo->prepare('INSERT INTO bestelling (name,email,adres,bestelling,user_id) VALUES (?,?,?,?,?)');
        $sth->bindParam(1,$name);
        $sth->bindParam(2,$email);
        $sth->bindParam(3,$adres);
        $sth->bindParam(4,$shoppingCart_str);
        $sth->bindParam(5,$user_id);

        if ($sth->execute()){
            echo "<script>alert('Bedankt voor het bestellen, uw bestelling wordt zo bezorgd')</script>";
        }
    }
}