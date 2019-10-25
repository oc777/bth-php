<aside>
    <nav class="multipage-nav">
        <ul>
        <?php foreach ($pages as $key => $value) : ?>
            <?php if ($value["nav"]) : ?>
                <li>
                    <a href="?page=<?= $key ?>" class="<?= ($_SERVER['QUERY_STRING'] == 'page=' . $key) ? 'selected' : ''; ?>">
                        <?= $value["nav"] ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </nav>
</aside>
