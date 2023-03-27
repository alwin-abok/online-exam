<?php
include( '../templates/head.php');
include('../config.php');
?>

<div class="row">
    <form action="" name="form4" method="post">
        <div class="col-sm-4">
            <div class="well">
                <div class="form-group">
                    <label for="usr">Exam Category</label>
                    <input type="text" class="form-control" name="category">
                </div>

                <div class="form-group">
                    <label for="pwd">Exam Time</label>
                    <input type="text" class="form-control" name="exam_time">
                </div>
                <button type="submit" class="btn btn-primary" name="submit4" style="margin-top:20px">Add Exam</button>
    </form>
</div>
<br>
<br>
<div class="col-lg-6">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="success" scope="col">ID</th>
                <th class="warning" scope="col">Exam</th>
                <th class="info" scope="col">Time</th>
                <th class="warning" scope="col">Edit</th>
                <th class="danger" scope="col">Delete</th>
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
                    <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>

                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

</div>
</div>
</div>

</body>

</html>


<?php

if (isset($_POST['submit4'])) {

    mysqli_query($link, "INSERT INTO exam_category VALUES(NULL,'$_POST[category]','$_POST[exam_time]')") or die(mysqli_error($link));

?>
    <script type="text/javascript">
        alert('category added succesfully');
        window.location.href = window.location.href;
    </script>

<?php
}

?>