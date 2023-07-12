@extends ('Partials.main')
@section('container')
<!-- Content -->

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="card-header">Tabel Data Project</h5>
    <a href="{{route('dataProject.create')}}" type="button" class="btn btn-primary" >
      Tambah Data Mahasiswa
    </a>
  </div>
  
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $index = 1; ?>
      @foreach ($proyek as $item)
        <tr>
          <td> <strong>{{$index++}}</strong></td>
          <td>{{$item->name}}</td>
          <td>{{$item->start_date}}</td>
          <td>{{$item->finish_date}}</td>
          <td>{{$sts[$loop->index]}}</td>
          <td>
            <a href="{{ route('dataProject.edit', $item->id) }}"
            class="btn btn-sm btn-secondary">Edit</a>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
            action="{{ route('dataProject.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection