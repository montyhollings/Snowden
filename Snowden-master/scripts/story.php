<?php 

$mysqlUser = $database->QueryDatabase("SELECT 1 FROM users WHERE user_id='$userId'");

$stories = [];
foreach($result as $row) {
    $stories[] = new Story($row);
}

class Story {
    var $title = "";
    var $content = "";
    var $date = "";
    var $score = "";
    var $image = "";

    public function __construct($row) {
        $this->$title = $result['title'];
        $this->content = $result['content'];
        $this->date = $result['date'];
        $this->score = $result['score'];
        $this->image = $result['image']; 
    }
    

    // define( 'TIMEBEFORE_NOW',         'Posted Just Now' );
    // define( 'TIMEBEFORE_MINUTE',      'Posted {num} minute ago' );
    // define( 'TIMEBEFORE_MINUTES',     'Posted {num} minutes ago' );
    // define( 'TIMEBEFORE_HOUR',        'Posted {num} hour ago' );
    // define( 'TIMEBEFORE_HOURS',       'Posted {num} hours ago' );
    // define( 'TIMEBEFORE_YESTERDAY',   'Posted yesterday' );
    // define( 'TIMEBEFORE_FORMAT',      'Posted %e %b' );
    // define( 'TIMEBEFORE_FORMAT_YEAR', 'Posted %e %b, %Y' );


    function time_ago( $date )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $date; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $date ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $date );
    }

}

?>