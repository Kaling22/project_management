@extends ('Partials.main')
@section('container')
<div class="col-xl">
    <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Data Project</h5>
    </div>
    <div class="card-body">
        <form action="{{route('dataProject.update', $proyek->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Project</label>
            <input type="text" class="form-control" name="name" value="{{$proyek->name}}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="text" class="form-control" name="start_date" id="start_date" placeholder="MM/DD/YYYY" value="{{$proyek->start_date}}" required/>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="text" class="form-control" name="finish_date" id="finish_date" placeholder="MM/DD/YYYY" value="{{$proyek->finish_date}}" required/>
        </div>
        <div class="mb-3">    
            <label for="defaultSelect" class="form-label">Status</label>
            <select id="defaultSelect" class="form-select" name="status">
                <option value="{{$proyek->status}}">{{$sts}}</option>
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