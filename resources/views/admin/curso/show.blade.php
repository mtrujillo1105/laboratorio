<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Curso N° {{$producto->id_curso}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
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
table tr:nth-child(2n-1) td {
  background: #E9F43A;
}

/*  table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #E9F43A;
}

table tr:nth-child(2n) td {
  background: #000;
  color: #ffff;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 10px;
  text-align: left;
  vertical-align: top;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
  text-align: center;
}

table td.grand {
  border-top: 1px solid #5D6975;;
} */ 

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header>
      <div id="logo" style="float: left;">
        <img src="C:\xampp\htdocs\laravel-apps\New\catalogo\public\images\images/uni-logo-color.png">
      </div>
      <img style="width: 150px; float:right;" src="C:\xampp\htdocs\laravel-apps\New\catalogo\public\images\images/LogoLaboratorio.png">

      <h1><div>UNIVERSIDAD  NACIONAL DE INGENIERIA</div>
        <div>Facultad de Ingenieria Electrica y Electronica<br> Laboratorio Nº 06 - Electricidad </div></h1>
      <div id="company" class="clearfix">
        <div>Lima, 28 de Noviembre del 2020</div>
      </div>
      <h2 style="text-align:center;">COTIZACION Nº 01 LAB 06</h2>
      <div id="project">
        <div><span>Fecha</span> Lima, 28 de Noviembre del 2020</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
    <table border="1" class="table table-striped">
      <tr>
        <th colspan=2 width="40%" bgcolor="#A2A2A2">DATOS DEL PROVEEDOR</th>
        <th colspan=2 bgcolor="#A2A2A2">DATOS DEL CLIENTE</th>
      </tr>
      <tr>
        <td width="20%">RAZON SOCIAL <br> RUC <br> DIRECCION </td> <td>ABB. SAC <br> 39393939 <br> lima </td> <td width="18%">RAZON SOCIAL <br> RUC <br> DIRECCION </td> <td>UNIVERSIDAD NACIONAL DE INGENIERIA <br> 18181881 <br> RIMAC LIMA</td> 
      </tr>
    </table>
      <table border="1" class="table table-striped">
        <thead>
          <tr>
            <th class="service">ITEM</th>
            <th class="desc">DESCRIPCION</th>
            <th>NOMBRE DEL CURSO</th>
            <th>PRECIO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td scope="row">{{$producto->id_curso}}</td>
              <td class="desc">{{$producto->CURSOC_Descripcion}}</td>
              <td class="service">{{$producto->CURSOC_Nombre}}</td>
              <td class="unit">{{$producto->CURSOC_Costo}}</td>
              <td class="total">{{$producto->CURSOC_Costo}}</td>
            </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">IGV 18%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr> 
        </tbody>
      </table>
      <table border="1" class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col" class="text-center">Año</th>
            <th scope="col" class="text-right">Precio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">{{$producto->id_curso}}</td>
            <td class="desc">{{$producto->CURSOC_Descripcion}}</td>
            <td class="service">{{$producto->CURSOC_Nombre}}</td>
            <td class="unit">{{$producto->CURSOC_Costo}}</td>
            <td class="total">{{$producto->CURSOC_Costo}}</td>
        </tr> 
    </tbody>
    <tfoot class="table-dark">
        <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">IGV 18%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4"><strong>Total</strong></td>
            <td class="text-right"><strong>24.910€</strong></td>
        </tr>
    </tfoot>
</table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Av. Túpac Amaru 210, Pabellón A - Primer Piso, Apartado Postal 1301 - Perú
      <br>
      Sitio Web:  http://www.lefiee.uni.edu.pe - Email: labl1fiee@uni.edu.pe
    </footer>
  </body>
</html>