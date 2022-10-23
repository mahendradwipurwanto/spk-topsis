<style>
	@media print {
		body {
			zoom: 80%;
		}
	}

</style>

<div class="row p-3">
	<div class="col-xl-12 mb-4">
		<div class="card" style="border-radius: 0;">
			<div class="card-header pb-0">
				<h5 class="card-title-header">Nilai Akhir Perhitungan
				</h5>
			</div>
			<div class="card-body pt-0">
				<table class="table table-bordered table-hover align-items-center w-100 mb-0">
					<thead>
						<tr>
							<th width="10%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								Peringkat</th>
							<th width="10%"
								class="text-uppercase text-secondary text-left px-2 text-xs font-weight-bolder opacity-7">
								Penduduk</th>
							<th width="40%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								Perhitungan</th>
							<th width="40%"
								class="text-uppercase text-secondary text-center px-2 text-xs font-weight-bolder opacity-7">
								Nilai (V)</th>
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
