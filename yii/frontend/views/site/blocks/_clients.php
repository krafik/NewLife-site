<setion class="section clients">
    <div class="clients-wrapper">
        <h2 class="section-title section__title">Наши клиенты</h2>
        <div class="clients-block">
            <?foreach ($clients as $partner):?>
                <div class="clients-block__item" style="<?if($partner->title =='Ribera Resort&SPA' ){?>background-color: #cccccc;<?}?>">
                    <img src="../image/clients/<?=$partner->img?>" alt="">
                </div>
            <?endforeach;?>
        </div>
    </div>
</setion>
<!--D31F3A-->
