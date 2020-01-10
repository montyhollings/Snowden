<?php
include('scripts/story.php');

?>

<div class="container">
    <div class="row justify-content-md-center">
        <!-- Card -->
        <?php  foreach($storyObject as $res): ?>
            <div class="card-group col-4" style="padding-top: 3em;">
                <div class="card">
                    <img src="<?php echo($res->getImage());?></p>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo($res->getTitle()); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo($res->getContent()); ?>
                        </p>
                    </div>
                    <div class="card-footer">   
                        <span class="float-right badge badge-primary badge-pill"><?php echo($res->getScore()); ?></span>
                        <button class="float-right btn btn-outline-secondary btn-sm fas fa-thumbs-up mr-2">
                        </button>
                        <button class="float-right btn btn-outline-secondary btn-sm fas fa-thumbs-down mr-2">
                        </button>
                        <p class="card-text"><small class="text-muted"><?php echo(Story::time_ago($res->getDate())); ?></small></p> 
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        </div>        
    </div>
</div>