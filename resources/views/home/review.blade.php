<div class="offset-1 col-11 ">
  <hr class="w-100 ">
  <h3 class=>カスタマーレビュー</h3>


  <div class="offset-1 col-10">
    <!-- レビューを実装する箇所になります -->
    <div class="row ">
      @foreach($reviews as $review)
      <div class="offset-md-5 col-md-5">
        <h3 class="review-score-color">{{ str_repeat('★', $review->score) }}</h3>
        <p class="h3">{{$review->comment}}</p>
        <label>{{$review->created_at}} {{$review->user->name}}</label>
        @auth
        @if($user->status == '1')
        <a class="btn btn-primary" href="{{url('edit_review',$review->id)}}"> 編集</a>
        <a class="btn btn-danger" href="{{url('delete_review',$review->id)}}" onclick='return confirm("本当に削除しますか？")'> 削除</a>
        @else
        <a class="btn btn-primary" href="{{url('member')}}"> 編集</a>
        <a class="btn btn-danger" href="{{url('member')}}"> 削除</a>
        @endif
        @endauth
      </div>
      @endforeach
    </div><br />

  </div>
  @auth
  <div class="row">
    <div class="offset-md-5 col-md-5">
      @if($user->status == '1')
      <form method="POST" action="{{ url('review') }}">
        @csrf
        <h4>評価</h4>
        <select name="score" class="form-control m-2 review-score-color">
          <option value="5" class="review-score-color">★★★★★</option>
          <option value="4" class="review-score-color">★★★★</option>
          <option value="3" class="review-score-color">★★★</option>
          <option value="2" class="review-score-color">★★</option>
          <option value="1" class="review-score-color">★</option>
        </select>
        <h4>レビュー内容</h4>
        @error('comment')
        <strong>レビュー内容を入力してください</strong>
        @enderror
        <textarea name="comment" placeholder="コメントを記入してください" required="" class="form-control m-2"></textarea>
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <button type="submit" class="btn nagoyameshi-submit-button ml-2">レビューを追加</button>
      </form>
      @else
      <form method="get" action="{{ url('member') }}">
        @csrf
        <h4>評価</h4>
        <select name="score" class="form-control m-2 review-score-color">
          <option value="5" class="review-score-color">★★★★★</option>
          <option value="4" class="review-score-color">★★★★</option>
          <option value="3" class="review-score-color">★★★</option>
          <option value="2" class="review-score-color">★★</option>
          <option value="1" class="review-score-color">★</option>
        </select>
        <h4>レビュー内容</h4>
        @error('comment')
        <strong>レビュー内容を入力してください</strong>
        @enderror
        <textarea name="comment" placeholder="コメントを記入してください" required="" class="form-control m-2"></textarea>
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <button type="submit" class="btn nagoyameshi-submit-button ml-2">レビューを追加</button>
      </form>
      @endif
    </div>
  </div>
  @endauth
</div>