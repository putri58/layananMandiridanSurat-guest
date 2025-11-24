    @extends('layouts.guest.app')
    @section('content')

   <div class="container card-container">
      <h2>Daftar Data User</h2>
<form method="GET">
    <select name="email_domain" class="form-select">
        <option value="">-- Filter Email --</option>
        <option value="gmail.com">gmail.com</option>
        <option value="yahoo.com">yahoo.com</option>
        <option value="outlook.com">outlook.com</option>
    </select>
   <div class="col-md-3">
                <input type="text" name="search" placeholder="Cari...."
                       value="{{ request('search') }}" class="form-control">
                       <button type="submit" class="btn btn-primary mt-2">Filter</button>
            </div>
</form>

      @if($user->isEmpty())
         <p class="no-data">Belum ada data user.</p>
      @else
      <div class="row g-4">
         @foreach($user as $item)
         <div class="col-md-4 col-sm-6 fade-in">
            <div class="card">
               <a href="{{ route('user.edit', $item->id) }}"
   class="btn btn-warning btn-sm">
    Edit
</a>

               <div>
                  <span class="badge">{{ $item->name }}</span>
                  <span class="badge">{{ $item->email }}</span>
                  <span class="badge">{{ $item->password }}</span>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="mt-3">
        {{ $user->links('pagination::bootstrap-5') }}
   </div>
      @endif

      <div class="text-end mt-4">
         {{-- <a href="{{ route('warga.create') }}" class="btn btn-primary">+ Tambah user</a> --}}
         <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
          <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah User</a>
      </div>
   </div>

   <!-- Bootstrap JS -->
   <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
@endsection
