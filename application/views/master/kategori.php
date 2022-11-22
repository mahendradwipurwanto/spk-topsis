<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h4 class="card-title-header">Data Kriteria
					<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
						data-bs-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
				</h4>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0" id="myTable">
					<thead>
						<tr>
							<th width="20%"
								class="text-uppercase text-secondary text-left px-2 text-xs font-weight-bolder opacity-7">
								Kriteria</th>
							<th width="10%"
								class="text-uppercase text-secondary text-left px-2 text-xs font-weight-bolder opacity-7">
								Jenis</th>
							<th width="50%"
								class="text-uppercase text-secondary text-left px-2 text-xs font-weight-bolder opacity-7">
								Keterangan</th>
							<th width="10%" class="text-secondary text-left px-2 opacity-7"></th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($kategori)):?>
						<?php $no = 1;foreach($kategori as $key => $val):?>
						<tr>
							<td>
								<div class="d-flex px-2 py-1">
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-xs"><?= $val->kategori;?></h6>
										<p class="text-xs text-secondary mb-0">kode: <?= $val->kode;?></p>
									</div>
								</div>
							</td>
							<td class="align-middle text-sm">
								<span class="text-secondary font-weight-bold"><span
										class="badge bg-<?= $val->jenis == 1 ? 'success' : 'danger';?>"><?= $val->jenis == 1 ? 'Benefit' : 'Cost';?></span></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->keterangan;?></span>
							</td>
							<td class="align-middle">
								<button class="btn btn-secondary font-weight-bold btn-xs mb-0" data-bs-toggle="modal"
									data-bs-target="#edit-<?= $val->id;?>">
									Edit
								</button>
								<button class="btn btn-danger font-weight-bold btn-xs mb-0" data-bs-toggle="modal"
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
										<h5 class="modal-title" id="exampleModalLabel">Edit kriteria</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('master/editKategori');?>" method="POST">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="mb-3">
												<label for="formNamaKategori">Nama kriteria</label>
												<input type="text" class="form-control form-control-sm" name="kategori"
													value="<?= $val->kategori;?>" placeholder="Nama kriteria" required>
											</div>
											<div class="mb-3">
												<label>Jenis kriteria</label>
												<div class="d-flex align-items-center">
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jenis"
															id="radioPendapatan" value="1"
															<?= $val->jenis == 1 ? 'checked' : '';?>>
														<label class="custom-control-label"
															for="radioPendapatan">Pendapatan</label>
													</div>
													<div class="form-check ms-2">
														<input class="form-check-input" type="radio" name="jenis"
															id="radioPengeluaran" value="2"
															<?= $val->jenis == 2 ? 'checked' : '';?>>
														<label class="custom-control-label"
															for="radioPengeluaran">Pengeluaran</label>
													</div>
												</div>
											</div>
											<div class="mb-3">
												<label for="formKeteranganKategori">Keterangan <small
														class="text-secondary">(optional)</small></label>
												<textarea type="text" class="form-control form-control-sm"
													id="formKeteranganKategori" name="keterangan"
													placeholder="Keterangan kategori"><?= $val->keterangan;?></textarea>
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
										<form action="<?= site_url('master/hapusKategori');?>" method="post">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="text-gradient text-danger mt-4">Hapus data kriteria?</h4>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah kriteria</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('master/tambahKategori');?>" method="POST">
					<div class="mb-3">
						<label for="formNamaKategori">Nama kriteria</label>
						<input type="text" class="form-control form-control-sm" name="kategori"
							placeholder="Nama kriteria" required>
					</div>
					<div class="mb-3">
						<label>Jenis kriteria</label>
						<div class="d-flex align-items-center">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="jenis" id="radioPendapatan" value="1"
									checked>
								<label class="custom-control-label" for="radioPendapatan">Benefit</label>
							</div>
							<div class="form-check ms-2">
								<input class="form-check-input" type="radio" name="jenis" id="radioPengeluaran"
									value="2">
								<label class="custom-control-label" for="radioPengeluaran">Cost</label>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="formKeteranganKategori">Keterangan <small
								class="text-secondary">(optional)</small></label>
						<textarea type="text" class="form-control form-control-sm" id="formKeteranganKategori"
							name="keterangan" placeholder="Keterangan kategori"></textarea>
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
