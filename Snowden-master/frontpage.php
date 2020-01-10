<?php
include('scripts\story.php');
var_dump($stories);
?>

<div class="container">
    <div class="row justify-content-md-center">

<div class="w-50 justify-content-md-center">
<!-- asdasd -->
<?php  foreach($result as $res): ?>

        <div class="card-group" style="padding-top: 3em;">
            <div class="card">
            <img src="<?= $res['image'] ?></p>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">
                <?= $res['title'] ?>
            </h5>
            <p class="card-text">
                <?= $res['content'] ?>
            </p>
            </div>

            <div class="card-footer">
            
            <span class="float-right badge badge-primary badge-pill"><?= $res['score'] ?></span>

            <button class="float-right btn btn-outline-secondary btn-sm fas fa-thumbs-up mr-2">
            </button>

            <button class="float-right btn btn-outline-secondary btn-sm fas fa-thumbs-down mr-2">
            </button>

            <p class="card-text"><small class="text-muted"><?=time_ago(strtotime($res['date']))?></small></p> 
            </div>


        
        </div>

 <?php endforeach ?>
 
</div>        
</div>
</div></div>