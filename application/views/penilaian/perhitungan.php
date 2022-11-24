<div class="row mb-4">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Normalisasi</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 table-calc"
					id="table-normalisasi">
					<thead>
						<tr>
							<th width="10%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								No</th>
							<th width="80%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								Nama Siswa</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								<?= $val->kategori;?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($normalisasi['data'])):?>
						<?php $no = 1;foreach($normalisasi['data'] as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->nama;?></span>
							</td>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $k => $v):?>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $val->kategori_siswa[$v->id]->nilai;?></span>
							</td>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-end" style="border-right: none;"></th>
							<th class="text-end" style="border-left: none;">Hasil</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder opacity-7">
								<?= $normalisasi['total'][$val->id];?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Matrix R</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 table-calc"
					id="table-matrix-r">
					<thead>
						<tr>
							<th width="10%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								No</th>
							<th width="80%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								Nama Siswa</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								<?= $val->kategori;?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($matrix_r)):?>
						<?php $no = 1;foreach($matrix_r as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->nama;?></span>
							</td>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $k => $v):?>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $val->kategori_siswa[$v->id]->matrix_r;?></span>
							</td>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-end" style="border-right: none;"></th>
							<th class="text-end" style="border-left: none;">Hasil</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder opacity-7">
								<?= $normalisasi['total'][$val->id];?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Bobot Matrix</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 table-calc"
					id="table-bobot-matrix">
					<thead>
						<tr>
							<th class="text-end" style="border-right: none;"></th>
							<th class="text-end" style="border-left: none;">Nilai Max</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder opacity-7">
								<?= $bobot_matrix['max'][$val->id];?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
						<tr>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								No</th>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								Nama Siswa</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								<?= $val->kategori;?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($bobot_matrix['data'])):?>
						<?php $no = 1;foreach($bobot_matrix['data'] as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->nama;?></span>
							</td>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $k => $v):?>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $val->kategori_siswa[$v->id]->bobot_matrix;?></span>
							</td>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-end" style="border-right: none;"></th>
							<th class="text-end" style="border-left: none;">Nilai Min</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder opacity-7">
								<?= $bobot_matrix['min'][$val->id];?></th>
							<?php endforeach;?>
							<?php endif;?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai D+</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 table-calc"
					id="table-nilai-d-plus">
					<thead>
						<tr>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								No</th>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								Nama Siswa</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-center px-2 text-secondary text-xs font-weight-bolder">
								<?= $val->kategori;?></th>
							<?php endforeach;?>
							<?php endif;?>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder">
								D+</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($d_plus)):?>
						<?php $no = 1;foreach($d_plus as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->nama;?></span>
							</td>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $k => $v):?>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $val->kategori_siswa[$v->id]->nilai_d_plus;?></span>
							</td>
							<?php endforeach;?>
							<?php endif;?>
							<td class="align-middle">
								<span
									class="text-uppercase text-center px-2 text-secondary font-weight-bolder"><?= $val->total_d_plus;?></span>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai D-</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 table-calc"
					id="table-nilai-d-min">
					<thead>
						<tr>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								No</th>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								Nama Siswa</th>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $key => $val):?>
							<th class="text-uppercase text-center px-2 text-secondary text-xs font-weight-bolder">
								<?= $val->kategori;?></th>
							<?php endforeach;?>
							<?php endif;?>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder">
								D+</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($d_min)):?>
						<?php $no = 1;foreach($d_min as $key => $val):?>
						<tr>
							<td class="align-middle">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->nama;?></span>
							</td>
							<?php if(!empty($kategori)):?>
							<?php foreach($kategori as $k => $v):?>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $val->kategori_siswa[$v->id]->nilai_d_min;?></span>
							</td>
							<?php endforeach;?>
							<?php endif;?>
							<td class="align-middle">
								<span
									class="text-uppercase text-center px-2 text-secondary font-weight-bolder"><?= $val->total_d_min;?></span>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row mb-4">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai NP</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0 table-calc"
					id="table-nilai-np">
					<thead>
						<tr>
							<th class="text-uppercase text-center px-2 text-secondary text-xs font-weight-bolder">
								Ranking</th>
							<th class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder">
								Nama Siswa</th>
							<th class="text-uppercase text-center px-2 text-secondary font-weight-bolder">
								NP</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($np)):?>
						<?php $no = 1;foreach($np as $key => $val):?>
						<tr>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary"><?= $val->nama;?></span>
							</td>
							<td class="align-middle text-center">
								<span
									class="text-uppercase text-center px-2 text-secondary font-weight-bolder"><?= $val->nilai_np;?></span>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

