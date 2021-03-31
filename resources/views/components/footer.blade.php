<div>
  <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->

  <footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <img src="assets/images/logo.svg" class="footer-logo" alt="">
            <h5 class="font-weight-normal mt-4 mb-5">
              Newspaper is your news, entertainment, music fashion website. We
              provide you with the latest breaking news and videos straight from
              the entertainment industry.
            </h5>
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
          <div class="col-sm-4">
            <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
            <div class="row">
              <div class="col-sm-12">
                <div class="footer-border-bottom pb-2">
                  @foreach($categories->take(3) as $category)
                  @foreach($category->articles->sortDesc()->take(1) as $article)
                  <a href="{{ route('article.show',$article->id) }}" style="text-decoration: none;color: #fff;">
                    <div class="row mb-md-3">
                      <div class="col-3">
                        <img src="{{asset(Helper::singeleImage($article->image))}}" alt="thumb" class="img-fluid">
                      </div>
                      <div class="col-9">
                        <h5>{{ Str::words($article->title, 5, '...')}}</h5>
                      </div>
                    </div>
                  </a>

                  @endforeach
                  @endforeach
                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-3">
            <h3 class="font-weight-bold mb-3">CATEGORIES</h3>

            @foreach($categories as $category)
            <a href="{{ route('article.index',$category->id) }}" style="text-decoration: none;color: #fff;">
              <div class="footer-border-bottom pb-2">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="mb-0 font-weight-600">{{ $category->name }}</h5>
                  <div class="count">{{ $category->articles->count() }}</div>
                </div>
              </div>
            </a>
            @endforeach

          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="d-sm-flex justify-content-between align-items-center">
              <div class="fs-14 font-weight-600">
                © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>.
                All rights reserved.
              </div>
              <div class="fs-14 font-weight-600">
                Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank"
                  class="text-white">BootstrapDash</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>