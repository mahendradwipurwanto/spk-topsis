<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h4 class="card-title-header">Data Sub Kriteria
					<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
						data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah sub kriteria</button>
				</h4>
			</div>
		</div>
	</div>
</div>

<?php if(!empty($kriteria)):?>
<?php foreach($kriteria as $key => $val):?>
<div class="row mb-4">
	<div class="col-12">
		<div class="card">
			<div class="card-header pb-2">
				<h5 class="card-title-hader">Kriteria <?= $val->kategori;?> (<?= $val->kode;?>)</h5>
			</div>

			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 datatable" id="multiTable-<?= $val->id;?>">
					<thead>
						<tr>
							<th width="5%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								No.</th>
							<th width="20%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Kriteria</th>
							<th width="10%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Bobot</th>
							<th width="40%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Keterangan</th>
							<th width="10%" class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
						<?php if($val->kriteria != null):?>
						<?php $no = 1;foreach($val->kriteria as $k => $v):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td>
								<div class="d-flex px-2 py-1">
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-xs"><?= $v->kriteria;?></h6>
										<p class="text-xs text-secondary mb-0">kode: <?= $v->kode;?></p>
									</div>
								</div>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $v->nilai;?> poin</span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $v->keterangan;?></span>
							</td>
							<td class="align-middle">
								<button class="btn btn-secondary btn-xs mb-0" data-bs-toggle="modal"
									data-bs-target="#edit-<?= $v->id;?>">
									Edit
								</button>
								<button class="btn btn-danger btn-xs mb-0" data-bs-toggle="modal"
									data-bs-target="#delete-<?= $v->id;?>">
									Hapus
								</button>
							</td>
						</tr>

						<!-- Modal -->
						<div class="modal fade" id="edit-<?= $v->id;?>" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit sub kriteria</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('master/editKriteria');?>" method="POST">
											<input type="hidden" name="id" value="<?= $v->id;?>">
											<div class="mb-3">
												<label for="formNamaKriteria">Nama Kriteria</label>
												<input type="text" class="form-control form-control-sm" name="kriteria"
													value="<?= $v->kriteria;?>" placeholder="Nama Kriteria" required>
											</div>
											<div class="mb-3">
												<label for="formIndukKategori">Induk Kategori</label>
												<select type="text"
													class="form-control form-control-sm choices w-100 select2"
													name="kategori_id">
													<optgroup label="current">
														<option value="<?= $v->kategori_id;?>"><?= $v->kategori;?>
														</option>
													</optgroup>
													<?php if(!empty($kategori)):?>
													<optgroup label="changes">
														<?php foreach($kategori as $kk => $vv):?>
														<option value="<?= $vv->id;?>"><?= $vv->kategori;?></option>
														<?php endforeach;?>
													</optgroup>
													<?php endif;?>
												</select>
											</div>
											<div class="mb-3">
												<label for="formBobotKriteria">Bobot</label>
												<div class="input-group">
													<input type="number" class="form-control form-control-sm"
														id="formBobotKriteria" name="nilai" placeholder="Bobot kriteria"
														value="<?= $v->nilai;?>" aria-describedby="basic-bobot"
														min="1" max="5" required>
													<span class="input-group-text" id="basic-bobot">1 s.d. 5</span>
												</div>
											</div>
											<div class="mb-3">
												<label for="formKeteranganKriteria">Keterangan <small
														class="text-secondary">(optional)</small></label>
												<textarea type="text" class="form-control form-control-sm"
													id="formKeteranganKriteria" name="keterangan"
													placeholder="Keterangan kriteria"><?= $v->keterangan;?></textarea>
											</div>
											<div class="modal-footer px-0 pb-0 mb-0">
												<button type="button" class="btn bg-gradient-secondary"
													data-bs-dismiss="modal">Batal</button>
												<button type="submit" class="btn bg-gradient-primary">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="delete-<?= $v->id;?>" tabindex="-1" role="dialog"
							aria-labelledby="modal-notification" aria-hidden="true">
							<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<form action="<?= site_url('master/hapusKriteria');?>" method="post">
											<input type="hidden" name="id" value="<?= $v->id;?>">
											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="text-gradient text-danger mt-4">Hapus data sub kriteria?</h4>
												<p>Apakah anda yakin ingin menghapus data ini?</p>
											</div>
											<div class="modal-footer px-0 pb-0 mb-0">
												<button type="submit" class="btn bg-gradient-danger">Ya</button>
												<button type="button" class="btn bg-gradient-secondary ml-auto"
													data-bs-dismiss="modal">Tidak</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah sub kriteria</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('master/tambahKriteria');?>" method="POST">
					<div class="mb-3">
						<label for="formNamaKriteria">Nama sub Kriteria</label>
						<input type="text" class="form-control form-control-sm" name="kriteria"
							placeholder="Nama Kriteria" required>
					</div>
					<div class="mb-3">
						<label for="formIndukKategori">Induk Kriteria</label>
						<select type="text" class="form-control form-control-sm choices-button w-100" name="kategori_id"
							id="choices-button">
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $kk => $vv):?>
							<option value="<?= $vv->id;?>"><?= $vv->kategori;?></option>
							<?php endforeach;?>
							<?php endif;?>
						</select>
					</div>
					<div class="mb-3">
						<label for="formBobotKriteria">Nilai</label>
						<div class="input-group">
							<input type="number" class="form-control form-control-sm" id="formBobotKriteria"
								name="nilai" placeholder="Bobot kriteria" aria-describedby="basic-bobot" min="1" max="5"
								required>
							<span class="input-group-text" id="basic-bobot">1 s.d. 5</span>
						</div>
					</div>
					<div class="mb-3">
						<label for="formKeteranganKriteria">Keterangan <small
								class="text-secondary">(optional)</small></label>
						<textarea type="text" class="form-control form-control-sm" id="formKeteranganKriteria"
							name="keterangan" placeholder="Keterangan kriteria"></textarea>
					</div>
					<div class="modal-footer px-0 pb-0 mb-0">
						<button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn bg-gradient-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
