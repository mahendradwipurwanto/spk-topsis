<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<form action="<?= site_url('admin/ubahInformasiWebsite');?>" method="POST">
					<div class="row">
						<div class="col-6">
							<h5 class="fw-bold mb-0">Informasi website</h5>
							<hr class="my-2">
							<!-- <div class="form-group">
								<div class="row">
									<div class="col-6">
										<label for="inputLogoWebsite" class="form-control-label">Logo website</label>
										<input class="form-control" type="file" value="<?= $web_logo;?>" name="web_logo"
											id="inputLogoWebsite">
									</div>
									<div class="col-6">
										<label for="inputIconWebsite" class="form-control-label">Icon website</label>
										<input class="form-control" type="file" value="<?= $web_icon;?>" name="web_icon"
											id="inputIconWebsite">
									</div>
								</div>
							</div> -->
							<div class="form-group">
								<label for="inputJudulWebsite" class="form-control-label">Judul website</label>
								<input class="form-control" type="text" name="web_title" value="<?= $web_title;?>" id="inputJudulWebsite">
							</div>
							<div class="form-group">
								<label for="inputDeskripsiWebsite" class="form-control-label">Deskripsi website</label>
								<input class="form-control" type="text" name="web_desc" value="<?= $web_desc;?>" id="inputDeskripsiWebsite">
							</div>
						</div>
						<div class="col-6">
							<h5 class="fw-bold mb-0">Mailer</h5>
							<hr class="my-2">
							<div class="form-group">
								<label for="inputAliasMailer" class="form-control-label">Alias</label>
								<input class="form-control" type="text" name="mailer_alias" value="<?= $mailer_alias;?>" id="inputAliasMailer">
							</div>
							<div class="form-group">
								<label for="inputHostMailer" class="form-control-label">Host</label>
								<input class="form-control" type="text" name="mailer_host" value="<?= $mailer_host;?>" id="inputHostMailer">
							</div>
							<div class="form-group">
								<label for="inputPortMailer" class="form-control-label">Port</label>
								<input class="form-control" type="number" name="mailer_port" maxlength="3" value="<?= $mailer_port;?>" id="inputPortMailer">
							</div>
							<div class="form-group">
								<label for="inputConnectionMailer" class="form-control-label">Connection</label>
								<input class="form-control" type="text" name="mailer_connection" value="<?= $mailer_connection;?>" id="inputConnectionMailer">
							</div>
							<div class="form-group">
								<label for="inputUsernameMailer" class="form-control-label">Username</label>
								<input class="form-control" type="text" name="mailer_username" value="<?= $mailer_username;?>" id="inputUsernameMailer">
							</div>
							<div class="form-group">
								<label for="inputPasswordMailer" class="form-control-label">Password</label>
								<input class="form-control" type="password" name="mailer_password" value="<?= $mailer_password;?>" id="inputPasswordMailer">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary float-end">Simpan Perubahan</button>
				</form>
			</div>
		</div>
	</div>
</div>
