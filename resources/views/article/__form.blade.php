<div class="row">
    <div class="mb-3 col-4">
        <label class="form-label required">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $article->title }}" placeholder="Required...">
    </div>
    <div class="col-4">
        <div class="form-label required">Select</div>
        <select name="category" class="form-select">
            @foreach($category as $key)
            <option {{ $article->category_id == $key->id ? "selected" : "" }} value={{ $key->id }}>{{ $key->nama }}</option>
            <option value="{{$key->id}}">{{$key->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4">
        <div class="form-label required">Gambar</div>
        <input type="file" name="image" class="form-control" />
    </div>
    <div class="mb-3">
        <label class="form-label">Textarea </label>
        <textarea class="form-control" name="content" rows="6" placeholder="Content..">{{ old('content') ?? $article->content }}</textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary ms-auto">Send data</button>
