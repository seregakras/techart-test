<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        <?php include "project/css/style.css" ?>
    </style>
    <title><?php echo $title ?></title>
</head>
<body>
<div class="title"><?php echo $title ?></div>
<hr class="hr-dotted">
<p>
    <?php echo $result['content'] ?>
<hr class="hr-dotted">
<p>
    <a href = '/news.php?page=1'>Все новости >></a>
</body>
</html>
