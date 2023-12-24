<?php 
include('config/db_connect.php');
$ingredients = '';
$email = '';
 $title = '';

$errors = ['email'=>'','title'=>'','ingredients'=>''];

if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $errors['email']= 'please add an email <br>';
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'] = 'please fill in a valid email address'.'<br>';
        }
    }
    if(empty($_POST['title'])){
        $errors['title']= 'please add in menu title <br>';
    }else{
        $title = ($_POST['title']);
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
            $errors['title']= 'Title must be Letters and Spaces only';
        }
    }
    if(empty($_POST['ingredients'])){
        $errors['ingredients']= 'please choose at least one ingredients <br>';
    }else{
        $ingredients = ($_POST['ingredients']);
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
            $errors['ingredients']= 'Ingredients must be a comma seperated list';
        }
    }
    if(array_filter($errors)){

    }else{
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $ingredients = mysqli_real_escape_string($con, $_POST['ingredients']);
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES ('$title','$email','$ingredients')";
    if(mysqli_query($con,$sql)):
         header("location:index.php");
    else:
        echo 'query error'. mysqli_error($con);
    endif;
     
    }
}
   
   

?>

<!DOCTYPE html>
<html>
   <?php include('templates/header.php'); ?>
    <section class="container">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" class="form" method="POST">
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-email"><?php echo $errors['email']; ?></div>
            <label for="title">Pizza Title:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label for="ingredients">Ingredients (comma seperated):</label>
            <input type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <div class="submit">
                <input type="submit" value="submit" name="submit">
            </div>

        </form>
    </section>



   <?php include('templates/footer.php') ?>
    
</html>
