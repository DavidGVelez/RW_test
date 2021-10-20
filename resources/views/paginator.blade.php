
<div class="pagination">
  <span class="hidden" id="previous">&laquo;</span>
  <span id="current_page">{{$properties->currentPage()}}</span>
  <span id="next">&raquo;</span>
</div>

<span id="results">
  1-19 out of {{$properties->total()}} properties
</span>


@push('css')
  <style>
     .pagination {
  display: inline-block;
}

.pagination span {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  cursor: pointer

}
.hidden {
  display:none
}
#previous:hover ,#next:hover{
  background-color: rgb(107, 103, 103);
}
#current_page{
  cursor: default;
  background-color: rgb(173, 166, 166);
}
</style>
@endpush

@push('js')
  <script>
      
  </script>
@endpush