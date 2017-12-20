<!-- index.blade.php -->

@extends('master')
@section('content')   
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Validé</th>
        <th>Titre</th>
        <th>Description</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
    
      <tr>
      	<td colspan="4">
			<a href="/">Retour &agrave l'accueil</a> | 
			<a href="/crud/create">Cr&eacute;er une nouvelle t&acirc;che</a>
    	</td>
      </tr>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        @if ($post['validate'] === 1)
        	<td>Valid&eacute;</td>
        @else
        	<td>Non valid&eacute;</td>
        @endif
        <td>{{$post['title']}}</td>
        <td>{{$post['post']}}</td>
        <td><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-warning">&Eacute;diter</a></td>
        <td>
        <form method="post" action="{{action('CRUDController@update', $post['id'])}}">
            {{csrf_field()}}
      		<input name="_method" type="hidden" value="PATCH">
            <input type="hidden" name="validate" value=1>
            <input type="hidden" name="title" value="{{$post['title']}}">
            <input type="hidden" name="post" value="{{$post['post']}}">
            <button class="btn btn-warning" type="submit">Valider</button>
          </form>
        </td>
        <td>
          <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
