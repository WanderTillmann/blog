<!DOCTYPE html>
<html lang="pt-BR">

@include('partials.head')

<body>
  @include('partials.admin_header')

  <div class="container" style="margin-top:100px">
    <!-- Main Content -->
    @yield('content')
  </div>


</body>

</html>