<!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Layanan Mandiri dan Surat</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets-guest/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets-guest/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('assets-guest/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('assets-guest/images//fevicon.png')}}" type="image/gif" />
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Sen:400,700,800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('assets-guest/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/{{asset('assets-guest/css/font-awesome.css')}}">

      {{-- about css --}}
      <style>
        /* ========== ABOUT SECTION ========== */
.about-section {
    background-color: #f8f9fa; /* abu muda lembut, netral di tengah */
    padding: 100px 0;
    text-align: center;
    position: relative;
}

/* Judul "ABOUT US" */
.about-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #0b2545; /* biru tua senada dengan header */
    margin-bottom: 30px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

/* Kotak teks deskripsi */
.about-box {
    max-width: 800px;
    margin: 0 auto;
    background: #ffffff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.about-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

/* Paragraf dalam kotak */
.about-box p {
    color: #333;
    font-size: 1.1rem;
    line-height: 1.8;
}

/* Tambahan dekorasi gradasi lembut di atas section */
.about-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 150px;
    background: linear-gradient(180deg, rgba(255, 0, 102, 0.2), transparent);
    z-index: 0;
}

/* Responsif */
@media (max-width: 768px) {
    .about-title {
        font-size: 2rem;
    }

    .about-box {
        padding: 30px 20px;
    }
}

.banner-section {
        background: linear-gradient(90deg, var(--navy), var(--red));
        color: #ffffffff;
        padding: 30px 0;
        text-align: center;
        font-weight: 700; /* Dibuat lebih tebal */
        font-size: 1.8rem; /* Dibuat lebih besar */
        letter-spacing: 0.8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4); /* Bayangan lebih dramatis */
    }

    /* === Warna utama === */
    :root {
        --navy: #ffffffff; /* Biru tua */
        --red: #b30000;
        --light-gray: #f5f6fa;
        --accent-navy: #003366; /* Navy yang sedikit lebih terang untuk hover */
    }

    /* Latar belakang halaman utama */
    body {
        background-color: var(--navy);
    }

    /* === Card container (Menggantikan .form-card) === */
    .form-card {
        background: #fff;
        border-radius: 18px;
        padding: 0; /* Padding dipindahkan ke form-body */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        margin: 60px auto 100px auto; /* Margin untuk memposisikan di tengah */
        max-width: 600px; /* Batasi lebar container */
        overflow: hidden; /* Memastikan header yang bulat terlihat baik */
        border: 2px solid var(--navy);
    }

    /* === Form Header === */
    .form-header {
        background: linear-gradient(135deg, var(--navy), var(--accent-navy));
        color: #fff;
        padding: 20px 30px;
        font-weight: 700;
        font-size: 1.5rem;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* === Form Body === */
    .form-body {
        padding: 30px;
    }

    /* === Label & Input === */
    label {
        font-weight: 700;
        color: var(--accent-navy);
        margin-bottom: 5px;
        display: block;
    }

    .form-control,
    .form-label,
    .form-select {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    /* Interaktif: Menggunakan warna Navy saat focus */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--navy);
        box-shadow: 0 0 0 0.25rem rgba(0, 31, 63, 0.2);
        background-color: var(--light-gray);
    }

    /* === Tombol Kustom === */
    /* Tombol Simpan (Merah) */
    .btn-submit-custom {
        background: var(--red);
        color: #fff;
    }
    .btn-submit-custom:hover {
        background: #d90404;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(179, 0, 0, 0.4);
    }

    /* Tombol Kembali (Navy) */
    .btn-back-custom {
        background: var(--navy);
        color: #5d79c5ff;
    }
    .btn-back-custom:hover {
        background: var(--accent-navy);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 31, 63, 0.4);
    }

    /* Kelas dasar untuk semua tombol kustom */
    .btn-custom-base {
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
    }

     /* === Warna utama === */
    :root {
        --navy: #ffffffff; /* Biru tua */
        --red: #b30000;
        --light-gray: #f5f6fa;
        --accent-navy: #003366; /* Navy yang sedikit lebih terang untuk hover */
    }

    /* UBAH: Gunakan warna navy untuk latar belakang utama */
    body {
        background-color: var(--navy); /* Menggunakan warna navy (biru tua) */
    }

    /* === Banner utama === */
    .banner-section {
        background: linear-gradient(90deg, var(--navy), var(--red));
        color: #ffffffff;
        padding: 30px 0;
        text-align: center;
        font-weight: 700; /* Dibuat lebih tebal */
        font-size: 1.8rem; /* Dibuat lebih besar */
        letter-spacing: 0.8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4); /* Bayangan lebih dramatis */
    }
    .banner-section p {
        font-size: 1rem !important;
        font-weight: 300;
        opacity: 0.95;
    }

    /* === Card container === */
    .form-container {
        background: #fff;
        border-radius: 18px; /* Lebih bulat */
        padding: 40px; /* Padding lebih besar */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Bayangan lebih menonjol */
        margin-top: -60px; /* Diangkat lebih tinggi ke banner */
        margin-bottom: 70px;
        animation: fadeInUp 0.8s ease;
        max-width: 850px; /* Lebar sedikit lebih besar */
        margin-left: auto;
        margin-right: auto;
        border: 3px solid var(--navy); /* Tambahkan outline navy */
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* === Label & Input === */
    label {
        font-weight: 700; /* Label lebih tebal */
        color: var(--accent-navy); /* Warna label menjadi navy yang sedikit lebih terang */
        margin-bottom: 8px;
        display: block;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #ddd;
        padding: 12px 15px; /* Padding lebih besar */
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Sedikit bayangan pada input */
    }

    /* Interaktif: Menggunakan warna Navy saat focus */
    .form-control:focus,
    .form-select:focus {
        border-color: var(--navy); /* Border saat fokus menjadi Navy */
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25); /* Glow shadow Navy */
        background-color: var(--light-gray);
    }

    /* === Tombol === */
    .btn-primary-custom,
    .btn-secondary-custom {
        border: none;
        border-radius: 10px;
        font-weight: 600; /* Lebih tebal */
        padding: 12px 30px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex; /* Agar ikon dan teks sejajar */
        align-items: center;
        justify-content: center;
        gap: 8px; /* Jarak antara ikon dan teks */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-transform: uppercase; /* Teks tombol menjadi huruf kapital */
    }

    .btn-primary-custom {
        background: var(--red);
        color: #fff;
    }

    /* Interaktif: Hover Primary Button */
    .btn-primary-custom:hover {
        background: #d90404;
        transform: translateY(-2px); /* Efek sedikit terangkat */
        box-shadow: 0 6px 12px rgba(179, 0, 0, 0.4);
    }

    .btn-secondary-custom {
         background: var(--navy);
        color: #5d79c5ff;
    }

    /* Interaktif: Hover Secondary Button */
    .btn-secondary-custom:hover {
        background: var(--accent-navy); /* Navy yang sedikit lebih terang */
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 31, 63, 0.4);
    }
    /* css dashboard */
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    /* ===== NAVBAR ===== */
    .navbar {
        background-color: #0a1931;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        padding: 10px 0;
        transition: all 0.3s ease;
    }

    .navbar-brand {
        color: #fff;
        font-size: 1.25rem;
        letter-spacing: 0.5px;
    }

    .navbar-brand span {
        color: #ff4c4c;
        font-weight: 600;
    }

    .navbar-nav .nav-link {
        color: #fff;
        font-weight: 500;
        margin-left: 20px;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #ff4c4c !important;
    }

    /* ===== BANNER ===== */
    .banner_section {
        background: linear-gradient(135deg, #ffffffff 60%, #c82333);
        color: #fff;
        margin-top: 70px;
        width: 100%;
        overflow-x: hidden;
    }

    .banner_title {
        font-weight: 700;
        font-size: 2.5rem;
        line-height: 1.3;
        margin-bottom: 15px;
    }

    .banner_subtitle {
        font-size: 1.1rem;
        margin-bottom: 25px;
    }

    .btn-banner {
        background-color: #ff4c4c;
        color: #fff;
        padding: 10px 22px;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .btn-banner:hover {
        background-color: #fff;
        color: #0a1931;
    }

    .carousel-control-prev span,
    .carousel-control-next span {
        font-size: 2rem;
        color: #fff;
    }
            body {
            background-color: #f3f6fa;
            font-family: 'Poppins', sans-serif;
            color: #0d1b2a;
        }

        /* --- Banner Section Styling --- */
        .banner-section {
            background-color: #001f3f;
            color: white;
            padding: 40px 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .banner-section h2 {
            font-weight: 700;
            margin-bottom: 5px;
            color: #fff;
            text-align: center;
        }

        .banner-section p {
            text-align: center;
        }

        /* --- Form Card Styling --- */
        .form-card {
            max-width: 900px;
            margin: 0 auto 50px auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #fff;
        }

        .form-header {
            background-color: #ff4c4c;
            color: white;
            font-weight: 600;
            padding: 15px 25px;
            font-size: 1.1rem;
            border-bottom: 3px solid #001f3f;
        }

        .form-body {
            padding: 30px 25px;
        }

        /* --- Input and Label Styling --- */
        label {
            font-weight: 500;
            color: #001f3f;
            margin-bottom: 5px;
            display: block;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #ff4c4c;
            box-shadow: 0 0 0 0.25rem rgba(255, 76, 76, 0.25);
        }

        .invalid-feedback {
            font-size: 0.85rem;
            font-style: italic;
        }

        /* --- Custom Button Styling --- */
        .btn-custom-base {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
        }

        .btn-submit-custom {
            background-color: #ff4c4c;
            color: white;
            border: none;
            box-shadow: 0 4px 10px rgba(255, 76, 76, 0.4);
        }

        .btn-submit-custom:hover {
            background-color: #e63946;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 76, 76, 0.5);
            color: white;
        }

        .btn-back-custom {
            background-color: #001f3f;
            color: white;
            border: none;
        }

        .btn-back-custom:hover {
            background-color: #002b5c;
            transform: translateY(-2px);
            color: white;
        }
      </style>
