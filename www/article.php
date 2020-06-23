
<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php  include "includes/header.php" ?>

<div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
			<?php
				$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET[id]);
				$art = mysqli_fetch_assoc($article);
				mysqli_query($connection, "UPDATE `articles` set `views` = `views` + 1 WHERE `id` =". (int) $art['id']);
				?>
              <a><?php echo $art['views'] ?>просмотров</a>
              <h3><?php echo $art['title'] ?></h3>
              <div class="block__content">
                <img src="static/images/<?php echo "$art[image]" ?>">

                <div class="full-text">
				<?php echo $art['text'] ?>
				</div>
              </div>
            </div>
					<?php 
						if (isset($_POST['do_post']) )
						{
							mysqli_query($connection, "INSERT INTO `comments` (`author`,`text`,`pubdate`,`articles_id`) VALUES ('".$_POST['name']." aka ".$_POST['nickname']."','".$_POST['text']."', NOW(), '".$art['id']."')");
						}
					?>
				
            <div class="block">
              <a href="#comment-add-form">Добавить свой</a>
              <h3>Комментарии к статье</h3>
              <div class="block__content">
                <div class="articles articles__vertical">
				<?php
				$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $_GET[id]);
				
				if (mysqli_num_rows($comments)<=0) {
					echo "Будь первым!";
					} else
						{
							
				while ($com = mysqli_fetch_assoc($comments))
							{
		
					
				?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=125);"></div>
                    <div class="article__info">
                      <a href="#"><?php echo $com['author'] ?></a>
                      <div class="article__info__meta">
                        <small><?php echo $com['pubdate'] ?></small>
                      </div>
                      <div class="article__info__preview"><?php echo $com['text'] ?></div>
                    </div>
                  </article>

				<?php 
							}
					} ?>

                </div>
              </div>
            </div>

            <div class="block" id="comment-add-form">
              <h3>Добавить комментарий</h3>
              <div class="block__content">
                <form class="form" method="POST" action="article.php?id=<?php echo $art['id']?>">
                  <div class="form__group">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                      </div>
                    </div>
                  </div>
                  <div class="form__group">
                    <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form>
              </div>
            </div>
          </section>
          
          <section class="content__right col-md-4">
            <?php include "includes/sidebar.php" ?>
          </section>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"  ?>

  </div>

</body>
</html>