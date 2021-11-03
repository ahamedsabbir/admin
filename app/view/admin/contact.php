<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>	
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>






<section class="py-5">
    <div class="container">
        <div class="text-center"><h1>Inbox</h1></div>
       
        
        <table class="table_id table table-bordered">
            <thead>
                <tr>
                    <th>No:</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
$i=0;
foreach($all_message as $keys => $values){
    $i++;
?>
                <tr>
                    
                    <td><?php echo $i ?></td>
                    <td><?php echo $values['contact_email']; ?></td>
                    <td><?php echo $values['contact_title']; ?></td>
                    <td><?php echo format::only_date($values['contact_date']); ?></td>
                    <td>
                        <a href="mailto:<?php echo $values['contact_email']; ?>?subject=Account Activation Mail&body=You asked me. <?php echo $values['contact_message']; ?>"> Mail </a> || 
                        <a href="<?php echo BASE_URL."admin_contact_controller_class/delete_contant_function/".$values['contact_id']; ?>"> Delete </a></td>
                </tr> 
<?php
}
?>
            </tbody>
        </table>
        
      
    </div>   
</section> 

















	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>