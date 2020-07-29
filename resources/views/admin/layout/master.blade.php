<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <title>bootstrap 4 sidebar</title>
  </head>
  <body>

   <div class="wrapper">
   	<nav id="sidebar" >
   		<div class="sidebar-header">
        <img src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" width="100px" alt="..." class="mx-auto d-block rounded-circle">
   			<h3 class="d-flex justify-content-center">{{ Auth::user()->name }}</h3>
        <a class="d-flex justify-content-center" href="{{route('admin.editprofile', ['id' => Auth::user()->id ])}}" role="button" style="border: 1px solid; padding: .5rem 1rem;">Edit Profile</a>
        {{--  --}}
   		</div>
   		<ul class="list-unstyled components">
   			<li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
   				<a href="{{ route('admin.Dashboard') }}">Dashboard</a>
   			</li>
   			<li class="{{ Route::is('admin.Addproject') ? 'active' : '' }}">
   				<a href="{{ route('admin.Addproject') }}">Add Projects</a>
   			</li>
   			<li class="{{ Route::is('admin.Manageproject') ? 'active' : '' }}">
   				<a href="{{ route('admin.Manageproject') }}">Manage Projects</a>
   			</li>
   			{{-- <li>
   				<a href="#">Users Detail</a>
   			</li>
   			<li>
   				<a href="#">Contact Us</a>
   			</li> --}}
   		</ul>
      <div class="sidebar-header">
        <a class="d-flex justify-content-center" href="{{ route('logout') }}" role="button" style="border: 1px solid; padding: .5rem 1rem;"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
   	</nav>


    <div class="container">
      <div class="content">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fa fa-align-justify"></i> <span>toggle sidebar</span>
        </button>
      </div>
      @yield('Title')
      @yield('content')
    </div>


   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      @if (session('status'))
        // alert('{{session('status')}}')
        swal({
          title: '{{session('status')}}',
          icon: "success",
          button: "OK",
        });
      @endif
      @if (session('remove'))
      swal({
        title: '{{session('remove')}}',
        icon: "error",
        button: "OK",
      });
      @endif
    </script>
    <script>
  	    $(document).ready(function(){
  			$('#sidebarCollapse').on('click',function(){
  				$('#sidebar').toggleClass('active');
  			     });
  		    });
	   </script>
  </body>
</html>
