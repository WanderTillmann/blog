<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-ligth fixed-top" id="mainNav" style="background-color:grey">
  <div class="container">
    <a class="navbar-brand" href="/admin/posts">Admin</a>
    <button class="navbar-toggler navbar-toggle-right" type="button" data-toggle="collapse">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResposive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Page Header -->
<header class="masthead"></header>

@if (session('success'))
<div class="container">
  <div class="row">
    <p class=" alert alert-success align-middle col-md-12 text-center" style="margin:10px;">{{ session('success') }}</p>
  </div>
</div>
@endif
@if (session('error'))
<div class="container">
  <div class="row">
    <p class="alert alert-danger text-center align-middle  col-md-12" style="margin:10px;">{{ session('error') }}</p>
  </div>
</div>
@endif

@if ( $errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif