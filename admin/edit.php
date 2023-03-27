<?php

include('../config.php');
include( '../templates/head.php');

$id = $_GET['id'];
$res = mysqli_query($link, "SELECT * FROM exam_category WHERE id =$id ");

while ($row = mysqli_fetch_array($res)) {

    $category = $row['category'];
    $time = $row['exam_time'];
}
?>
<!-- <tr>
        <th scope="row"></th>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['exam_time']; ?></td>



    </tr> -->


<div class="row">
    <form action="" name="form4" method="post">
        <div class="col-sm-4">
            <div class="well">
                <div class="form-group">
                    <label for="pwd">Exam Category</label>
                    <input type="text" class="form-control" name="exam" value="<?php echo $category; ?>">
                </div>
                <div class="form-group">
                    <label for="usr"> Exam time</label>
                    <input type="text" class="form-control" name="time" value="<?php echo $time; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit5" style="margin-top:20px">Edit Category</button>
            </div>

        </div>
    </form>
</div>




<?php

if (isset($_POST['submit5'])) {

    mysqli_query($link, "UPDATE exam_category SET category='$_POST[exam]',exam_time='$_POST[time]' WHERE id= $id") or die(mysqli_error($link));

?>
    <script type="text/javascript">
        window.location = 'category.php'
    </script>

<?php
}

?>