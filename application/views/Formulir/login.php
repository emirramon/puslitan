<div class="wrapper wrapper-full-page">
	<div class="full-page login-page" filter-color="black" data-image="<?= base_url() ?>assets/img/login.jpg">
		<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
						<form method="post" action="">
							<div class="card card-login card-hidden">
								<div class="card-header text-center" data-background-color="green">
									<h4 class="card-title">Assalamu'alaikum Silahkan Masuk</h4>
								</div>
								<div class="card-content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">Masukkan NIP/NIK</label>
											<input name="nip" type="text" class="form-control">
										</div>
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">Masukkan Password</label>
											<input name="password" type="password" class="form-control">
										</div>
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" name="submit" class="btn btn-rose btn-simple btn-lg">
										Masuk
									</button>
									<a href="<?= site_url('login/lupa') ?>" type="submit" name="submit" class="btn btn-rose btn-simple btn-wd btn-lg">
										Lupa Password
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>