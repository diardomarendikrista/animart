<x-template title="">
  <!-- Hero  -->
  <div class="hero-banner" style="background-image: url('{{ asset('images/banner.png') }}');">
    <div class="hero-content">
      <span class="badge-brand"><i class="bi bi-fire me-1"></i> Koleksi Baru Tersedia</span>
      <h1 class="display-4 fw-extrabold text-white mb-3" style="font-weight: 800; letter-spacing: -1px;">
        Temukan Figure <span class="text-brand glitch">Anime</span> Favoritmu
      </h1>
      <p class="lead text-gray-300 mb-4" style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.6;">
        Pilihan action figure dan merchandise anime original untuk kolektor di Indonesia. Produk resmi, kualitas
        terjamin, dan dikemas dengan aman.
      </p>
      <div class="d-flex gap-3">
        <a href="{{ route('products') }}" class="btn btn-brand px-4 py-2.5">
          Lihat Koleksi
        </a>
      </div>
    </div>
  </div>
</x-template>