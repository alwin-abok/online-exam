<?php

include('config.php');
include('./templates/head.php')
?>


<div class="row">
    Select Category to Add Question
    <form action="" name="form4" method="post">
        <div class="col-sm-6">
            <div class="well">
                <div class="form-group">
                    <label for="usr">Question Type</label>
                    <input type="text" class="form-control" name="type">
                </div>

                <div class="form-group">
                    <label for="pwd">Question Category</label>
                    <input type="text" class="form-control" name="category">
                </div>
                <div class="form-group">
                    <label for="usr">Survey Name</label>
                    <input type="text" class="form-control" name="sname">
                </div>

    </form>
</div>

<table class="table table-bordered">

    <thead>
        <tr>
            <th class="success" scope="col">ID</th>
            <th class="warning" scope="col">Type</th>
            <th class="info" scope="col">Category</th>
            <th class="success" scope="col"> Survey Name</th>
            <th class="warning" scope="col">Select</th>


        </tr>
    </thead>
    <tbody>

        <?php
        $count = 0;
        $res = mysqli_query($link, "SELECT * from questions ");
        while ($row = mysqli_fetch_array($res)) {

            $count = $count + 1;
        ?>
            <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $row['Type']; ?></td>
                <td><?php echo $row['Category']; ?></td>
                <td><?php echo $row['Survey_Name']; ?></td>
                <td><a href="survey.php?id=<?php echo $row['Question_Id']; ?>">Select</a></td>
               

            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
</body>
<?php include('./templates/foot.php') ?>

</html>