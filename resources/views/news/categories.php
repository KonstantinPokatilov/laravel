<div>Категории: </div>
<div style="display: flex; justify-content: space-around">
    <?php foreach ($categories as $cat): ?>
        <div style="border: 1px solid black" id="<?= $cat['id'] ?>">
            <a href="<?= route('news.category', ['id' => $cat['id']]) ?>"><?= $cat['title'] ?></a>
        </div>
    <?php endforeach; ?>
</div>