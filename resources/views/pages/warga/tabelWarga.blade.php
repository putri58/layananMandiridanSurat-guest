@extends('layouts.guest.app')
    @section('content')

<div class="container card-container">
   <h2>Daftar Data Warga</h2>
<div class="table-responsive">
      <form method="GET" action="{{ route('warga.index') }}" onchange="this.form.submit()" class="mb-3">
          <div class="row">
              <div class="col-md-4">
                  <select name="gender" class="form-select">
                      <option value="">All Genders</option>
                      <option value="Male" {{ request('gender')=='Male' ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ request('gender')=='Female' ? 'selected' : '' }}>Female</option>
                  </select>
              </div>
          </div>
      </form>
   @if($warga->isEmpty())
      <p class="no-data">Belum ada data warga.</p>
   @else

   <div class="row g-4">
      @foreach($warga as $item)
      <div class="col-md-4 col-sm-6 fade-in">
         <div class="card">

            <h5>{{ $item->nama }}</h5>
            <p class="text-muted">{{ $item->pekerjaan }}</p>

            <div>
               <span class="badge">KTP: {{ $item->no_ktp }}</span>
               <span class="badge">{{ $item->gender }}</span>
               <span class="badge">{{ $item->agama }}</span>
               <span class="badge">Telp: {{ $item->phone }}</span>
            </div>

         </div>
      </div>
      @endforeach
   </div>

   <div class="mt-3">
        {{ $warga->links('pagination::bootstrap-5') }}
   </div>

   @endif

   <div class="text-end mt-4">
      <a href="{{ route('warga.create') }}" class="btn btn-primary">+ Tambah Warga</a>
      <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
   </div>

</div>

@endsection
