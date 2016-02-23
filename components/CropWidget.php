<?php
namespace app\components;


use budyaga\cropper\Widget;

class CropWidget extends Widget
{
    public function run()
    {
        $this->registerClientAssets();

        return $this->render('@app/views/crop-widget', [
            'model' => $this->model,
            'widget' => $this
        ]);
    }
}