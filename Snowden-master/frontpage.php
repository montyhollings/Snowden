<?php
$sql = "SELECT id, title, content, date, score, image FROM story";
$result = $con->query($sql);
$con->close();
?>

<?php

    define( 'TIMEBEFORE_NOW',         'Posted Just Now' );
    define( 'TIMEBEFORE_MINUTE',      'Posted {num} minute ago' );
    define( 'TIMEBEFORE_MINUTES',     'Posted {num} minutes ago' );
    define( 'TIMEBEFORE_HOUR',        'Posted {num} hour ago' );
    define( 'TIMEBEFORE_HOURS',       'Posted {num} hours ago' );
    define( 'TIMEBEFORE_YESTERDAY',   'Posted yesterday' );
    define( 'TIMEBEFORE_FORMAT',      'Posted %e %b' );
    define( 'TIMEBEFORE_FORMAT_YEAR', 'Posted %e %b, %Y' );


    function time_ago( $time )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $time; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
    }

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

            <button class="float-right btn btn-outline-secondary btn-sm fas fa-angle-down mr-2">
            </button>

            <button class="float-right btn btn-outline-secondary btn-sm fas fa-angle-up mr-2">
            </button>

            <p class="card-text"><small class="text-muted"><?=time_ago(strtotime($res['date']))?></small></p> 
            </div>


        
        </div>

 <?php endforeach ?>
 
</div>        
</div>
</div></div>