<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/05cccae20a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>bootstrap 4 sidebar</title>
  </head>
  <body>

   <div class="wrapper">
   	<nav id="sidebar" >
      <button type="button" id="sidebarCollapse1" class="btn btn-info">
        <i class="fa fa-times" aria-hidden="true"></i>
      </button>
   		<div class="sidebar-header">
        <img src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" width="100px" alt="..." class="mx-auto d-block rounded-circle">
   			<h3 class="d-flex justify-content-center">{{ Auth::user()->name }}</h3>
         <a class="d-flex justify-content-center" href="{{route('edit-profile', ['id' => Auth::user()->id ])}}" role="button" style="border: 1px solid; padding: .5rem 1rem;">Edit Profile</a>
         {{--   --}}
   		</div>
   		<ul class="list-unstyled components">
   			<li class="{{ Route::is('home') ? 'active' : '' }}">
   				<a href="{{ route('home') }}"><i class="fas fa-info-circle"></i> Project Details</a>
   			</li>
   			<li class="{{ Route::is('addtask') ? 'active' : '' }}">
   				<a href="{{ route('addtask') }}"><i class="fas fa-tasks"></i> Add Tasks</a>
   			</li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
          $(document).ready(function(){
  			$('#sidebarCollapse1').on('click',function(){
  				$('#sidebar').toggleClass('active');
  			     });
  		    });
     </script>
     <script type="text/javascript">
      $(document).ready(function () {
  
          $('#btnSubmit').click(function () {
              $('#myAlert').show('fade');
  
              setTimeout(function () {
                  $('#myAlert').hide('fade');
              }, 5000);
  
          });
  
          $('#linkClose').click(function () {
              $('#myAlert').hide('fade');
          });
  
      });
  </script>
       <script>
        $(document).ready(function(){
    
            $('.col-lg-4').hover(
                // trigger when mouse hover
                function(){
                    $(this).animate({
                        marginTop: "-=1%",
                    },500);
                },
    
                // trigger when mouse out
                function(){
                    $(this).animate({
                        marginTop: "0%"
                    },200);
                }
            );
        });
    </script>
  
  </body>
</html>
