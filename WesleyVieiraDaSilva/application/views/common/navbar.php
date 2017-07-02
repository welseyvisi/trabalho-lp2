
<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url('') ?>">
            <strong>Home</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('index.php/inicio/sobre') ?>">Sobre o Trabalho <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/inicio/principal') ?>">API</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/inicio/relatorio') ?>">Relatorio de interacao</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<script>
  $('.nav-item.active').removeClass('active');
  $('.nav-item').has('a[href="' + window.location.href + '"]').addClass('active');
</script>
