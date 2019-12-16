@extends('layouts.master')

@section('content')

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
                                <h3>{{ $artikel->judul }}</h3>

                                <p>
                                    <center>
                                    <img style="width:50%" src="{{ asset('uploads/'.$artikel->gambar)}}">
                                    </center>
                                </p>

                                <p>{!! $artikel->isi !!}</p>
								</div>
							<div class="post-shares sticky-shares" style="position: absolute; top: 0px; left: 0px;">
								<a href="http://www.facebook.com" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="http://www.twitter.com" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="http://www.google.com" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="http://www.pinterest.com" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="http://www.linkedin.com" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="http://www.gmail.com"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/author.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3>{{ $artikel->name}}</h3>
										</div>
										<ul class="author-social">
											<li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
											<li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li><a href="http://www.google.com"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>{{ $total_komentar }} Comments</h2>
							</div>

							<div class="post-comments">
                                <!-- comment -->
                                
                                @foreach($komentar as $km)

								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>{{ $km-> nama}}</h4>
											<span class="time">{{ date('d M Y H:i:s', strtotime($km->created_at)) }}</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>{{ $km->isi }}</p>
										<!-- /comment -->
									</div>
                                </div>
                                @endforeach
								<!-- /comment -->

							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply" method="post" action="{{ url('komentar/'.$artikel->artikel_id) }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<span>Nama *</span>
									<input class="input" type="text" name="nama">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Email *</span>
									<input class="input" type="email" name="email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="input" name="isi" placeholder="Message"></textarea>
								</div>
								<button class="primary-button">Submit</button>
							</div>
						</div>
					</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						
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
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">January 2018</a></li>
									<li><a href="#">Febuary 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

@endsection