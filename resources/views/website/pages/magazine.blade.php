@extends('website.layout.main')

@section('title', 'Articles')

@section('content')

<div class="col-sm-12">
  <div class="card" data-aos="fade-up">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          {{-- @foreach ( $articles as $article)
                        {{ $article->category->name }}
          @endforeach --}}


          @isset($category)

          <h1 class="font-weight-600 mb-4">{{ $category->name }} </h1>
          @else
          <h3>Tag</h3>
          <h1 class="font-weight-600 mb-4"> {{ request()->tag }} </h1>
          @endisset
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">

          @forelse($articles->sortDesc() as $article)

          <a href="{{ route('article.show', $article->id)  }}" style="text-decoration: none;color: #060606f0;">
            <div class="row">
              <div class="col-lg-4 grid-margin">
                <div class="rotate-img">
                  <img src="{{asset(Helper::singeleImage($article->image))}}" alt="banner" class="img-fluid" />
                </div>
              </div>
              <div class="col-lg-8 grid-margin">
                <h2 class="font-weight-600 mb-2">
                  {!!$article->title!!}
                </h2>
                <p class="fs-13 text-muted mb-0">
                  <span class="mr-2">Photo </span>{{ $article->created_at->diffForHumans() }}
                </p>
                <p class="fs-15">
                  {!! strip_tags( Str::words($article->description, 15, '...')) !!}
                </p>
              </div>
            </div>
          </a>

          @empty
          <p>Sorry, News not available in this category!</p>


          @endforelse
        </div>

        <div class="col-lg-4">
          <h2 class="mb-4 text-primary font-weight-600">
            Breaking News
          </h2>
          <div class="row">
            <div class="col-sm-12">
              <div class="border-bottom pb-4 pt-4">
                <div class="row">
                  <div class="col-sm-8">
                    <h5 class="font-weight-600 mb-1">
                      Ways to stay social online while in self..
                    </h5>
                    <p class="fs-13 text-muted mb-0">
                      <span class="mr-2">Photo </span>10 Minutes ago
                    </p>
                  </div>
                  <div class="col-sm-4">
                    <div class="rotate-img">
                      <img src="../assets/images/magazine/Magzine_1.jpg" alt="banner" class="img-fluid" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center">{{ $articles->links() }}</div>

    </div>
  </div>
</div>

@endsection

@section('extra-js')

<!-- inject:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->

<script src="../assets/vendors/aos/dist/aos.js/aos.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="../assets/js/demo.js"></script>
{{--  <script src="../assets/js/jquery.easeScroll.js"></script> --}}
<!-- End custom js for this page-->

@endsection