<?php 

include('config/db_connect.php');
if(!$con){
   echo 'error in the code:' . mysqli_connect_error();
}

$sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY created_at';

$result = mysqli_query($con,$sql);

$pizza = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
   <?php include('templates/header.php'); ?>
   <h4>Pizzas!</h4>
   <div class="box-container">
     <?php foreach($pizza as $pizzas):?> 
      
      <div class="box1">
      <img src="img/pizza.svg" alt="pizza" class="pizza">
         <h6><?php echo htmlspecialchars($pizzas['title']) ?></h6>
         <ul>
         <?php foreach(explode(',',$pizzas['ingredients']) as $ingre){ ?>
               <li><?php echo htmlspecialchars($ingre); ?></li>
               <?php } ?>
         </ul>
         <hr>
         <div class="card">
         <a href="details.php?id=<?php echo $pizzas['id']; ?>">MORE INFO</a>
      </div>
      </div>
      <?php endforeach; ?>
   </div>
   <?php include('templates/footer.php') ?>
    
</html>
