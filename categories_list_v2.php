include('includes/db.php')
<?php
$result = mysqli_query($connection, "SELECT * FROM `articles_categiries`"); //переменная со всеми категориями

if( mysqli_num_rows($result) == 0) //поиск несуществующей категории (не обязательная штука, id категории ввести в ручную все равно нельзя)
{
  echo 'Категория не найдена';
} else
{?> 

<ul>
  <?php
    while( ($cat = mysqli_fetch_assoc($result)) ) //пока в переменной есть элемент списка, цикл идет
      {
        $articles_count = mysqli_query($connection, "SELECT COUNT(`id`) as `total_count` FROM `articles` WHERE `categorie_id` = " . $cat['id']); //в переменной хранится весь список id статей (для улучшения производ. именно ид), принадлежащих к категории
        $articles_count_result = mysqli_fetch_assoc($articles_count); //получнеие самого результата прошлой переменной

        echo '<li>', $cat['title'] . '(' . $articles_count_result['total_count'] . ')</li>'; //выведение списка статей с приписанным колличеством статей данной категории
      }
  ?>
</ul>

<?php
}
?>

<?php
  mysqli_close($connection); 
?>