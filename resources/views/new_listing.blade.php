<div class="col-sm-6 col-sm-offset-3">
  <h2>Νέα καταχώρηση</h2>

  <form id='add_listing_form' method="POST" action="#">
    @csrf
    <div id="price-group" class="form-group">
      <label for="price">Τιμή</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="50 - 5000000 ευρώ" />
    </div>
    <div id="area-group" class="form-group">
        <label for="area">Περιοχή:</label>
        <select name="area" class="form-select" id="area">
            <option value="Αθήνα">Αθήνα</option>
            <option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
            <option value="Πάτρα">Πάτρα</option>
            <option value="Ηράκλειο">Ηράκλειο</option>
        </select>
    </div>
    <div id="availability-group" class="form-group">
        <label for="availability">Διαθεσιμότητα:</label>
        <select name="availability" id="availability" class="form-select">
            <option value="ενοικίαση">ενοικίαση</option>
            <option value="πώληση">πώληση</option>
        </select>
    </div>
    <div id="size-group" class="form-group">
      <label for="size">Τετραγωνικά μέτρα</label>
      <input type="text" class="form-control" id="size" name="size" placeholder=" 20 - 1000 τ.μ." />
    </div>
    <div id="active-group" class="form-group">
        <label for="active">Ενεργό:</label>
        <select name="active" class="form-select" id="active">
            <option value="0">Όχι</option>
            <option value="1">Ναί</option>
        </select>
    </div>
    <br>
    <div class="">
        <button type="submit" class="btn btn-success" id="submit">Submit</button>
    </div>

    <div id="listing-errors"></div>
  </form>
</div>

<script>
$( "#add_listing_form" ).submit( function(){
  event.preventDefault();
  const form = document.getElementById('add_listing_form');
  const formData = new FormData(form);
  let $listingItems = $('#listing-items');
  let $listingErrors = $('#listing-errors');
  $listingErrors.empty();
  $( "#submit" ).blur();
  $.ajax('/api/listings', 
  {
  type: "POST", 
 // contentType : 'application/json',
 // dataType : 'json',
  data: $(this).serialize(),
  headers: {"Accepts": "text/plain; charset=utf-8", "X-CSRF-TOKEN" : '{{ csrf_token() }}', "Authorization": "Bearer " + "{{ session()->get('token') }}",},
  success: function(data){
      const item = data.data
      const liItem = `<li class="list-group-item listing_item_${item.id}" listing="${item.id}">
        ${item.area}, ${item.availability}, ${item.price} ευρώ, ${item.size} τ.μ. 
        <a href="#" class="delete_listing">delete</a>
      </li>`
      $listingItems.append(liItem);  
  },
  error: function(a, b,c) {
    const errors = a.responseJSON.errors
    $.each(errors, function(i,error){
      const err = `<p>${error[0]}</p>`
      $listingErrors.append(err);  
    });
  }

  });
});
</script>