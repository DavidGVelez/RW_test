@extends('vendor.rw-real-estate.layouts.base')

@section('content')
    <div class="title m-b-md">
        <h1 class="c-title c-title--h1">Properties</h1>
    </div>
    <div class="c-grid">
        <aside class="c-grid__left">
            @include('vendor.rw-real-estate.partials.filters')
        </aside>
        <aside class="c-grid__right">
            <section class="c-properties-grid__wrapper">
                <div class="c-properties-grid" id="properties_grid">
                    @foreach($properties as $property)
                        @include('vendor.rw-real-estate.partials.property')
                    @endforeach
                </div>
            </section>
        </aside>
    </div>
@endsection

@push('css')
    <style>
        .c-grid {
            display: grid;
            grid-template-columns: 30% 70%;
        }
        .c-grid__left {
            background-color: rgba(40, 40, 40, 0.1);
            height: 100vh;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
