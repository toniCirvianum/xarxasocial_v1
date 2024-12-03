<div >
    <!-- Variable per controlar quin cor mostrar-->
    @php($user_like = false)
    @foreach ($image->likes as $like)
    @if ($like->user_id == Auth::user()->id)
    @php($user_like = true )
    @endif
    @endforeach

    @if ($user_like)
    <button type="button" data-id="{{ $image->id}}" title="Like post" class=" btn-like ">
        <i class="fa-solid fa-heart" style="color: #f50000;"></i>
    </button>
    @else
    <button type="button" data-id="{{ $image->id}}" title="Like post" class="btn-dislike ">
        <i class="fa-regular fa-heart"></i>
    </button>
    @endif
    <span>{{ count($image->likes) }}</span>
</div>