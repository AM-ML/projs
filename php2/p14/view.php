<?php require("head.php"); ?>

<?php 
$target_dir = 'uploads/';
$images = array_diff(scandir($target_dir), array('..', '.')); // Get all image files

$maxWidth = 0;
$maxHeight = 0;

if (count($images) > 0) {
    foreach ($images as $image) {
        $imagePath = $target_dir . $image;
        $imageSize = getimagesize($imagePath);
        
        $imageWidth = $imageSize[0];
        $imageHeight = $imageSize[1];
        
        if ($imageWidth > $maxWidth) {
            $maxWidth = $imageWidth;
        }
        
        if ($imageHeight > $maxHeight) {
            $maxHeight = $imageHeight;
        }
    }
    
    echo "<table class='table table-dark table-bordered border-dark  table-striped'>";
    $i = 1;
    foreach ($images as $image) {
        $imagePath = $target_dir . $image;
        echo '<tr>';
        echo '<td style="width: 10%;"><b class="id">' . $i .'</b></td>';
        echo '<td><a href="#" class="btn btn-dark btn-sm" style="width:100%; display:block;" onclick="showImagePopup(\'' . $imagePath . '\')">'. $image . '</a></td>';
        echo '</tr>';
        $i++;
    }
    echo '</table>';
} else {
    echo 'No images found.';
}
?>

<div id="imagePopup" class="popup" style="display: none; max-width: <?php echo $maxWidth; ?>px; max-height: <?php echo $maxHeight; ?>px;">
    <span class="close" onclick="closeImagePopup()">&times;</span>
    <img id="popupImage" src="" alt="" style="max-width: 100%; max-height: 100%;">
</div>

<style>
	.id {
	    font-size: 18px;
	    margin-right: 10px;
	}
.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 9999;
    overflow: auto;
    text-align: center; /* Center the content */
    border-radius: 5px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 40px;
    cursor: pointer;
    color:black;
}
</style>

<script>
function showImagePopup(imagePath) {
    var popupImage = document.getElementById('popupImage');
    popupImage.src = imagePath;
    
    var imagePopup = document.getElementById('imagePopup');
    imagePopup.style.display = 'block';
}

function closeImagePopup() {
    var imagePopup = document.getElementById('imagePopup');
    imagePopup.style.display = 'none';
    popupImage.src = '';
}
</script>

<a href='form.php' class='btn btn-lg btn-light link' >Home</a>

<?php require("foot.php"); ?>
