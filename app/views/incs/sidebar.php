<div class="col-md-4">
    <h2>Recent Posts</h2>
    <ul class="list-group">
        <?php foreach ($recentPosts as $post): ?>
            <li class="list-group-item"><a href="post/?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>