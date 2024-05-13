<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>

            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                id="carausel-10-columns-arrows"></div>
        </div>


        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @if ($categoris)

                    @foreach ($categoris as $index=>$category )
                    <div class="card-2 bg-{{ rand(9,15) }} wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="#"><img src="{{ asset($category->category_photo) }}" alt="" /></a>
                        </figure>
                        <h6><a href="#">{{ $category->category_nama }}</a></h6>
                        <span>26 items</span>
                    </div>

                    @endforeach
                @else
                <div class="card-2 bg-{{ rand(9,15) }} wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    {{ 'No Data' }}
                </div>
                @endif

            </div>
        </div>


    </div>
</section>
