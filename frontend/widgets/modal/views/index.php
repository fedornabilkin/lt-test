<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA-PC
 * Date: 01.05.2018
 * Time: 23:51
 * 
 * @var $this yii\web\View
 * @var $id string
 * @var $classes string
 * @var $title string
 * @var $body string
 * @var $params array
 */
?>

<div class="modal fade <?=$classes?>" id="<?=$id?>" role="dialog" aria-labelledby="<?=$id?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" title="<?=Yii::t('app', 'Close')?>" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?=$title?></h4>
            </div>
            <div class="modal-body"><?=$body?></div>
        </div>
    </div>
</div>