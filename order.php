<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Order Roastbean</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto&amp;display=swap'>
  <link rel="stylesheet" href="CSS/order.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!-- partial:index.partial.html -->
<HTML>
<head>
<title>Order Roastbean</title>
</head>
<body>
  <nav class="navbar navbar-light navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Djamudju Coffee</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#product">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutUs">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>    
<div class="logo">
  <img src="img/<?php echo $_GET["kopi"]; ?>" alt="" style="width: 180px;">
</div>
<form class="whatsapp-form" name="submit-to-google-sheet">
<div class="datainput">
<input class="validate" id="wa_name" name="nama" required="" type="text" value=''/>
<span class="highlight"></span><span class="bar"></span>
<label>Your Name</label>
</div>
<div class="datainput">
<input class="validate" id="wa_email" name="email" required="" type="email" value=''/>
<span class="highlight"></span><span class="bar"></span>
<label>Email Address</label>
</div>
<div class="datainput">
<select id="wa_select" name="kopi" id="kopi">
  <option hidden='hidden' selected='selected' value='' name=''>Type</option>
  <option value="Natural">Natural <?php echo $_GET["jenis"]; ?></option>
  <option value="Fullwashed">Fullwashed <?php echo $_GET["jenis"]; ?></option>
</select>
</div>
<div class="datainput">
    <select id="wa_select" name="qty">
      <option hidden='hidden' selected='selected' value='' name=''>Quantity</option>
      <option value="1kg">1kg</option>
      <option value="500gr">500gr</option>
      <option value="250gr">250gr</option>
    </select>
    </div>
<div class="datainput">
<input class="validate" id="wa_number" name="notelp" required="" type="number" value=''/>
<span class="highlight"></span><span class="bar"></span>
<label>Phone Number</label>
</div>
<div class="datainput">
<textarea id='wa_textarea' placeholder='' maxlength='5000' row='1' required="" name="alamat"></textarea>
<span class="highlight"></span><span class="bar"></span>
<label>Address</label>
</div>
<button class="btn btn-success btn-kirim" type="submit">Send</button>
<button class="btn btn-success d-none btn-loading" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</button>
<div id="text-info"></div>
<br>
<div class="alert alert-success alert-dismissible fade show d-none btn-loading" role="alert">
  <strong>Thankyou!</strong> We have received your message! please wait for confirmation from us via <strong>Whatsapp</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</form>

<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbxYYVmK-Js1zxtBAEqHlVekYcuctLcc6gQp0B0rC-pioVLHsV6gYDFgsAZ49CWWAcPz5Q/exec'
    const form = document.forms['submit-to-google-sheet'];
    const btnKirim = document.querySelector('.btn-kirim');
    const btnLoading = document.querySelector('.btn-loading');
    const theAlert = document.querySelector('.alert');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      btnLoading.classList.toggle('d-none');
      btnKirim.classList.toggle('d-none');
      fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then((response) => {
          btnLoading.classList.toggle('d-none');
          btnKirim.classList.toggle('d-none');
          theAlert.classList.toggle('d-none');
          form.reset();
          console.log('Success!', response);
        })
        .catch(error => console.error('Error!', error.message))
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</HTML>

</body>
</html>
