<section class="c-filters">
    <h2 class="c-filters__title">Filters:</h2>
    <label for="price_from">
        Price from: <input type="number" name="price_from" id="price_from" />
    </label>
    <label for="price_to">
        Price To: <input type="number" name="price_to" id="price_to" />
    </label>
    <br>
    <label for="rooms">
        Rooms:
        <select name="rooms" id="rooms">
            @for($i=1; $i<=10; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </label>
    <br>
    <label for="bathrooms">
        Bathrooms:
        <select name="bathrooms" id="bathrooms">
            @for($i=1; $i<=10; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </label>
    <br>
    <label for="property_type">
        Property Type:
        <select name="property_type" id="property_type">
            <option value="1">Semi Detached House</option>
            <option value="2">Apartment</option>
            <option value="3">Villa - Chalet</option>
            <option value="4">Cottage</option>
            <option value="5">Commercial</option>
            <option value="6">Plot</option>
        </select>
    </label>
    <br>
    <label for="location">
        Location:
        <select name="location" id="location">
            @foreach ($locations as $location)
                <option value="{{$location->id}}">{{$location->name}}</option>
            @endforeach
        </select>
    </label>
    <br>
    <label for="garaje">
        Garaje:
        <input type="checkbox" name="garaje" id="garaje" value="1">
    </label>
    <br>
    <label for="garden">
        Garden:
        <input type="checkbox" name="garden" id="garden" value="1">
    </label>
    <br>
    <label for="private_pool">
        Private pool:
        <input type="checkbox" name="private_pool" id="private_pool" value="1">
    </label>
    <br>
    <label for="community_pool">
        Community pool:
        <input type="checkbox" name="community_pool" id="community_pool" value="1">
    </label>
    <br>
    <label for="reference">
        Reference:
        <input type="text" name="reference" id="reference">
    </label>
    <br>
    <input type="button" value="Filter">
</section>

@push('css')
    <style>
        .c-filters {
            text-align: left;
            padding: 15px;
        }
        .c-filters__title {
            text-align: left;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush
