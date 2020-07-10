<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<?php flash('post_message'); ?>
<p><a class="btn" href="<?= URLROOT; ?>/posts/add">Add post</a></p>
<?php echo $data['description']; ?>
<ul>
<?php foreach($data['posts'] as $post) : ?>
    <li>
        <h4><?= $post->title; ?></h4>
        <p>Written by <?= $post->name; ?> on <?= $post->postCreated; ?></p>
        <a class="btn" href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>">show</a>
    </li>
<?php endforeach; ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>