
@extends('layouts.app')
                                 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
              

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <?php
                         function mask($str, $first, $last) {
                        $len = strlen($str);
                        $toShow = $first + $last;
                        return substr($str, 0, $len <= $toShow ? 0 : $first).str_repeat("*", $len - ($len <= $toShow ? 0 : $toShow)).substr($str, $len - $last, $len <= $toShow ? 0 : $last);
                    }

                    function mask_email($email) {
                        $mail_parts = explode("@", $email);
                        $domain_parts = explode('.', $mail_parts[1]);

                        $mail_parts[0] = mask($mail_parts[0], 2, 2); // show first 2 letters and last 1 letter
                      
                        return implode("@", $mail_parts);
                    }
                    ?>
                  <div class="fluid-container">
                             <table class="table " >
                              <thead>
                                <tr>
                                 
                                  <th scope="col">sr no.</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">email</th>
                                    <th scope="col">Mobile No.</th>
                                    <th scope="col">Date of birth</th>
                                    
                                    <th scope="col">Languages</th>
                                    <th scope="col">Edit</th>
                                     <th scope="col">Delete</th>
                                </tr>
                              </thead>
                            
                              <tbody>
                                    @foreach($users as $user)
                                <tr>   
                                  <th scope="row">{{$user->id}}</th>
                                  <td>{{$user->name}}</td>
                                   
                                  <td> {{mask_email( $email=$user->email)}}</td>
                                    <td>{{$user->phone}}</td>
                                     <td>{{$user->date}}</td>
                                     <td>{{$user->checkbox}}</td>
                                    <td><a href="auth/{{$user->id}}/edit" class="btn btn-primary btn-sm">Edit</a></td>
                                     <td>
                                  
                                          <a href="#" class="btn btn-danger btn-sm"
                     onClick="
                  var result=confirm('Are you sure you wish to delete this user?');
                  if(result){
                  event.preventDefault();
                  document.getElementById('delete-form-{{$user->id}}').submit();
                  }
                  "
                     >
                  Delete</a>
                
               
                    <form id="delete-form-{{$user->id}}" action="{{route('auth.destroy',[$user->id])}}" method="post" style="display:none">
                    <input type="hidden" name="_method" value="delete">
                    {{csrf_field()}} 
                    </form>
                
                
              
                                    </td>
                                   
                                </tr>
                                @endforeach
                          </tbody>
                       
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
