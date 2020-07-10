<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?= $data['title']; ?></h1>
<p class="small">Posted by <?= $data['user']->name; ?> on <?= $data['post']->created_at; ?></p>
<p><?= $data['description']; ?></p>

<?php if ($data['post']->user_id == $_SESSION['user_id']) { ?>
    <hr>
    <p class="small"><a href="<?= URLROOT; ?>/posts/edit/<?= $data['post']->id; ?>">Edit</a></p>
    <form action="<?= URLROOT; ?>/posts/delete/<?= $data['post']->id; ?>" method="POST">
        <input type="submit" value="Delete">
    </form>
<?php } ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>