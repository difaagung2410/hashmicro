@extends('app')
@section('content')
    <div class="container text-center mt-4">
        <div class="mb-3">
            <label>Input 1</label>
            <input class="form-control" type="text" name="input1" />
        </div>
        <div class="mb-3">
            <label>Input 2</label>
            <input class="form-control" type="text" name="input2" />
        </div>
        <div class="mb-3">
            <button class="btn btn-primary proceed">Proses</button>
            <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
        </div>
        <div class="mb-3">
            <div class="result">
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.nav-item.feature-two').addClass('active');

        $('.proceed').on('click', function(e) {
            console.log($('input[name="input1"]'));
            e.preventDefault();
            $(this).prop("disabled", false);
            $.ajax({
                url: "{{ route('calculate.feature.two') }}",
                type: 'GET',
                data: {
                    input_one: $('input[name="input1"]').val(),
                    input_two: $('input[name="input2"]').val()
                },
            })
            .done(function (res) {
                $(".result").empty();

                $(".result").append(`
                    <h2>Hasil: `+res+`%</h2>
                `);
            })
            .fail(function (res) {
                $(this).prop("disabled", false);
            });
        })
    </script>
@endpush