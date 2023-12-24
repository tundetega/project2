<?php 



include('config/db_connect.php');
if(isset($_POST['delete'])){
  $id_delete = mysqli_real_escape_string($con,$_POST['id_delete']);
  $sql = "DELETE FROM pizzas  WHERE id = $id_delete";
  if(mysqli_query($con,$sql)){
    header('location:index.php');
  }else{
    echo 'query error'. mysqli_error($con);
  }
}

if(isset($_GET['id'])){
$id = mysqli_real_escape_string($con,$_GET['id']);
$sql = "SELECT * FROM pizzas WHERE id = $id";

$result = mysqli_query($con,$sql);

$ans = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($con);
 


}

?>





<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
  <div class="wrapps">
    <?php if($ans): ?>
        <h4><?php echo htmlspecialchars($ans['title']) ?></h4>
        <p>created by <?php echo htmlspecialchars($ans['email']) ?></p>
        <p><?php echo date($ans['created_at']) ?></p>
        <h2>Ingredients</h2>
        <p><?php foreach(explode(',',$ans['ingredients']) as $ingre):?></p>
            <span><?php echo htmlspecialchars($ingre) ?></span>
            <?php endforeach; ?>
          <form action="details.php" method="POST" class="color">
            <input type="hidden" name="id_delete" value="<?php echo $ans['id']; ?>">
            <input type="submit" value="delete" name="delete" class=delete>
          </form>
    <?php else: ?> 
        <h5>No such pizza exist</h5>
        <?php endif; ?>   
  </div>

<?php include('templates/footer.php') ?>
</html>