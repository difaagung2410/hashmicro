@extends('app')
@section('content')
    <div class="container text-center mt-4">
        @if($parent)
        <form action="{{ route('update.feature.one', $parent->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3 w-50">
                <label>Nama Orang Tua</label>
                <input class="form-control" type="text" name="parent_name" value="{{ $parent->name }}" />
                <label>Budget Uang Jajan</label>
                <input class="form-control" type="text" name="amount" value="{{ $parent->amount }}" />
            </div>
            <div class="mb-3 w-50">
                <a href="#" class="btn btn-primary child-button">Tambah Anak</a>
            </div>
    
            <div class="child">
                @foreach ($parent->childs as $key => $child)
                    <div class="ml-4 mb-2 w-50">
                        <label>Anak ke-{{ $key + 1 }}</label>
                        <input class="form-control" name="child[]" value="{{ $child->name }}"></input>
                        <label>Uang Jajan (Dalam Persen dari budget orang tua) <b>Uang Jajan: {{ ($child->percentage / 100) * $parent->amount }}</b></label>
                        <input class="form-control" name="percentage[]" value="{{ $child->percentage }}"></input>
                    </div>
                @endforeach
            </div>

            <div class="mb-3 w-50">
                <button type="submit" class="btn btn-primary proceed">Proses</button>
                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
            </div>
        </form>
        @endif
        @if(!$parent)
            <form action="{{ route('store.feature.one') }}" method="POST">
                @csrf
                <div class="mb-3 w-50">
                    <label>Nama Orang Tua</label>
                    <input class="form-control" type="text" name="parent_name" />
                    <label>Budget Uang Jajan</label>
                    <input class="form-control" type="text" name="amount" />
                </div>
                <div class="mb-3 w-50">
                    <a href="#" class="btn btn-primary child-button">Tambah Anak</a>
                </div>
        
                <div class="child">
                </div>

                <div class="mb-3 w-50">
                    <button type="submit" class="btn btn-primary proceed">Proses</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>
            </form>
        @endif
    </div>
@endsection
@push('script')
    <script>
        $('.nav-item.feature-one').addClass('active');

        $('.child-button').on('click', function() {
            var index = $('.child input[name="child[]"]').length + 1;
            $('.child').append(`
                    <div class="ml-4 mb-2 w-50">
                        <label>Anak ke-`+index+`</label>
                        <input class="form-control" name="child[]"></input>
                        <label>Uang Jajan (Dalam Persen dari budget orang tua)</label>
                        <input class="form-control" name="percentage[]"></input>
                    </div>
                `)
        })
    </script>
@endpush