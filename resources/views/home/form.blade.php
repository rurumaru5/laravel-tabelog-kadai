<div class="search-input">
  <form id="search" action="{{url('search')}}">
    <input type="text" name="keyword" placeholder="Type Something" id='searchText' onkeypress="handle" />
    <!--プルダウンカテゴリ選択-->
    <div class="form-group row">
      <div style="padding: 10px;" class="col-sm-3">
        <select style="width:300px;" name="category_id" class="form-control" value="{{ 'category_id' }}">
          <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
          @foreach(App\Models\Category::all() as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach

        </select>
      </div>
    </div>
    <button role="button">Search Now</button>

  </form>
</div>