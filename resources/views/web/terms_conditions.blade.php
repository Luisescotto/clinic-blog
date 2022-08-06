@extends('layouts.web')
@section('meta_description', '')
@section('title', 'Términos y condiciones')
@section('styles')


@endsection
@section('content')
 
 <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('web.welcome')}}">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Términos y condicioness</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact-area pb-34 pb-md-18 pb-sm-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="contact-message">
                            <h2>Términos y Condiciones</h2>
                            
                                <div class="row">
                                    <div class="col-lg-10 col-md-6 col-sm-6">
                                        <p style="color: #fff">
                                            
                                            Bienvenido a {{$web_company->name}}. Tal como se utiliza en estos términos y condiciones, "nosotros" o "{{$web_company->name}}" significa {{$web_company->name}} Services LLC y "tú" significa la persona o entidad que compra los productos personalizados en {{$web_company->name}}.com. Cualquier persona o entidad que desee adquirir productos personalizados en {{$web_company->name}}.com debe aceptar estos términos y condiciones sin cambio alguno. AL DAR CLIC EN EL BOTÓN "AÑADIR AL CARRITO" Y HACER TU PEDIDO DE PRODUCTOS PERSONALIZADOS, ACEPTAS ESTAR COMPROMETIDO CON LOS TÉRMINOS Y CONDICIONES, EL AVISO DE PRIVACIDAD DE {{$web_company->name}}.COM, LAS CONDICIONES DE USO Y TODAS SUS PAUTAS.
                                            <br>
                                            Personalización. Los productos personalizados que pidas serán impresos por terceros con quienes {{$web_company->name}} esté asociado para producir dichos productos. Podrás presentar tus propios materiales, incluyendo textos, fotografías, ilustraciones o gráficos y seleccionar de una galería de diseños para crear productos personalizados. Sólo puedes enviar material del cual poseas todos los derechos o debes contar con la autorización de la persona que sea titular de esos derechos.
                                            <br>
                                            Concesión de Licencia para los Materiales. Por este instrumento usted le otorga a {{$web_company->name}} y sus filiales el derecho y la licencia permanente, sin regalías, no exclusiva y en todo el mundo en relación con la producción de los productos personalizados que ordene para (a) reproducir, distribuir y mostrar los materiales que presente, incluyendo todas las marcas comerciales, nombres comerciales y nombres y semejanzas de las personas que aparezcan en sus materiales, (b) modificar y crear trabajos derivados de estos materiales y (c) sublicenciar los derechos anteriores a terceros que proporcionan los productos personalizados y servicios relacionados.
                                            <br>
                                            Pautas y Restricciones. Aceptas presentarnos los materiales de conformidad con todas las pautas de uso publicadas en el sitio web de {{$web_company->name}} o de las cuales se te notifiquen (“Pautas"). En particular, aceptas no presentar materiales que sean ilegales, pornográficos, difamatorios, ilícitos, obscenos, discriminatorios, o que de otro modo violen las normas generales de la comunidad de {{$web_company->name}}. Nos reservamos expresamente el derecho a retirar o no hacer disponible cualesquiera Materiales que consideremos se encuentren en violación de este Acuerdo, las leyes aplicables o nuestras normas de comunidad conforme a nuestro absoluto criterio.
                                            <br>
                                            Declaraciones, Garantías e Indemnizaciones. Declaras y garantizas a {{$web_company->name}}, sus filiales y sublicenciatarios que (a) tiene el derecho de conceder las licencias establecidas de estos términos y condiciones, incluyendo todos los derechos necesarios para la reproducción, distribución y otro uso de los materiales por parte de {{$web_company->name}}, sus filiales y sublicenciatarios, tal como se permite en el presente documento, y (b) los materiales que usted envíe y el ejercicio de los derechos de {{$web_company->name}}, sus filiales y sublicenciatarios conforme a este instrumento, no violarán, malversarán ni infringirán ningún derecho de propiedad intelectual, incluyendo, de manera enunciativa mas no limitativa los derechos de marcas, derechos de autor, derechos morales o derechos de publicidad de terceros. Te comprometes a indemnizar, defender y liberar de responsabilidad a {{$web_company->name}}, sus filiales y sublicenciatarios (incluyendo terceros que proporcionen productos personalizados y servicios relacionados) respecto a cualquier reclamación, responsabilidad, daños y gastos (incluyendo, de manera enunciativa mas no limitativa honorarios y gastos razonables de abogados) que deriven del incumplimiento de estos términos y condiciones.
                                            <br>
                                            Devoluciones. La condición de cualquier artículo que compres de un vendedor externo en {{$web_company->name}}.com que sea entregado a tiempo está garantizado bajo la Garantía de la A a la Z. Mientras la mayoría de vendedores externos ofrecen políticas de devolución equivalentes a las de {{$web_company->name}}.com, algunas políticas de vendedores pueden variar. Puedes ver cada política de devolución de los vendedores en el Centro de devoluciones. Ve a Acerca de nuestras políticas de devolución para más detalles.
                                            Propiedad Intelectual de {{$web_company->name}}. {{$web_company->name}} o sus filiales o licenciatarios son los propietarios de todos los derechos de propiedad intelectual de los diseños disponibles para crear productos personalizados, incluyendo, de manera enunciativa más no limitativa, todas las marcas registradas, nombres comerciales, imágenes comerciales y materiales con derechos de autor. Estos términos y condiciones y su compra de productos personalizados no te conceden ninguna licencia o derecho sobre los diseños, excepto la oportunidad de comprar productos personalizados con este tipo de diseños.
                                            <br>
                                            Otros Términos. Las condiciones de uso, noticia de privacidad y las guías de estos servicios de {{$web_company->name}} (incluyendo todos los cambios a futuro) están incorporados como referencia dentro de estos términos y condiciones, Podremos cambiar estos términos y condiciones a nuestra exclusiva discreción al publicar los términos y condiciones modificados.
                                        </p>   
                                    </div>
                                
                                </div>
                             
                        </div> 
                    </div>
        

                    
                </div>
            </div>
        </div>
        <!-- contact area end -->

        

        <!-- brand area start -->
        @include('web._brand_area')
        <!-- brand area end -->

        @endsection

@section('scripts')

@endsection