@extends('admin.layout')
 
@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">CARS</h3>
                <a href="{{ route('admin.cars.create')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-plus"></i> Tambah </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gambar Mobil</th>
                        <th>Type Mobil</th>
                        <th>Harga Sewa</th>
                        <th>Jumlah Penumpang</th>
                        <th>Jumlah Pintu</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $car->nama_mobil }}</td>
                                <td>
                                  <a target="_blank" href="{{ Storage::url($car->image) }}">
                                      <img width="80" src="{{ Storage::url($car->image) }}" alt="">
                                  </a>
                                </td>
                                <td>
                                    <span>
                                        {{ $car->type->nama }}
                                    </span>
                                </td>
                                <td>Rp{{ number_format($car->price, 0,",",".") }}</td>
                                <td>{{ $car->penumpang }}</td>
                                <td>{{ $car->pintu }}</td>
                                <td>{{ $car->statusLabel() }}</td>
                                <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-outline-primary">
                                    <img width="40" height="40" src="https://img.icons8.com/clouds/40/edit.png" alt="edit"/>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.cars.destroy', $car) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">
                                        <img width="40" height="40" src="https://img.icons8.com/clouds/40/trash.png" alt="trash"/>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Kosong !</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
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
