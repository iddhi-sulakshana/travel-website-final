<script>
    <?php 
    if(isset($_REQUEST['message'])){?>
        window.alert("<?php echo htmlspecialchars($_REQUEST['message']); ?>")
    <?php } ?>  
</script>