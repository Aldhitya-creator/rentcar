@extends('admin.layout')
  
@section('content')
   
   
 <!-- Main content -->
 <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
                <a href="{{ route('admin.cars.index')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group row border-bottom pb-4">
                        <label for="nama_mobil" class="col-sm-2 col-form-label">Nama Mobil<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('nama_mobil') is-invalid @enderror" name="nama_mobil" value="{{ old('nama_mobil') }}" id="nama_mobil">
                          @error('nama_mobil')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>
                   <div class="form-group row border-bottom pb-4">
                        <label for="type_id" class="col-sm-2 col-form-label">Tipe Mobil<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                                @foreach($types as $type)
                                    <option {{ old('type') == $type->id ? 'selected' : null }} value="{{ $type->id }}">{{ $type->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="price" class="col-sm-2 col-form-label">Harga Sewa<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" id="price">
                          @error('price')
                              <div class="invalid-tooltip">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="pintu" class="col-sm-2 col-form-label">Jumlah Pintu</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="pintu" value="{{ old('pintu') }}" id="pintu">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="penumpang" class="col-sm-2 col-form-label">Jumlah Penumpang<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control @error('penumpang') is-invalid @enderror" name="penumpang" value="{{ old('penumpang') }}" id="penumpang">
                          @error('penumpang')
                              <div class="invalid-tooltip">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="image" class="col-sm-2 col-form-label">Gambar Mobil<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="description" class="col-sm-2 col-form-label">Description<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="6">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                           @enderror
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status<span class="text-danger">*</span></label></label>
                        <div class="col-sm-10">
                            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                @foreach($statuses as $no => $status)
                                <option {{ old('status') == $no ? 'selected' : null }} value="{{ $no }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection