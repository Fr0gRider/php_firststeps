<?php
//список категорий, без нумерации

$connection = mysqli_connect('localhost', 'root', '3782', 'test_db');

if ( $connection == false)
{

  echo 'Не удалось подключиться к БД<br>';
  echo mysqli_connect_error();
  exit();
}

$result = mysqli_query($connection, "SELECT * FROM `articles_categiries`");


?>

<ul>
  <?php
    while( ($cat = mysqli_fetch_assoc($result)) )
      {

        echo '<li>', $cat['title'] . '</li>';
      }
  ?>
</ul>

<?php
  mysqli_close($connection); 
?>