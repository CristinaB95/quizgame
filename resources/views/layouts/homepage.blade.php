<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <!-- Link style -->
    <link href="{{asset('css/homepagestyle.css')}}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="/images/front/logo.png">
    <title>Quizgame</title>
</head>
<body>
@include('partials/navbar')
@yield('content')
<footer class="footer-section text-center pt-3">
    <a href="https://cristinabizoi.ro" class="footer-link"> Cristina Bizoi </a> © 2019
    <small class="d-none d-lg-block footer-icons"> Illustrations by: <a href="https://undraw.co/" class="footer-link">undraw</a> | <a href="https://icons8.com" class="footer-link">icons8</a> </small>
</footer>
  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="/vendor/chart.js/Chart.min.js"></script>
  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin.min.js"></script>
@yield('bottomscripts')
</body>
</html>