      <div class="row">
      	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      		<div class="card">
      			<div class="card-body p-3">
      				<div class="row">
      					<div class="col-8">
      						<div class="numbers">
      							<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Siswa</p>
      							<h5 class="font-weight-bolder">
      								<?= number_format($statistik['siswa']);?>
      							</h5>
      						</div>
      					</div>
      					<div class="col-4 text-end">
      						<div
      							class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
      							<i class="fas fa-users text-lg opacity-10" aria-hidden="true"></i>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      		<div class="card">
      			<div class="card-body p-3">
      				<div class="row">
      					<div class="col-8">
      						<div class="numbers">
      							<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Kriteria</p>
      							<h5 class="font-weight-bolder">
      								<?= number_format($statistik['kategori']);?>
      							</h5>
      						</div>
      					</div>
      					<div class="col-4 text-end">
      						<div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
      							<i class="fas fa-boxes text-lg opacity-10" aria-hidden="true"></i>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 d-none">
      		<div class="card">
      			<div class="card-body p-3">
      				<div class="row">
      					<div class="col-8">
      						<div class="numbers">
      							<p class="text-sm mb-0 text-uppercase font-weight-bold">Total Sub Kriteria</p>
      							<h5 class="font-weight-bolder">
      								<?= number_format($statistik['kriteria']);?>
      							</h5>
      						</div>
      					</div>
      					<div class="col-4 text-end">
      						<div
      							class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
      							<i class="fas fa-clipboard-list text-lg opacity-10" aria-hidden="true"></i>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </div>
      <div class="row mt-4">
      	<div class="col-lg-5 d-none">
      		<div class="card">
      			<div class="card-header pb-0 p-3">
      				<h6 class="mb-0">Data Kriteria (Limit 5 Kriteria)</h6>
      			</div>
      			<div class="card-body p-3">
      				<ul class="list-group">
      					<?php if(!empty($kategori)):?>
      					<?php foreach($kategori as $key => $val):?>
      					<li
      						class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
      						<div class="d-flex align-items-center">
      							<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
      								<i class="fas fa-box text-white opacity-10"></i>
      							</div>
      							<div class="d-flex flex-column">
      								<h6 class="mb-1 text-dark text-sm"><?= $val->kategori;?></h6>
      								<span class="text-xs"><span
      										class="font-weight-bold"><?= $val->kode;?></span></span>
      							</div>
      						</div>
      						<div class="d-flex align-items-center">
								<div class="me-2 text-xs">
									<span class="badge bg-<?= $val->jenis == 1 ? 'success' : 'danger';?>"><?= $val->jenis == 1 ? 'Pendapatan' : 'Pengeluaran';?></span>
								</div>
      							<a href="<?= site_url('master/kategori');?>"
      								class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
      									class="ni ni-bold-right" aria-hidden="true"></i></a>
      						</div>
      					</li>
      					<?php endforeach;?>
      					<?php else:?>
      					<li
      						class="list-group-item border-0 d-flex justify-content-between py-1 border-radius-lg">
      						<div class="d-flex align-items-center">
      							<span>Belum ada data kategori</span>
      						</div>
      					</li>
      					<?php endif;?>
      				</ul>
      			</div>
      		</div>
      	</div>
      	<div class="col-lg-7 mb-lg-0 mb-4 d-none">
      		<div class="card ">
      			<div class="card-header pb-0 p-3">
      				<div class="d-flex justify-content-between">
      					<h6 class="mb-2">Data Sub Kriteria (Limit 5 Sub Kriteria)</h6>
      				</div>
      			</div>
      			<div class="table-responsive">
      				<table class="table align-items-center ">
      					<tbody>
      						<?php if(!empty($kriteria)):?>
      						<?php foreach($kriteria as $key => $val):?>
      						<tr>
      							<td class="w-30">
      								<div class="d-flex px-2 py-1 align-items-center">
      									<div>
      										<div
      											class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
      											<i class="fas fa-clipboard-list text-white opacity-10"></i>
      										</div>
      									</div>
      									<div class="ms-4">
      										<p class="text-xs font-weight-bold mb-0">Kriteria:</p>
      										<h6 class="text-sm mb-0"><?= $val->kriteria;?></h6>
      									</div>
      								</div>
      							</td>
      							<td>
      								<div class="text-left">
      									<p class="text-xs font-weight-bold mb-0">Nilai:</p>
      									<h6 class="text-sm mb-0"><?= $val->nilai;?> poin</h6>
      								</div>
      							</td>
      							<td>
      								<div class="text-left">
      									<p class="text-xs font-weight-bold mb-0">Induk kategori:</p>
      									<h6 class="text-sm mb-0"><?= $val->kategori;?></h6>
      								</div>
      							</td>
      						</tr>
      						<?php endforeach;?>
      						<?php else:?>
      						<tr>
      							<td class="w-100 text-center">
      								<span>Belum ada data kriteria</span>
      							</td>
      						</tr>
      						<?php endif;?>
      					</tbody>
      				</table>
      			</div>
      		</div>
      	</div>
      </div>
