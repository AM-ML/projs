<?php include("head.php") ?>

<form action="page.php" method="post" enctype="multipart/form-data" onsubmit="return checkFileSize()">

  <p style="display:inline;">Select Image to Upload &nbsp; -></p>

  <input type="file" class='form-control mb-2 mr-sm-2' name="image" id="image" onchange="updateSubmitButton()" required>

  <button type="submit" class='btn btn-lg btn-light mb-2 mr-sm-2' value="Upload Image" name="submit" id="submitBtn" disabled>upload</button>
</form>
<?php 
  dbtn();
?>

<script>
  function updateSubmitButton() {
    var fileInput = document.getElementById("image");
    var submitButton = document.getElementById("submitBtn");
    if (fileInput.files[0]) {
      var fileSize = fileInput.files[0].size; // in bytes
      var maxSize = 2 * 1024 * 1024; // 2MB in bytes
      if (fileSize <= maxSize) {
        submitButton.disabled = false;
      } else {
        alert("File size exceeds 2MB. Please choose a smaller file.");
        submitButton.disabled = true;
      }
    }
  }

  // Listen for file input changes
  var fileInput = document.getElementById("image");
  fileInput.addEventListener("change", updateSubmitButton);
</script>

<?php include("foot.php") ?>
