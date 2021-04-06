<setion class="partners">
    <div class="partners-wrapper">

            <div class="partners-block">
                <?foreach ($partners as $partner):?>

                <div class="partners-block__item" style="<?if($partner->id ==45 ){?>background-color: #D31F3A;<?}else if($partner->id == 7){?>background-color: gray; padding: 5px<?}?>">

                    <img src="<?= Yii::$app->request->baseUrl?>/image/manufacturers/<?=$partner->img?>" alt="">
                </div>
     <?endforeach;?>
            </div>


    </div>

</setion>
