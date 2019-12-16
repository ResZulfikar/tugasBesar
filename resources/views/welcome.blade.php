@extends('layouts.master')

@section('content')

<div class="section">
			<!-- container -->
			<div class="container">
			<div class="row">	
					<!-- post -->
					<!-- isset cek apakah sebuah variabel di inisiasi-->
					@if(isset($random))
					@foreach($random as $rm)
					
					<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="{{ url('detail/'.$rm->artikel_id) }}"><img style="height: 400px" src="{{ asset('uploads/'.$rm->gambar) }}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">{{ $rm->kategori }}</a>
									<span class="post-date">{{ date('d M Y',strtotime($rm->created_at)) }}</span>
								</div>
								<h3 class="post-title"><a href="{{ url('detail/'.$rm->artikel_id) }}">{{ $rm->judul }}</a></h3>
							</div>
						</div>
					</div>
					@endforeach
					@endif
					<!-- /post -->
				</div>
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
        
                            @foreach($artikel as $at)
							<div class="col-md-12">
								<div class="post post-row">
                                <a class="post-img" href="{{ url('detail/'.$at->artikel_id) }}"><img src="{{ asset('uploads/'.$at->gambar) }}" alt="" style="width: 200px;"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">{{ $at->kategori }}</a>
											<span class="post-date">{{ date('d M Y',strtotime($at->created_at) )}}</span>
										</div>
										<h3 class="post-title"><a href="{{ url('detail/'.$at->artikel_id) }}">{{ $at->judul }}</a></h3>
										<p>{!! substr($at->isi,0,400) !!}. . .</p>
									</div>
								</div>
                            </div>
							@endforeach
							<!-- Function bawaan laravel untuk menampilkan sisa pagination -->
							{{ $artikel->Links() }}
							<!-- /post -->
							
							<!-- <div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div> -->
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
								<h2>Kategori</h2>
							</div>
							<div class="category-widget">
								<ul>
								<?php 
								$kategoris = \DB::table('kategori')->get();
								?>
								@foreach($kategoris as $kt)
								<?php 
									$total = \DB::table('artikel')->where('id_kategori', $kt->id)
									->count();
								?>
									<li><a href="{{ url('artikel/kategori/'.$kt->id) }}" class="cat-1">{{ $kt -> nama}}<span>{{ $total }}</span></a></li>
								@endforeach
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<!-- <div class="aside-widget">
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
						</div> -->
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

@endsection 