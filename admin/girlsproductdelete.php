<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
      </div>
      <div class="modal-body">
			<div class="alert alert-danger">
				Are you sure you want to delete This Product? <span style="color:#428bca;"><?php echo $row['name']; ?><img src="../women/girlsproduct/<?php echo $row['image'];?>" style="height: 50px;"></span>?
			</div>
			<div class="modal-footer">
			<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
			<a href="girlsproductdeletequery.php<?php echo '?user_id='.$id; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
			</div>
      </div>
    </div>
  </div>
</div>
