<div class="c-properties-grid__item">
  <h3 class="c-properties-grid-item__title">{{$property->name}}</h3>
  <p>{{$property->description}}</p>
  <ul class="c-properties-grid-item__list">
      <li><b>Property Type</b>: {{$property->property_type}}</li>
      <li>
        <b>Features:</b>
        <ul>
          <li><b>Reference:</b> {{$property->features->reference}}</li>
          <li><b>Bedrooms:</b> {{$property->features->bedrooms}}</li>
          <li><b>Bathrooms:</b> {{$property->features->bathrooms}}</li>
          <li><b>Private pool:</b> {{$property->features->private_pool == 1 ? 'Yes' : 'No'}}</li>
          <li><b>Community pool:</b> {{$property->features->community_pool == 1 ? 'Yes' : 'No'}}</li>
          <li><b>Garden:</b> {{$property->features->garden == 1 ? 'Yes' : 'No'}}</li>
          <li><b>Garaje:</b> {{$property->features->garaje == 1 ? 'Yes' : 'No'}}</li>
          <li><b>Price:</b> {{$property->features->price}}</li>
          <li><b>Built area:</b> {{$property->features->built_area}}</li>
          <li><b>Land area:</b> {{$property->features->land_area}}</li>
        </ul>
      </li>
      <li>
        <b>Agent</b>
        <ul>
          <li><b>Name:</b> {{$property->agent()->full_name}}</li>
          <li><b>Phone number:</b> {{$property->agent()->mobile}}</li>
          <li><b>Email:</b> {{$property->agent()->email}}</li>
        </ul>
      </li>
      
  </ul>
</div>
