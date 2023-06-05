    @foreach($products as $product)
        <div class="col" key="{{ $product->id }}">
            <div class="tpproduct p-relative mb-20">
                <div class="tpproduct__thumb p-relative text-center">
                    <a class="aspect-ratio" href="{{route('product.show', $product->id)}}">
                        <img src="{{ asset('images/'.$product->product_image) }}" alt="" class="img-fluid" style="height:200px">
                    </a>
                    <div class="tpproduct__info bage">
                    </div>
                    <div class="tpproduct__shopping">
                        <a data-product-id="{{ $product->id }}" class="add-to-cart tpproduct__shopping-wishlist" href="#"><i class="icon-cart"></i></a>
                    </div>
                </div>
                <div class="tpproduct__content">
                    <span class="tpproduct__content-weight">
                        <a href="#">Salon</a>
                        <a href="#"></a>
                    </span>
                    <h4 class="tpproduct__title">
                        <a href="{{route('product.show', $product->id)}}">{{ $product->product_name }}</a>
                    </h4>
                    <div class="tpproduct__rating mb-5">
                        <a href="#"><i class="icon-star_outline1"></i></a>
                        <a href="#"><i class="icon-star_outline1"></i></a>
                        <a href="#"><i class="icon-star_outline1"></i></a>
                        <a href="#"><i class="icon-star_outline1"></i></a>
                        <a href="#"><i class="icon-star_outline1"></i></a>
                    </div>
                    <div class="tpproduct__price">
                        <span>Rp. {{ number_format($product->product_price) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
