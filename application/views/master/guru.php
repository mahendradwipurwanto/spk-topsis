<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h4 class="card-title-header">Data Guru
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
							<th width="20%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">Email</th>
							<th width="10%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Jenis Kelamin</th>
							<th width="50%" class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Alamat</th>
							<th width="10%" class="text-secondary opacity-7"></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($guru)):?>
						<?php $no = 1;foreach($guru as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td>
								<div class="d-flex px-2 py-1">
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-xs"><?= $val->nama;?></h6>
										<p class="text-xs text-secondary mb-0">NIP: <?= $val->nip;?></p>
									</div>
								</div>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->email;?></span>
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
										<h5 class="modal-title" id="exampleModalLabel">Edit guru</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('master/editGuru');?>" method="POST">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<input type="hidden" name="user_id" value="<?= $val->user_id;?>">
											<div class="mb-3">
												<label for="formNamaGuru">Nama Lengkap</label>
												<input type="text" class="form-control form-control-sm" name="nama"
													value="<?= $val->nama;?>"
													placeholder="Nama Lengkap guru" required>
											</div>
											<div class="mb-3">
												<label for="formNIKGuru">NIP</label>
												<input type="text" class="form-control form-control-sm"
													id="formNIKGuru" name="nip" placeholder="NIK guru"
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
												<label for="formAlamatGuru">Alamat <small
														class="text-secondary">(optional)</small></label>
												<textarea type="text" class="form-control form-control-sm"
													id="formAlamatGuru" name="alamat" placeholder="Alamat"><?= $val->alamat;?></textarea>
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
										<form action="<?= site_url('master/hapusGuru');?>" method="post">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="text-gradient text-danger mt-4">Hapus data guru?</h4>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah guru</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('master/tambahGuru');?>" method="POST">
					<div class="mb-3">
						<label for="formNamaGuru">Nama Lengkap</label>
						<input type="text" class="form-control form-control-sm" name="nama"
							placeholder="Nama lengkap guru" required>
					</div>
					<div class="mb-3">
						<label for="formNIKGuru">NIP</label>
						<input type="text" class="form-control form-control-sm" id="formNIKGuru" name="nip"
							placeholder="NIS guru" required>
					</div>
					<div class="mb-3">
						<label for="formEmailGuru">Email</label>
						<input type="email" class="form-control form-control-sm" name="email"
							placeholder="Email" required>
					</div>
					<div class="mb-3">
						<label for="formPasswordGuru">Password Lengkap</label>
						<input type="password" class="form-control form-control-sm" name="password"
							placeholder="Password" required>
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
						<label for="formAlamatGuru">Alamat <small class="text-secondary">(optional)</small></label>
						<textarea type="text" class="form-control form-control-sm" id="formAlamatGuru" name="alamat"
							placeholder="Alamat guru"></textarea>
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
