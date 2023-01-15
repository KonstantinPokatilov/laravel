<?php foreach ($news as $i): ?>
    <div style="border: 1px solid green">
        <h2><?=$i['title']?></h2>
        <p><?=$i['description']?></p>
        <div><strong><?=$i['author']?> (<?=$i['created_at']?>)</strong>
            <a href="<?=route('news.show', ['id' => $i['id']])?>">Подробнее</a>
        </div>
    </div>
<?php endforeach; ?>