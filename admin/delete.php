<?php

include('../config.php');
$id=$_GET ['id'];
mysqli_query($link,"DELETE FROM exam_category where id=$id ");
?>

<script type="text/javascript">
window.location='category.php'

</script>