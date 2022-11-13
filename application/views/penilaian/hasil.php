<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai Akhir Perhitungan
                    <a href="<?= site_url('penilaian/cetak-hasil');?>" class="btn btn-warning btn-sm float-end" target="_blank">Cetak</a>
                    <a href="<?= site_url('penilaian/ekspor-hasil');?>" class="btn btn-success btn-sm float-end me-2" target="_blank">Ekspor (excel beserta rumus)</a>
                </h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0" id="tableNilaiVektorV">
					<thead>
						<tr>
							<th width="10%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								No</th>
							<th width="10%"
								class="text-uppercase text-secondary text-left px-2 text-xs font-weight-bolder opacity-7">
								Penduduk</th>
							<th width="30%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								Perhitungan</th>
							<th width="30%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								Nilai (V)</th>
							<th width="20%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								Peringkat (Kelayakan)</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($nilai_vektor_v)):?>
						<?php $no = 1;foreach($nilai_vektor_v as $key => $val):?>
						<tr>
							<td class="align-middle text-center">
								<span class="text-secondary"><?= $no++;?></span>
							</td>
							<td class="align-middle">
								<span class="text-secondary font-weight-bold"><?= $val->nama;?></span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary font-weight-bold"><?= $val->vektor_hasil_rumus;?></span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary font-weight-bold"><?= $val->vektor_hasil;?></span>
							</td>
							<td class="align-middle text-center">
								<span class="text-secondary font-weight-bold"><?= $val->peringkat;?></span>
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


