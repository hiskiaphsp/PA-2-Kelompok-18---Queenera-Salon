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
                    @php
                        $total = 0;
                        $index = 0;
                        if ($product->orderItem) {
                            foreach ($product->orderItem as $key) {
                                if ($key->rate) {
                                    $rating = $key->rate->product_rate;
                                    $total += $rating;
                                    $index++;
                                }
                            }
                        }
                        $hasil = 0; // Default value if $index is zero
                        if ($index > 0) {
                            $hasil = $total / $index;
                        }
                        $wholeStars = floor($hasil); // Bagian bilangan bulat
                        $hasHalfStar = $hasil - $wholeStars >= 0.4; // Memeriksa apakah terdapat setengah bintang
                    @endphp

                    <div class="tpproduct__rating mb-5">
                        {{$hasil}}/5

                        @for ($i = 1; $i <= $hasil; $i++)
                            <i class="fa fa-star text-warning"></i>
                        @endfor
                        @if ($hasHalfStar)
                            <i class="fa fa-star-half-full text-warning"></i>
                        @endif
                        @for ($i = 1; $i <= 4; $i++)
                            @if ($hasil <= $i)
                                <i class="fa fa-star-o text-warning"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="tpproduct__price">
                        <span>Rp. {{ number_format($product->product_price) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
