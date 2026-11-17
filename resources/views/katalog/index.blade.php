@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
    {{-- VERSI ANTI-GAGAL: CSS tertanam langsung, tidak butuh file kasir.css --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap">

    <style>
/* ==========================================
   KATALOG PRODUK - TEMA "LUXURY DARK GOLD"
   Terpasang langsung di index.blade.php (tanpa file eksternal)
   Dipakai di: resources/views/katalog/index.blade.php
   ========================================== */
* { margin: 0; padding: 0; box-sizing: border-box; }

:root {
    --bg:        #0a0a0f;
    --panel:     #14141c;
    --panel-2:   #1a1a26;
    --gold:      #d4af37;
    --gold-light:#f4e2a4;
    --gold-deep: #8f6b14;
    --text:      #f3f0e8;
    --muted:     #a09bb0;
    --line:      rgba(212, 175, 55, .22);
    --green:     #4ade80;
    --red:       #fb7185;
}

::selection { background: rgba(212,175,55,.35); color:#fff; }

body {
    font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    color: var(--text);
    min-height: 100vh;
    padding: 52px 20px 70px;
    background:
        radial-gradient(900px 480px at 85% -10%, rgba(212,175,55,.14), transparent 60%),
        radial-gradient(700px 420px at -10% 110%, rgba(212,175,55,.09), transparent 55%),
        var(--bg);
}

.wrap { max-width: 1060px; margin: 0 auto; }

/* ---------- HEADER ---------- */
.hero { text-align: center; margin-bottom: 42px; animation: fadeUp .7s ease backwards; }

.monogram {
    width: 76px; height: 76px;
    margin: 0 auto 20px;
    display: grid; place-items: center;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--gold-light), var(--gold) 45%, var(--gold-deep));
    box-shadow: 0 0 0 3px rgba(212,175,55,.25), 0 14px 34px rgba(212,175,55,.35);
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 28px; font-weight: 800; color: #1c1503;
}

.eyebrow {
    display: flex; align-items: center; justify-content: center; gap: 14px;
    margin-bottom: 14px;
    font-size: 11px; font-weight: 800;
    letter-spacing: .42em; text-indent: .42em;
    text-transform: uppercase; color: var(--gold);
}
.eyebrow::before, .eyebrow::after {
    content: ""; width: 58px; height: 1px;
}
.eyebrow::before { background: linear-gradient(90deg, transparent, var(--gold)); }
.eyebrow::after  { background: linear-gradient(90deg, var(--gold), transparent); }

.hero h1 {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(36px, 5vw, 54px);
    font-weight: 700; line-height: 1.1;
}
.hero h1 span {
    background: linear-gradient(120deg, var(--gold-light) 10%, var(--gold) 55%, var(--gold-deep) 95%);
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent; color: var(--gold);
}
.hero-sub { margin-top: 12px; color: var(--muted); font-size: 15px; }

.divider { display: flex; align-items: center; justify-content: center; gap: 12px; margin-top: 22px; }
.divider span { width: 92px; height: 1px; }
.divider span:first-child { background: linear-gradient(90deg, transparent, rgba(212,175,55,.7)); }
.divider span:last-child  { background: linear-gradient(90deg, rgba(212,175,55,.7), transparent); }
.divider i {
    width: 8px; height: 8px; transform: rotate(45deg);
    background: var(--gold); box-shadow: 0 0 12px rgba(212,175,55,.8);
}

/* ---------- PENCARIAN ---------- */
.search {
    display: flex; gap: 12px;
    max-width: 560px; margin: 0 auto 48px;
    animation: fadeUp .7s .12s ease backwards;
}
.search input {
    flex: 1; min-width: 0;
    padding: 15px 22px;
    border-radius: 999px;
    background: rgba(255,255,255,.045);
    border: 1px solid rgba(212,175,55,.28);
    color: var(--text); font-size: 15px; font-family: inherit;
    outline: none;
    transition: border-color .3s, box-shadow .3s, background .3s;
}
.search input::placeholder { color: #6f6a7e; }
.search input:focus {
    border-color: var(--gold);
    background: rgba(255,255,255,.06);
    box-shadow: 0 0 0 4px rgba(212,175,55,.12);
}
.search button {
    padding: 15px 34px; border: none; border-radius: 999px; cursor: pointer;
    font-family: inherit; font-weight: 800; font-size: 13px;
    letter-spacing: .1em; text-transform: uppercase; color: #1c1503;
    background: linear-gradient(135deg, var(--gold-light), var(--gold) 50%, var(--gold-deep));
    box-shadow: 0 8px 24px rgba(212,175,55,.3);
    transition: transform .25s, box-shadow .25s, filter .25s;
}
.search button:hover  { transform: translateY(-2px); filter: brightness(1.08); box-shadow: 0 12px 30px rgba(212,175,55,.45); }
.search button:active { transform: translateY(0); }

/* ---------- GRID & KARTU PRODUK ---------- */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
    gap: 26px;
}
.card {
    position: relative;
    padding: 24px;
    border-radius: 22px;
    background: linear-gradient(165deg, var(--panel-2), var(--panel) 70%);
    border: 1px solid var(--line);
    overflow: hidden;
    transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
    animation: fadeUp .7s ease backwards;
}
.card:nth-child(2) { animation-delay: .08s; }
.card:nth-child(3) { animation-delay: .16s; }
.card:nth-child(4) { animation-delay: .24s; }
.card:nth-child(5) { animation-delay: .32s; }
.card:nth-child(6) { animation-delay: .40s; }

.card::before {
    content: ""; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, transparent, var(--gold), transparent);
    opacity: .55; transition: opacity .35s;
}
.card::after {
    content: ""; position: absolute; inset: 0; pointer-events: none;
    background: radial-gradient(420px 190px at 50% -20%, rgba(212,175,55,.14), transparent 70%);
    opacity: 0; transition: opacity .4s;
}
.card:hover {
    transform: translateY(-8px);
    border-color: rgba(212,175,55,.6);
    box-shadow: 0 22px 44px rgba(0,0,0,.55), 0 0 30px rgba(212,175,55,.15);
}
.card:hover::before, .card:hover::after { opacity: 1; }

.card-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }

.badge {
    font-size: 10px; font-weight: 800;
    letter-spacing: .18em; text-transform: uppercase;
    color: var(--gold-light);
    padding: 6px 12px; border-radius: 999px;
    border: 1px solid rgba(212,175,55,.4);
    background: rgba(212,175,55,.08);
}

.stok { display: inline-flex; align-items: center; gap: 7px; font-size: 12px; font-weight: 700; }
.stok::before {
    content: ""; width: 8px; height: 8px; border-radius: 50%;
    background: currentColor; box-shadow: 0 0 10px currentColor;
}
.stok.ada   { color: var(--green); }
.stok.habis { color: var(--red); }
.stok.ada::before { animation: pulse 1.6s infinite; }

.avatar {
    width: 56px; height: 56px; margin-bottom: 16px;
    display: grid; place-items: center; border-radius: 16px;
    background: linear-gradient(135deg, var(--gold-light), var(--gold) 55%, var(--gold-deep));
    box-shadow: 0 10px 24px rgba(212,175,55,.3);
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 24px; font-weight: 800; color: #1c1503;
}

.nama { font-size: 20px; font-weight: 700; margin-bottom: 20px; }

.card-foot {
    display: flex; justify-content: space-between; align-items: flex-end;
    margin-top: 20px; padding-top: 18px;
    border-top: 1px dashed rgba(212,175,55,.28);
}
.harga { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; }
.harga small {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; font-weight: 800; color: var(--gold);
    margin-right: 7px; vertical-align: 2px;
}
.harga b {
    background: linear-gradient(120deg, var(--gold-light), var(--gold) 60%, var(--gold-deep));
    -webkit-background-clip: text; background-clip: text;
    -webkit-text-fill-color: transparent;
}

.empty {
    grid-column: 1 / -1;
    padding: 60px 20px; text-align: center;
    border: 1px dashed rgba(212,175,55,.35); border-radius: 22px;
    color: var(--muted);
}

.foot { margin-top: 46px; text-align: center; color: #6f6a7e; font-size: 12.5px; letter-spacing: .04em; }
.foot b { color: var(--gold); }

/* ---------- NAVIGASI & ELEMEN DARI LAYOUT (layouts.app) ----------
   Supaya link menu dan pemisah dari layout ikut serasi dengan tema */
body > a,
nav a {
    color: var(--gold-light);
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}
body > a:hover,
nav a:hover { color: #ffffff; }

hr {
    border: none;
    border-top: 1px solid rgba(212, 175, 55, .25);
    margin: 10px 0 0;
}

/* ---------- ANIMASI & LAIN-LAIN ---------- */
@keyframes fadeUp { from { opacity: 0; transform: translateY(22px); } to { opacity: 1; transform: translateY(0); } }
@keyframes pulse  { 0%, 100% { opacity: 1; } 50% { opacity: .35; } }

::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: var(--bg); }
::-webkit-scrollbar-thumb { background: #2a2a36; border-radius: 99px; border: 2px solid var(--bg); }
::-webkit-scrollbar-thumb:hover { background: var(--gold-deep); }

@media (max-width: 560px) {
    body { padding: 38px 16px 56px; }
    .search { flex-direction: column; }
    .search button { width: 100%; }
    .eyebrow::before, .eyebrow::after { width: 34px; }
}
    </style>

    <div class="wrap">

        <!-- HEADER -->
        <header class="hero">
            <div class="monogram">KE</div>
            <p class="eyebrow">Kasir Ende</p>
            <h1>Katalog <span>Produk</span></h1>
            <p class="hero-sub">Harga dan stok toko</p>
            <div class="divider"><span></span><i></i><span></span></div>
        </header>

        <!-- PENCARIAN (param "q" sesuai controller-mu) -->
        <form class="search" method="GET" action="{{ route('katalog.index') }}">
            <input type="text" id="q" name="q" placeholder="Cari nama produk..." aria-label="Nama produk" value="{{ $q ?? '' }}">
            <button type="submit">Cari</button>
        </form>

        <!-- DAFTAR PRODUK -->
        <section class="grid">
            @forelse ($produk as $item)
                <article class="card">
                    <div class="card-head">
                        <span class="badge">{{ $item['kategori'] }}</span>
                        @if ($item['stok'] > 0)
                            <span class="stok ada">Stok {{ $item['stok'] }}</span>
                        @else
                            <span class="stok habis">Habis</span>
                        @endif
                    </div>

                    <div class="avatar">{{ strtoupper(substr($item['nama'], 0, 1)) }}</div>
                    <h3 class="nama">{{ $item['nama'] }}</h3>

                    <div class="card-foot">
                        <p class="harga"><small>Rp</small><b>{{ number_format($item['harga'], 0, ',', '.') }}</b></p>
                    </div>
                </article>
            @empty
                <div class="empty">Produk tidak ditemukan.</div>
            @endforelse
        </section>

        <!-- FOOTER -->
        <footer class="foot">
            Harga dan stok dapat berubah sewaktu-waktu &mdash; <b>Kasir Ende</b>
        </footer>
    </div>
@endsection