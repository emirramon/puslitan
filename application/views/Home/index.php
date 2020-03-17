<div class="content">
	<?= $this->session->flashdata('message'); ?>
	<h3>Artikel Terbaru</h3>
	<br>
	<div class="row">
		<?php foreach ($artikel as $a) { ?>
			<div class="col-md-4">
				<div class="card card-product">
					<div class="card-image" data-header-animation="true">
						<a href="#pablo">
							<img src="<?= base_url('uploads/coverartikel/' . $a['cover_artikel']) ?>" class="gambar-artikel">
						</a>
					</div>
					<div class="card-content">
						<!-- <div class="card-actions">
							<button type="button" class="btn btn-danger btn-simple fix-broken-card">
								<i class="material-icons">build</i> Fix Header!
							</button>
							<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
								<i class="material-icons">art_track</i>
							</button>
							<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
								<i class="material-icons">close</i>
							</button>
						</div> -->
						<h4 class="card-title">
							<a href="<?= base_url('Home/detail/' . $a['artikel_id']) ?>"><?= $a['judul_artikel'] ?></a>
						</h4>
						<div class="card-description">
							<i><?= substr($a['content_artikel'], 0, 100) ?>...</i>
						</div>
					</div>

				</div>
			</div>
		<?php } ?>
	</div>
</div>

</html>