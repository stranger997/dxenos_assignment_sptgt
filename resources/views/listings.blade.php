<div class="col-sm-6 col-sm-offset-3">
  <h2>Λίστα αγγελιών</h2>
  <div id="listings">
    <ul class="list-group" id="listing-items"></ul>
  </div>
</div>

<script>
$( document ).ready(function() {
  let $listingItems = $('#listing-items');
  $.ajax('/api/listings', 
  { 
  contentType : 'application/json',
  dataType : 'json',
  headers: {"Accepts": "text/plain; charset=utf-8", "X-CSRF-TOKEN" : '{{ csrf_token() }}', "Authorization": "Bearer " + "{{ session()->get('token') }}",},
  success: function(data){
    // console.log('data', data)
    $.each(data.data, function(i,item){
      const liItem = `<li class="list-group-item listing_item_${item.id}" listing="${item.id}">
        ${item.area}, ${item.availability}, ${item.price} ευρώ, ${item.size} τ.μ. 
        <a href="#" class="delete_listing">delete</a>
      </li>`
    
      $listingItems.append(liItem);
    }); 
    }
  });
  $(document).on('click', '.delete_listing', function() {
    event.preventDefault();
    // console.log($(this).parent().attr('listing'))
    const $parent = $(this).parent();                       //???
    const id = $(this).parent().attr('listing');            //???
    $.ajax('/api/listings/'+id, 
    { 
    type: "DELETE",
    contentType : 'application/json',
    dataType : 'json',
    headers: {"Accepts": "text/plain; charset=utf-8", "X-CSRF-TOKEN" : '{{ csrf_token() }}', "Authorization": "Bearer " + "{{ session()->get('token') }}",},
    success: function(result){ 
      $parent.remove() 
    }
    });
  });
});
</script>