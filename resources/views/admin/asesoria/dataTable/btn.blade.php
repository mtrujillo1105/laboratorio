<form action="{{route('asesoria.destroy',$id)}}" method="post">    
@csrf
@method('DELETE')
<a href="{{route('asesoria.edit', $id) }}" class="btn btn-info btn-sm">Editar</a>

<input type="submit" name="submit" value="Eliminar" class="btn btn-danger btn-sm" 
onclick="return confirm('¿Estas seguro que quieres eliminar?')">

</form>