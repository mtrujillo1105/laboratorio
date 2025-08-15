<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Solicitantes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #464444;
}

body {
  position: relative; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 13px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: left;
  margin-bottom: 20px;
  margin-top: -17px;
}

#logo img {
  width: 80px;
}

h1 {
  border-bottom: 2px solid  #BD2311;
  color: #444645;
  font-size: 1.5em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: left;
  margin: 0 0 20px 20px;
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

table tr:first-child {
  color: #fff;
  background: #7e2b21;
}

table tr:nth-child(2n-1) td {
  background: rgb(82, 86, 89);
  color: #fff;
}

table tr:nth-child(2n) td {
  background: #fff;
  color: #000;
}

.table td {
   text-align: center;   
}

.table th {
   text-align: center;   
}

#notices {
  text-align: center;
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  position: fixed;
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
/*   background-color: #8A261C; */
}
    </style>
  </head>
  <body>
    <header>
      <div id="logo" style="float: left;">
        <img src="C:\xampp\htdocs\laravel-apps\New\catalogo\public\images\images/uni-logo-color.png">
      </div>
      <img style="width: 170px; float:right;" src="C:\xampp\htdocs\laravel-apps\New\catalogo\public\images\images/LogoLaboratorio.png">

      <h1><div>UNIVERSIDAD  NACIONAL DE INGENIERIA</div>
        <div>Facultad de Ingenieria Electrica y Electronica<br> Laboratorio Nº 06 - Electricidad </div></h1>
      <div id="company" class="clearfix">
<!--         <div>Lima, 28 de Noviembre del 2020</div> -->
      </div>
      <h2 style="text-align:center;">Reporte de Solicitantes LAB 06</h2>
      <div><span>Fecha</span> Lima, 28 de Noviembre del 2020</div>
      <div id="project">
      </div>
    </header>
    <main>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <th scope="col">ITEM</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">RUC</th>
            <th scope="col">DIRECCION</th>
            <th scope="col">TELEFONO</th>
          </tr>
        </thead>
        <tbody>
        @forelse($solicitantes as $item=>$prod)
          <tr>
            <!--actualizado por marck -->
            <td scope="row">{{$item+1}}</td>
            <td class="desc">{{$prod->SOLIC_Nombre}}</td>
            <td class="service">{{$prod->SOLIC_Ruc}}</td>
            <td class="unit">{{$prod->SOLIC_Direccion}}</td>
            <td class="total">{{$prod->SOLIC_Telefono}}</td>
          </tr>
          @empty
            <p><i>No se han encontrado elementos en la base de datos ...</i></p>
          @endforelse
        </tbody>
      </table>
      <div id="notices">
        <div>_____________________________________</div>
        <div class="notice">Ing. Bautista Ruis Juan Pablo</div>
        <div class="notice">Jefe del Laboratorio Nº 06</div>
      </div>
    </main>
    <footer>
      <a>Av. Túpac Amaru 210, Pabellón A - Primer Piso, Apartado Postal 1301 - Perú
      <br>
      Teléfono: (511) 381-3342 Central Telefónica: (511) 481-1070 Anexos: 4840
      <br>
      Sitio Web:  http://www.lefiee.uni.edu.pe - Email: labl1fiee@uni.edu.pe</a>
    </footer>
  </body>
<!--   <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(400, 800, "Pagina $PAGE_NUM", $font, 10);
        ');
    }
</script> -->
</html>
