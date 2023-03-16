<?php

include('config.php');
include('./templates/head.php');

$id = $_GET['id'];
$res = mysqli_query($link, "SELECT * FROM exam_category WHERE id =$id ");

while ($row = mysqli_fetch_array($res)) {

    $Category = $row['category'];
    $Time = $row['exam_time'];

?>
    <tr>
        <th scope="row"></th>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['exam_time']; ?></td>



    </tr>
<?php
}

?>

<div class="row">
    <form action="" name="form4" method="post">
        <div class="col-sm-3">
            <div class="well">
                <div class="form-group">
                    <label for="pwd">Exam Category</label>
                    <input type="text" class="form-control" name="category" value="<?php echo $Category; ?>">
                </div>
                <div class="form-group">
                    <label for="usr"> Exam time</label>
                    <input type="text" class="form-control" name="exam_time" value="<?php echo $Time; ?>">
                </div>

    </form>
</div>

<button type="submit" class="btn btn-primary" name="submit5" style="margin-top:20px">Edit Category</button>


<!-- <div class="container" style="width:100%">
    <h2>Bordered Table</h2>
    <p>The .table-bordered class adds borders to a table:</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="success" scope="col">ID</th>
                <th class="info" scope="col">Category</th>
                <th class="warning" scope="col">Time</th>
            </tr>
        </thead>
        <tbody> -->

            <?php

            if (isset($_POST['submit5'])) {

                mysqli_query($link, "UPDATE exam_category SET category='$_POST[category]',exam_time='$_POST[exam_time]' WHERE id= $id") or die(mysqli_error($link));

            ?>
                <script type="text/javascript">
                    window.location = 'admin.php'
                </script>

            <?php
            }

            ?>