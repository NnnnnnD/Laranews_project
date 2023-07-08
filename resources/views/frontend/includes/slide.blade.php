<style>
  .carousel-item img {
      width: 100%;
      height: 600px; 
      object-fit: fill;
  }
  .card {
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
  }
</style>
<br>
<div class="container md-4 mt-4">
  <div class="col-md-1"></div>
  <div class="card">
    <div class="card-body mt-1">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
        </div>
        <div class="carousel-inner">
          @foreach ($slides as $key => $row)
            <div class="carousel-item {{$key === 0 ? 'active' : '' }}">
              <img src="{{ asset('uploads/' . $row->gambar_slide)}}" class="d-block w-100" alt="...">
            </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  // Inisialisasi carousel saat halaman dimuat
  window.addEventListener('DOMContentLoaded', function () {
    var carousel = new bootstrap.Carousel(document.querySelector('.carousel'), {
      interval: 3000, // Waktu transisi slide dalam milidetik (ms)
      pause: 'hover', // Menghentikan transisi saat pengguna mengarahkan kursor ke carousel
    });
  });
</script>


