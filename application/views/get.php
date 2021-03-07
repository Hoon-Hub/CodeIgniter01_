<div class="span10" width="80%">
    <article>
        <h1><?=$topic->title?></h1>
        <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <?= kdate($topic->created)?></div>
            <?=auto_link($topic->description)?>
        </div>
    </article>
    <div class="">
        <button type="button" class="btn btn-outline-secondary" onclick="location.href='/index.php/topic/add'">추가</button>
    </div>

</div>