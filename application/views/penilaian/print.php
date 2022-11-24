<style>
	@media print {
		body {
			zoom: 80%;
			background-color: white;
		}
	}

</style>

<div class="row p-3">
	<div class="col-xl-12 mb-4">
		<div style="border-radius: 0;">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai Akhir Perhitungan
				</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0">
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


<script>
	$(document).ready(function () {
		window.print();
	})

</script>
