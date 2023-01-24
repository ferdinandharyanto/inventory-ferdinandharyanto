<?php
$id = $_GET['id'];
$sql = $connect_db->query("DELETE FROM tbl_jenis WHERE id='$id'");
if ($sql) {
    ?>

    <script type="text/javascript">
        alert("Deleting data success");
        window.location.href = "?page=jenisBarang";
    </script>

    <?php
}
?>