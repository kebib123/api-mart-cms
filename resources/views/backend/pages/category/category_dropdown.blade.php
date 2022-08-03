
    @if($category->subCategory->isNotEmpty())
    @foreach($category->subCategory as $child)
        <option value="{{ $child->id }}" >&nbsp;&nbsp;{{ categorySeperator('-', $loop->depth) }} {{ $child->name }}</option>
        @include('backend.pages.category.category_dropdown', ['category' => $child])
    @endforeach
@endif
