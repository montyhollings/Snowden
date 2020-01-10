<?php 


//$mysqlUser = $connection->QueryDatabase("SELECT 1 FROM users WHERE user_id='$userId'");

$stories = $connection->QueryDatabase("SELECT * FROM story");

$storyObject = [];

foreach($stories as $row) {
    array_push($storyObject, new Story($row));
}


function sortArray($a, $b){
    if ($a->getDate() == $b->getDate()) return 0;
    return ($a->getDate() > $b->getDate()) ? -1 : 1;
}

usort($storyObject, "sortArray");

//$storyObject = array_reverse($storyObject);

class Story {
    private $title;
    private $content;
    private $date;
    private $score;
    private $image;

    public static function time_ago( $date )
    {
        $now = new DateTime;
        $ago = new DateTime($date);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!false) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'Just now';
    }

    function __construct($row) {
        $this->title = $row['title'];
        $this->content = $row['content'];
        $this->date = $row['date'];
        $this->score = $row['score'];
        $this->image = $row['image']; 
    }
    
    function getTitle() {
		return $this->title;
	}

	function setTitle($title) {
		$this->title = $title;
	}

	function getContent() {
		return $this->content;
	}

	function setContent($content) {
		$this->content = $content;
	}

	function getDate() {
		return $this->date;
	}

	function setDate($date) {
		$this->date = $date;
	}

	function getScore() {
		return $this->score;
	}

	function setScore($score) {
		$this->score = $score;
	}

	function getImage() {
		return $this->image;
	}

	function setImage($image) {
		$this->image = $image;
	}

}

?>