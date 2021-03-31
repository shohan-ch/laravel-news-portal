@extends('website.layout.main')

@section('title', $article->title )
@section('extra-css')
<style>

</style>
@endsection

@section('content')
<div class="col-sm-12">
  <div class="card" data-aos="fade-up">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">

          @if(session('success'))
          <p class="bg-primary font-weight-bold p-2 text-white" id="message"> {{ session('success')}}</p>

          @endif

          <div>
            <h1 class="font-weight-600 mb-1">
              {{ $article->title }}
            </h1>
            <p class="fs-13 text-muted mb-0">
              <span class="mr-2">Photo </span>{{$article->created_at->diffForHumans() }}
            </p>
            <div class="rotate-img">
              {{--
              //Display multiple image
              @php
              $images = explode(' ',$article->image);
              @endphp

              <img src="{{ asset($images[0]) }}" alt="">
              <img src="{{ asset($images[1]) }}" alt=""> --}}

              <img src="{{asset(Helper::singeleImage($article->image))}}" alt="banner" class="img-fluid mt-4 mb-4" />

            </div>
            <p class="mb-4 fs-15">
              {{-- {!! Str::words($article->description, 89) !!} --}}
              {!! $article->description!!}
            </p>

          </div>

          {{-- <div>
            <div class="rotate-img">
              @php
              $images = explode(' ',$article->image);
              @endphp
              <img src="{{ asset($images[]) }}" alt="">
        </div>
        <p class="mb-4 fs-15">

          {!!Str::words($article->description, 89,5) !!}
          He has led a remarkable campaign, defying the
          traditional mainstream parties courtesy of his En
          Marche! movement. For many, however, the campaign has
          become less about backing Macron and instead about
          voting against Le Pen, the National Front candidate.He
          has led a remarkable campaign, defying the traditional
          mainstream parties courtesy of his En Marche!
          movement. For many, however, the campaign has become
          less about backing Macron and instead about voting
          against Le Pen, the National Front candidate.
        </p>
      </div> --}}


      {{-- Tags --}}

      <div class="d-lg-flex">
        <span class="fs-16 font-weight-600 mr-2 mb-1">Tags</span>
        @php
        $tags = $article->tag;
        $explode = explode(" ", $tags);
        @endphp
        @foreach($explode as $tag)

        <a href="{{ route('article.index', ['tag'=> $tag ]) }}">
          <span class="badge badge-outline-dark mr-2 mb-1">
            {{ $tag }}
          </span>
        </a>

        @endforeach

      </div>

      <div class="post-comment-section">

        @if($articlesRelated->count() > 0)
        <h3 class="font-weight-600">Related News ({{ $articlesRelated->count() }})</h3>
        @endif
        {{-- Related News --}}
        <div class="row">
          @foreach($articlesRelated->sortDesc()->take(2) as $related)
          <div class="col-md-6">

            <div class="post-author" style=" height: 327px;">
              <div class="rotate-img">
                <img src="{{asset(Helper::singeleImage($related->image))}}" alt="banner" class="img-fluid" />
              </div>
              <div class="post-author-content">
                <h5 class="mb-1">
                  {{ $related->title }}
                </h5>
                <p class="fs-13 text-muted mb-0">
                  <span class="mr-2">Photo </span>{{ $related->created_at->diffForHumans() }}
                </p>
              </div>
            </div>

          </div>
          @endforeach
        </div>

        {{--  <div class="testimonial">
              <div
                class="d-lg-flex justify-content-between align-items-center"
              >
                <div class="d-flex align-items-center mb-3">
                  <div class="rotate-img">
                    <img
                      src="../assets/images/faces/face1.jpg"
                      alt="banner"
                      class="img-fluid img-rounded mr-3"
                    />
                  </div>
                  <div>
                    <p class="fs-12 mb-1 line-height-xs">
                      Of the Author
                    </p>
                    <p
                      class="fs-16 font-weight-600 mb-0 line-height-xs"
                    >
                      Nout Golstein
                    </p>
                  </div>
                </div>
                <ul class="social-media mb-3">
                  <li>
                    <a href="#">
                      <i class="mdi mdi-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="mdi mdi-twitter"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <p class="fs-12">
                Praesent facilisis vulputate venenatis. In facilisis
                placerat arcu, in tempor neque aliquet quis. Integer
                lacinia in ligula eu sodales. Proin non lorem
                iaculis, dictum lorem quis, bibendum leo.
              </p>
            </div> --}}


        @if($comments->count() > 0)
        <div class="comment-section">
          <h5 class="font-weight-600">Comments({{ $comments->count() }}) </h5>

          @foreach($comments as $comment)

          <div class="comment-box" id="comment-box">
            <div class="d-flex align-items-center">
              <div class="rotate-img">
                <img src="../assets/images/faces/face6.jpg" alt="banner" class="img-fluid img-rounded mr-3" />
              </div>
              <div>
                <p class="fs-12 mb-1 line-height-xs">
                  {{ $comment->created_at->diffForHumans() }}
                </p>
                <p class="fs-16 font-weight-600 mb-0 line-height-xs">
                  {{ $comment->name }}
                </p>
              </div>
            </div>

            <p class="fs-12 mt-3">
              {{$comment->comment}}
            </p>
          </div>
          @endforeach

        </div>

        @endif

        {{--Comment Form  --}}

        <div class="comment-form mt-5">
          <hr>
          <h3 id="cmnt">Leave a Comment</h3>
          <p><small>Your email address will not be published.</small></p>

          <form action="{{ route('comment.store') }}" class="form-block" method="post">
            @csrf
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="form-group fl_icon">
                  <input type="hidden" name="article_id" value="{{ $article->id }}">
                  <input class="form-control" name="name" type="text" placeholder="Your name">
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 fl_icon">
                <div class="form-group fl_icon">
                  <input class="form-control" name="email" type="text" placeholder="Your email">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <textarea class="form-control" name="comment" required="" placeholder="Your comments"
                    rows="3"></textarea>
                  @error('comment')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>

            </div>
            <button type="submit" class="btn btn-primary">submit</button>
          </form>

        </div>



      </div>
    </div>

  </div>
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
<!--   <script src="../assets/js/jquery.easeScroll.js"></script> -->
<!-- End custom js for this page-->

<script>
  $(document).ready(function(){

 $('#message').fadeOut(8000);
 $( "#comment-box:nth-child(odd)" ).addClass( "from" );


})


</script>

@endsection