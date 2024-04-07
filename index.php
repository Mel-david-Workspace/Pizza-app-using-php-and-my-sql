<?php
    //connect to database
    $conn = mysqli_connect('localhost', 'MelDavid', 'test1234', 'meldavidpizza');

    //check connection
    if (!$conn) {
        # code...
        echo 'Connection error: ' . mysqli_connect_error();
    }

    //write query for all pizza
    $sql = 'SELECT title, ingredient, id FROM `pizza` ORDER BY created_At';

    //make query & get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows ads an array
    $pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    //free result from memory
    mysqli_free_result($result);
    
    //cclose connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <h4 class="h4home">Pizzas!</h4>
    <div class="homecontainer">
        <div class="homerow">
            <?php foreach($pizza as $pizzas){?>

                <div class="homecol">
                    <div class="homecol1">
                        <div class="homecol2">
                            <h6><?php echo htmlspecialchars($pizzas['title']); ?></h6>
                            <div><?php echo htmlspecialchars($pizzas['ingredient']); ?></div>
                        </div>
                        <div class="card-action">
                            <a href="" class="brand-text">More info</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <?php include('templates/footer.php') ?>

</html>