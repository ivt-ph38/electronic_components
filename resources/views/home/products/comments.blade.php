		<h4 class="col-lg-12 mt-5" id="comments-box">Bình luận <i><small> đăng nhập để bình luân</small></i></h4>
        <div class="col-lg-12">
			<div class="blog-comment">
				<form method="POST" action="{{url('/comments')}}">
					@if ($errors->has('content'))
				      <small id="nameHelp" class="form-text text-danger">{{$errors->first('content')}}</small>
				    @endif
					@csrf
					<input type="hidden" name="product_id" value="{{$product->id}}">
					<textarea name="content" class="form-control" placeholder="Nội dung bình luận" rows="3"></textarea>
	                <br>
	                <button type="submit" class="btn btn-info pull-right">Bình luận</button>
                </form>
                <div class="clearfix"></div>
                <hr>
				<ul class="comments" id="comments">
					<input type="hidden" id="product_id" value="{{$product->id}}">
					<?php $step = 0; ?>
					<?php $comments = $product->comments->where('parent_id', '=', 0); ?>
					@foreach ($comments as $comment)
						<?php if ($step == 5) {break;} else {$step++;} ?>
						<li class="clearfix">
						  <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
						  <div class="post-comments">
						      <p class="meta">{{date_format($comment->created_at, 'd/m/Y H:i:s')}}&nbsp<a href="#">{{$comment->user->name}}</a> : <i class="pull-right"><a class="reply"><small>Trả lời</small></a></i></p>
						      <p>
						          {{$comment->content}}
						      </p>
							    <form style="padding-bottom: 35px" class="hidden" method="POST" action="{{url('/comments')}}">
									@csrf
									<input type="hidden" name="product_id" value="{{$product->id}}">
									<input type="hidden" name="parent_id" value="{{$comment->id}}">
									<textarea name="content" class="form-control" placeholder="Nhập nội dung trả lời" rows="3"></textarea>
					                <br>
					                <button type="submit" class="btn btn-info pull-right">Trả lời</button>
				                </form>
						  </div>
						  @if(count($comment->childs))
						  	<ul class="comments">
							  	@foreach ($comment->childs as $item)
							      	<li class="clearfix">
							          	<img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
							          <div class="post-comments">
							            <p class="meta">{{date_format($item->created_at, 'd/m/Y H:i:s')}}&nbsp<a href="#">{{$item->user->name}}</a> :</p>
							            <p>
							                 {{$item->content}}
							            </p>
							          </div>
							      	</li>
							  	@endforeach
							</ul>
						  @endif
						</li>
					@endforeach
				</ul>
				<input type="hidden" id="count_comments" name="sum_comments" value="{{$step}}">
				<input type="hidden" id="toltal_comments" name="sum_comments" value="{{count($comments)}}">
				<button class="btn btn-info btn-block load @if (count($comments) < 6) hidden @endif ">Xem thêm</button>
			</div>
		</div>