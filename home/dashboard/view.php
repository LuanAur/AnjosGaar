<?php include '../config/checklogin.php'; ?>
<?php $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?>
<?php ob_start(); ?>
<?php 
include('../config/configView.php');
 
$result = $db->query("SELECT image FROM dogs ORDER BY id DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Imagens não encontradas...</p> 
<?php } ?>