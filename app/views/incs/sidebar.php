<div class="col-md-4">
  <h2>Recent Posts</h2>
  <ul class="list-group">
      <?php foreach ($recentPosts as $post): ?>
        <li class="list-group-item"><a href="posts/<?= $post['slug'] ?>"><?= $post['title'] ?></a></li>
      <?php endforeach; ?>
  </ul>
</div>