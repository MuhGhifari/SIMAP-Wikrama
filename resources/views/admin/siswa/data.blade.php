<table class="table table-sm table-hover">
	<thead>
		<tr>
			<th scope="col" class="text-center">#</th>
			<th scope="col">NIS</th>
			<th scope="col">Nama</th>
			<th scope="col" class="text-center">Rayon</th>
			<th scope="col">Rombel</th>
			<th scope="col">Tempat Tanggal Lahir</th>
			<th scope="col" class="text-center">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $index = 1;?>
		@foreach($siswa as $key => $s)
		<tr>
			<th class="align-middle text-center" scope="row">{{ $key + $siswa->firstItem() }}</th>
			<td class="align-middle">{{ $s->nis }}</td>
			<td class="align-middle">{{ $s->nama }}</td>
			<td class="align-middle text-center">{{ $s->rayon }}</td>
			<td class="align-middle">{{ $s->rombel }}</td>
			<td class="align-middle">{{ $s->tempat_lahir }}, {{ formatTanggal($s->tanggal_lahir) }}</td>
			<td class="text-center">
				<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-eye"></i></a>
				<a href="#" class="btn btn-sm btn-warning" style="color: white;"><i class="fa fa-sm fa-edit"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-sm fa-trash"></i></a>
			</td>
		</tr>
		<?php $index++;?>
		@endforeach
	</tbody>
</table>
{!! $siswa->render() !!}