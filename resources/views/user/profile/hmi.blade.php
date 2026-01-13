@extends('user.layouts.app')

@section('title', 'Profil HMI Komisariat Fitrah')

@section('content')
{{-- HERO --}}
<section class="relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-green-100 py-20">
    {{-- Decorative blobs --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-44 -right-44 h-96 w-96 rounded-full bg-gradient-to-br from-primary/20 to-secondary/20 blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-44 -left-44 h-96 w-96 rounded-full bg-gradient-to-tr from-secondary/20 to-primary/20 blur-3xl animate-bounce-slow"></div>

        <div class="absolute top-16 left-10 text-4xl opacity-70 animate-bounce">🏛️</div>
        <div class="absolute top-36 right-20 text-3xl opacity-70 animate-wiggle">📖</div>
        <div class="absolute bottom-24 left-24 text-3xl opacity-70 animate-pulse">🌱</div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-green-200 bg-white/70 px-4 py-2 text-sm text-gray-700 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-primary"></span>
                Sejarah • Profil • Visi & Misi
            </div>

            <h1 class="mt-6 font-heading text-4xl font-extrabold leading-tight text-dark sm:text-5xl lg:text-6xl">
                <span class="gradient-text">HMI Komisariat Fitrah</span>
                <br class="hidden sm:block">
                Universitas Muhammadiyah Ponorogo
            </h1>

            <p class="mt-5 text-lg leading-relaxed text-gray-600">
                Mengawal kaderisasi dan perjuangan di ranah kampus melalui penguatan nilai keislaman, keindonesiaan,
                serta kompetensi Muslim-Intelektual-Profesional.
            </p>

            <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="#sejarah"
                   class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 text-white font-semibold shadow-lg shadow-primary/20 hover:opacity-95 transition">
                    Jelajahi Profil
                </a>
                <a href="#visi-misi"
                   class="inline-flex items-center justify-center rounded-xl border border-green-200 bg-white/70 px-6 py-3 text-dark font-semibold shadow-sm hover:bg-white transition">
                    Lihat Visi & Misi
                </a>
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-2xl border border-green-100 bg-white/70 p-5 shadow-sm">
                <div class="text-sm text-gray-500">HMI Berdiri</div>
                <div class="mt-1 text-2xl font-extrabold text-dark">5 Feb 1947</div>
                <div class="mt-2 text-sm text-gray-600">14 Rabiul Awal 1366 H</div>
            </div>

            <div class="rounded-2xl border border-green-100 bg-white/70 p-5 shadow-sm">
                <div class="text-sm text-gray-500">Komisariat Fitrah</div>
                <div class="mt-1 text-2xl font-extrabold text-dark">2001</div>
                <div class="mt-2 text-sm text-gray-600">Menuju usia ke-25</div>
            </div>

            <div class="rounded-2xl border border-green-100 bg-white/70 p-5 shadow-sm">
                <div class="text-sm text-gray-500">Fakultas Diayomi</div>
                <div class="mt-1 text-2xl font-extrabold text-dark">3</div>
                <div class="mt-2 text-sm text-gray-600">FISIP • Teknik • FAI</div>
            </div>

            <div class="rounded-2xl border border-green-100 bg-white/70 p-5 shadow-sm">
                <div class="text-sm text-gray-500">Suksesi Kepemimpinan</div>
                <div class="mt-1 text-2xl font-extrabold text-dark">20</div>
                <div class="mt-2 text-sm text-gray-600">Dinamika organisasi matang</div>
            </div>
        </div>
    </div>
</section>

{{-- CONTENT --}}
<section id="sejarah" class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-12 lg:items-start">
            {{-- Left: Timeline --}}
            <aside class="lg:col-span-4">
                <div class="sticky top-24">
                    <h2 class="text-2xl font-extrabold text-dark">Garis Waktu</h2>
                    <p class="mt-2 text-gray-600">
                        Ringkasan perjalanan HMI dan HMI Komisariat Fitrah.
                    </p>

                    <div class="mt-6 space-y-4">
                        <div class="rounded-2xl border border-green-100 bg-green-50/60 p-5">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 h-3 w-3 rounded-full bg-primary"></div>
                                <div>
                                    <div class="font-bold text-dark">1947</div>
                                    <div class="text-sm text-gray-700">
                                        HMI berdiri di Sekolah Tinggi Islam, Yogyakarta.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-green-100 bg-white p-5 shadow-sm">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 h-3 w-3 rounded-full bg-secondary"></div>
                                <div>
                                    <div class="font-bold text-dark">2001</div>
                                    <div class="text-sm text-gray-700">
                                        HMI Komisariat Fitrah UMP berdiri dan berkembang.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-green-100 bg-white p-5 shadow-sm">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 h-3 w-3 rounded-full bg-primary"></div>
                                <div>
                                    <div class="font-bold text-dark">Saat ini</div>
                                    <div class="text-sm text-gray-700">
                                        Fokus kaderisasi & inovasi sesuai kebutuhan dan minat kader.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Motto mini --}}
                    <div class="mt-6 rounded-2xl bg-gradient-to-br from-green-50 to-white border border-green-100 p-5">
                        <div class="text-sm text-gray-600">Motto</div>
                        <div class="mt-2 font-semibold text-dark">
                            Yakinkan dengan iman, usahakan dengan ilmu, dan sampaikan dengan amal.
                        </div>
                        <div class="mt-2 text-primary font-extrabold text-lg">
                            Yakin, Usaha, Sampai
                        </div>
                    </div>
                </div>
            </aside>

            {{-- Right: Main text blocks --}}
            <div class="lg:col-span-8">
                {{-- Card: Sejarah HMI --}}
                <div class="rounded-3xl border border-green-100 bg-white shadow-sm">
                    <div class="p-7 sm:p-9">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <h3 class="text-2xl font-extrabold text-dark">Sejarah HMI</h3>
                            <div class="inline-flex items-center gap-2 rounded-full bg-green-50 px-4 py-2 text-sm text-gray-700 border border-green-100">
                                <span class="h-2 w-2 rounded-full bg-primary"></span>
                                Organisasi Perjuangan (AD HMI Pasal 8)
                            </div>
                        </div>

                        <div class="mt-6 space-y-5 text-gray-700 leading-relaxed">
                            <p>
                                Himpunan Mahasiswa Islam (HMI) merupakan organisasi mahasiswa yang berdiri pada awal kemerdekaan Bangsa Indonesia,
                                tepatnya 14 Rabiul Awal 1366 Hijriyah bertepatan dengan tanggal 5 Februari 1947 Masehi di Sekolah Tinggi Islam, Yogyakarta.
                            </p>
                            <p>
                                Sejarah membuktikan bahwa HMI sebagai organisasi perjuangan (AD HMI Pasal 8) telah berjalan beriringan dengan perjuangan bangsa Indonesia.
                                Sejak awal kemerdekaan hingga saat ini dan menjadi organisasi mahasiswa tertua di Indonesia.
                            </p>
                            <p>
                                Genap usia 78 tahun berdiri, HMI telah tersebar ke seluruh Indonesia dan berkembang menjadi organisasi mahasiswa terbesar di Indonesia.
                                HMI terus mengawal perjalanan bangsa Indonesia pada semua lini, termasuk di Universitas.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Card: Profil Komisariat --}}
                <div class="mt-8 rounded-3xl border border-green-100 bg-white shadow-sm">
                    <div class="p-7 sm:p-9">
                        <h3 class="text-2xl font-extrabold text-dark">Profil HMI Komisariat Fitrah</h3>

                        <div class="mt-6 grid gap-6 lg:grid-cols-2">
                            <div class="space-y-5 text-gray-700 leading-relaxed">
                                <p>
                                    HMI Komisariat Fitrah Universitas Muhammadiyah Ponorogo berdiri sejak tahun 2001 Masehi yang dalam perjalanannya menuju usia ke 25 tahun.
                                    Secara eksplisit, 24 tahun berdirinya HMI Komisariat Fitrah dengan 20 kali suksesi kepemimpinan adalah bentuk kematangan dalam kiprah dinamika organisasi
                                    untuk memberikan responsi terhadap tantangan zaman yang terus berpacu.
                                </p>
                                <p>
                                    Saat ini HMI Komisariat Fitrah Universitas Muhammadiyah Ponorogo terus melakukan proses kaderisasi sesuai dengan fungsi HMI dalam Anggaran Dasar Pasal 9
                                    tentang fungsi HMI sebagai organisasi kader. Kader secara definitif adalah sekelompok orang yang terorganisir secara terus menerus dan akan menjadi tulang punggung
                                    bagi kelompok yang lebih besar.
                                </p>
                            </div>

                            <div class="rounded-2xl border border-green-100 bg-green-50/50 p-6">
                                <h4 class="text-lg font-extrabold text-dark">Ruang Lingkup Komisariat</h4>
                                <p class="mt-3 text-gray-700 leading-relaxed">
                                    Mengayomi 3 Fakultas yakni <span class="font-semibold">Fakultas Ilmu Sosial dan Ilmu Politik</span>,
                                    <span class="font-semibold">Fakultas Teknik</span>, dan <span class="font-semibold">Fakultas Agama Islam</span>.
                                    Ditambah program studi tiap fakultas yang mencangkup 2 hingga 5 program studi.
                                </p>

                                <div class="mt-5 space-y-3">
                                    <div class="flex items-start gap-3">
                                        <div class="mt-1 h-9 w-9 rounded-xl bg-white border border-green-100 grid place-items-center">🎯</div>
                                        <div>
                                            <div class="font-bold text-dark">Student Need</div>
                                            <div class="text-sm text-gray-700">Memetakan kebutuhan kader sesuai tantangan zaman.</div>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="mt-1 h-9 w-9 rounded-xl bg-white border border-green-100 grid place-items-center">✨</div>
                                        <div>
                                            <div class="font-bold text-dark">Student Interest</div>
                                            <div class="text-sm text-gray-700">Mendorong minat-karya kader agar berdampak.</div>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="mt-1 h-9 w-9 rounded-xl bg-white border border-green-100 grid place-items-center">🧩</div>
                                        <div>
                                            <div class="font-bold text-dark">Inovasi Perkaderan</div>
                                            <div class="text-sm text-gray-700">Berproses, berjejaring, dan bertumbuh.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Motto callout (besar) --}}
                        <div class="mt-8 rounded-3xl bg-gradient-to-br from-green-50 via-white to-green-100 border border-green-100 p-7">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <div class="text-sm text-gray-600">Prinsip Gerak</div>
                                    <div class="mt-2 text-lg sm:text-xl font-extrabold text-dark">
                                        Yakinkan dengan iman, usahakan dengan ilmu, dan sampaikan dengan amal.
                                    </div>
                                    <div class="mt-2 text-primary font-extrabold text-2xl">
                                        Yakin, Usaha, Sampai
                                    </div>
                                </div>
                                <div class="hidden sm:block text-5xl">🌿</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div id="visi-misi" class="mt-8 grid gap-6 lg:grid-cols-2">
                    {{-- Visi --}}
                    <div class="rounded-3xl border border-green-100 bg-white p-7 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-2xl bg-green-50 border border-green-100 grid place-items-center">👁️</div>
                            <h3 class="text-2xl font-extrabold text-dark">Visi</h3>
                        </div>
                        <p class="mt-5 text-gray-700 leading-relaxed">
                            Revitalisasi Perkaderan Muslim-Intelektual-Profesional dalam Membangun Komitmen Keummatan dan Kebangsaan
                        </p>
                    </div>

                    {{-- Misi --}}
                    <div class="rounded-3xl border border-green-100 bg-white p-7 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-2xl bg-green-50 border border-green-100 grid place-items-center">🧭</div>
                            <h3 class="text-2xl font-extrabold text-dark">Misi</h3>
                        </div>

                        <div class="mt-5 space-y-3">
                            <div class="rounded-2xl border border-green-100 bg-green-50/40 p-4">
                                <div class="font-bold text-dark">1. Penanaman Nilai</div>
                                <div class="text-sm text-gray-700">Nilai-nilai Keislaman dan Keindonesiaan.</div>
                            </div>

                            <div class="rounded-2xl border border-green-100 bg-white p-4">
                                <div class="font-bold text-dark">2. Pembentukan Karakter</div>
                                <div class="text-sm text-gray-700">Penguatan kepribadian kader.</div>
                            </div>

                            <div class="rounded-2xl border border-green-100 bg-white p-4">
                                <div class="font-bold text-dark">3. Kompetensi & Kekaryaan</div>
                                <div class="text-sm text-gray-700">
                                    Pembentukan kompetensi Intelektual-Profesional berbasis kekaryaan; Output dan Outcome dengan menyesuaikan Basic Needs dan Basic Interest kader.
                                </div>
                            </div>

                            <div class="rounded-2xl border border-green-100 bg-white p-4">
                                <div class="font-bold text-dark">4. Re-Branding Media Sosial</div>
                                <div class="text-sm text-gray-700">Media sosial komisariat sebagai instrumen perkaderan.</div>
                            </div>

                            <div class="rounded-2xl border border-green-100 bg-white p-4">
                                <div class="font-bold text-dark">5. Kemandirian Ekonomi</div>
                                <div class="text-sm text-gray-700">Pembangunan kemandirian ekonomi komisariat.</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CTA bottom --}}
                <div class="mt-10 rounded-3xl border border-green-100 bg-gradient-to-br from-white to-green-50 p-7 shadow-sm">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <div class="text-sm text-gray-600">Penutup</div>
                            <div class="mt-2 font-extrabold text-dark text-lg">
                                Bersama membangun kader: Muslim • Intelektual • Profesional.
                            </div>
                        </div>
                        <a href="#sejarah"
                           class="inline-flex items-center justify-center rounded-xl border border-green-200 bg-white px-6 py-3 font-semibold text-dark shadow-sm hover:bg-green-50 transition">
                            Kembali ke atas ↑
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
