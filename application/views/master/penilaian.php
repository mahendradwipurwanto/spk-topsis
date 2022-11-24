<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h4 class="card-title-header">Data Penilaian
					<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
						data-bs-target="#tambah"><i class="fas fa-user-plus"></i> Tambah</button>
				</h4>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 datatable" id="myTable">
					<thead>
						<tr>
							<th width="10%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								No</th>
							<th width="10%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								</th>
							<th width="80%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								Nama Siswa</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								<?= $val->kategori;?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($penilaian)):?>
						<?php $no = 1;foreach($penilaian as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no;?></span>
							</td>
							<td class="align-middle">
								<button class="btn btn-secondary btn-xs mb-0" data-bs-toggle="modal"
									data-bs-target="#edit-<?= $val->id;?>">
									Detail
								</button>
								<button class="btn btn-danger btn-xs mb-0" data-bs-toggle="modal"
									data-bs-target="#delete-<?= $val->id;?>">
									Hapus
								</button>
							</td>
							<td>
								<div class="d-flex px-2 py-1">
									<div class="d-flex flex-column justify-content-center">
										<h6 class="mb-0 text-xs"><?= $val->nama;?></h6>
										<p class="text-xs text-secondary mb-0">NIS: <?= $val->nip;?></p>
									</div>
								</div>
							</td>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $k => $v):?>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $val->kategori_siswa[$v->id]->nilai;?></span>
							</td>
							<?php endforeach;?>
							<?php endif;?>
						</tr>

						<!-- Modal -->
						<div class="modal fade" id="edit-<?= $val->id;?>" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
										<form action="<?= site_url('master/editPenilaian');?>" method="POST">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="mb-3">
												<label for="formNamaSiswa">Siswa</label>
												<input type="text" class="form-control form-control-sm" name="nama"
													value="<?= $val->nama;?>" placeholder="Nama Lengkap siswa" readonly>
											</div>
											<?php if(!empty($val->kategori_siswa)):?>
											<?php foreach($val->kategori_siswa as $k => $v):?>
											<div class="mb-3">
												<label for="formKategori">Kriteria <?= $v->kategori;?></label>
												<input type="hidden" name="kategori_id[]"
													value="<?= $v->kategori_id;?>">
												<div class="input-group">
													<input type="number" class="form-control form-control-sm"
														id="formBobotKategori" name="nilai[]"
														value="<?= $v->nilai;?>"
														aria-describedby="basic-bobot" min="1" max="5" required>
													<span class="input-group-text" id="basic-bobot">1 s.d. 5</span>
												</div>
											</div>
											<?php endforeach;?>
											<?php endif;?>
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
										<form action="<?= site_url('master/hapusPenilaian');?>" method="post">
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<div class="py-3 text-center">
												<i class="ni ni-bell-55 ni-3x"></i>
												<h4 class="text-gradient text-danger mt-4">Hapus data penilaian?</h4>
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

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah siswa</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('master/tambahPenilaian');?>" method="POST">
					<div class="mb-3">
						<label for="formNamaSiswa">Siswa</label>
						<select type="text" class="form-control form-control-sm choices w-100 select2" name="siswa_id">
							<?php if(!empty($siswa)):?>
							<?php foreach($siswa as $kk => $vv):?>
							<option value="<?= $vv->id;?>"><?= $vv->nama;?></option>
							<?php endforeach;?>
							<?php endif;?>
						</select>
					</div>
					<?php if(!empty($kategori)):?>
					<?php foreach($kategori as $key => $val):?>
					<div class="mb-3">
						<label for="formKategori">Nilai Kategori <?= $val->kategori;?></label>
						<input type="hidden" name="kategori_id[]" value="<?= $val->id;?>">
						<div class="input-group">
							<input type="number" class="form-control form-control-sm" id="formBobotKategori"
								name="nilai[]" placeholder="Nilai kategori <?= $val->kategori;?>"
								aria-describedby="basic-bobot" min="1" max="5" required>
							<span class="input-group-text" id="basic-bobot">1 s.d. 5</span>
						</div>
					</div>
					<?php endforeach;?>
					<?php endif;?>
					<div class="modal-footer px-0 pb-0 mb-0">
						<button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn bg-gradient-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
