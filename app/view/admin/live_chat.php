<!doctype html>
<html class="no-js" lang="">
<head>
	<?php include('app/view/admin/page_part/head.php');?>
	<meta http-equiv="refresh" content="30">
</head>
<body>
	<?php include('app/view/admin/page_part/header.php');?>
	<?php include('app/view/admin/page_part/side_nav.php');?>
<style>
	.chatbox{
		padding:5px 5px;
		height: 300px;
		border:3px solid black;
		overflow:auto; 
		display:flex; 
		flex-direction:column-reverse;
	}
	.chatbox ul{list-style: none; color:green; padding-left: 0px; padding-right: 0px;}
	.chatbox ul il{display: block; border-bottom:1px dashed #ddd; margin-bottom:50px; padding-bottom:5px;}
	.chatbox ul il:last-child{display: block; border-bottom:0px dashed #ddd; margin-bottom:0px; padding-bottom:0px;}
	.chatbox b{color:green; font-style: normal;}
	.chatbox p{color:black; font-style: italic;}
</style>
<section class="py-5">
	 <div class="container">
		<h1 class="text-center py-2">live Chat
			<a href="<?php echo BASE_URL.'admin_live_chat_controller_class/delete_all_chat_function'; ?>">
				<button type="submit" class="btn btn-danger">Delete Chat</button>
			</a>
		</h1>
		 <div class="chatbox">
		 	 <ul>
<?php	
foreach($reply->chat as $chat){
	if($chat['id'] == session::get('admin_name')){
		$reply_class = "text-end";
	}else{
		$reply_class = "text-start";
	}
    echo "<li class='".$reply_class."'><b> {$chat['id']} </b> <p>{$chat->text} </p></li>";
}			 				 
?>
			 </ul>
		 </div>
		<form class="form-inline" role="form" action="<?php echo BASE_URL.'admin_live_chat_controller_class/reply_chat_function'; ?>" method="post">
			<div class="form-group py-2">
			  <input type="text" class="form-control" id="text" name="text">
			</div>
			<button type="submit" class="btn btn-primary">Reply</button>
		</form>	 
	 </div>  
</section> 
	<?php include('app/view/admin/page_part/footer.php');?>
	<?php include('app/view/admin/page_part/script.php');?>
</body>
</html>