<?php
    include('config/db-connect.php');

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

    // explode(',', $pizza[0]['ingredient'])

?>

<!DOCTYPE html>
<html>

    <head>
        <style>
            #card-content{
                height: 25vh;
            }
            .container .row {
                width: 100%;
                margin-right: -0.75rem;
            }

            #h6{
                font-size: 17px; 
            }
        </style>
    </head>

    <?php include('templates/header.php') ?>

    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizza as $pizzas):?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center" id="card-content">
                            <h6 id="h6"><?php echo htmlspecialchars($pizzas['title']); ?></h6>
                            <ul>
                                <?php foreach (explode(',', $pizzas['ingredient']) as $ing) : ?>
                                    <li><?php echo htmlspecialchars($ing) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $pizzas['id'] ?>">More info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>

            <?php if(count($pizza) >= 2) : ?>
                <!-- <p>There are 3 more pizzas</p> -->
            <?php  else :?>
                <!-- <p> There are less than 3 pizzas</p> -->
            <?php endif?> 
        </div>
    </div>

    <?php include('templates/footer.php') ?>

</html>