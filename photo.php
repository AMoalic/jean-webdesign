<?php
require_once 'functions.php';
require_once 'model/database.php';

$id = $_GET["id"];

$photo = getPhoto($id);
$liste_commentaire= getAllCommentaireByPhoto($id);
debug ($liste_commentaire);
getHeader($photo["titre"], "Description de la photo");
?>

<header>
    <div class="row col_center">
        <?php getMenu(); ?>
    </div>
</header>

<h1><?php echo $photo["titre"]; ?></h1>
<img src="images/<?php echo $photo["image"] ?>">
<p><?php echo $photo["description"]?></p>

<form method="POST" action="insert-commentaire.php">
    <textarea name="commentaire"></textarea>
    <input type="hidden" name="photo_id" value="<?php echo $id;?>">
    <input type="submit">
</form>
<section>
<?php foreach ($liste_commentaire as $commentaire) : ?>
    <article>
            <time datetime="<?php echo $commentaire["date_creation"]; ?>">
            <?php echo $commentaire["date_creation"];?>
        </time>
        <p><?php echo $commentaire["commentaire"];?></p>
    </article>
<?php endforeach; ?>
</section>



<?php getFooter(); ?>