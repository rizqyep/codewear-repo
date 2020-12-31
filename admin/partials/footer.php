<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<?php if(isset($_SESSION['flash_fail'])) : 
$message = $_SESSION['flash_fail']['message'];
$title = $_SESSION['flash_fail']['title'];
unset($_SESSION['flash_fail']);
?>

<script>
Swal.fire({
    icon: 'error',
    title: "<?php echo $title;?>",
    text: "<?php echo $message; ?>"
});
</script>
<?php 

endif; ?>

<?php if(isset($_SESSION['flash_success'])) : 
$message = $_SESSION['flash_success']['message'];
$title = $_SESSION['flash_success']['title'];
unset($_SESSION['flash_success']);
?>

<script>
Swal.fire({
    icon: 'success',
    title: "<?php echo $title;?>",
    text: "<?php echo $message; ?>"
});
</script>
<?php 

endif; ?>