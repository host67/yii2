<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

if ($readProduct) {
    echo 'Readed product: id='.$readProduct->id
        .', Name='.Html::encode("{$readProduct->name}")
        .', Price='.$readProduct->price;
}


?>

<h1>Products</h1>

<ul>
<?php foreach ($products as $product): ?>
    <li>
        <?= $product->id ?>.
        <?= Html::encode("{$product->name}") ?>:
        <?= $product->price ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
