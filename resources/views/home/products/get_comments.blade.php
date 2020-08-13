					@foreach ($comments as $comment)
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