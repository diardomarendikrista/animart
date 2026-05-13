<x-template title="{{ ($isEdit ?? false) ? 'Edit Produk' : 'Tambah Produk Baru' }}">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- Back Button -->
      <a href="{{ route('products') }}"
        class="btn btn-link text-decoration-none mb-4 p-0 d-inline-flex align-items-center gap-2">
        <i class="bi bi-arrow-left"></i> Kembali ke Katalog
      </a>

      <!-- Form Card -->
      <div class="brand-card p-5">
        <div class="mb-4">
          <span class="badge-brand mb-2"><i
              class="bi {{ ($isEdit ?? false) ? 'bi-pencil-square' : 'bi-plus-circle-fill' }} me-1"></i>
            {{ ($isEdit ?? false) ? 'EDIT DATA' : 'FORM TAMBAH' }}</span>
          <h2 class="fw-bold text-white mb-2" style="font-weight: 800;">
            {{ ($isEdit ?? false) ? 'Edit Produk' : 'Tambah Produk Baru' }}
          </h2>
        </div>

        <!-- Validation Errors Alert -->
        @if ($errors->any())
          <div class="alert alert-danger border-0 mb-4"
            style="background-color: rgba(239, 68, 68, 0.15); color: #fca5a5; border-radius: 8px;">
            <ul class="mb-0 ps-3">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Form Element -->
        <form action="{{ ($isEdit ?? false) ? route('products.update', $product['id']) : route('products.store') }}"
          method="POST">
          @csrf

          <!-- Name Input using Blade Component -->
          <x-form.input name="name" label="Nama Produk" value="{{ $product['name'] ?? '' }}"
            placeholder="Masukkan nama action figure (cth: Monkey D. Luffy Gear 5)" required />

          <!-- Description Textarea using Blade Component -->
          <x-form.textarea name="description" label="Deskripsi Detail" value="{{ $product['description'] ?? '' }}"
            placeholder="Berikan deskripsi detail produk, spesifikasi, produsen, skala, dan kondisi box..." required />

          <!-- Price Input with Prefix using Blade Component -->
          <x-form.input type="number" name="price" label="Harga (Rupiah)" value="{{ $product['price'] ?? '' }}"
            placeholder="2500000" prefix="Rp" required />

          <!-- Submit Buttons -->
          <div class="d-flex justify-content-end gap-3 pt-3" style="border-top: 1px solid #1e293b;">
            <a href="{{ route('products') }}"
              class="btn btn-outline-secondary text-white border-secondary px-4 py-2 btn-cancel-custom">
              Batal
            </a>
            <button type="submit" class="btn btn-brand px-4 py-2">
              {{ ($isEdit ?? false) ? 'Perbarui Produk' : 'Submit' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-template>