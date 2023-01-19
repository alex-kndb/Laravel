<head>
    <title>News</title>
</head>

<h1 style="text-align: center">News</h1>

<?php foreach($news as $n) :?>
    <div style="width: 900px; margin: 0 auto">
        <h2><?=$n['title']?></h2>
        <h3><?=$n['category']?></h3>
        <p><?=$n['text']?></p>
        <p>
            <strong><?=$n['author']?></strong>
            <em>(<?=$n['created_at']?>)</em>
            <a href="<?=route('news.show', ['id' => (int)$n['id']])?>">More</a>
        </p>
        <hr>
    </div>

<?php endforeach; ?>
