<div class="span2" width="20%">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<?php
            foreach($topics as $entry){
?>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="location.href='/index.php/topic/get/<?=$entry->id?>'"><?=$entry->title?></button>    
<?php
            }
?>

        </div>
    </div>
</div>