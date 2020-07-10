
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<form method="POST" action="<?= URLROOT; ?>/posts/edit/<?= $data['id'] ?>">
    <label class="<?php if ($data['title_error'] != 'Title:') echo 'is-invalid'; ?>"
        for="name"><?= $data['title_error']; ?></label>
    <input type="text" name="post_title" value="<?= $data['post_title']; ?>">
    <label class="<?php if ($data['body_error'] != 'Text:') echo 'is-invalid'; ?>"
        for="name"><?= $data['body_error']; ?></label>
    <textarea name="post_body" rows="10"><?= $data['post_body']; ?></textarea>
    <input type="submit" value="Submit">
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>