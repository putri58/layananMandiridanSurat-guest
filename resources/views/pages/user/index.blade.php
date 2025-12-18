@extends('layouts.guest.app')

@section('content')

<div class="py-4">
    <div class="d-flex justify-content-between flex-wrap">
        <div>
            <h1 class="h4">Tambah Berkas</h1>
            <p class="mb-0">Unggah berkas permohonan surat</p>
        </div>
        <div>
            <a href="{{ route('permohonan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="fas fa-file-upload me-2"></i> Form Tambah Berkas
                </h6>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- PERMOHONAN --}}
                    <div class="mb-3">
                        <label class="form-label">Permohonan Surat</label>
                        <input type="hidden" name="permohonan_surat_id" id="permohonan_id" required>

                        <div class="filter-select" id="permohonanSelect">
                            <div class="filter-box">
                                <span id="selectedText">-- Pilih Permohonan --</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>

                            <div class="filter-dropdown">
                                <input type="text" class="filter-input" placeholder="Cari permohonan...">

                                <div class="filter-list">
                                    @foreach ($permohonans as $p)
                                        <div class="filter-item"
                                            data-id="{{ $p->id }}">
                                            <strong>PM{{ str_pad($p->id, 4, '0', STR_PAD_LEFT) }}</strong><br>
                                            <small class="text-muted">
                                                {{ $p->warga->nama_lengkap ?? '-' }}
                                            </small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- NAMA BERKAS --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Berkas</label>
                        <input type="text" name="nama_berkas" class="form-control"
                            placeholder="Contoh: KTP, KK, Surat Domisili" required>
                    </div>

                    {{-- FILE --}}
                    <div class="mb-3">
                        <label class="form-label">Upload File</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('permohonan.index') }}" class="btn btn-outline-secondary">
                            Batal
                        </a>
                        <button class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- CSS --}}
<style>
.filter-select {
    position: relative;
}

.filter-box {
    border: 1px solid #ced4da;
    border-radius: 6px;
    padding: 10px 12px;
    background: #fff;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.filter-dropdown {
    position: absolute;
    top: 110%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #ced4da;
    border-radius: 6px;
    display: none;
    z-index: 9999;
}

.filter-select.open .filter-dropdown {
    display: block;
}

.filter-input {
    width: 100%;
    border: none;
    border-bottom: 1px solid #dee2e6;
    padding: 8px 10px;
    outline: none;
}

.filter-list {
    max-height: 220px;
    overflow-y: auto;
}

.filter-item {
    padding: 10px 12px;
    cursor: pointer;
}

.filter-item:hover {
    background: #f1f3f5;
}
</style>

{{-- JS --}}
<script>
const select = document.getElementById('permohonanSelect');
const box = select.querySelector('.filter-box');
const text = document.getElementById('selectedText');
const hidden = document.getElementById('permohonan_id');
const input = select.querySelector('.filter-input');
const items = select.querySelectorAll('.filter-item');

box.onclick = () => {
    select.classList.toggle('open');
    input.focus();
};

items.forEach(item => {
    item.onclick = () => {
        text.innerHTML = item.innerHTML;
        hidden.value = item.dataset.id;
        select.classList.remove('open');
        input.value = '';
        items.forEach(i => i.style.display = 'block');
    };
});

input.onkeyup = () => {
    const val = input.value.toLowerCase();
    items.forEach(i => {
        i.style.display = i.textContent.toLowerCase().includes(val)
            ? 'block'
            : 'none';
    });
};

document.addEventListener('click', e => {
    if (!select.contains(e.target)) {
        select.classList.remove('open');
    }
});
</script>

@endsection
