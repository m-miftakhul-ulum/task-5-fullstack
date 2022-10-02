<div class="row">
    <div class="mb-3 col-4">
        <label class="form-label required">nama</label>
        <input type="text" class="form-control" name="nama" value="{{ old('nama') ?? $category->nama }}" placeholder="Required...">
    </div>
</div>
<button type="submit" class="btn btn-primary ms-auto">Send data</button>
