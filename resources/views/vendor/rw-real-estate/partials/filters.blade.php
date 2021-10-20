<form class="c-filters">
    <input type="hidden" id="total_pages" value="{{$properties->total()}}">
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
            <option value="">Select one</option>
            @for($i=1; $i<=10; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </label>
    <br>
    <label for="bathrooms">
        Bathrooms:
        <select name="bathrooms" id="bathrooms">
            <option value="">Select one</option>
            @for($i=1; $i<=10; $i++)
                <option value="{!! $i !!}">{!! $i !!}</option>
            @endfor
        </select>
    </label>
    <br>
    <label for="property_type">
        Property Type:
        <select name="property_type" id="property_type">
            <option value="">Select one</option>
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
            <option value="">Select one</option>
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
    <input type="button" value="Filter" id="filter">
</form>

@include('paginator')

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

        var offset = 1;

        $('#filter').on('click', function(e){
            offset = 1       
        })

        $('#previous').on('click', function(e){
            if(offset > 0){
                offset--;
            }
        })

        $('#next').on('click', function(e){
            if(offset <= $('#total_pages').val()){
                offset++;
            }
        })

        $('#filter,#previous, #next').on('click', function(e){
            e.preventDefault();

            var data = {};
            $.each($('form').serializeArray(), function(){
                data[this.name] = this.value
            });
                
            $.ajax({
                url: `/api/properties?page=${offset}`,
                data: {
                    ...data,
                    limit: 20
                }
            }).done(function(res) {
                $('#properties_grid').empty();
                $('#current_page').text(res.current_page);
                var from = res.from ? res.from : 0;
                var to = res.to ? res.to : 0;
                $('#results').text(from +'-'+ to +' out of '+res.total+' properties')
                if(res.data.length == 0){
                    $('#properties_grid').append(
                        '<span>No properties with the defined filters</span>'
                    );
                }
                res.data.forEach(element => {
                    $('#properties_grid').append(
                        printData(element)
                    );
                });
                res.current_page == 1 ? $('#previous').hide() :  $('#previous').show();
                res.current_page == res.last_page ? $('#next').hide() : $('#next').show();

            })

        })

        function printData(property){
           
            return `
            <div class="c-properties-grid__item">
                <h3 class="c-properties-grid-item__title">${property.name}</h3>
                <p>${property.description}}</p>
                <ul class="c-properties-grid-item__list">
                    <li>Price: ${property.price} €</li>
                    <li>Location: ${property.location}</li>
                    <li>Rooms: ${property.bedrooms}</li>
                    <li>Bathrooms: ${property.bathrooms}</li>
                    <li>Built Area: ${property.built_area} m2</li>
                </ul>
            </div>`     
        }
    </script>
@endpush
