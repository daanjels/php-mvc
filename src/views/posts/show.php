<?php require APPROOT . '/views/inc/header.php'; ?>
<p class="small">Posted by <?= $data['user']->name; ?> on <?= $data['post']->created_at; ?></p>
<article>
    <h1><?= $data['title']; ?></h1>
    <p><?= $data['description']; ?></p>
</article>
<?php if ($data['post']->user_id == $_SESSION['user_id']) { ?>
    <form action="<?= URLROOT; ?>/posts/delete/<?= $data['post']->id; ?>" method="POST">
        <a class="btn" href="<?= URLROOT; ?>/posts/edit/<?= $data['post']->id; ?>">Edit</a>
        <input type="submit" value="Delete">
    </form>
<?php } ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>