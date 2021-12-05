<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="readRecords()">
<?php include "header.php";?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<button id="myBtn" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus"></i></button>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	   
      <div class="modal-body">
        	<div class="mb-3">
				  <label for="formControlInputTitle" class="form-label">Add new title</label>
				  <input type="title" class="form-control" id="formControlInputTitle" placeholder="add title" name='title'>
			</div>
			<div class="mb-3">
				  <label for="formControlTextarea" class="form-label">Add text</label>
				  <textarea class="form-control" id="formControlTextarea" rows="3" placeholder="add text" name='text'></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name='submit' onclick="addRecord()" data-dismiss="modal">Sand</button>
      </div>
    </div>
  </div>
</div>
<div class="content">
</div>

<!-- Modal  Update-->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Update products</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>		
		<div class="modal-body">
			<div class="mb-3">
					<label for="update-title" class="form-label">Update title</label>
					<input type="title" class="form-control" id="update-title" placeholder="add title" name='title' value="">
			</div>
			<div class="mb-3">
					<label for="update-text" class="form-label">Update text</label>
					<textarea class="form-control" id="update-text" rows="3" placeholder="" name='text' value=""></textarea>
			</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" name='edit_submit' onclick="updateProduct()" >Sand</button>
		<input type="hidden" name="" id="hidden_id"/>
		</div>
	</div>
	</div>
</div>

</div>
<script type="text/javascript">

$(document).ready(function(){
	$("#myBtn").click(function(){
		$("#create").modal();
	});

});
function readRecords(){
	$.ajax({
		url: "products_crud.php",
		type: "post",
		data: {
			all_products: "all_products"
		},
		success:function(data, status){
			$('.content').html(data);
		}
	});
}
function addRecord(){
	var title = $('#formControlInputTitle').val();
	var text = $('#formControlTextarea').val();
	
	$.ajax({
		url:"products_crud.php",
		type:"post",
		data: {
			add_records: "add_records",
			title: title,
			text: text
		},
		
		success:function(data,status){
			readRecords();
		}
	});
}

function deleteProduct(deleteid){
	var conf = confirm("Are U sure");
	if(conf==true){
		$.ajax({
			url:"products_crud.php",
			type:"post",
			data: {
				deleteid: deleteid
			},
			success:function(data,staus){
				readRecords();
			}
		});
	}
}

function getProduct(updateid){
	$('#hidden_id').val(updateid);
	$.post("products_crud.php", {
		updateid:updateid }, function(data,status){
			var product = JSON.parse(data);
			$('#update-title').val(product.title);
			$('#update-text').val(product.text);
		});
		$('#update').modal();
}

function updateProduct(){
	var title = $('#update-title').val();
	var text = $('#update-text').val();
	var hidden_id = $('#hidden_id').val();

	$.post("products_crud.php", {
		update_records: "update_records",
			title: title,
			text: text,
			id: hidden_id,
	}, function(data,status){
		$('#update').modal("hide");
		readRecords();
	});
}
</script>	 

</body>
</html>