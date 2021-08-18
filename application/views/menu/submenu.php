



<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="row">
		<div class="col-lg-10">

			<?php if(validation_errors()): ?>
				<div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>'
			<?php endif ?>
			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenu">add new sub menu</a>

			<table class="table table-hover mt-2">
				<thead>
					<tr>
						<th scope="col">no</th>
						<th scope="col">title</th>
						<th scope="col">menu</th>
						<th scope="col">url</th>
						<th scope="col">icon</th>
						<th scope="col">active</th>
						<th scope="col">action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($submenu as $sm) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $sm['title']; ?></td>
							<td><?= $sm['menu']; ?></td>
							<td><?= $sm['url']; ?></td>
							<td><?= $sm['icon']; ?></td>
							<td><?= $sm['is_active']; ?></td>
							<td>
								<a href="" class="badge badge-success">edit</a>
								<a href=""  class="badge badge-danger">delete</a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>



		</div>
	</div>


</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenu" tabindex="-1" role="dialog" aria-labelledby="newSubMenuLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubMenuLabel">add ner sub menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php base_url('menu/submenu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" placeholder="sub menu title" name="title">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control">
							<option value="">select menu</option>
							<?php foreach ($menu as $m) : ?>
								<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
							<?php endforeach; ?>
						</select>

					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" placeholder="sub menu icon" name="icon">
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="url" placeholder="sub menu url" name="url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="is_active" placeholder="active" name="is_active">
					</div>
<!-- 
					<div class="form-group">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="" value="1" name="is_active" id="is_active" checked>
							<label class="form-check-label" for="is_active">active</label>
						</div>
					</div>
 -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">add</button>
				</div>
			</form>
		</div>
	</div>
</div>


