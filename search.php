<?php 
	$title = 'Student';

	if(isset($_GET['roll'])){
		$roll = $_GET['roll'];
	}else{
		header('location:student.php');
	}
	require_once('inc/header.php' );
	$db = DB::getInstance();

	

?>

	
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-3"> 
				<div class="sidebar-nav"> 
					<h2>Departments</h2>
					<?php require_once"inc/department-menu.php";?>
				</div>
			</div>
			
			<div class="col-md-9"> 
				<div class="about-us-content">
					<div class="find-student">
					
					
					</div>
					<div class="deprtment-title"> 
						<h2 style="text-transform:uppercase">Your Search Result</h2>
					</div>
					
					<table class="table table-bordered"> 
						<thead>
							<tr>

								<th>Name</th>
								<th>Roll</th>
								<th>Registration</th>
								<th>Semester</th>
								<th>Shift</th>
								<th>Info</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
									foreach($db->get('student', ['roll', '=', $roll])->result() as $row){
									?>
									<tr>

									<td><?php echo $row->name;?></td>
									<td><?php echo $row->roll;?></td>
									<td><?php echo $row->registration;?></td>
									<td><?php echo $row->semester;?></td>
									<td><?php echo $row->shift;?></td>
									<td><a href="" data-toggle="modal" data-target="#mymodal<?php echo $row->id;?>">Details</a></td>
									
									<div class="modal fade" id="mymodal<?php echo $row->id;?>">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											
											<h4 class="modal-title">Student Information</h4>
										  </div>
										  <div class="modal-body">
											<img src="admin/uploads/<?php echo $row->picture;?>" class="person" alt="image" />
											<div class="information"> 
												<div class="column-left"> 
													<div class="column"> 
														<p>Name</p>
													</div>
													<div class="column"> 
														<p>Roll</p>
													</div>
													<div class="column"> 
														<p>Registration</p>
													</div>
													<div class="column"> 
														<p>Semester</p>
													</div>
													<div class="column"> 
														<p>Session</p>
													</div>
													<div class="column"> 
														<p>Mobile</p>
													</div>
													<div class="column"> 
														<p>Email</p>
													</div>
												</div>
												<div class="column-right"> 
													<div class="column"> 
														<p><?php echo $row->name;?></p>
													</div>
													<div class="column"> 
														<p><?php echo $row->roll;?></p>
													</div>
													<div class="column"> 
														<p><?php echo $row->registration;?></p>
													</div>
													<div class="column"> 
														<p><?php echo $row->semester;?></p>
													</div>
													<div class="column"> 
														<p><?php echo $row->session;?></p>
													</div>
													<div class="column"> 
														<p><?php echo $row->phone;?></p>
													</div>
													<div class="column"> 
														<p><?php echo $row->email;?></p>
													</div>
												</div>
												
											</div>
										  </div>
										 
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  </div>
										</div><!-- /.modal-content -->
									  </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									</tr>

									
									<?php
								}
							?>
							
						</tbody>
					</table>
					
				</div>
			</div>
			
		</div>
	</div>
	
	
	
<?php 
	require_once('inc/footer.php');
?>