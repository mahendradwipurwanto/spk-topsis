<div class="row">
	<div class="col-xl-12 mb-4">
		<div class="card">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Data sample</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0" id="myTable">
					<thead>
						<tr>
							<th width="10%"
								class="text-uppercase text-left px-2 text-secondary text-xs font-weight-bolder opacity-7">
								No</th>
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
				</table>
			</div>
		</div>
	</div>
</div>
