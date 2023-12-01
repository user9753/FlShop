<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c2a03e912f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/footer.css" rel="stylesheet">
    <title>Početna</title>
</head>
<body>

<header>
    <nav>
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="menu">
            <li><a href="{{ url('/') }}">Početna</a></li>
            <li><a href="{{ url('/proizvod') }}">Proizvodi</a></li>
            <li><a href="{{ url('/kontakt') }}">Kontakt</a></li>
            <li class="cart"><a href="{{ url('/korpa') }}"><i class="fa-solid fa-cart-shopping"></i> Korpa</a></li>
        </ul>
    </nav>
</header>

@yield('sadrzaj')


<footer>
    <div class="footer-basic">
         <div class="containers">
            <div class="row">
            
    <div class="col-md-4 col-sm-12"> 
        <p><b>O nama</b></p>
        <p>Vodenica je stara oko 150 godina, nalazi se na Backoj reci i jedna je od retkih koja je danas sačuvana i aktivno melje.  <br>  
        <a href="#" class="fa fa-facebook"></a>  
        <a href="#" class="fa fa-instagram"></a></p>
     </div>
           
     <div class="col-md-4 col-sm-12"> 
        <p><b>Linkovi</b></p>
        <p><a href="#" class="">Dostava</a><br>
        <a href="#" class="">Galerija</a><br>
        <a href="proizvod" class="">Proizvodi</a></p>
     </div>

    <div class="col-md-4 col-sm-12"> 
    <p class="mail"><b>Kontakt:</b><br>
        <i class="fa-solid fa-location-dot"></i> Tulare - Prokuplje, Srbija<br>
    <i class="fa-solid fa-envelope"></i>
		<a href="mailto:vodenica@gmail.com">
			vodenica@gmail.com</a><br><i class="fa-solid fa-phone"></i> 060/12-34-567<br>
           </p>
    </div>
    </div>
    </div>

    <div class="containers">
        <div class="row">
            <div class="col-md-12">
            <p class="copyright">Vodenica potočara Tulare © 2024</p>
    </div>
    </div>
</div>
</footer>
    

</body>
</html>


<style>

header {
    background-color: #F5DEB3; 
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
}

.menu-toggle {
    cursor: pointer;
    font-size: 20px;
    display: none; 
}

.menu {
    list-style: none;
    display: flex;
}

.menu li {
    margin-right: 20px;
    text-transform: uppercase; 
}

.cart {
    display: flex;
    align-items: center;
    justify-content: center;
}



.menu a {
    text-decoration: none; 
    color: black; 
}


.menu a:hover {
    color: #F5DEB3; 
}


.menu-toggle {
    cursor: pointer;
    font-size: 20px;
    display: none; 
}


@media (max-width: 768px) {
    .menu-toggle {
        display: block;
    }

    .menu {
        display: none;  
        flex-direction: column;
        background-color: #F5DEB3; 
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        text-align: center;
    }

    .menu.active {
        display: flex;
    }

    .cart {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (min-width: 769px) {
    .menu-toggle {
        display: none;
    }
}

}

</style>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('active');
    });
    
    
    const mobileMenuBreakpoint = 768;
    if (window.innerWidth < mobileMenuBreakpoint) {
        menuToggle.style.display = 'block';
    }
});


</script>

    
</body>
</html>