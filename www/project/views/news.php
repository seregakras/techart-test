<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        <?php use Project\Models\NewsModel;include "project/css/style.css" ?>
    </style>
    <title><?php echo $title ?></title>
</head>
<body>
<div class="title"><?php echo $title ?></div>
<hr class="hr-dotted">
<p>
    <?php foreach ($result as $row) {
        $id = $row['id'];?>
     <span class="date">
         <?php echo date("d.m.Y", $row['idate']) ?>
     </span>&nbsp;
    <a href = 'view.php?id=<?php echo $id ?>'><?php echo $row['title'] ?></a><br>
    <?php echo $row['announce'] ?>
    <p>
    <?php } ?>

<hr class="hr-dotted">
<p>
    <b>Страницы:</b><p>
    <?php $rows_of_table = (new NewsModel())->countRow();
    $news_for_page = NEWS_FOR_PAGE;
    $pages = ($rows_of_table % $news_for_page == 0) ? $rows_of_table / $news_for_page : (int)($rows_of_table / $news_for_page) + 1;
    for ($i = 1; $i <= $pages; $i++) {
    if (isset($_GET['page']) &&$i == (int)$_GET['page']) { ?>
    <div class = 'footer'>
        <a href = 'news.php?page=<?php echo $i ?>'>
            <div class = 'active'><?php echo $i ?></div>
        </a>
    </div>
    <?php } else { ?>
    <div class = 'footer'>
        <a href = 'news.php?page=<?php echo $i ?>'>
            <div class = 'pages'><?php echo $i ?></div>
        </a>
    </div>
    <?php
    } }?>
</body>
</html>
