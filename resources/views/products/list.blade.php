<x-template title="Semua Produk">
  <!-- Header & Add Button -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5">
    <div>
      <span class="badge-brand mb-2"><i class="bi bi-bag-fill me-1"></i> KATALOG RESMI</span>
      <h1 class="fw-bold mb-2 text-white" style="font-weight: 800;">Koleksi Produk Original Kami</h1>
      <p class="mb-0">Temukan berbagai jenis figure original berlisensi langsung dari Jepang maupun buatan
        custom dengan packing aman.</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
      <!-- Reset/Clear Session Button -->
      <form action="{{ route('products.reset') }}" method="POST" class="d-inline"
        onsubmit="return confirm('Apakah Anda yakin ingin mereset memori sesi? Semua perubahan data akan dikembalikan ke 20 produk awal.');">
        @csrf
        <button type="submit" class="btn btn-reset-custom d-inline-flex align-items-center gap-2"
          title="Reset Data Sesi ke Kondisi Awal">
          <i class="bi bi-arrow-clockwise"></i> Reset Data
        </button>
      </form>
      <!-- Add Button -->
      <a href="{{ route('products.create') }}" class="btn btn-brand d-inline-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> Add new product
      </a>
    </div>
  </div>

  <!-- Product Grid -->
  <div class="row g-4 mb-5">
    @foreach ($products as $product)
      <x-product-card :product="$product" />
    @endforeach
  </div>

</x-template>