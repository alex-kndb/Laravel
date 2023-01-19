<head>
    <title>Categories</title>
</head>
<body>

</body>
</html>

<h1 style="text-align: center">Categories</h1>

<ul style="width: 900px; margin: 0 auto">
    <?php foreach($categories as $category) :?>
        <li><a href="<?=route('categories.show', ['category' => $category['title']])?>"><?=$category['title']?></a></li>
    <?php endforeach; ?>
</ul>
