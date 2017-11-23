<?php

namespace app\utilities;

use yii\base\ViewRenderer;
use yii\helpers\Markdown;

class MarkdownRenderer extends ViewRenderer {

    /**
     * Render a file in Markdown format
     *
     * @param \yii\base\View $view
     * @param string $file
     * @param array $params
     * @return string
     */
    public function render($view, $file, $params)
    {
        return Markdown::process(file_get_contents($file));
    }
}