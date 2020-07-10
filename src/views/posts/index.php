<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p><a class="btn" href="<?= URLROOT; ?>/posts/add">Add post</a><?php flash('post_message'); ?></p>
<p><?php echo $data['description']; ?></p>
<ul>
<?php foreach($data['posts'] as $post) : ?>
    <li>
        <article>
            <a href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>">
                <h4><?= $post->title; ?></h4>
                <p class="small">Written by <?= $post->name; ?> on <?= $post->postCreated; ?></p>
            </a>
        </article>
    </li>
<?php endforeach; ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>