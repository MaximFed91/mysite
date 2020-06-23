<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
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

    <?php  include "includes/header.php";
	if ( empty($_GET[categorie]))
	{		
	?>
	
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3>Все записи</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

			<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC");
				
				while ($art = mysqli_fetch_assoc($articles))
				{
				?>
				  <article class="article">
                    <div class="article__image" style="background-image: url(static/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
					  <?php 
						$art_cat = false;
						foreach ( $categories as $cat )
						{
							if( $cat['id'] == $art['categories_id'] )
							{
								$art_cat = $cat;
								break;
							}
						}
					  ?>
                        <small>Категория: <a href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 70, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
				<?php
				}	
			?>



                </div>
              </div>
            </div>
          </section>
		  <?php 
			} else 
			{ 
				switch ($_GET[categorie]) {
					case 1: ?>
						<div id="content">
						  <div class="container">
							<div class="row">
							  <section class="content__left col-md-8">
								<div class="block">
								  <h3>Спорт</h3>
								  <div class="block__content">
									<div class="articles articles__horizontal">

								<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = '1' ORDER BY `id` DESC");
									
									while ($art = mysqli_fetch_assoc($articles))
									{
									?>
									  <article class="article">
										<div class="article__image" style="background-image: url(static/images/<?php echo $art['image']; ?>);"></div>
										<div class="article__info">
										  <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
										  <div class="article__info__meta">
										  <?php 
											$art_cat = false;
											foreach ( $categories as $cat )
											{
												if( $cat['id'] == $art['categories_id'] )
												{
													$art_cat = $cat;
													break;
												}
											}
										  ?>
											<small>Категория: <a href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
										  </div>
										  <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 70, 'utf-8') . ' ...'; ?></div>
										</div>
									  </article>
									<?php
									}	
								?>



									</div>
								  </div>
								</div>
							  </section>
						<?php
						break;
					case 2:
						?>
						<div id="content">
						  <div class="container">
							<div class="row">
							  <section class="content__left col-md-8">
								<div class="block">
								  <h3>Безопастность</h3>
								  <div class="block__content">
									<div class="articles articles__horizontal">

								<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = '2' ORDER BY `id` DESC");
									
									while ($art = mysqli_fetch_assoc($articles))
									{
									?>
									  <article class="article">
										<div class="article__image" style="background-image: url(static/images/<?php echo $art['image']; ?>);"></div>
										<div class="article__info">
										  <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
										  <div class="article__info__meta">
										  <?php 
											$art_cat = false;
											foreach ( $categories as $cat )
											{
												if( $cat['id'] == $art['categories_id'] )
												{
													$art_cat = $cat;
													break;
												}
											}
										  ?>
											<small>Категория: <a href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
										  </div>
										  <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 70, 'utf-8') . ' ...'; ?></div>
										</div>
									  </article>
									<?php
									}	
								?>



									</div>
								  </div>
								</div>
							  </section>
						<?php
						break;
					case 3:
						?>
						<div id="content">
						  <div class="container">
							<div class="row">
							  <section class="content__left col-md-8">
								<div class="block">
								  <h3>Программирование</h3>
								  <div class="block__content">
									<div class="articles articles__horizontal">

								<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = '3' ORDER BY `id` DESC");
									
									while ($art = mysqli_fetch_assoc($articles))
									{
									?>
									  <article class="article">
										<div class="article__image" style="background-image: url(static/images/<?php echo $art['image']; ?>);"></div>
										<div class="article__info">
										  <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
										  <div class="article__info__meta">
										  <?php 
											$art_cat = false;
											foreach ( $categories as $cat )
											{
												if( $cat['id'] == $art['categories_id'] )
												{
													$art_cat = $cat;
													break;
												}
											}
										  ?>
											<small>Категория: <a href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
										  </div>
										  <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 70, 'utf-8') . ' ...'; ?></div>
										</div>
									  </article>
									<?php
									}	
								?>



									</div>
								  </div>
								</div>
							  </section>
						<?php
						break;
					case 4:
						?>
						<div id="content">
						  <div class="container">
							<div class="row">
							  <section class="content__left col-md-8">
								<div class="block">
								  <h3>Lifestyle</h3>
								  <div class="block__content">
									<div class="articles articles__horizontal">

								<?php
										$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = '4' ORDER BY `id` DESC");
									
									while ($art = mysqli_fetch_assoc($articles))
									{
									?>
									  <article class="article">
										<div class="article__image" style="background-image: url(static/images/<?php echo $art['image']; ?>);"></div>
										<div class="article__info">
										  <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
										  <div class="article__info__meta">
										  <?php 
											$art_cat = false;
											foreach ( $categories as $cat )
											{
												if( $cat['id'] == $art['categories_id'] )
												{
													$art_cat = $cat;
													break;
												}
											}
										  ?>
											<small>Категория: <a href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
										  </div>
										  <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 70, 'utf-8') . ' ...'; ?></div>
										</div>
									  </article>
									<?php
									}	
								?>



									</div>
								  </div>
								</div>
							  </section>
						<?php	
						break;
}
				
			}
			
			
			
			?>
		  
		  
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