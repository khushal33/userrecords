    <div class="row" >
		<div class="col-md-12  col-sm-12 col-lg-12 col-xs-12">
        
            <!-- Fluid width widget -->        
    	    <div class="card  border-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        <i class="fas fa-comment"></i>
                        Recent Comments
                    </h3>
                </div>
                <div class="midia">
                    <ul class="list-unstyled">
                         @foreach($comments as $comment)
                        <li class="media">
                            <div class="mr-2">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h6 class="mt-0 mb-1">
                                        <small>
                                   <a href="users/{{$comment->user->id}}">
                                       {{$comment->user->email}}</a>
                                  
                              <br>
                                        commented on  {{$comment->created_at}}
                                  </small>
                                </h6>
                                <p>
                                  {{$comment->body}}
                                </p>
                                <b>Proof:</b>
                                <p>
                                  {{$comment->url}}
                                </p>
                            </div>
                        </li>
                            @endforeach
     
                    </ul>
                  
                </div>
            </div>
            <!-- End fluid width widget --> 
            
		</div>
	</div>