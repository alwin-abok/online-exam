<?php

include('config.php');
include('./templates/head.php');

$id = $_GET['id'];

$category = '';
$res = mysqli_query($link, "SELECT * FROM  page WHERE 'quiz_id'=$id ");
while ($row = mysqli_fetch_array($res)) {

    $category = $row['category'];
}
?>

<div class="page-title">
    <h1>Add question inside <?php echo "<font color='red'>" . $category . "</font>" ?></h1>
</div>
<div class="col-sm-5">
    <form action="" method="post">


        <div class="form-group">
            <label for="pwd">Question Category</label>
            <input type="text" class="form-control" name="question">
        </div>

        <div>
            <div class="form-group">
                <label for="pwd">Add Option 1</label>
                <input type="radio" class="form-control" name="option1" value="Oui">
            </div>
            <div class="form-group">
                <label for="pwd">Add Option 2</label>
                <input type="radio" class="form-control" name="option2" value="Non">
            </div>
            <div class="form-group">
                <label for="pwd">Add Option 3</label>
                <input type="radio" class="form-control" name="option3">
            </div>
            <div class="form-group">
                <label for="pwd">Add Option 4</label>
                <input type="radio" class="form-control" name="option4">
            </div>
            <div class="form-group">
                <label for="pwd">Add comment</label>
                <input type="text" class="form-control" name="comment" value="" required>
            </div>
        </div>
    </form>

    <button type="submit6" class="btn btn-primary" name="">Add Question</button>
</div>





</body>
<?php include('./templates/foot.php') ?>

</html>

<?php
if (isset($_['submit6'])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM page WHERE category='$category' order by id asc ") or die(mysqli_error($link));

    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "UPDATE page SET quiz_no='$loop' WHERE quiz_id=$row[id]");
        }
    }
    $loop = $loop + 1;
    mysqli_query($link, "INSERT INTO page VALUES(NULL,'$loop','$_POST[question]','$_POST[option1]','$_POST[option2]','$_POST[answer]')") or die(mysqli_error($link));
}
?>