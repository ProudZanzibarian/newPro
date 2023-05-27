<footer>
      <small>Copyright © 2023 Lion . All Rights Reserved.</small>
  </footer>
<script src="style.js"></script>
<?php
    if (isset($_GET['status']) && $_GET['status'] == "success") {
        echo $success = "'<script>
        toastr.success(\"Action completed successfully!\", \"Success\");
    </script>';";
    }?>

</div>
</body>


</html>