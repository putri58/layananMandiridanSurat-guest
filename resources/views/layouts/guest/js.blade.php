<script src="{{ asset('assets-guest/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/popper.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/plugin.js') }}"></script>
<!-- sidebar -->
<script src="{{ asset('assets-guest/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets-guest/js/custom.js') }}"></script>
<!-- end sidebar -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const select = document.getElementById('permohonanSelect');
    const toggle = document.getElementById('permohonanToggle');
    const label  = document.getElementById('permohonanLabel');
    const hidden = document.getElementById('permohonan_surat_id');
    const input  = select.querySelector('.filter-input');
    const items  = select.querySelectorAll('.filter-option');

    toggle.addEventListener('click', () => {
        select.classList.toggle('open');
        input.focus();
    });

    items.forEach(item => {
        item.addEventListener('click', () => {
            label.textContent = item.textContent;
            hidden.value = item.dataset.id;
            select.classList.remove('open');
        });
    });

    input.addEventListener('keyup', () => {
        const keyword = input.value.toLowerCase();
        items.forEach(item => {
            item.style.display = item.textContent.toLowerCase().includes(keyword)
                ? 'block'
                : 'none';
        });
    });

    document.addEventListener('click', e => {
        if (!select.contains(e.target)) {
            select.classList.remove('open');
        }
    });

});
</script>
