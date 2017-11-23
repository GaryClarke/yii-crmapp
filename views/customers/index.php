<?php

use yii\widgets\ListView;

echo ListView::widget([
    'options'      => [
        'class' => 'list-view',
        'id'    => 'search_results'
    ],
    'itemView'     => '_customer',
    'dataProvider' => $records
]);

