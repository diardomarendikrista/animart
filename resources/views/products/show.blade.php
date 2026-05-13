<x-template title="Detail Produk">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <!-- Back Button -->
      <a href="{{ route('products') }}"
        class="btn btn-link text-decoration-none mb-4 p-0 d-inline-flex align-items-center gap-2">
        <i class="bi bi-arrow-left"></i> Kembali ke Katalog
      </a>

      <!-- Detail Card -->
      <div class="brand-card p-5">
        <div class="row g-5 align-items-center">
          <!-- Image Section -->
          <div class="col-md-5">
            <div class="overflow-hidden p-4 product-detail-image-container">
              <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid">
            </div>
          </div>

          <!-- Info Section -->
          <div class="col-md-7">
            <span class="badge-brand mb-2"><i class="bi bi-info-circle-fill me-1"></i> DETAIL PRODUCT</span>
            <h2 class="fw-bold text-white mb-2" style="font-weight: 800;">{{ $product['name'] }}</h2>

            <div class="d-flex align-items-center gap-3 mb-4">
              <span class="badge bg-danger badge-license">ORIGINAL LICENSE</span>
              <span class="text-secondary product-detail-brand-text">Brand: <strong
                  class="text-white">{{ $product['brand'] }}</strong></span>
            </div>

            <h3 class="fw-bold mb-4 product-detail-price">
              Rp {{ number_format($product['price'], 0, ',', '.') }}
            </h3>

            <div class="mb-4">
              <h5 class="text-white fw-semibold mb-2 product-detail-desc-title">Deskripsi Produk</h5>
              <p class="product-detail-desc-text">
                {{ $product['description'] }}
              </p>
            </div>

            <div class="d-flex gap-3 pt-4" style="border-top: 1px solid #1e293b;">
              <button class="btn btn-brand px-5 py-2 btn-edit-large d-inline-flex align-items-center gap-2">
                <i class="bi bi-cart-fill"></i> Beli Sekarang
              </button>
              <a href="{{ route('products.edit', $product['id']) }}"
                class="btn btn-outline-warning text-warning border-warning px-4 py-2 btn-edit-large d-inline-flex align-items-center gap-2">
                <i class="bi bi-pencil-square"></i> Edit Produk
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-template>