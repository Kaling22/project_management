@extends ('Partials.main')
@section('container')
<div class="col-xl">
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Project Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{route('dataProject.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Project</label>
            <input type="text" class="form-control" name="name" required/>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="text" class="form-control" name="start_date" id="start_date" placeholder="DD/MM/YYYY" required/>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="text" class="form-control" name="finish_date" id="finish_date" placeholder="DD/MM/YYYY" required/>
        </div>
        <div class="mb-3">
            <label for="defaultSelect" class="form-label" required>Status</label>
            <select id="defaultSelect" class="form-select" name="status" required>
                <option value="1">Pending</option>
                <option value="2">Progress</option>
                <option value="3">Finished</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    </div>
    </div>
@endsection