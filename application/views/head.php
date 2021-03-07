<!DOCTYPE html>
    <html>
        <head>
           <meta charset="utf-8"/>
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
           <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
           
        </head>

        <body>
        <?php 
          if($this->session->flashdata('message')){
        ?>
        <script>
          alert('<?=$this->session->flashdata('message')?>');
        </script>
        <?php
          }
        ?>
        <!-- nav bar --->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php
        if($this->session->userdata('is_login')){
      ?>
       <li class="nav-item"><a class="nav-link active" aria-current="page" href="/index.php/auth/login">로그인</a></li>
       <li class="nav-item"><a class="nav-link active" aria-current="page" href="/index.php/auth/register">회원가입</a></li>
      <?php
      }else{
      ?>
        <li class="nav-item"><a class="nav-link active" href="/index.php/auth/logout">로그아웃</a></li>
      <?php
              
            }
      ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php
  if(false){
//  if($this->config->item('is_dev')){
  ?>
<div class="well span12">
  개발환경을 수정중입니다.
</div>
<?php
  }
?>

<!--nav bar end-->
        <div class="container-fluid">
            <div class="row-fluid">