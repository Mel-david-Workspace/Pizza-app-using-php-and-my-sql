<?php 

    include('config/db-connect.php');
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM pizza WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //Success
            header('Location: index.php');
        }{
            //failure
            echo 'query error:' . mysqli_error($conn);
        }

    }

    //check GET request id param
    if (isset($_GET['id'])) {
        # code...

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM pizza WHERE id = $id";


        //get the query result
        $result = mysqli_query($conn, $sql);

        //fetch result in array format
        $pizzas = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <style>
            #center{
                display: block;
            }
            #btn{
                background-color: darkgoldenrod;
            }
        </style>
    </head>

    <?php include('templates/header.php'); ?>

    <div class="container center" id="center">
        <?php if ($pizzas): ?>
            <h4><?php echo htmlspecialchars($pizzas['title']); ?></h4>
            <p>Created by:<?php echo htmlspecialchars($pizzas['email']); ?></p>
            <p><?php echo date($pizzas['created_At']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($pizzas['ingredient']); ?></p>
            
            <!-- Delete Form -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to delete" value="<?php echo $pizzas['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" id="btn">
            </form>
        <?php else: ?>
            <h5>No Such pizza exist</h5>
        <?php endif ?>
    </div>

    <?php include('templates/footer.php'); ?>
</html>~