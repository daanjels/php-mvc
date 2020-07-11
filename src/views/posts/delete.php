<?php require APPROOT . '/views/inc/header.php'; ?>
<p>Are you sure you want to permanently remove this post by <?= $data['user']->name; ?>?</p>
<form action="<?= URLROOT; ?>/posts/delete/<?= $data['post']->id; ?>" method="POST">
    <a class="btn" href="<?= URLROOT; ?>/posts/">No take me back to the list.</a>
    <?php if ($data['post']->user_id == $_SESSION['user_id']) { ?>
    <input class="danger" type="submit" name="delete" value="Yes" autofocus>
</form>
<article>
    <h1><?= $data['title']; ?></h1>
    <p><?= $data['description']; ?></p>
</article>
<?php } ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>