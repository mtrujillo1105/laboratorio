@extends('layouts.cliente')

@section('title', 'Laboratorio N°6 de Electricidad FIEE-UNI')

@section('content')
        <style>
            .men{
                background-color: #800404;
                text-align: center;
            }
            #header {
                width:fit-content;
                font-family:Arial, Helvetica, sans-serif;
                padding-left: 15rem;
            }

            ul, ol {
                list-style:none;
            }

            .nav > li {
                float:left;
                padding:1rem 0.5rem;
            }

            .nav li a {
                background-color:#800404;
                color:#fff;
                text-decoration:none;
                padding:10px 12px;
                display:block;
                font-weight: bold;
                text-align: left;
            }
            .nav li a:hover,.nav li:hover {
                background-color:#8e0606;
            }

            .nav li ul {
                display:none;
                position:absolute;
                min-width:140px;
                z-index: 9999;

            }

            .nav li:hover > ul {
                display:block;
                padding-top: 1rem;
            }

            .nav li ul li {
                position:relative;
            }

            .nav li ul li ul {
                right:-140px;
                top:0px;
            }
        </style>

        <section style="background-color:rgb(241, 255, 204);padding: 3rem 0 !important; " class="p-0 bg-light-gray wow fadeIn">
            <div class="container " style="padding: 3rem 0">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 text-center align-self-end">
                        <img src="{{ asset('images/images/cuarto/bautista.jpg') }}" style="height: 440px;margin-bottom: 5px;" alt="">
                    </div>
                    <div class="col-12 col-lg-5 col-md-10 text-center text-lg-left offset-lg-1 mx-auto mr-lg-0 lg-padding-50px-tb">

                        <h5 class="text-extra-dark-gray alt-font text-uppercase font-weight-700">
                        Director del Laboratorio
                        </h5>
                        <p class="width-90 md-width-100" style="text-align:justify;">
                        El director del laboratorio N°6 de electricidad, se encarga de planificar, organizar y controlar que todos los objetivos planteados por nuestro equipo de trabajo sean alcanzados en el corto, mediano y largo plazo. Es bajo su liderazgo profesional que la ocurre la sinergia entre las empresas del sector eléctrico y los estudiantes de nuestra escuela profesional. Esto se debe principalmente a que implementa las mejoras necesarias en nuestro laboratorio con miras a alcanzar las exigencias actuales del mercado laboral.
                        </p>
                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top">Juan Pablo Bautista Ríos
                        </span>
                        <span class="d-block">jbautista@uni.edu.pe</span>

                        <span class="d-block">Director del Laboratorio N°6 de Electricidad</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start call to action section -->

        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/jefeadmin.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="padding-top: 3%">
                        Coordinador Técnico Administrativo
                        </h5>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Nuestro Coordinador Técnico Administrativo  se encarga de la gestión interna del Laboratorio. Para ello, distribuye las labores del personal de manera oportuna y eficiente. Además, asegura el cumplimiento de la adecuada atención a los alumnos y docentes para las distintas experiencias que se realizan en el laboratorio.
                        </p>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Adicionalmente, brinda asesoría técnica detallada a los clientes cuando éstos así lo requieran. También coordina y supervisa la ejecución de los ensayos, calibración y contraste de los instrumentos de medida.
                        </p>
                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top">José Luis García Cubas
                        </span>
                        <span class="d-block">jgarciac@uni.pe</span>
                        <span class="d-block">Celular: 980703905</span>
                        <span class="d-block">Coordinador técnico administrativo</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/secretaria1.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="margin: 0;">Personal Administrativo</h5>
                        <p class=" mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">Gracias a nuestro experimentado equipo de trabajo administrativo, estamos consiguiendo la reingeniería que el Laboratorio de Electricidad tanto necesitaba. Ellos elaboran la documentación necesaria para cumplir con los procesos administrativos que exige la Universidad Nacional de Ingeniería, con lo cual aseguramos un correcto y transparente funcionamiento. Adicionalmente, se encargan programar reuniones de trabajo, brindar la información y atender de manera oportuna las solicitudes de las empresas del sector eléctrico con respecto a las pruebas de rutina que realizamos.</p>

                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block alt-font font-weight-600 ">Luz María Cipriano Pujay
                        </span>
                        <span class="d-block">luzcip.18@gmail.com</span>
                        <span class="d-block">Celular: 980962089</span>
                        <span class="d-block">Personal administrativo</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/secretaria2.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="margin: 0;">Personal Administrativo</h5>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Para asegurar una correcta y eficiente atención al cliente, nuestro equipo administrativo
                        está debidamente calificado para dar informes, presenciales y vía telefónica, con respecto a los servicios que brindamos. En este caso, nuestra compañera se encarga también de elaborar los informes y los certificados de calibración que se emiten el laboratorio. De ella depende que nuestros documentos internos estén debidamente ordenados, como corresponde.
                        </p>

                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top"> Criselida Lila Llanto Alvarez
                        </span>
                        <span class="d-block">criselidalila@gmail.com</span>
                        <span class="d-block">Celular: 948662080</span>
                        <span class="d-block">Personal administrativo</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/asistente1.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="margin: 0;">Asistente técnico administrativo</h5>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Como parte de su misión académica, el Laboratorio N°6 de Electricidad incluye dentro de su equipo de trabajo a un estudiante de pre grado, para que asista al personal técnico y administrativo. Las labores que realiza, le permitirán conocer más acerca de las empresas del sector eléctrico. Además, tendrá la oportunidad de aprender cómo es que se llevan a cabo las pruebas a las que se someten los equipos más usados en la industria y el funcionamiento de los instrumentos de medición que se emplean para ello.
                        </p>

                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top">Cesar Eduardo Ochoa Lopez
                        </span>
                        <span class="d-block">cochoal@uni.pe</span>
                        <span class="d-block">Celular: 992687681</span>
                        <span class="d-block">Asistente técnico administrativo</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/asistente2.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="margin: 0;padding-top: 4%;">Técnico Electricista</h5>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Nuestro personal técnico está debidamente capacitado para asistir a los estudiantes de Ingeniería Eléctrica durante las experiencias de laboratorio que realizan para complementar su formación académica. También realizan mantenimiento constante a los instrumentos, equipos y máquinas eléctricas con las que contamos. Además, ellos son los encargados de brindar asistencia y ejecutar las pruebas requeridas por las empresas de la industria pública y privada.
                        </p>

                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top">Fernando Fidel Vidal Mamani
                        </span>
                        <span class="d-block">fidel_38@hotmail.com</span>
                        <span class="d-block">Celular: 913268572</span>
                        <span class="d-block">Técnico Electricista</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/asistente3.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="margin: 0; padding-top: 4%;">Técnico Electricista</h5>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Las pruebas que se realizan en el Laboratorio N°6 de Electricidad FIEE UNI tienen, además, el sello de garantía de profesionales con amplia experiencia en pruebas a materiales eléctricos como cables de MT y BT; Aisladores, Seccionadores cut out, Elementos de protección personal, Camiones grúas con brazo hidráulico, Transformadores de potencia y calibración de instrumentos de medición.
                        </p>

                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top">Cristian Paul Miche Antara
                        </span>
                        <span class="d-block">miche_2005_10@hotmail.com</span>
                        <span class="d-block">Celular: 957608132</span>
                        <span class="d-block">Técnico Electricista</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section style="background-color:rgb(241, 255, 204); padding: 3rem 0;" class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5 md-margin-30px-bottom wow fadeIn">
                        <img src="{{ asset('images/images/cuarto/asistente4.jpg') }}" alt=""/>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-1 text-center text-lg-left wow fadeIn">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600" style="margin: 0; padding-top: 4%;">Técnico Electricista</h5>
                        <p class="margin-40px-bottom mx-auto mx-lg-0 md-margin-30px-bottom md-width-90 sm-width-100" style="text-align:justify;">
                        Nuestras instalaciones ubicadas en el Sector S, a la altura de la puerta N° 6 de la UNI, se encuentran correctamente equipadas con instrumentos de alta gama. Estos últimos, permitirán a los estudiantes mejorar su aprendizaje durante las experiencias académicas de laboratorio, y estar debidamente capacitados para trabajar con equipos modernos cuando les corresponda afrontar las exigencias del mercado laboral.
                        </p>

                        <div style="text-align: center">
                        <span class="text-extra-dark-gray text-large d-block margin-30px-top alt-font font-weight-600 sm-margin-20px-top">Carlos Minaya Zavaleta
                        </span>
                        <span class="d-block">carlosminayaz@hotmail.com</span>
                        <span class="d-block">Celular: 991342642</span>
                        <span class="d-block">Técnico Electricista</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection