@include('admin.layouts.header')
<div class="wrapper">
    @include('admin.layouts.sidebar')
    <div class="main-panel">
        <div class="main-header">
          @include('admin.layouts.navbar')
        </div>
        <div class="container">
          @yield('content')
        </div>
    </div>
</div>
@include('admin.layouts.footer')
