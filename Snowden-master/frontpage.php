<?php /*
$sql = "SELECT id, title, content, date, score FROM story";
$result = $con->query($sql);
$con->close(); */
$result = [];
?>

<div class="container">
    <div class="row my-5">
<div class="col-4">
</div>
<div class="col-4">
<?php foreach($result as $res): ?>

    <div class="card bg-light p-2 my-3 d-flex flex-row">
        <p class="mb-0 mr-auto">
            <?= $res['title'] ?>
        </p>
        <p class="mb-0 ml-auto">Score: <?= $res['score'] ?></p>
    </div>

 <?php endforeach ?>
 </div>        



<div class="col-4">
</div>
</div>