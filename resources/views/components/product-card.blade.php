@props(['product'])

<div class="col-md-4 col-sm-6 d-flex align-items-stretch">
  <div class="brand-card d-flex flex-column w-100">
    <!-- Image Section -->
    <div class="position-relative overflow-hidden product-image-container">
      <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid p-3">
      <span class="position-absolute badge bg-danger product-badge">{{ $product['badge'] }}</span>
    </div>
    <!-- Body Content Section -->
    <div class="p-4 d-flex flex-column flex-grow-1">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <span class="text-uppercase fw-bold product-brand">{{ $product['brand'] }}</span>
        <div class="d-flex align-items-center text-warning product-rating">
          <i class="bi bi-star-fill text-warning me-1"></i>
          <span>{{ $product['rating'] }}</span>
        </div>
      </div>

      <h5 class="fw-bold mb-2 text-white product-title">
        {{ $product['name'] }}
      </h5>

      <p class="product-desc">
        {{ $product['description'] }}
      </p>

      <div class="mt-auto pt-3 d-flex flex-column gap-3" style="border-top: 1px solid #1e293b;">
        <div class="d-flex justify-content-between align-items-center">
          <span class="text-white fw-bold product-price">
            Rp {{ number_format($product['price'], 0, ',', '.') }}
          </span>
          <span class="product-id">ID: #{{ $product['id'] }}</span>
        </div>

        <!-- Product Action Buttons -->
        <div class="d-flex gap-2">
          <a href="{{ route('products.show', $product['id']) }}"
            class="btn btn-outline-secondary text-white border-secondary flex-grow-1 btn-detail">
            Detail
          </a>
          <a href="{{ route('products.edit', $product['id']) }}"
            class="btn btn-outline-warning text-warning border-warning-subtle btn-edit d-inline-flex align-items-center justify-content-center"
            title="Edit Product">
            <i class="bi bi-pencil-square" style="font-size: 0.95rem;"></i>
          </a>
          <!-- Delete Form Button -->
          <form action="{{ route('products.destroy', $product['id']) }}" method="POST" class="d-inline"
            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="btn btn-outline-danger text-danger border-danger-subtle btn-edit d-inline-flex align-items-center justify-content-center"
              title="Hapus Produk">
              <i class="bi bi-trash3-fill" style="font-size: 0.95rem;"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
