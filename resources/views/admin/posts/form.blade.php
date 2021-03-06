<div class="form-group">
  <label for="title" class="col-sm-2 control-label">Titulo</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="title" name="title" placeholder="Titulo" value="{{ @$post->title }}">
  </div>
</div>
<div class="form-group">
  <label for="content" class="col-sm-2 control-label">Conteudo</label>
  <div class="col-sm-10">
    <textarea name="content" id="content" class="form-control" placeholder="Conteudo">{{ @$post->content }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="categories_ids" class="col-sm-2 control-label">Categorias</label>
  <div class="col-sm-10">
    <select name="categories_ids[]" class="form-control" multiple>
      @foreach ($categories as $category)
      <option @if (request()->is('admin/posts/*/edit'))
        {{ in_array($category->id,$post->categories->pluck('id')->all()) ? 'selected' : '' }}
        @endif
        value="{{ $category->id }}">
        {{ $category->name }}
      </option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label for="status" class="col-sm-2 control-label">Status</label>
  <div class="col-sm-10">
    <select name="status" class="form-control">
      <option {{ @$post->details->status == 'rascuho' ? 'selected' : '' }}value="rascunho">Rascunho</option>
      <option {{ @$post->details->status == 'revisao' ? 'selected' : '' }} value="revisao">Revisao</option>
      <option {{ @$post->details->status == 'publicado' ? 'selected' : '' }}value="publicado">Publicado</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label for="visibility" class="col-sm-2 control-label">Visibilidade</label>
  <div class="col-sm-10">
    <select name="visibility" class="form-control">
      <option {{ @$post->details->visibility == 'privado' ? 'selected' : '' }} value="privado">Privado</option>
      <option {{ @$post->details->visibility == 'publico' ? 'selected' : '' }} value="publico">Publico</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="sol-sm-offser-2 col-sm-10">
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
</div>