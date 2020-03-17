<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="rose">
						<i class="material-icons">folder</i>
					</div>
					<h4 class="card-title">Tambah <?= $title ?></h4>
					<div class="card-content">
						<form class="form-horizontal">
							<div class="row">
								<label class="col-md-2 label-on-left">Judul</label>
								<div class="col-md-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" name="judul" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-md-2 label-on-left">Tanggal</label>
								<div class="col-md-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="date" name="tanggal" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-md-2 label-on-left">Isi</label>
								<div class="col-md-9">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<!-- <input type="text" name="judul" class="form-control"> -->
										<textarea name="isi" rows="5" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-md-2"></label>
								<div class="col-md-9">
									<div class="form-group form-button">
										<button type="submit" class="btn btn-fill btn-primary">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
