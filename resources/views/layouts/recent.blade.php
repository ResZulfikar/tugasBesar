<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Event Terbaru</h2>
								</div>
                            </div>
                            
                            <!-- post -->
                            <!-- postingan diurut berdasarkan created_at descending tabel artikel-->

                            <?php 
                            
                                $artikel = \DB::table('artikel as a')
                                ->join('kategori as k','k.id','=','a.id_kategori')
                                ->select('a.judul','a.isi','a.gambar','a.created_at','k.nama as kategori')
                                ->orderby('created_at','desc')->get();

                            ?>

                            @foreach($artikel as $at)
							<div class="col-md-12">
								<div class="post post-row">
                                <a class="post-img" href="blog-post.html"><img src="{{ asset('uploads/'.$at->gambar) }}" alt="" style="width: 200px;"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">{{ $at->kategori }}</a>
											<span class="post-date">{{ date('d M Y',strtotime($at->created_at) )}}</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">{{ $at->judul }}</a></h3>
										<p>{!! substr($at->isi,0,400) !!}. . .</p>
									</div>
								</div>
                            </div>
                            @endforeach
							<!-- /post -->
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
									<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->