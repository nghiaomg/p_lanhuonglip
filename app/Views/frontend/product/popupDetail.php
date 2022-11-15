<!-- start popup detail product -->
<div id="popup" class="popup transition-all">
    <div class="popup-overlay"></div>
    <div class="popup-wrapper">
      <div class="popup__product position-relative d-flex flex-column flex-md-row p-3 bg-white">
        <div
          class="product-close hover-pink --border-gray d-flex align-items-center pointer justify-content-center  --gray-light">
          <i class="fa-solid fa-xmark"></i>
        </div>
        <div id="popup-gallery" class="popup__product-image position-relative">
          <figure data-src="img/trend-1.jpg" data-sale="-20%" class="image-wrapper thumbnail  item-label-sale">
            <img src="img/trend-1.jpg" alt="">
          </figure>
          <a href="#" id="popup-btn-zoom"
            class="icon-zoom --bg-gray --text-black d-flex align-items-center justify-content-center"><i
              class="fa-solid fa-magnifying-glass-plus"></i></a>
        </div>
        <div class="popup__product-detail p-4 ">

          <h2 class="product-title heading --h2 mb-3">treatise the theory lorem ethics top</h2>
          <div class="product-star mb-2">
            <i class="fa-solid fa-star --star-check"></i>
            <i class="fa-solid fa-star --star-check"></i>
            <i class="fa-solid fa-star --star-check"></i>
            <i class="fa-solid fa-star --gray-light"></i>
            <i class="fa-solid fa-star --gray-light"></i>
            <p class="product-price">
              <ins class="--blue-cl decoration-none">$200.00</ins>
              <del class="--text-light">$250.00</del>
            </p>
            <p class="product-desc --text-light">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias quibusdam eos animi, iste esse iure?
              Ducimus incidunt, necessitatibus, modi quidem quos quae similique autem corporis doloremque aliquam illum
              dicta dolorem.
            </p>
            <div class="product-stock mb-2 --green-cl font-medium">500 in stock</div>
            <form class="product-form-cart d-flex align-items-center">
              <div class="product-qty d-flex align-items-center --border-gray rounded-5 flex-shrink-0">
                <label for=""></label>
                <input type="text" value="-" class="border-0 outline-none rounded-inherit input-minus pointer">
                <input type="text" value="1" step="1" class="border-0 outline-none rounded-inherit input-qty">
                <input type="text" value="+" class="border-0 outline-none rounded-inherit input-plus pointer">
              </div>
              <button type="submit"
                class="btn-primary btn-submit border-0 outline-none pointer --bg-pink hover-blue-bg text-white font-medium text-capitalize">
                add to cart
              </button>
            </form>
            <div class="product-meta ">
              <div class="product-meta-row py-2 mb-2 --sku">
                SKU: <span class="sku text-uppercase --text-light">WAS420</span>
              </div>
              <div class="product-meta-row py-2 mb-2 --cat --text-black">
                Categories: <a class="tag text-capitalize hover-pink --text-light" href="">clothes</a>, <a
                  class="tag text-capitalize hover-pink --text-light" href="">kitchen</a>,
                <a href="" class="tag text-capitalize hover-pink --text-light">Mirror Sunglasses</a>
              </div>
              <div class="product-meta-row py-2 mb-2 --tag --text-black">
                Tag: <a href="" class="tag --text-light text-capitalize hover-pink">augue</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- end popup detail product -->