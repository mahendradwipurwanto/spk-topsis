<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h4 class="card-title-header">Data Penduduk
					<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
						data-bs-target="#tambah"><i class="fas fa-user-plus"></i> Tambah</button>
				</h4>
			</div>
			<div class="card-body pt-0">
				<table class="table align-items-center w-100 mb-0" id="table">
					<thead>
						<tr>
							<th width="20%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
							<th width="10%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nomor
								KK</th>
							<th width="10%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Jenis Kelamin</th>
							<th width="50%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Alamat</th>
							<th width="10%" class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($penduduk)):?>
						<?php $no = 1;foreach($penduduk as $key => $val):?>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-xs"><?= $val->nama;?></h6>
										<p class="text-xs text-secondary mb-0">nik: <?= $val->nik;?></p>
									</div>
								</div>
							</td>
							<td>
								<p class="text-xs text-secondary mb-0"><?= $val->kk == 0 ? '- ' : $val->kk;?></p>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->jenkel;?></span>
							</td>
							<td class="align-middle text-sm">
								<span class="text-secondary"><?= $val->alamat;?></span>
							</td>
							<td class="align-middle">
								<button class="btn btn-secondary btn-xs" data-bs-toggle="modal"
									data-bs-target="#edit-<?= $val->id;?>">
									Edit
								</button>
								<button class="btn btn-danger btn-xs" data-bs-toggle="modal"
									data-bs-target="#delete-<?= $val->id;?>">
									Hapus
								</button>
							</td>
						</tr>

						<!-- Modal -->
						<div class="modal fade" id="edit-<?= $val->id;?>" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah penduduk</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('master/editPenduduk');?>" method="POST">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="mb-3">
												<label for="formNamaPenduduk">Nama Lengkap</label>
												<input type="text" class="form-control form-control-sm" name="nama"
													value="<?= $val->nama;?> penduduk"
													placeholder="Nama Lengkap penduduk" required>
											</div>
											<div class="mb-3">
												<label for="formNIKPenduduk">NIK</label>
												<input type="text" class="form-control form-control-sm"
													id="formNIKPenduduk" name="nik" placeholder="NIK penduduk"
													value="<?= $val->nik;?>" required>
											</div>
											<div class="mb-3">
												<label for="formKKPenduduk">KK <small
														class="text-secondary">(optional)</small></label>
												<input type="text" class="form-control form-control-sm"
													id="formKKPenduduk" name="kk" placeholder="KK penduduk"
													value="<?= $val->kk;?>">
											</div>
											<div class="mb-3">
												<label>Jenis Kelamin</label>
												<div class="d-flex align-items-center">
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jenkel"
															id="radioLaki" value="Laki-laki"
															<?= $val->jenkel == 'Laki-laki' ? 'checked' : '';?>>
														<label class="custom-control-label"
															for="radioLaki">Laki-laki</label>
													</div>
													<div class="form-check ms-2">
														<input class="form-check-input" type="radio" name="jenkel"
															id="radioPerempuan" value="Perempuan"
															<?= $val->jenkel == 'Perempuan' ? 'checked' : '';?>>
														<label class="custom-control-label"
															for="radioPerempuan">Perempuan
															radio</label>
													</div>
												</div>
											</div>
											<div class="mb-3">
												<label for="formAlamatPenduduk">Alamat <small
														class="text-secondary">(optional)</small></label>
												<textarea type="text" class="form-control form-control-sm"
													id="formAlamatPenduduk" name="alamat" placeholder="Alamat"><?= $val->alamat;?></textarea>
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

						<div class="modal fade" id="delete-<?= $val->id;?>" tabindex="-1" role="dialog"
							aria-labelledby="modal-notification" aria-hidden="true">
							<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<form action="<?= site_url('master/hapusPenduduk');?>" method="post">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="text-gradient text-danger mt-4">Hapus data penduduk?</h4>
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
						<?php else:?>
						<tr>
							<td colspan="5" class="text-center">Belum ada data</td>
						</tr>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah penduduk</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('master/tambahPenduduk');?>" method="POST">
					<div class="mb-3">
						<label for="formNamaPenduduk">Nama Lengkap</label>
						<input type="text" class="form-control form-control-sm" name="nama"
							placeholder="Nama lengkap penduduk" required>
					</div>
					<div class="mb-3">
						<label for="formNIKPenduduk">NIK</label>
						<input type="text" class="form-control form-control-sm" id="formNIKPenduduk" name="nik"
							placeholder="NIK penduduk" required>
					</div>
					<div class="mb-3">
						<label for="formKKPenduduk">KK <small class="text-secondary">(optional)</small></label>
						<input type="text" class="form-control form-control-sm" id="formKKPenduduk" name="kk"
							placeholder="KK penduduk">
					</div>
					<div class="mb-3">
						<label>Jenis Kelamin</label>
						<div class="d-flex align-items-center">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="jenkel" id="radioLaki"
									value="Laki-laki" checked>
								<label class="custom-control-label" for="radioLaki">Laki-laki</label>
							</div>
							<div class="form-check ms-2">
								<input class="form-check-input" type="radio" name="jenkel" id="radioPerempuan"
									value="Perempuan">
								<label class="custom-control-label" for="radioPerempuan">Perempuan
									radio</label>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="formAlamatPenduduk">Alamat <small class="text-secondary">(optional)</small></label>
						<textarea type="text" class="form-control form-control-sm" id="formAlamatPenduduk" name="alamat"
							placeholder="Alamat penduduk"></textarea>
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
