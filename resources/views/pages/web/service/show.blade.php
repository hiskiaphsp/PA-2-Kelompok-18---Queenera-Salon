<x-web-layout title="{{$service->service_name}}">
    <main>
        <div class="breadcrumb__area pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-breadcrumb__content">
                        <div class="tp-breadcrumb__list">
                            <span class="tp-breadcrumb__active"><a href="">Service</a></span>
                            <span class="dvdr">/</span>
                            <span class="tp-breadcrumb__active"><a href="">Service Detail</a></span>
                            <span class="dvdr">/</span>
                            <span>{{$service->service_name}}</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="blog-details-area pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-blog-details__thumb text-center">
                            <img src="{{asset('images/'. $service->service_image)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-10 col-lg-12">
                        <div class="tp-blog-details__wrapper">
                        <div class="tp-blog-details__content">
                            <h2 class="tp-blog-details__title mb-25">{{$service->service_name}}</h2>
                            <div>
                                {!! $service->service_description !!}
                            </div>
                        </div>


                        <div class="postbox__comment mb-65">
                            <h3 class="postbox__comment-title mb-35">REVIEWS</h3>
                            <ul>
                                @php
                                    $hasReview = false;
                                @endphp
                                @foreach ($rate as $item)
                                    @if (!isset($item->booking->service->id))
                                    @else
                                        @if ($item->booking->service->id == $service->id)
                                        @php
                                            $hasReview = true;
                                        @endphp
                                        <li>
                                            <div class="postbox__comment-box d-flex">
                                            <div class="postbox__comment-info">
                                                <div class="postbox__comment-avater mr-25">
                                                    <img src="{{ asset('assets/images/user/user.png') }}" alt="">
                                                </div>

                                            </div>

                                            <div class="postbox__comment-text">
                                                <div class="postbox__comment-name">
                                                    <h5>{{$item->booking->user->name}}</h5>
                                                    {{$item->updated_at->diffForHumans()}}

                                                </div>
                                                <div class="tpreview__comment-star">
                                                    @for ($i = 1; $i <= $item->product_rate; $i++)
                                                        <i class="fa fa-star text-warning"></i>
                                                    @endfor
                                                </div>
                                                <p>{{$item->description}}</p>
                                            </div>
                                            </div>
                                        </li>
                                        @endif
                                    @endif
                                @endforeach
                                @if (!$hasReview)
                                    <li>No Review</li>
                                @endif
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-web-layout>
