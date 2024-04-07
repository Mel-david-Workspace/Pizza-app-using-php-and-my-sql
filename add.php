<?php

    // if (isset($_GET['submit'])) {
    //     # code...
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredient'];
    // }
    $title = $email = $ingredient = '';
    $errors = array('email'=>'', 'title'=>'', 'ingredient'=>'');

    if (isset($_POST['submit'])) {

        //Check Email
        if (empty($_POST['email'])) {
            # code...
            $errors['email'] = "An email is required <br />";
        }else{
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                # code...
                $errors['email'] = 'email must be a valid email address';
            }
        }

        //check title
        if (empty($_POST['title'])) {
            # code...
            $errors['title'] = "A title is required <br />";
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must be letter and spaces only';
            }
        }

        //check Ingredients
        if (empty($_POST['ingredient'])) {
            # code...
            $errors['ingredient'] = "At least one ingredient is required <br />";
        }else{
            $ingredient = $_POST['ingredient'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredient)){
                $errors['ingredient'] = 'Ingredient must be comma seperated list';
            }
        }

        if (array_filter($errors)) {
            # code...
            // echo 'There are errors in the form';
        } else {
            // echo 'Form Is Valid';
            header('Location: index.php');
        }
    }//end of post check

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add a Pizza</title>
            <style>
            .formAdd{
                background-color: white;
                margin: 50px 90px;
                padding: 20px 50px;
                margin-top: 20px;
                border-radius: 5px;
                padding-top: 40px;
                color: grey;
            }
            .addInp{
                margin: 10px 0;
                width: 100%;
                border:none;
                border-bottom: 2px solid grey;
            }
            .h4cen{
                text-align: center;
                padding-top: 20px;
                font-weight: lighter;
                color: grey;
            }
            .addInp:hover{
                border: none;
                border-bottom: 2px solid grey;
            }
            .addInp:active{
                border: none;
                border-bottom: 2px solid grey;
            }

            .centerSubmit{
                text-align: center;
            }

            .redText{
                color:red;
            }

            .goldSubmit{
                padding: 10px 25px;
                border: none;
                color: white;
                font-weight: 500;
                letteR-spacing: 1px;
                border-radius: 5px;
                background-color: darkgoldenrod;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <?php include('templates/header.php') ?>

        <section class="secCon">
            <h2 class="h4cen">Add a Pizza</h2>
            <form action="add.php" class="formAdd" method="POST" >
                <label>Your Email:</label>
                <br>
                <input type="text" name="email" class="addInp" value="<?php echo htmlspecialchars($email) ?>">
                <div class="redText"><?php echo $errors['email']?></div>
                <br>
                <br>
                <label>Pizza Title:</label>
                <br>
                <input type="text" name="title" class="addInp"  value="<?php echo htmlspecialchars($title) ?>">
                <div class="redText"><?php echo $errors['title']?></div>
                <br>
                <br>
                <label>Ingredient (coma seperated):</label>
                <br>
                <input type="text" name="ingredient" class="addInp"  value="<?php echo htmlspecialchars($ingredient) ?>">
                <div class="redText"><?php echo $errors['ingredient']?></div>
                <br>
                <div class="centerSubmit">
                    <input type="submit" value="submit" name="submit"  class="goldSubmit">
                </div>
            </form>
        </section>

    <?php include('templates/footer.php') ?>
    </body>


</html> 