					@foreach ($comments as $comment)
						<li class="clearfix">
						  <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
						  <div class="post-comments">
						      <p class="meta">{{date_format($comment->created_at, 'd/m/Y H:i:s')}}&nbsp<a href="#">{{$comment->name}}</a> : <i class="pull-right"><a class="reply"><small>Trả lời</small></a></i></p>
						      <p>
						          {{$comment->content}}
						      </p>
							    <form style="padding-bottom: 35px" class="hidden" method="POST" action="{{url('/comments')}}">
									@csrf
									<input type="hidden" name="product_id" value="{{$product->id}}">
									<input type="hidden" name="parent_id" value="{{$comment->id}}">
									<div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Email: <span class="text-danger">*</span></label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" required value="{{Auth::user()?Auth::user()->email:old('email')}}">
									     	@if ($errors->has('email'))
								      		<small id="nameHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
								    		@endif
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="inputPassword" class="col-sm-2 col-form-label">Họ và tên: <span class="text-danger">*</span></label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên của bạn" required value="{{Auth::user()?Auth::user()->name:old('name')}}">
									      @if ($errors->has('name'))
								      		<small id="nameHelp" class="form-text text-danger">{{$errors->first('name')}}</small>
								    		@endif
									    </div>
									</div>
									<textarea name="content" class="form-control" placeholder="Nhập nội dung trả lời" rows="3" required>{{old('content')}}</textarea>
									@if ($errors->has('content'))
								      <small id="nameHelp" class="form-text text-danger">{{$errors->first('content')}}</small>
								    @endif
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
							            <p class="meta">{{date_format($item->created_at, 'd/m/Y H:i:s')}}&nbsp<a href="#">{{$item->name}}</a> :</p>
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