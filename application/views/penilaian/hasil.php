<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai Akhir Perhitungan
					<a href="<?= site_url('penilaian/cetak-hasil');?>" class="btn btn-warning btn-sm float-end"
						target="_blank">Cetak</a>
				</h5>
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
