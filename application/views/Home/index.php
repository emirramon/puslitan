<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card-content">
					<ul class="timeline">
						<?php if(empty($data_artikel)):  ?>
							<li>
								<div class="timeline-badge danger">
									<i class="material-icons">card_travel</i>
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h2 class="label label-danger">Artikel Kosong</h2>
									</div>
									<h2>Saat ini belum ada artikel</h2>
								</div>
							</li>
						<?php else: ?>
							<?php 
								$i = 1;
								foreach($data_artikel as $artikel): 
								if($i%2!=0) : ?>
								<li>
								<?php else : ?>
								<li class="timeline-inverted">
								<?php endif; ?>
									<div class="timeline-badge success">
										<i class="material-icons">radio_button_checked</i>
									</div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h3><?= $artikel['judul_artikel'] ?></h3>
										</div>
										<hr>
										<div class="timeline-body">
											<p><?= nl2br($artikel['isi']) ?></p>
										</div>
										<h6 class="pull-right">
											<i class="ti-time"><?= date("d M Y", strtotime($artikel['tanggal'])) ?></i> 
										</h6>
									</div>
								</li>
							<?php $i++; endforeach; ?>
						<?php endif; ?>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>