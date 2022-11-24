<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h4 class="card-title-header">Data Siswa
					<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
						data-bs-target="#tambah"><i class="fas fa-user-plus"></i> Tambah</button>
				</h4>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 datatable" id="myTable">
					<thead>
						<tr>
							<th width="5%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">No</th>
							<th width="20%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
							<th width="10%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Jenis Kelamin</th>
							<th width="50%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Alamat</th>
							<th width="10%" class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($siswa)):?>
						<?php $no = 1;foreach($siswa as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td>
								<div class="d-flex px-2 py-1">
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-xs"><?= $val->nama;?></h6>
										<p class="text-xs text-secondary mb-0">NIS: <?= $val->nip;?></p>
									</div>
								</div>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->jenkel;?></span>
							</td>
							<td class="align-middle text-sm">
								<span class="text-secondary"><?= $val->alamat;?></span>
							</td>
							<td class="align-middle">
								<button class="btn btn-secondary btn-xs mb-0" data-bs-toggle="modal"
									data-bs-target="#edit-<?= $val->id;?>">
									Edit
								</button>
								<button class="btn btn-danger btn-xs mb-0" data-bs-toggle="modal"
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
										<h5 class="modal-title" id="exampleModalLabel">Edit siswa</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('master/editSiswa');?>" method="POST">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="mb-3">
												<label for="formNamaSiswa">Nama Lengkap</label>
												<input type="text" class="form-control form-control-sm" name="nama"
													value="<?= $val->nama;?>"
													placeholder="Nama Lengkap siswa" required>
											</div>
											<div class="mb-3">
												<label for="formNIKSiswa">NIP</label>
												<input type="text" class="form-control form-control-sm"
													id="formNIKSiswa" name="nip" placeholder="NIK siswa"
													value="<?= $val->nip;?>" required>
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
															for="radioPerempuan">Perempuan</label>
													</div>
												</div>
											</div>
											<div class="mb-3">
												<label for="formAlamatSiswa">Alamat <small
														class="text-secondary">(optional)</small></label>
												<textarea type="text" class="form-control form-control-sm"
													id="formAlamatSiswa" name="alamat" placeholder="Alamat"><?= $val->alamat;?></textarea>
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
										<form action="<?= site_url('master/hapusSiswa');?>" method="post">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="text-gradient text-danger mt-4">Hapus data siswa?</h4>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah siswa</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('master/tambahSiswa');?>" method="POST">
					<div class="mb-3">
						<label for="formNamaSiswa">Nama Lengkap</label>
						<input type="text" class="form-control form-control-sm" name="nama"
							placeholder="Nama lengkap siswa" required>
					</div>
					<div class="mb-3">
						<label for="formNIKSiswa">NIS</label>
						<input type="text" class="form-control form-control-sm" id="formNIKSiswa" name="nip"
							placeholder="NIS siswa" required>
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
								<label class="custom-control-label" for="radioPerempuan">Perempuan</label>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="formAlamatSiswa">Alamat <small class="text-secondary">(optional)</small></label>
						<textarea type="text" class="form-control form-control-sm" id="formAlamatSiswa" name="alamat"
							placeholder="Alamat siswa"></textarea>
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
