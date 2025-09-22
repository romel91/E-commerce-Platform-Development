<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          background-color: #f8f9fa;
      }
      .sidebar {
          height: 100vh;
          width: 220px;
          background: #343a40;
          padding-top: 20px;
          position: fixed;
      }
      .sidebar a {
          color: #fff;
          display: block;
          padding: 10px 15px;
          text-decoration: none;
      }
      .sidebar a:hover {
          background: #495057;
          border-radius: 5px;
      }
      .content {
          margin-left: 220px;
          padding: 20px;
      }
  </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white text-center mb-4">E-commerce</h4>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('subcategories.index') }}">Subcategories</a>
        <a href="{{ route('products.index') }}">Products</a>
    </div>

    <!-- Main content -->
    <div class="content w-100">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')
</body>
</html>
