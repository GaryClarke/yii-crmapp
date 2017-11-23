<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model'      => $model,
    'attributes' => [
        ['attribute' => 'name'],
        ['attribute' => 'birth_date', 'value' => $model->birth_date->format('Y-m-d')],
        'notes:text',
        ['label' => 'Phone Number', 'attribute' => 'phones.0.number']
    ]
]);

