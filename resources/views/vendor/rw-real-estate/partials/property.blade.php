<div class="c-properties-grid__item">
    <h3 class="c-properties-grid-item__title">{{$property->name}}</h3>
    <p>{{$property->description}}</p>
    <ul class="c-properties-grid-item__list">
        <li>Price: {{$property->features->price}} €</li>
        <li>Location: {{$property->location}}</li>
        <li>Rooms: {{$property->features->bedrooms}}</li>
        <li>Bathrooms: {{$property->features->bathrooms}}</li>
        <li>Built Area: {{$property->features->built_area}} m2</li>
    </ul>
</div>
