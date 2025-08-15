<template>
  <div class="container">
    <div v-if="tipo == 'ensayo'">
      <h1 style="text-align: center; font-size: 60px; margin-bottom: 30px">
        Cotizacion de Ensayo
      </h1>
      <div class="row">
        <div class="col-sm-7 border" style="background-color: #94f691">
          <h3>Empresa Solicitante</h3>
          <table class="table">
            <tr>
              <td>Nombre:</td>
              <td>{{ solicitante.SOLIC_Nombre }}</td>
            </tr>
            <tr>
              <td>Tipo:</td>
              <td>{{ solicitante.tiposSolicitanteDescripcion }}</td>
            </tr>
            <tr>
              <td>RUC:</td>
              <td>{{ solicitante.SOLIC_Ruc }}</td>
            </tr>
            <tr>
              <td>Direccion:</td>
              <td>{{ solicitante.SOLIC_Direccion }}</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td>{{ solicitante.SOLIC_Telefono }}</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>{{ solicitante.SOLIC_Email }}</td>
            </tr>
            <tr>
              <td>Ubicacion:</td>
              <td>{{ solicitante.ubigeoCompleto }}</td>
            </tr>
          </table>
        </div>
        <div class="col-sm-5 border" style="background-color: #d6dfde">
          <h3>Representante de la Empresa Solicitante</h3>
          <table class="table">
            <tr>
              <td>Nombre del Contacto:</td>
              <td>{{ contacto.nombre_contacto }}</td>
            </tr>
            <tr>
              <td>Correo Electronico del Contacto:</td>
              <td>{{ contacto.correo_contacto }}</td>
            </tr>
            <tr>
              <td>Celular del Contacto:</td>
              <td>{{ contacto.celular_contacto }}</td>
            </tr>
          </table>
        </div>
      </div>
      <br />
      <br />
      <div
        class="row"
        v-if="equipos != null && equipos != [] && equipos.length > 0"
      >
        <h3 style="">Equipos que forman parte de la Cotizacion de Ensayo</h3>
        <table class="table" style="background-color: #d5f4e6">
          <thead>
            <tr>
              <th>Nombre del Equipo</th>
              <th>Descripcion del Equipo</th>
              <th>Cantidad</th>
              <th>Fabricante</th>
              <th v-if="esBusquedaHistorica">Precio</th>
              <th v-if="esBusquedaHistorica">Total</th>
            </tr>
          </thead>
          <tbody v-for="ensayo in equipos">
            <tr>
              <td v-text="ensayo.CODEC_Nombre_Equipo"></td>
              <td v-text="ensayo.CODEC_Descripcion_Equipo"></td>
              <td v-text="ensayo.CODEC_Cantidad"></td>
              <td v-text="ensayo.CODEC_Fabricante_Equipo"></td>
              <td v-if="esBusquedaHistorica">{{ensayo.CODEC_Costo}}</td>
              <td v-if="esBusquedaHistorica">{{ensayo.CODEC_SubTotal}}</td>
            </tr>

            <tr
              v-if="
                ensayo.pruebas != null &&
                ensayo.pruebas != [] &&
                ensayo.pruebas.length > 0
              "
            >
              <td :colspan='esBusquedaHistorica ? "6" : "4"' style="background-color: white">
                <div
                  style="
                    border-style: solid;
                    border-width: 0.005cm;
                    background-color: #fefbd8;
                    margin-top: 10px;
                  "
                >
                  <h6 style="margin-left: 5px">
                    Listado de Pruebas a realizar en el Equipo
                  </h6>
                  <table class="table" style="font-size: 12px">
                    <thead>
                      <tr>
                        <th>Identificador</th>
                        <th>Descripcion de la Prueba</th>
                        <th>Norma asociada a la Prueba</th>
                        <th>Descripcion de la Norma</th>
                        <th v-if="esBusquedaHistorica">Costo de la prueba</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(prueba, index) in ensayo.pruebas"
                        :key="index"
                      >
                        <td>{{ index + 1 }}</td>
                        <td v-text="prueba.Descripcion_Prueba"></td>
                        <td v-text="prueba.Norma_Asoc_Prueba"></td>
                        <td v-text="prueba.Descripcion_Norma"></td>
                        <th v-if="esBusquedaHistorica">{{prueba.Costo}}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row" style="margin-top: 30px; margin-left: 22%">
        <div class="col-sm-8">
          <h4>Correos Electronicos asociados a la Cotizacion</h4>
          <table class="table boder table-striped">
            <thead>
              <tr>
                <th style="width: 10px; text-align: center">Identificador</th>
                <th style="width: 60px">Correo Electronico</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center">1</td>
                <td>{{ cotizacion.COTIC_Correo1 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">2</td>
                <td>{{ cotizacion.COTIC_Correo2 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">3</td>
                <td>{{ cotizacion.COTIC_Correo3 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">4</td>
                <td>{{ cotizacion.COTIC_Correo4 }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div v-else-if="tipo == 'calibracion'">
      <h1 style="text-align: center; font-size: 60px; margin-bottom: 30px">
        Cotizacion de Calibraciones
      </h1>
      <div class="row">
        <div class="col-sm-7 border" style="background-color: #94f691">
          <h3>Empresa Solicitante</h3>
          <table class="table">
            <tr>
              <td>Nombre:</td>
              <td>{{ solicitante.SOLIC_Nombre }}</td>
            </tr>
            <tr>
              <td>Tipo:</td>
              <td>{{ solicitante.tiposSolicitanteDescripcion }}</td>
            </tr>
            <tr>
              <td>RUC:</td>
              <td>{{ solicitante.SOLIC_Ruc }}</td>
            </tr>
            <tr>
              <td>Direccion:</td>
              <td>{{ solicitante.SOLIC_Direccion }}</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td>{{ solicitante.SOLIC_Telefono }}</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>{{ solicitante.SOLIC_Email }}</td>
            </tr>
            <tr>
              <td>Ubicacion:</td>
              <td>{{ solicitante.ubigeoCompleto }}</td>
            </tr>
          </table>
        </div>
        <div class="col-sm-5 border" style="background-color: #d6dfde">
          <h3>Representante de la Empresa Solicitante</h3>
          <table class="table">
            <tr>
              <td>Nombre del Contacto:</td>
              <td>{{ contacto.nombre_contacto }}</td>
            </tr>
            <tr>
              <td>Correo Electronico del Contacto:</td>
              <td>{{ contacto.correo_contacto }}</td>
            </tr>
            <tr>
              <td>Celular del Contacto:</td>
              <td>{{ contacto.celular_contacto }}</td>
            </tr>
          </table>
        </div>
      </div>
      <br />
      <br />
      <div
        class="row"
        v-if="equipos != null && equipos != [] && equipos.length > 0"
      >
        <h3 style="">
          Equipo que forman parte de la Cotizacion de Calibracion
        </h3>
        <table class="table" style="background-color: #d5f4e6">
          <thead>
            <tr>
              <th>Nombre del Equipo</th>
              <th>Descripcion del Equipo</th>
              <th>Cantidad</th>
              <th>Fabricante</th>
              <th v-if="esBusquedaHistorica">Precio</th>
              <th v-if="esBusquedaHistorica">Total</th>
            </tr>
          </thead>
          <tbody v-for="ensayo in equipos">
            <tr>
              <td v-text="ensayo.CODEC_Nombre_Equipo"></td>
              <td v-text="ensayo.CODEC_Descripcion_Equipo"></td>
              <td v-text="ensayo.CODEC_Cantidad"></td>
              <td v-text="ensayo.CODEC_Fabricante_Equipo"></td>
              <td v-if="esBusquedaHistorica">{{ensayo.CODEC_Costo}}</td>
              <td v-if="esBusquedaHistorica">{{ensayo.CODEC_SubTotal}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row" style="margin-top: 30px; margin-left: 22%">
        <div class="col-sm-8">
          <h4>Correos Electronicos asociados a la Cotizacion</h4>
          <table class="table boder table-striped">
            <thead>
              <tr>
                <th style="width: 10px; text-align: center">Identificador</th>
                <th style="width: 60px">Correo Electronico</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center">1</td>
                <td>{{ cotizacion.COTIC_Correo1 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">2</td>
                <td>{{ cotizacion.COTIC_Correo2 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">3</td>
                <td>{{ cotizacion.COTIC_Correo3 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">4</td>
                <td>{{ cotizacion.COTIC_Correo4 }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div v-else-if="tipo == 'capacitacion'">
      <h1 style="text-align: center; font-size: 60px; margin-bottom: 30px">
        Cotizacion de Capacitación
      </h1>
      <div class="row">
        <div class="col-sm-7 border" style="background-color: #94f691">
          <h3>Empresa Solicitante</h3>
          <table class="table">
            <tr>
              <td>Nombre:</td>
              <td>{{ solicitante.SOLIC_Nombre }}</td>
            </tr>
            <tr>
              <td>Tipo:</td>
              <td>{{ solicitante.tiposSolicitanteDescripcion }}</td>
            </tr>
            <tr>
              <td>RUC:</td>
              <td>{{ solicitante.SOLIC_Ruc }}</td>
            </tr>
            <tr>
              <td>Direccion:</td>
              <td>{{ solicitante.SOLIC_Direccion }}</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td>{{ solicitante.SOLIC_Telefono }}</td>
            </tr>
            <tr>
              <td>Email:</td>
              <td>{{ solicitante.SOLIC_Email }}</td>
            </tr>
            <tr>
              <td>Ubicacion:</td>
              <td>{{ solicitante.ubigeoCompleto }}</td>
            </tr>
          </table>
        </div>
        <div class="col-sm-5 border" style="background-color: #d6dfde">
          <h3>Representante de la Empresa Solicitante</h3>
          <table class="table">
            <tr>
              <td>Nombre del Contacto:</td>
              <td>{{ contacto.nombre_contacto }}</td>
            </tr>
            <tr>
              <td>Correo Electronico del Contacto:</td>
              <td>{{ contacto.correo_contacto }}</td>
            </tr>
            <tr>
              <td>Celular del Contacto:</td>
              <td>{{ contacto.celular_contacto }}</td>
            </tr>
          </table>
        </div>
      </div>
      <br />
      <br />
      <div class="row" v-if="capacitaciones != null && capacitaciones != [] && capacitaciones.length > 0">
        <h3 style="">
          Cursos que forman parte de la Cotizacion de Capacitacion
        </h3>
        <table class="table" style="background-color: #d5f4e6">
          <thead>
            <tr>
              <th>Identificador</th>
              <th>Nombre del Curso</th>
              <th>Descripcion del Curso</th>
              <th>Cantidad de Inscritos</th>
            </tr>
          </thead>
          <tbody v-for="(capacitacion, index) in capacitaciones" :key="index">
            <tr>
              <td>{{index + 1}}</td>
              <td v-text="capacitacion.CURSOC_Nombre"></td>
              <td v-text="capacitacion.CURSOC_Descripcion"></td>
              <td v-text="capacitacion.COCAC_Cantidad"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row" style="margin-top: 30px; margin-left: 22%">
        <div class="col-sm-8">
          <h4>Correos Electronicos asociados a la Cotizacion</h4>
          <table class="table boder table-striped">
            <thead>
              <tr>
                <th style="width: 10px; text-align: center">Identificador</th>
                <th style="width: 60px">Correo Electronico</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center">1</td>
                <td>{{ cotizacion.COTIC_Correo1 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">2</td>
                <td>{{ cotizacion.COTIC_Correo2 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">3</td>
                <td>{{ cotizacion.COTIC_Correo3 }}</td>
              </tr>
              <tr>
                <td style="text-align: center">4</td>
                <td>{{ cotizacion.COTIC_Correo4 }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row" v-if="esBusquedaHistorica">
        <div class="col-9"></div>
        <div class="col-3">
            <table width="100%">
            <tbody class="table">
                <tr>
                    <td><strong>Sub Total :</strong></td>
                    <td><strong>{{ formatPrice(cotizacion.COTIC_SubTotal) }}</strong></td>
                </tr>
                <tr>
                    <td><strong>IGV :</strong></td>
                    <td><strong>{{ formatPrice(cotizacion.COTIC_Igv) }}</strong></td>
                </tr>
                <tr>
                    <td><strong>Total :</strong></td>
                    <td><strong>{{ formatPrice(cotizacion.COTIC_Total) }}</strong></td>
                </tr>
            </tbody>
        </table>
        </div>

    </div>
  </div>
</template>
<script src="./VistaPreliminarComponent.js">

</script>
