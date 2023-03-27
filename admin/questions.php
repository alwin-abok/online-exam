<?php

include('../config.php');
include('../templates/head.php');
error_reporting();

$id = $_GET['id'];
$exam_category = '';
$res = mysqli_query($link, "SELECT * FROM  exam_category WHERE id= $id ");
while ($row = mysqli_fetch_array($res)) {

    $exam_category = $row['category'];
}
?>

<div class="col-lg-6">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="success" scope="col">ID</th>
                <th class="warning" scope="col">Category</th>
                <th class="info" scope="col">Time</th>
                <th class="warning" scope="col">Select</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $count = 0;
            $res = mysqli_query($link, "SELECT * from exam_category ");
            while ($row = mysqli_fetch_array($res)) {

                $count = $count + 1;
            ?>
                <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['exam_time']; ?></td>
                    <td><a href="questions.php?id=<?php echo $row['id']; ?>">Select</a></td>

                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>



<div class="col-sm-3 float-left">
    <div class="page-title">
        <h1>Add New Question Inside <?php echo "<font color='red'>" . $exam_category . "</font>" ?></h1>
    </div>
</div>
<div class="card">
    <div class="col-lg-8">
        <form action="" name="form" method="POST">
            <div class="form-group">
                <label for="pwd">Question</label>
                <textarea class="form-control" name="question" cols="30" rows="3"></textarea>
            </div>

            <div>
                <div class="form-group">
                    <label for="pwd">Add Option 1</label>
                    <input type="text" class="form-control" name="opt1" value="">
                </div>
                <div class="form-group">
                    <label for="pwd">Add Option 2</label>
                    <input type="text" class="form-control" name="opt2" value="">
                </div>
                <div class="form-group">
                    <label for="pwd">Add Option 3</label>
                    <input type="text" class="form-control" name="opt3" value="">
                </div>
                <div class="form-group">
                    <label for="pwd">Add Option 4</label>
                    <input type="text" class="form-control" name="opt4" value="">
                </div>
                <div class="form-group">
                    <label for="pwd">Answer</label>
                    <textarea class="form-control" name="answer" cols="30" rows="3"></textarea>
                </div>
            </div>
            <button type="submit6" class="btn btn-primary" name="">Add Question</button>
        </form>


    </div>
</div>
</body>
<?php include('./templates/foot.php') ?>

</html>

<?php
if (isset($_POST['submit6'])) {
    $loop = 0;
    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$exam_category' ORDER BY  id asc ") or die(mysqli_error($link));

    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "UPDATE questions SET question_no='$loop' WHERE id=$row[id]");
        }
    }
    $loop = $loop + 1;

    mysqli_query($link, "INSERT INTO questions VALUES(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$_POST[exam_category]')") or die(mysqli_error($link));
}
?>
<script type="text/javascript">
    alert('new question added!')
    window.location.href = window.location.href;
</script>