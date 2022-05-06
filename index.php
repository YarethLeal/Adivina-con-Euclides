<?php require 'read.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yareth Leal">
    <link rel="icon" type="image/png" href="public/img/adivino.png"/>
    <title>Adivina con Euclides</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#formEstilo').submit(function(e) {
                e.preventDefault();
                ec = parseInt($('#c5').val()) + parseInt($('#c9').val()) + parseInt($('#c13').val()) + parseInt($('#c17').val()) + parseInt($('#c25').val()) + parseInt($('#c29').val());
                or = parseInt($('#c2').val()) + parseInt($('#c10').val()) + parseInt($('#c22').val()) + parseInt($('#c26').val()) + parseInt($('#c30').val()) + parseInt($('#c34').val());
                ca = parseInt($('#c7').val()) + parseInt($('#c11').val()) + parseInt($('#c15').val()) + parseInt($('#c19').val()) + parseInt($('#c31').val()) + parseInt($('#c35').val());
                ea = parseInt($('#c4').val()) + parseInt($('#c12').val()) + parseInt($('#c24').val()) + parseInt($('#c28').val()) + parseInt($('#c32').val()) + parseInt($('#c36').val());
                var values = {
                    formulary: 0,
                    userData: ["no", ec, or, ca, ea, "no", "no"]
                };
                $.ajax({
                    type: "POST",
                    url: 'read.php',
                    data: values,
                    success: function(response) {
                        $('#Resultado1').text(response);
                    }
                });
            });
            $('#formRecinto').submit(function(e) {
                e.preventDefault();
                var values = {
                    formulary: 1,
                    userData: [$('#recintoSexo').val(), "", parseFloat($('#recintoPromedio').val()), 0, 0, 0, 0, 0, 0, $('#recintoEstilo').val()]
                };
                $.ajax({
                    type: "POST",
                    url: 'read.php',
                    data: values,
                    success: function(response) {
                        $('#Resultado2').text(response);
                    }
                });
            });
            $('#formSexo').submit(function(e) {
                e.preventDefault();
                var values = {
                    formulary: 2,
                    userData: ["", $('#sexoRecinto').val(), parseFloat($('#sexoPromedio').val()), 0, 0, 0, 0, 0, 0, $('#sexoEstilo').val()]
                };
                $.ajax({
                    type: "POST",
                    url: 'read.php',
                    data: values,
                    success: function(response) {
                        $('#Resultado3').text(response);
                    }
                });
            });
            $('#formEstilo2').submit(function(e) {
                e.preventDefault();
                var values = {
                    formulary: 3,
                    userData: [$('#aprendizajeSexo').val(), $('#aprendizajeRecinto').val(), parseFloat($('#aprendizajePromedio').val()), 0, 0, 0, 0, 0, 0, ""]
                };
                $.ajax({
                    type: "POST",
                    url: 'read.php',
                    data: values,
                    success: function(response) {
                        $('#Resultado4').text(response);
                    }
                });
            });
            $('#formProfesor').submit(function(e) {
                e.preventDefault();
                var values = {
                    formulary: 4,
                    userData: [parseInt($('#profesorEdad').val()), $('#profesorSexo').val(), $('#profesorExp').val(), parseInt($('#profesorTimes').val()), $('#profesorArea').val(), $('#profesorHabilidad').val(), $('#profesorHabilidadW').val(), $('#profesorWeb').val(), ""]
                };
                $.ajax({
                    type: "POST",
                    url: 'read.php',
                    data: values,
                    success: function(response) {
                        $('#Resultado5').text(response);
                    }
                });
            });
            $('#formRedes').submit(function(e) {
                e.preventDefault();
                var values = {
                    formulary: 5,
                    userData: [0, parseInt($('#redConfiable').val()), parseInt($('#redLinks').val()), $('#redCapacidad').val(), $('#redCosto').val(), ""]
                };
                $.ajax({
                    type: "POST",
                    url: 'read.php',
                    data: values,
                    success: function(response) {
                        $('#Resultado6').text(response);
                    }
                });
            });
        });
    </script>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bd-navbar fixed-top bg-dark">
            <div class="container-xxl flex-wrap flex-md-nowrap">
                <a class="navbar-brand" href="#">
                    <img src="public/img/adivino.png" alt="" width="36" height="36">
                    Euclides
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0">
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2 active" aria-current="page" href="#divInicio">Inicio</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="#divAprendizaje">Aprendizaje</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="#divRecinto">Recinto</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="#divSexo">Sexo</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="#divAprendizaje2">Aprendizaje 2</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="#divProfesor">Profesor</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="#divRedes">Redes</a>
                        </li>
                    </ul>
                    <hr class="d-md-none text-white-50">
                    <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="https://github.com/YarethLeal" target="_blank" rel="noopener">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="navbar-nav-svg d-inline-block align-text-top" viewBox="0 0 512 499.36" role="img">
                                    <title>GitHub</title>
                                    <path fill="currentColor" fill-rule="evenodd" d="M256 0C114.64 0 0 114.61 0 256c0 113.09 73.34 209 175.08 242.9 12.8 2.35 17.47-5.56 17.47-12.34 0-6.08-.22-22.18-.35-43.54-71.2 15.49-86.2-34.34-86.2-34.34-11.64-29.57-28.42-37.45-28.42-37.45-23.27-15.84 1.73-15.55 1.73-15.55 25.69 1.81 39.21 26.38 39.21 26.38 22.84 39.12 59.92 27.82 74.5 21.27 2.33-16.54 8.94-27.82 16.25-34.22-56.84-6.43-116.6-28.43-116.6-126.49 0-27.95 10-50.8 26.35-68.69-2.63-6.48-11.42-32.5 2.51-67.75 0 0 21.49-6.88 70.4 26.24a242.65 242.65 0 0 1 128.18 0c48.87-33.13 70.33-26.24 70.33-26.24 14 35.25 5.18 61.27 2.55 67.75 16.41 17.9 26.31 40.75 26.31 68.69 0 98.35-59.85 120-116.88 126.32 9.19 7.9 17.38 23.53 17.38 47.41 0 34.22-.31 61.83-.31 70.23 0 6.85 4.61 14.81 17.6 12.31C438.72 464.97 512 369.08 512 256.02 512 114.62 397.37 0 256 0z"></path>
                                </svg>
                                <small class="d-md-none ms-2">GitHub</small>
                            </a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link p-2" href="https://www.linkedin.com/in/yareth-gerardo-leal-arguedas-6639841b7" target="_blank" rel="noopener">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <title>Linkedin</title>
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                                <small class="d-md-none ms-2">Linkedin</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" id="divInicio">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 fw-normal">Adivina con Euclides</h1>
                <p class="lead fw-normal">Es un sitio que cuenta con distintos formularios para adivinar su resultado usando el algoritmo de cálculo de distancia de Euclides</p>
                <a class="btn btn-outline-secondary" href="#">Coming soon</a>
            </div>
        </section>
        <section id="divAprendizaje" style="padding:100px 20px;">
            <h3>¿Cuál es su estilo de aprendizaje?</h3>
            <p>Asigne valores del 1 al 4 ,donde 4 es el valor que más caracteriza su estilo de aprendizaje y 1 el que menos lo hace.</p>
            <div class="table-responsive">
                <form name="formEstilo" id="formEstilo">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td style="vertical-align: top;width: 25%;">
                                    <select name="c1" id="c1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    discerniendo
                                </td>
                                <td style="vertical-align: top;width: 25%;">
                                    <select name="c2" id="c2">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    ensayando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c3" id="c3">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    involucrándome
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c4" id="c4">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    practicando
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c5" id="c5">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    receptivamente
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c6" id="c6">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    relacionando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c7" id="c7">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    analíticamente
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c8" id="c8">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    imparcialmente
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c9" id="c9">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    sintiendo
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c10" id="c10">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    observando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c11" id="c11">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    pensando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c12" id="c12">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    haciendo
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c13" id="c13">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    aceptando
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c14" id="c14">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    arriesgando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c15" id="c15">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    evaluando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c16" id="c16">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    con cautela
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c17" id="c17">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    intuitivamente
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c18" id="c18">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    productivamente
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c19" id="c19">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    lógicamente
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c20" id="c20">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    cuestionando
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c21" id="c21">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    abstracto
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c22" id="c22">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    observando
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c23" id="c23">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    concreto
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c24" id="c24">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    activo
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c25" id="c25">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    orientado al presente
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c26" id="c26">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    reflexivamente
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c27" id="c27">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    orientado hacia el futuro
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c28" id="c28">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    pragmático
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c29" id="c29">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    aprendo más de la experiencia
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c30" id="c30">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    aprendo más de la observación
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c31" id="c31">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    aprendo más de la conceptualización
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c32" id="c32">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    aprendo más de la experimentación
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c33" id="c33">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    emotivo
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                    <select name="c34" id="c34">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    reservado
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c35" id="c35">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    racional
                                </td>
                                <td style="vertical-align: top;">
                                    <select name="c36" id="c36">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    abierto
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <input value="Calcular" type="submit">
                </form>
                <div>
                    <p>El estilo de aprendizaje es: <span id="Resultado1"></p>
                </div>
            </div>
        </section>
        <section id="divRecinto" style="padding:100px 20px;">
            <h3>¿Cuál es su recinto?</h3>
            <p>Seleccione un valor para adivinar su recinto de origen</p>
            <form name="formRecinto" id="formRecinto">
                <div class="mb-3">
                    <label for="recintoEstilo">Estilo de aprendizaje</label>
                    <select class="form-select" name="recintoEstilo" id="recintoEstilo">
                        <option value="DIVERGENTE">Divergente</option>
                        <option value="CONVERGENTE">Convergente</option>
                        <option value="ASIMILADOR">Asimilador</option>
                        <option value="ACOMODADOR">Acomodador</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recintoSexo">Sexo</label>
                    <select class="form-select" name="recintoSexo" id="recintoSexo">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recintoPromedio">Promedio</label>
                    <input type="number" name="recintoPromedio" id="recintoPromedio" step="0.01" required>
                </div>
                <input value="Adivinar" type="submit">
            </form>
            <div>
                <p>El recinto es: <span id="Resultado2"></p>
            </div>
        </section>
        <section id="divSexo" style="padding:100px 20px;">
            <h3>¿Cuál es su Sexo?</h3>
            <p>Seleccione un valor para adivinar su sexo</p>
            <form name="formSexo" id="formSexo">
                <div class="mb-3">
                    <label for="sexoEstilo">Estilo de aprendizaje</label>
                    <select class="form-select" name="sexoEstilo" id="sexoEstilo">
                        <option value="DIVERGENTE">Divergente</option>
                        <option value="CONVERGENTE">Convergente</option>
                        <option value="ASIMILADOR">Asimilador</option>
                        <option value="ACOMODADOR">Acomodador</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sexoRecinto">Recinto</label>
                    <select class="form-select" name="sexoRecinto" id="sexoRecinto">
                        <option value="Paraiso">Paraiso</option>
                        <option value="Turrialba">Turrialba</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sexoPromedio">Promedio</label>
                    <input type="number" name="sexoPromedio" id="sexoPromedio" step="0.01" required>
                </div>
                <input value="Adivinar" type="submit">
            </form>
            <div>
                <p>El sexo es: <span id="Resultado3"></p>
            </div>
        </section>
        <section id="divAprendizaje2" style="padding:100px 20px;">
            <h3>¿Cuál es su estilo de aprendizaje?</h3>
            <p>Seleccione un valor para adivinar su estilo de aprendizaje</p>
            <form name="formEstilo2" id="formEstilo2">
                <div class="mb-3">
                    <label for="aprendizajeRecinto">Recinto</label>
                    <select class="form-select" name="aprendizajeRecinto" id="aprendizajeRecinto">
                        <option value="Paraiso">Paraiso</option>
                        <option value="Turrialba">Turrialba</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="aprendizajeSexo">Sexo</label>
                    <select class="form-select" name="aprendizajeSexo" id="aprendizajeSexo">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="aprendizajePromedio">Promedio</label>
                    <input type="number" name="aprendizajePromedio" id="aprendizajePromedio" step="0.01" required>
                </div>
                <input value="Adivinar" type="submit">
            </form>
            <div>
                <p>El estilo de aprendizaje es: <span id="Resultado4"></p>
            </div>
        </section>
        <section id="divProfesor" style="padding:100px 20px;">
            <h3>¿Qué tipo de profesor eres?</h3>
            <p>Seleccione un valor para adivinar el tipo de profesor</p>
            <form class="row g-3" name="formProfesor" id="formProfesor">
                <div class="col-md-4 mb-3">
                    <label for="profesorEdad">Edad</label>
                    <select class="form-select" name="profesorEdad" id="profesorEdad">
                        <option value="1">Edad <= 30</option>
                        <option value="2">Edad > 30 y <= 55</option>
                        <option value="3">Edad > 55</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorSexo">Sexo</label>
                    <select class="form-select" name="profesorSexo" id="profesorSexo">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                        <option value="NA">No aplica</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorExp">Experiencia enseñando</label>
                    <select class="form-select" name="profesorExp" id="profesorExp">
                        <option value="B">Novato</option>
                        <option value="I">Intermedio</option>
                        <option value="A">Avanzado</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorTimes">Veces que ha impartido el curso</label>
                    <select class="form-select" name="profesorTimes" id="profesorTimes">
                        <option value="1">Nunca</option>
                        <option value="2">1 a 5</option>
                        <option value="3">Más de 5</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorArea">Disciplina o area de experiencia</label>
                    <select class="form-select" name="profesorArea" id="profesorArea">
                        <option value="DM">Toma de desiciones</option>
                        <option value="ND">Diseño de redes</option>
                        <option value="O">Otro</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorHabilidad">Habilidad con la computadora</label>
                    <select class="form-select" name="profesorHabilidad" id="profesorHabilidad">
                        <option value="L">Baja</option>
                        <option value="A">Promedio</option>
                        <option value="H">Alta</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorHabilidadW">Experiencia usando tecnologias web para enseñar</label>
                    <select class="form-select" name="profesorHabilidadW" id="profesorHabilidadW">
                        <option value="N">Nunca</option>
                        <option value="S">Algunas veces</option>
                        <option value="O">Siempre</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="profesorWeb">Experiencia usando sitios web</label>
                    <select class="form-select" name="profesorWeb" id="profesorWeb">
                        <option value="N">Nunca</option>
                        <option value="S">Algunas veces</option>
                        <option value="O">Siempre</option>
                    </select>
                </div>
                <div class="col-12">
                    <input value="Adivinar" type="submit">
                </div>
            </form>
            <div>
                <p>El tipo de profesor es: <span id="Resultado5"></p>
            </div>
        </section>
        <section id="divRedes" style="padding:100px 20px;">
            <h3>¿Cuál es su tipo de red?</h3>
            <p>Seleccione un valor para adivinar su tipo de red</p>
            <form name="formRedes" id="formRedes">
                <div class="mb-3">
                    <label for="redConfiable">Confiabilidad</label>
                    <input type="number" name="redConfiable" id="redConfiable" min="2" max="5" required>
                </div>
                <div class="mb-3">
                    <label for="redLinks">Numero de links</label>
                    <input type="number" name="redLinks" id="redLinks" min="7" max="20" required>
                </div>
                <div class="mb-3">
                    <label for="redCapacidad">Capacidad total</label>
                    <select class="form-select" name="redCapacidad" id="redCapacidad">
                        <option value="low">Baja</option>
                        <option value="medium">Media</option>
                        <option value="high">Alta</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="redCosto">Costo</label>
                    <select class="form-select" name="redCosto" id="redCosto">
                        <option value="low">Baja</option>
                        <option value="medium">Media</option>
                        <option value="high">Alta</option>
                    </select>
                </div>
                <input value="Adivinar" type="submit">
            </form>
            <div>
                <p>El tipo de red es: <span id="Resultado6"></p>
            </div>
        </section>
    </main>
</body>

</html>