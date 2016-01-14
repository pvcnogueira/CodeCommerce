<form action="#" method="POST">
<!-- Enganar o Framework para usar o method PUT, pode ser DELETE também -->
    <input type="hidden" name="_method" value="PUT"/>

<!-- Recurso do Laravel para segurança da aplicação -->
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>